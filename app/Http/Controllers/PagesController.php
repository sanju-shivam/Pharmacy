<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Banner;
use App\Category;
use App\Product;
use App\Page;
use App\Social;
use Session;
use App\State;
use Auth;
use App\BookSubcription;

class PagesController extends Controller
{
    
    public function index() {

        // About Us
        $page = Page::where('slug', 'about')->first();
        // All Categories 
        $categories = Category::paginate(12);
        // Banners
        $banners = Banner::all();
        // Blogs
        $blogs = Blog::orderBy('id', 'desc')->paginate(3);
        // Social
        $socials = Social::all();
        // State
        $states = State::all();
        return view('pages.index')->with([
            'blogs' => $blogs,
            'banners' => $banners,
            'categories' => $categories,
            'page' => $page,
            'socials' => $socials,
            'states' => $states,
            ]);
    }

    public function about() {
        $socials = Social::all();
        return view('pages.about',compact('socials'));
    }

    public function career() {
        $socials = Social::all();
        return view('pages.career',compact('socials'));
    }

    public function company() {
        $socials = Social::select('icon','link')->get();
        return view('pages.company',compact('socials'));
    }

    public function contact() {
        $socials = Social::select('icon','link')->get();
        return view('pages.contact',compact('socials'));
    }

    public function faq() {
        $socials = Social::all();
        return view('pages.faq',compact('socials'));
    }

    public function login() {
        $socials = Social::all();
        return view('auth.login',compact('socials'));
    }

    public function category() {
        $socials = Social::all();
        $categories = Category::all();
        return view('pages.categories',compact('categories','socials'));
    }


    public function states()
    {
        $socials = Social::all();
        return view('pages.states',compact('socials'));
    }

    public function state($name)
    {
        $socials = Social::all();
        $categories = Category::all();
        $products = Product::select('id','image','title','text','slug','location')->where('location','=',$name)->paginate(10);
        return view('pages.state_wise_product',compact('products','categories','name','socials'));
    }

    public function single_product_state_wise($location,$slug)
    {
        // All Categories 
        $categories = Category::paginate(12);
        // $brand = Brand::find('slug');
        $socials = Social::select('icon','link')->get();
        $product = Product::where('slug', $slug)->firstOrFail();
        //dd($product);
        return view('pages.state_wise_single_product')->with([
            'product' => $product,
            // 'brand' => $brand,
            'categories' => $categories,
            'socials' => $socials
            ]);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/logins');
    }


    public function checkout()
    {
        $details = BookSubcription::where('user_id','=',Auth::user()->id)->get();
      
        return view('pages.checkout',compact('details'));
    }
}
