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
