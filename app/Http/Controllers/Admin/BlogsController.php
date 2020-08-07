<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Blog;
use Auth;
use Gate;

class BlogsController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all(); 
        //or to sort by asc or desc
        //$blogs = Blog::orderBy('title', 'asc')->paginate(2);
        return view('blogs.index')->with('blogs', $blogs);
        // Show Single Post by Title
        //return Blog::where('title'), 'Sample Post Two')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Deny user access to create blog with gate
        if(Gate::denies('create-blog')){
            return redirect(route('dashboard'));
        }
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save the Blog
        if($request->hasFile('cover_image'))
        {
            // Get the file with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get the ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
        } else {
            $fileNameToStore = 'blogimage.jpeg';
        }

        

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'cover_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->body = $request->input('body');
        $blog->user_id = auth()->user()->id;
        $blog->cover_image = $fileNameToStore;
        if($blog->save()) {
            $request->session()->flash('success', $blog->title .' Blog Added');
        }else{
            $request->session()->flash('error', 'There was an error, Please try again');
        }

        return redirect('/admin/blogs');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Show individual Blog
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blogs.show')->with('blog', $blog);
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
        if(Gate::denies('access-control')){
            return redirect(route('dashboard'));
        }

        $blog = Blog::find($id);
        return view('blogs.edit')->with('blog', $blog);
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
            'body' => 'required',
        ]);

        if($request->hasFile('cover_image'))
        {
            // Get the file with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get the ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAS('public/cover_images', $fileNameToStore);
        }

        // Update Blog
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->body = $request->input('body');
        if($request->hasFile('cover_image')) {
            $blog->cover_image = $fileNameToStore;
        }
        if($blog->save()) {
            $request->session()->flash('success', $blog->title .' has been updates');
        }else{
            $request->session()->flash('error', 'There was an error updating ' . $blog->title);
        }

        return redirect('admin/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if($blog->cover_image != 'blogimage.jpeg') {
            // Delete Image
            Storage::delete('public/cover_images/'.$blog->cover_image);
        }

        if($blog->delete()) {
            $request->session()->flash('success',' Blog has been Deleted');
        }else{
            $request->session()->flash('error', 'There was an error deleting');
        }

        return redirect('/blogs');
    }
}
