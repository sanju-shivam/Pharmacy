<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use App\Auth;
use App\User;
use App\Blog;
use App\Lead;
use App\Page;
use App\Banner;
use App\Product;
use App\Category;

class DashPagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function adminLogin()
    // {
    //     return view('admin.login');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex() 
    {
        // Deny user to access admin
        // if(Gate::denies('access-control')){
        //     return redirect(route('dashboard'));
        // }

        $count = Product::count();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('admin.index')->with([
            'count' => $count,
            'user' => $user,
            ]);
    }

    public function adminBlogs() 
    {
        // Deny user to access admin
        if(Gate::denies('access-control')){
            return redirect(route('dashboard'));
        }

        $blogs = Blog::paginate(10);
        return view('admin.blogs')->with('blogs', $blogs);
    }

    public function adminLeads() 
    {
        // Deny user to access admin
        if(Gate::denies('access-control')){
            return redirect(route('dashboard'));
        }

        $leads = Lead::orderBy('created_at', 'desc')->get();
        return view('admin.leads')->with('leads', $leads);
    }

    public function adminPages() 
    {
        // Deny user to access admin
        if(Gate::denies('access-control')){
            return redirect(route('dashboard'));
        }

        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    public function adminBanners() 
    {
        // Deny user to access admin
        if(Gate::denies('access-control')){
            return redirect(route('dashboard'));
        }

        $banners = Banner::all();
        return view('admin.banners')->with('banners', $banners);
    }

    public function adminProducts() 
    {
        // Deny user to access admin
        if(Gate::denies('access-control')){
            return redirect(route('dashboard'));
        }

        // If the category is selected
        if(request()->category) {
            
            $products = Product::with('category')->whereHas('category', function ($query){
                $query->where('slug', request()->category);
            })->paginate(10);

            $categories = Category::all();
            $categoryName =  optional($categories->where('slug', request()->category)->first())->name;

        }else {

            $products = Product::paginate(10);
            $categories = Category::all();
            $categoryName = 'All Products';

        }
        
        return view('admin.products')->with([
            'products' => $products, 
            'categories' => $categories,
            'categoryName' => $categoryName,
            ]);
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
    public function store(Request $request)
    {
        //
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
