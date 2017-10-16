<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Product;
use App\Topping;
use App\OrderStatus;
use App\Order;
use App\OrderItem;
use App\User;
use App\Promotion;
use App\Coupon;
use App\ContactUs;
use App\AskBox;

use Auth;
use Image;
use File;
use Validator;
use Hash;
use Mail;

use Charts;
use DB;

class AppController extends Controller
{
  protected $items_per_page = 5;
  protected $orders_per_page2 = 10;

  public function messages() { /* */
    $items = AskBox::orderBy('id', 'desc')->paginate($this->orders_per_page2);

    return view('frontend.messages', ['items' => $items]);
  }

  public function notifications() { /* */
    $items = AskBox::where('status', 0);
    $count = $items->count();
    $items2 = $items->orderBy('id', 'desc')->limit(5)->get();

    return view('frontend.ajax.messages', ['count' => $count, 'items2' => $items2])->render();
  }

  public function notifications2() { /* */
    $items = Order::where([['order_status_id', '>', 1], ['order_status_id', '<', 5]]);
    $count = $items->count();
    $items2 = $items->orderBy('id', 'desc')->limit(5)->get();

    return view('frontend.ajax.orders', ['count' => $count, 'items2' => $items2])->render();
  }

  public function count() { /* */
    $count['newMessages'] = AskBox::where('status', 0)->count();
    $count['newOrders'] = Order::where([['order_status_id', '>', 1], ['order_status_id', '<', 5]])->count();

    return response()->json(['count' => $count]);
  }

  public function dashboard() { /* */
    $count['newOrders'] = Order::where([['order_status_id', '>', 1], ['order_status_id', '<', 5]])->count();
    $count['orders'] = Order::all()->count();
    $count['products'] = Product::all()->count();
    $count['newMessages'] = AskBox::where('status', 0)->count();

    $datas = OrderItem::select('product_id', DB::raw('sum(quanlity) as quanlity'))->groupBy('product_id')->orderBy('quanlity','desc')->limit(5)->get();

    foreach ($datas as $data) {
      $labels[] = $data->product->name;
      $values[] = $data->quanlity;
    }

    $chart = Charts::create('bar', 'highcharts')
    ->title('Top Five')
    ->elementLabel('Quanlity')
    ->labels($labels)
    ->values($values);

    return view('frontend.dashboard', ['count' => $count, 'chart' => $chart]);
  }

  public function orders() { /* */
    $items = Order::orderBy('id', 'desc')->paginate($this->orders_per_page2);

    return view('frontend.orders', ['items' => $items]);
  }

  public function newOrders() { /* */
    $items = Order::where([['order_status_id', '>', 1], ['order_status_id', '<', 5]])->orderBy('updated_at', 'desc')->paginate($this->orders_per_page2);

    return view('frontend.newOrders', ['items' => $items]);
  }

  public function orderItems($id) { /* */
    $item = Order::find($id);

    if ($item->order_status_id > 2) {
      $item2 = OrderStatus::where([['id', '>=', $item->order_status_id], ['id', '<', 6]])->get();
    } else {
      $item2 = OrderStatus::where('id', '>=', $item->order_status_id)->get();
    }
    foreach ($item2 as $item3) {
      $items[$item3->id] = $item3->name;
    }

    return view('frontend.ajax.orderItems', ['item' => $item, 'items' => $items])->render();
  }

  public function products() { /* */
    $items = Product::orderBy('id', 'desc')->paginate($this->items_per_page);

    foreach (Category::all() as $item) {
      $items2[$item->id] = $item->name;
    }

    return view('frontend.products', ['items' => $items, 'items2' => $items2]);
  }

  public function users() { /* */
    $items = User::where('is_admin', '<', Auth::user()->is_admin)->orderBy('id', 'desc')->paginate($this->items_per_page);

    return view('frontend.users', ['items' => $items]);
  }

  public function create() { /* */
    $item = ContactUs::find(1);
    $items = Category::all();

    return view('frontend.create', ['items' => $items, 'item' => $item]);
  }

