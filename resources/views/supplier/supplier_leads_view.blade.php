@extends('layouts.vendor')
@section('content')

<div id="main" class=" bg-light">
    <div class="row">
        <div class="col-md-12">
            <h4>All the Leads that are common in which brands you deal</h4><br>
            <!-- List of Users -->
            
                <div class="row bg-white shadow">
                    <div class="col-md-12 pt-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Brands Name</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                    @if(!empty($f) and !empty($result))
                            @php
                                foreach ($f as $loop => $data) {
                                    foreach ($result as $key => $val) {
                                        if($key == $loop){
                            @endphp
                                        <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                    @php
                                            foreach ($val as $c) {
                                    @endphp
                                                <td>{{ $c }}</td>
                                    @php
                                            }
                                        }
                                        @endphp
                                        <tr>
                                    @php
                                            }
                                        }
                                    @endphp
                    @endif
                            </tbody>
                    </table>

                  <!--   <div class=" d-flex justify-content-around">
                        {{-- {{ $users->links() }}   --}}
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</div>
     

@endsection
