<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Gate;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::whereHas(
            'roles', function($q){
            $q->where('name', 'supplier');
            })->get();
        return  view('admin.users.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show individual user
        $user = User::where('id', $id)->first();
        $roles = Role::where('id', $id)->get();
        return view('admin.users.show')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if(Gate::denies('edit-users')){
            return redirect(route('dashboard.index'));
        }

        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
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
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('logo')->storeAS('public/logos', $fileNameToStore);
        }

        
        // $user = User::find($id);
        $user->roles()->sync($request->roles);
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

        if($user->save()) {
            $request->session()->flash('success', $user->name .' has been updates');
        }else{
            $request->session()->flash('error', 'There was an error updating ' . $user->name);
        }
        
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroy(User $user)
    {

        if(Gate::denies('delete-users')){
            return redirect(route('dashboard.index'));
        }

        $user->roles()->detach();

        if($user->delete()) {
            $request->session()->flash('success',' User has been Deleted');
        }else{
            $request->session()->flash('error', 'There was an error deleting');
        }

        return redirect()->route('admin.users.index');
    }
}
