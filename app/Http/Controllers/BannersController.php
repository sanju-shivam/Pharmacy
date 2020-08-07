<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Auth;
use App\User;

class BannersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::all(); 
        return view('banners.index')->with('banners', $banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display banner form
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save the Banner
        if($request->hasFile('image'))
        {
            // Get the file with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get the ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAS('public/banners', $fileNameToStore);
        }

        $this->validate($request, [
            'title' => '',
            'text' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $banner = new Banner;
        $banner->title = $request->input('title');
        $banner->text = $request->input('text');
        $banner->user_id = auth()->user()->id;
        $banner->image = $fileNameToStore;
        $banner->save();

        return redirect('/admin/banners')->with('success', 'Banner Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show Banner
        // $banner = Banner::where('id', $id)->first();
        // return view('banners.show')->with('banner', $banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $banner = Banner::find($id);
        return view('banners.edit')->with([
            'banner' => $banner,
            'user' => $user,
            ]); 
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
        // Save the Banner
        if($request->hasFile('image'))
        {
            // Get the file with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get the ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAS('public/banners', $fileNameToStore);
        }

        $this->validate($request, [
            'title' => '',
            'text' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $banner = Banner::find($id);
        $banner->title = $request->input('title');
        $banner->text = $request->input('text');
        // $banner->user_id = auth()->user()->id;
        if($request->hasFile('image')) {
            $banner->image = $fileNameToStore;
        }
        $banner->save();

        return redirect('/admin/banners')->with('success', 'Banner Updated');
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
