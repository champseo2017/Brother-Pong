<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Coupon;
use Auth;
use Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth')->only('index', 'signout');
      // $this->middleware('dump')->only();
    }

    public function index()
    {
      $item = User::find(Auth::user()->id);
      $items = Order::where('user_id', Auth::user()->id)->get();
      $items2 = Coupon::where('user_id', Auth::user()->id)->get();

      return view('user.profile', ['item' => $item, 'items' => $items, 'items2' => $items2])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) { /* */
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->address = $request->address;
      $user->tel = $request->tel;
      $user->status = 'Active';
      $user->is_admin = 0;
      $user->save();

      Auth::login($user);

      return response()->json(['title' => 'Success alert', 'msg' => 'Sign up successfully.', 'email' => Auth::user()->email]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
