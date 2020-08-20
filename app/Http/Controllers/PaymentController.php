<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Payment;
 use Redirect,Response;
 use Auth;
class PaymentController extends Controller
{
    public function razorpayProduct()
	 {
	 return view('razarpay');
	 }

	 public function razorPaySuccess(Request $Request){

	 // $data = [
	 //           'user_id' => '1',
	 //           'payment_id' => $request->razorpay_payment_id,
	 //           'amount' => $request->totalAmount,
	 //        ];
	 $a = Payment::create([
	 			'user_id' => Auth::user()->id,
	           'payment_id' => $Request->get('razorpay_payment_id'),
	           'amount' => $Request->get('totalAmount'),
	 	]);
	 $arr = array('msg' => 'Payment successfully credited', 'status' => true);
		if($a){
		 	return Response()->json($arr);    
		 }
	 }

	 public function RazorThankYou()
	 {
	 return view('thankyou');
	 }
}
