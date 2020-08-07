<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Page;
use  App\User;
use  App\Banner;
use  App\Product;
use Auth;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        return view('dashboard.index')->with('user', $user);
    }

    public function banner()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $banners = Banner::find($user_id);

        return view('dashboard.banner')->with(["user" => $user, "banners" => $banners]);
    }

    public function product()
    {
        $user_id = auth()->user()->name;
        $user = User::find($user_id);
        $products = Product::select('id','image','title','location')->get();

        return View("dashboard.products")->with(["user" => $user, "products" => $products]);
    }

}
