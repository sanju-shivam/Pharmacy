<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social;
use Illuminate\Support\Facades\Validator;

class socialLinksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['socials']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all();

        return view('admin.socials.index')->with('socials', $socials);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function socials()
    {
        $socials = Social::all();

        //dd($social);

        return view('inc.subheader')->with('socials', $socials);
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
        $socials = Social::all();

        return view('inc.socials')->with([
            'socials' => $socials,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $social = Social::find($id);

        return view('admin.socials.edit')->with('social', $social);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
        return back()->with('toast_error', 'Please enter the link before you save');
        }

        $social = Social::find($id);
        $social->name = $request->name;
        $social->link = $request->link;
        if($social->save()) {
            $request->session()->flash('success', 'Link has been update');
        }else{
            $request->session()->flash('error', 'There was an error updating ');
        }
        
        return redirect('admin/socials');
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
