<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Status;
use Gate;
use App\Brand;
use App\lead_status;
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
        $lead_statuses = lead_status::orderBy('created_at', 'desc')->get();
        $lead_brand_id = [1,2,3];
        // foreach($lead_statuses as $lead_status){
        //     //echo($lead_status->status_id.'<br>');
        //     $a = explode(',', $lead_status->status_id);
        //     //dd($a);
        //     if(in_array(1,$a)){
        //         echo "new".'<br>';
        //     }
        // }
        // die;
        //dd($lead_statuses);
        return view('admin.leads.index',compact('leads','lead_statuses','lead_brand_id'));
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

        // $status = Status::select('id')->where('name', 'New')->first();

        // $lead->statuses()->attach($status);

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
        $lead_status = lead_status::where('lead_id','=',$id)->first();
         
        $lead_status_id = [NULL]; $lead_brand_id =[NULL];
        if($lead_status != NULL){
            //dd("lead_status");
            if( $lead_status->status_id  != NULL ){
                    $lead_status_id = explode(',', $lead_status->status_id);
               }      
            if( $lead_status->brand_id  != NULL ){
                $lead_brand_id = explode(',', $lead_status->brand_id);
            }
        }
        //dd($lead_status_id);
         
        $lead = Lead::find($id);
        $brands = Brand::select('id','name')->get();
        // dd($lead);
        // dd($statuses);
        return view('admin.leads.edit',compact('lead','statuses','brands','lead_status_id','lead_brand_id'));
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
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required ',
            'email' => '',
            'phone' => 'required | min:8 | max:10',
            'requirement' => ''
        ]);
        $status_id = NULL; $brand_id = NULL;
        if($request->stauses != NULL )
        $status_id = implode(',',$request->stauses);

        if($request->brand != NULL )
        $brand_id = implode(',', $request->brand);
        // dd($brand_id);
        
        $lead = Lead::find($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'requirement' => $request->input('requirement'),
        ]);
        global $a;
        if(empty(lead_status::find($id))){
            $a = lead_status::create([
                'lead_id' => $id,
                'status_id' => $status_id,
                'brand_id' => $brand_id,
            ]);
        }else{
            $a = lead_status::where('id','=',$id)->update([
                'lead_id' => $id,
                'status_id' => $status_id,
                'brand_id' => $brand_id,
            ]);
        }


        // $lead->statuses()->sync($request->statuses);
        if($lead && $a) {
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
