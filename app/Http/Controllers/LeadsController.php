<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Status;
use Gate;

class LeadsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['show']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Deny user to access admin
        if(Gate::denies('access-control')){
            return redirect(route('dashboard'));
        }

        $leads = Lead::orderBy('created_at', 'desc')->get();
        return view('admin.leads.index')->with('leads', $leads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required ',
            'email' => '',
            'phone' => 'required | min:8 | max:10',
            'requirement' => ''
        ]);

        $lead = new Lead;
        $lead->name = $request->input('name');
        $lead->email = $request->input('email');
        $lead->phone = $request->input('phone');
        $lead->requirement = $request->input('requirement');
        if($lead->save()) {
            $request->session()->flash('success',' Request Submitted');
        }else{
            $request->session()->flash('error', 'There was an error sending request. Please try again');
        }

        $status = Status::select('id')->where('name', 'New')->first();

        $lead->statuses()->attach($status);

        return redirect()->back();

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
        $statuses = Status::all();
        $lead = Lead::find($id);
        
        // dd($statuses);
        return view('admin.leads.edit')->with([
            'lead' => $lead,
            'statuses' => $statuses,
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
        $this->validate($request, [
            'name' => 'required ',
            'email' => '',
            'phone' => 'required | min:8 | max:10',
            'requirement' => ''
        ]);

        $lead = Lead::find($id);
        $lead->statuses()->sync($request->statuses);
        $lead->name = $request->input('name');
        $lead->email = $request->input('email');
        $lead->phone = $request->input('phone');
        $lead->requirement = $request->input('requirement');
        if($lead->save()) {
            $request->session()->flash('success',' Request Submitted');
        } else {
            $request->session()->flash('error', 'There was an error sending request. Please try again');
        }

        return redirect()->route('admin.leads.index');
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
