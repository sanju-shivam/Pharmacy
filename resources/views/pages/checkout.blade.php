@extends('layouts.vendor')

@section('content')

<div id="main">
    <div class="row">
        <div class="col-md-12">
        	 <div class="content-header">
                            <h1 class="page-title">Check-Out</h1>
                        </div><br>
                        
                        <div class="row">
                            <div class="col-lg">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <table class="table m-t-xxl">
                                                    <thead>
                                                        <tr>
                                                        	<th scope="col">S.no</th>
                                                            <th scope="col">Product</th>
                                                            
                                                            <th scope="col" class="text-right">Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php $id=1; $price = 0 ; $product_ids; ?>
                                                    	@foreach($details as $detail)
                                                        <tr>
                                                        	<td>{{ $id++ }}</td>
                                                            <td>{{ $detail->subscription_name($detail->subcription_id) }}</td> 
                                                            <td class="text-right" id="a">{{ $detail->subscription_price($detail->subcription_id) }}</td>
                                                        </tr>
                                                        <?php 
                                                            $price = $price +  $detail->subscription_price($detail->subcription_id);
                                                            $product_ids[$id-1] = $detail->subcription_id;
                                                         ?>


                                                        @endforeach
                                                        @if(!empty($product_ids))
                                                        <?php  $a = implode(',', $product_ids);
                                                        ?>
                                                        
                                                        <p  style="display: none;" id="ids" >{{ $a }}</p>
                                                        @endif
                                                    </tbody>
                                                </table>  
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            
                                            <div class="col-sm-12 m-t-xxl">
                                                <div class="invoice-info">
                                                    <p class="bold" >Total &nbsp; <i class="fa fa-rupee"></i> <span id="val">{{ $price }}</span></p>
                                                    
                                                    <button type="button" class="btn btn-primary btn-block buy_now">Pay Now</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   <script>
         var SITEURL = '{{URL::to('')}}'; 
         $('body').on('click', '.buy_now', function(e){
           var totalAmount = $('#val').html();
           //alert(totalAmount);
           var product_id =  $('#ids').html();
           var _token = $('meta[name="csrf-token"]').attr('content')
           //alert(product_id);
           var options = {
           "key": "rzp_test_V8b57KvXiwD297",
           "amount": (totalAmount*100), // 2000 paise = INR 20
           "name": "Nexx EnterPrise",
           "description": "Payment",
           "image": "https://www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
           "handler": function (response){
            //alert(response.razorpay_payment_id);
                 $.ajax({
                   url: "/paysuccess",
                   method: 'GET',
                   data: {
                        razorpay_payment_id: response.razorpay_payment_id , 
                        totalAmount : totalAmount ,
                        product_id : product_id,
                    },
                   success: function (msg) {

                    //alert(msg);
                    //location.reload(true);
                    window.location.href = "{{ url('razorthankyou') }}";
                   }
               });            
           },
           "theme": {
               "color": "#528FF0"
           }
         };
         var rzp1 = new Razorpay(options);
         rzp1.open();
         e.preventDefault();
         });
         /*document.getElementsClass('buy_plan1').onclick = function(e){
           rzp1.open();
           e.preventDefault();
         }*/
      </script>



@endsection
