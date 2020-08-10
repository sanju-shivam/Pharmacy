@extends('layouts.dash')

@section('content')


<div id="main" class="bg-light">
    <div class="row">
        <div class="col-md-12">
            <div class="row my-4">
                <div class="col-md-6">
                <h4>All Leads showing new first</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                </div>
            </div>
            
            <div class="bg-white shadow">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Requirement</th>
                        <th scope="col">Date-Time</th>
                        <th scope="col">Action</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a;  ?>
                        @foreach($leads as $lead)

                        <tr>
                        <th scope="row">{{ $lead->id }}</th>
                        <td >{{ $lead->name }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{ $lead->requirement }}</td>
                        <td>{{ $lead->created_at }}</td>
                                
                        <td class="d-flex justify-content-around">

                            @can('edit-users')
                        
                            <a href="{{ route('admin.leads.edit', $lead->id) }}"><button class="btn btn-primary float-left">Edit</button></a>
                        
                            @endcan  
                        </td>

                        @foreach($lead_statuses as $lead_status)
                                @if($lead_status->lead_id == $lead->id )
                                       @php
                                        if($lead_status->status_id != NULL){
                                            $a = explode(',', $lead_status->status_id);
                                        }
                                        else{
                                        $a = [NULL];
                                        }
                                        @endphp
                                       
                                            @if(in_array(1,$a) )
                                               
                                        @endif
                                        @if(in_array(1,$a))
                                            
                                            @if(in_array(2,$a))
                                                    @if(in_array(3,$a))
                                                        <td>New, Approved, Uapproved</td>
                                                        @break;
                                                    @endif
                                                    <td>New, Approved</td>
                                                    @break;
                                            @endif
                                            @if(in_array(3,$a))
                                                <td>New, Uapproved</td>
                                                @break;
                                            @endif
                                            <td>New</td>
                                            @break;
                                        @endif

                                        @if(in_array(2,$a) )
                                                @if(in_array(3,$a))
                                                <td>Approved, Uapproved</td>
                                                    @break;
                                                @endif
                                            <td>Approved</td>
                                            @break;
                                        @endif
                                        @if(in_array(3,$a))
                                            <td> Uapproved</td>
                                            @break;
                                        @endif                 
                                @endif
                        @endforeach

                        </tr>

                        @endforeach
                    
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
     

@endsection
