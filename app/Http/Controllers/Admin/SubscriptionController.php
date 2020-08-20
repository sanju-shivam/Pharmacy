<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social;
use App\Subscription;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\BookSubcription;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all();
        $subcriptions = Subscription::all();
        return view('admin.subcription.index',compact('socials','subcriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socials = Social::all();
        return view('admin.subcription.create',compact('socials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Subscription;
        $obj->name = $request->name;
        $obj->price = $request->price;
        $obj->desc1 = $request->desc1;
        $obj->desc2 = $request->desc2;
        $obj->desc3 = $request->desc3;
        $obj->desc4 = $request->desc4;
        $obj->desc5 = $request->desc5;
        $obj->save();

        if($obj){
            return redirect('admin\subscription\create')->with('message','Subscription Added Succssfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcription = Subscription::find($id);
        return view('admin.subcription.edit',compact('subcription'));

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
        $obj = Subscription::where('id','=',$id)->update([
            'name' => $request->name,
            'price'=> $request->price,
            'desc1' => $request->desc1,
            'desc2' => $request->desc2,
            'desc3' => $request->desc3,
            'desc4' => $request->desc4,
            'desc5' => $request->desc5,
        ]);

        if($obj){
            return redirect('admin\subscription')->with('message','Subscription Updated Succssfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $obj = Subscription::find($id)->delete();
        if($obj){
            return redirect('admin\subscription')->with('message','Subscription Deleted Succssfully');
        }
    }

    public function supplier_subscription(){
        $subcriptions = Subscription::all();
        $user_id = Auth::user()->id;
            return view('dashboard.supplier.book_subscription',compact('subcriptions','user_id'));
    }

    public function supplier_subscription_book($subcription_id)
    {
        $booking = BookSubcription::create([
            'subcription_id' => $subcription_id,
            'user_id' => Auth::user()->id
        ]);
        if($booking){
            return redirect('Supplier/subscription')->with('message','Subscription Booked Successfully');
        }
    }

    public function supplier_subscription_delete($id)
    {
        $booking_deleted = BookSubcription::where('subcription_id','=',$id)->where('user_id','=',Auth::user()->id)->delete();
        if($booking_deleted){
            $notification = array(
                'message' => 'Post created successfully!',
                'alert-type' => 'success'
            );
            return redirect('Supplier/subscription')->with($notification);
        }

    }
}
