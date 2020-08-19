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
                                                    	<?php $id=1; ?>
                                                    	@foreach($details as $detail)
                                                        <tr>
                                                        	<td>{{ $id++ }}</td>
                                                            <td>{{ $detail->subscription_name($detail->subcription_id) }}</td> 
                                                            <td class="text-right" id="a"><i class="fa fa-rupee" ></i>{{ $detail->subscription_price($detail->subcription_id) }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>  
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            
                                            <div class="col-sm-12 m-t-xxl">
                                                <div class="invoice-info">
                                                    <p class="bold" id="val">Total <span>$1553.10</span></p>
                                                    <button type="button" class="btn btn-primary btn-block">Pay Now</button>
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

<script type="text/javascript">
	$(document).ready(){
		var a = $('#a').val();
		var sum = 0 + a;

	}
</script>


@endsection
