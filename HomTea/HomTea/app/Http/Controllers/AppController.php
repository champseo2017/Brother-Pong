<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\NewOrders;

use App\User;
use App\Category;
use App\Product;
use App\Topping;
use App\Order;
use App\OrderItem;
use App\Promotion;
use App\Coupon;
use App\ContactUs;
use App\AskBox;

use Auth;
use Hash;
use Validator;
use Cart;
use Mail;

use Carbon\Carbon;


class AppController extends Controller
{
  protected $items_per_page = 9;

  public function signin(Request $request) { /* */
    $remember = $request->has('remember') ? true : false;
    if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
      return response()->json(['response' => true, 'title' => 'Success alert', 'msg' => 'Sign in successfully.', 'email' => Auth::user()->email]);
    }
    return response()->json(['response' => false, 'error' => 'Email or Password does not exist.']);
  }

  public function forgot(Request $request) { /* */
    $item = User::where('email', $request->email)->get();
    if ($item->count() > 0) {
      $item[0]->update(['password' => Hash::make(123456)]);

      Mail::send('emails.forgot', [
        'subject' => 'Reset password',
        'bodyMessage' => 'New password: 123456'
      ], function($message) use($item)
      {
        $message->to($item[0]->email);
        $message->subject('Chanomhomtea');
      });

      return response()->json(['response' => true,'success'=> 'Please check for an email from Chanomhomtea', 'title' => 'Success alert', 'msg' => 'Reset password successfully.']);
    }
    return response()->json(['response' => false, 'error' => 'Email does not exist.']);
  }

  public function profile(Request $request) {
    User::find(Auth::user()->id)->update($request->all());

    return response()->json(['title' => 'Success alert', 'msg' => 'Update successfully.']);
  }

  public function passwordChecker(Request $request) { /* */
    $item = User::find(Auth::user()->id);

    if (Hash::check($request->cpassword, $item->password)) {
      return response()->json(['status' => true]);
    }
    return response()->json(['status' => false, 'error' => '']);
  }

  public function password(Request $request) { /* */
    User::find(Auth::user()->id)->update(['password' => Hash::make($request->npassword)]);

    return response()->json(['title' => 'Success alert', 'msg' => 'Update successfully.']);
  }

  public function signout() { /* */
    Auth::logout();

    return response()->json(['title' => 'Success alert', 'msg' => 'Sign out successfully.']);
  }



  public function askbox(Request $request) {
    $askbox = new AskBox;
    $askbox->user_id = Auth::check() ? Auth::user()->id : 0;
    $askbox->email = $request->email;
    $askbox->subject = $request->subject;
    $askbox->message = $request->message;
    $askbox->save();

    Mail::send('emails.contactus', [
      'subject' => $request->subject,
      'bodyMessage' => $request->message
    ], function($message) use($request)
    {
      $message->to($request->email);
      $message->subject('Chanomhomtea');
    });

    return response()->json(['title' => 'Success alert', 'msg' => 'Send successfully.', 'auth' => Auth::check()]);
  }

  public function getCoupon() {
    $items = Order::where([['user_id', Auth::user()->id], ['order_status_id', 5]])->get();
    $uPoints = 0;
    foreach ($items as $item) {
      foreach ($item->orderItems as $orderItem) {
        $uPoints += $orderItem->quanlity;
      }
    }

    $items2 = Promotion::where([
      ['started_at', '<=', Carbon::now()],
      ['ended_at', '>=', Carbon::now()]
    ])->orderBy('id', 'desc')->get();

    $items3 = Coupon::where([['user_id', Auth::user()->id], ['status', '<', 1]])->orderBy('created_at', 'desc')->get();
    $items4 = Coupon::where('user_id', Auth::user()->id)->get();
    $cPoints = 0;
    foreach ($items4 as $item4) {
      $cPoints += $item4->promotion->use_points;
    }

    $pointsTotal = $uPoints - $cPoints;

    return view('shop.coupon.index', ['pointsTotal' => $pointsTotal, 'items2' => $items2, 'items3' => $items3]);
  }

  public function postCoupon(Request $request) { /* \o/ */
    $items = Order::where('user_id', Auth::user()->id)->get();
    $uPoints = 0;
    foreach ($items as $item) {
      foreach ($item->orderItems as $orderItem) {
        $uPoints += $orderItem->quanlity;
      }
    }
    $items2 = Coupon::where('user_id', Auth::user()->id)->get();
    $cPoints = 0;
    foreach ($items2 as $item2) {
      $cPoints += $item2->promotion->use_points;
    }

    $pointsTotal = $uPoints - $cPoints;

    $e = explode(",", $request->promotion);
    if ($pointsTotal >= $e[1]) {
      $coupon = new Coupon;
      $coupon->code = uniqid();
      $coupon->promotion_id = $e[0];
      $coupon->user_id = Auth::user()->id;
      $coupon-> save();

      $pointsTotal = $pointsTotal - $e[1];

      return response()->json(['status' => true, 'title' => '', 'msg' => '', 'pointsTotal' => $pointsTotal, 'code' => $coupon->code, 'promotion' => $coupon->promotion->name]);
    }
    return response()->json(['status' => false, 'error' => '']);
  }

  public function orders() { /* */
    $items = Order::where([['user_id', Auth::user()->id], ['updated_at', '>=', Carbon::now()->subDay()]])->orderBy('id', 'desc')->get();

    return view('shop.order.index', ['items' => $items])->render();
  }

  public function orderItems($id) { /* */
    $item = Order::find($id);

    return view('shop.order.items', ['item' => $item])->render();
  }

  public function orderUpdate($id, $value, Request $request) { /* */
    $item = Order::find($id);
    if ($value === '2') {
      $item->update(['note' => $request->note, 'order_status_id' => $value]);
    } else {
      $item->update(['order_status_id' => $value]);
    }

    $count = Order::where([['order_status_id', '>', 1], ['order_status_id', '<', 5]])->count();

    $item2 = $item->user;

    $status = $item->orderStatus->name;

    if ($item->note === null) {
      $note = '';
    } else {
      $note = $item->note;
    }

    event(new NewOrders(['title' => 'Test title', 'msg' => 'Test message.', 'item' => $item, 'count' => $count, 'item2' => $item2, 'status' => $status]));

    return response()->json(['status' => $status, 'note' => $note, 'title' => 'Success alert', 'msg' => 'Update successfully.']);
  }

  public function getItemAdd($id, $name, $price) { /* */
    Cart::add($id, $name, 1, $price);

    $cartCount = Cart::count();

    return response()->json(['cartCount' => $cartCount, 'title' => 'Success alert', 'msg' => 'Add to Cart successfully.']);
  }

  public function postItemAdd(Request $request) { /* */
    if ($request->has('toppings')) {
      $price = count($request->toppings) * 5 + $request->price;
      Cart::add($request->id, $request->name, $request->qty, $price, ['toppings' => $request->toppings]);
    } else {
      Cart::add($request->id, $request->name, $request->qty, $request->price);
    }

    $cartCount = Cart::count();

    return response()->json(['cartCount' => $cartCount, 'title' => 'Success alert', 'msg' => 'Add to Cart successfully.']);
  }

  public function itemDetails($id) { /* */
    $item = Product::find($id);
    $items = Topping::where('status', 'in-use')->get();

    return view('shop.product.details', ['item' => $item, 'items' => $items])->render();
  }

  public function itemUpdate($id, $value) { /* */
    $rows  = Cart::content();
    $rowId = $rows->where('id', $id)->first()->rowId;
    Cart::update($rowId, $value);

    $subTotal = Cart::get($rowId)->subtotal();

    $cartSubTotal = Cart::subtotal();

    return response()->json(['subTotal' => $subTotal, 'cartSubTotal' => $cartSubTotal]);
  }

  public function itemDelete($id) { /* */
    $rows  = Cart::content();
    $rowId = $rows->where('id', $id)->first()->rowId;
    Cart::remove($rowId);

    $cartSubTotal = Cart::subtotal();

    $cartCount = Cart::count();

    return response()->json(['cartSubTotal' => $cartSubTotal, 'cartCount' => $cartCount]);
  }

  public function checkout() { /* */
    if (Cart::content()->count() === 0) {
      return response()->json(['status' => false, 'error' => 'Your shopping cart is empty.']);
    } else {
      if (Auth::check()) {
        $id = 'ORDER-';
        $i = 1;
        $j = strlen($id);
        $item = Order::orderBy('id', 'desc')->first();
        if ($item) {
          $i = substr($item->id, $j);
          $i = intval($i)+1;
        }
        $strOrderID = $id.sprintf('%010d', $i);

        $order = new Order;
        $order->id = $strOrderID;
        $order->user_id = Auth::user()->id;
        $order->price = str_replace(',', '', Cart::subtotal());
        $order->save();

        foreach (Cart::content() as $row) {
          $data[] = [
            'order_id' => $strOrderID,
            'product_id' => $row->id,
            'quanlity' => $row->qty,
            'price' => $row->price,
            'subtotal' => $row->subtotal,
            'options' => $row->options->has('toppings') ? $row->options : null
          ];
        }
        OrderItem::insert($data);

        Cart::destroy();

        $cartCount = Cart::count();

        return response()->json(['status' => true, 'cartCount' => $cartCount, 'title' => 'Success alert', 'msg' => 'Check out successfully.']);
      }
      return response()->json(['status' => false, 'error' => 'Please sign in to continue checkout.']);
    }
  }

  public function index() { /* \o/ */
    $item = ContactUs::find(1);
    $items = Product::all();

    foreach (Category::all() as $item2) {
      $count[$item2->id] = $items->where('category_id', $item2->id)->count();
      if ($count[$item2->id] > 0) {
        $id[] = $item2->id;
      }
    }
    $items2 = Category::whereIn('id', $id)->where('status', 'in-use')->get();

    $count['all'] = $items->count();
    $count['recommended'] = $items->where('recommended', 'Yes')->count();
    $count['new'] = $items->where('new', 'Yes')->count();

    $cartCount = Cart::count();

    return view('index', ['item' => $item, 'items' => $items, 'count' => $count, 'items2' => $items2, 'cartCount' => $cartCount]);
  }

  public function all() { /* */
    $items = Product::paginate($this->items_per_page);

    return view('shop.product.index', ['items' => $items])->render();
  }

  public function category($name, $value) { /* */
    $items = Product::where($name, $value)->paginate($this->items_per_page);

    return view('shop.product.index', ['items' => $items])->render();
  }

  public function emailChecker(Request $request) { /* */
    $validator = Validator::make($request->all(), [
      'email' => 'unique:users',
    ]);

    if ($validator->fails()) {
      echo 'false';
    } else {
      echo 'true';
    }
  }
}
