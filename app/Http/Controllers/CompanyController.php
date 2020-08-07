<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Auth;
use Gate;
use App\Role;
use App\Banner;
use DB;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return  view('company.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Gate::denies('create-company')){
        //     return redirect(route('dashboard.index'));
        // }

        return view('company.create');
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
    public function show($slug)
    {
        // Show individual company with Banner and Products
        $user = User::where('slug', $slug)->firstOrFail();
        return view('company.show')->with('user', $user);
        //dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $roles = Role::all();
        $user = User::find($id);
        return view('company.edit')->with([
            'user' => $user,
            'roles' => $roles,
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

        if($request->hasFile('logo'))
        {
            // Get the file with extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get the ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'_'.$extension;
            //Upload Image
            $path = $request->file('logo')->storeAS('public/logos', $fileNameToStore);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->slug = $request->slug;
        $user->owner = $request->owner;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->employees = $request->employees;
        $user->year = $request->year;
        $user->type = $request->type;
        $user->gstn = $request->gstn;
        $user->payment = $request->payment;
        $user->nature = $request->nature;
        $user->about = $request->about;
        if($request->hasFile('logo')) {
            $user->logo = $fileNameToStore;
        }

        $user->save();
        
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return redirect('/dashboard')->with('user', $user);
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