  public function fieldCreate(Request $request, $table) { /* \o/ */
    if ($table === 'product') {
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $filepath = 'assets/images/products/';

      Image::make($image)->resize(170, 230)->save($filepath . $filename);

      $product = new Product;
      $product->category_id = $request->category;
      $product->name = $request->name;
      $product->description = $request->description;
      $product->image = $filename;
      $product->price = str_replace(',', '', $request->price);
      $product->recommended = $request->recommended ? 'Yes' : 'No';
      $product->new = $request->new ? 'Yes' : 'No';
      $product->save();
    } elseif ($table === 'user') {
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->address = $request->address;
      $user->tel = $request->tel;
      $user->status = $request->status ? 'Active' : 'Inactive';
      $user->is_admin = $request->admin ? '1' : '0';
      $user->save();
    } elseif ($table === 'promotion') {
      $promotion = new Promotion;
      $promotion->name = $request->name;
      $promotion->description = $request->description;
      $promotion->use_points = $request->point;
      $promotion->started_at = $request->start;
      $promotion->ended_at = $request->end;
      $promotion->save();
    }
    $notification = array(
      'title' => 'Success alert',
      'msg' => 'Create successfully.',
      'alert-type' => 'success'
    );
    session()->put('notification', $notification);

    return redirect()->back();
  }

  public function fieldUpdate(Request $request, $table) { /* \o/ */
    if ($table === 'order') {
      $item = Order::find($request->pk);
    } elseif ($table === 'product') {
      $item = Product::find($request->pk);
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $filepath = 'assets/images/products/';

        File::delete($filepath . $item->image);

        Image::make($image)->resize(170, 230)->save($filepath . $filename);

        $request->value = $filename;
      } elseif ($request->name === 'price') {
        $price = str_replace(',', '', $request->value);

        $request->value = $price;
      }
    } elseif ($table === 'user') {
      $item = User::find($request->pk);
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $filepath = 'assets/images/avatars/';

        File::delete($filepath . $item->avatar);

        Image::make($image)->resize(140, 140)->save($filepath . $filename);

        $request->value = $filename;
      } elseif ($request->name === 'email') {
        $data = ['email' => $request->value];
        $rules = ['email' => 'email|unique:users'];
        $messages = []; /* */
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
          $error = $validator->errors()->first('email');

          return response()->json(['status' => false, 'error' => $error]);
        }
      }
    } elseif ($table === 'contactus') {
      $item = ContactUs::find($request->pk);
    } elseif ($table === 'askbox') {
      $item = AskBox::find($request->pk);
      if ($item->status === 0) {
        $item->update(['status' => 1]);
      }

      Mail::send('emails.answer', [
        'subject' => $item->subject,
        'bodyMessage' => $item->message,
        'answer' => $request->value
      ], function($message) use($item)
      {
        $message->to($item->email);
        $message->subject('(ตอบกลับ)Chanomhomtea');
      });
    }
    $item->update([$request->name => $request->value]);

    return response()->json(['status' => true, 'title' => 'Success alert', 'msg' => 'Update successfully.']);
  }

  public function other() { /* */
    $items = Topping::paginate($this->items_per_page, ['*'], 'topping');
    $items2 = Category::paginate($this->items_per_page, ['*'], 'category');
    $items3 = OrderStatus::all();
    $items4 = Product::all();

    foreach ($items2 as $item2) {
      $count[$item2->id] = $items4->where('category_id', $item2->id)->count();
    }

    return view('frontend.other', ['items' => $items, 'items2' => $items2, 'items3' => $items3, 'count' => $count]);
  }

  public function otherCreate(Request $request) { /* */
    if ($request->table === 'topping') {
      $table = new Topping;
    } elseif ($request->table === 'category') {
      $table = new Category;
    }
    $table->name = $request->name;
    $table->save();

    $notification = array(
      'title' => 'Success alert',
      'msg' => 'Create successfully.',
      'alert-type' => 'success'
    );
    session()->put('notification', $notification);

    return redirect()->back();
  }

  public function otherUpdate(Request $request, $table) { /* */
    if ($table === 'topping') {
      $item = Topping::find($request->pk);
    } elseif ($table === 'category') {
      $item = Category::find($request->pk);
    } elseif ($table === 'status') {
      $item = OrderStatus::find($request->pk);
    }
    $item->update([$request->name => $request->value]);

    return response()->json(['status' => true, 'title' => 'Success alert', 'msg' => 'Update successfully.']);
  }

  public function couponChecker(Request $request) { /* */
    $item = Coupon::find($request->code);
    if ($item) {
      return view('frontend.ajax.coupon', ['item' => $item])->render();
    }
    return ['status' => false, 'error' => 'Code does not exist.'];
  }

  public function couponUpdate($code, $value) { /* */
    Coupon::find($code)->update(['status' => $value]);

    return response()->json(['status' => 'Used', 'title' => 'Success alert', 'msg' => 'Update successfully.']);
  }

  public function signout() { /* */
    Auth::logout();

    return redirect()->guest('/');
  }
}
