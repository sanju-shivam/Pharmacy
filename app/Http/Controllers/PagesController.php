<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Banner;
use App\Category;
use App\Product;
use App\Page;
use App\Social;

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
        return view('pages.index')->with([
            'blogs' => $blogs,
            'banners' => $banners,
            'categories' => $categories,
            'page' => $page,
            ]);
    }

    public function about() {
        return view('pages.about');
    }

    // public function cancellation() {
    //     return view('pages.cancellation');
    // }

    public function career() {
        return view('pages.career');
    }

    public function company() {
        return view('pages.company');
    }

    public function contact() {
        return view('pages.contact');
    }

    // public function disclaimer() {
    //     return view('pages.disclaimer');
    // }

    public function faq() {
        return view('pages.faq');
    }

    public function login() {
        return view('pages.login');
    }

    // public function policy() {
    //     return view('pages.policy');
    // }

    public function category() {
        $categories = Category::all();
        return view('pages.categories')->with('categories', $categories);
    }


    public function states()
    {
        return view('pages.states');
    }


    public function state($name)
    {
        $categories = Category::all();
        $products = Product::select('id','image','title','text')->where('location','=',$name)->paginate(10);
        return view('pages.state_wise_product',compact('products','categories','name'));

    }

    

    // public function termsandcondition() {
    //     return view('pages.termsandcondition');
    // }

}
