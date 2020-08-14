<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Page;
use Gate;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminPagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']] );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     // Deny user access to create page with gate
    //     if(Gate::denies('create-page')){
    //         return redirect(route('dashboard'));
    //     }
    //     return view('admin.pages.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'title' => 'required',
    //         'slug' => 'required',
    //         'keywords' => 'required',
    //         'description' => 'required',
    //         'body' => 'required',
    //     ]);

    //     $page = new Page;
    //     $page->title = $request->input('title');
    //     $page->slug = $request->input('keywords');
    //     $page->slug = $request->input('description');
    //     $page->slug = $request->input('slug');
    //     $page->body = $request->input('body');
    //     $page->user_id = auth()->user()->id;
    //     $page->save();

    //     return redirect('/admin/pages')->with('success', 'Page Updated/Created');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //Show Page
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Deny user access to edit blog with gate
        // if(Gate::denies('edit-page')){
        //     return redirect(route('dashboard'));
        // }

        if(Gate::denies('access-control')){
            return redirect(route('dashboard'));
        }

        $page = Page::find($id);
        return view('admin.pages.edit')->with('page', $page);
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
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'keywords' => 'required',
            'description' => 'required',
            'body' => 'required',
        ]);

        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->keywords = $request->input('keywords');
        $page->description = $request->input('description');
        $page->slug = $request->input('slug');
        $page->body = $request->input('body');
        $page->user_id = auth()->user()->id;
        $page->save();

        return redirect('/admin/pages')->with('success', 'Page Updated/Created');
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



    public function edit_admin($id)
    {
        $user = User::where('id','=',$id)->first();
        return view('admin.admin_update_profile',compact('user'));
    }

    public function update_admin(Request $request , $id)
    {
        $user_password = User::where('id','=',$id)->first()->password;
        if(Hash::check($request->oldpassword, $user_password)){
            $a = User::where('id','=',$id)->update([
                'password' => bcrypt($request->newpassword),
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if($a){
                return redirect('admin');
            }
        }
    }
}
