@extends('layouts.front')

@section('content')

    <main class="main">

        <div class="container">
            <div class="col-md-12 py-5">
                <div class="row">
                    <div class="col-md-6 p-5 border">
                        <h4>Work With Us</h4>
                        <form>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Complete Name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email ID" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="position" placeholder="Position" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="resume" placeholder="Upload Resume" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 p-5 border">
                        <h4>Vacancy Available</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fas fa-angle-double-right text-primary mr-2"></i>PCD Pharma Frenchise</li>
                            <li class="list-group-item"><i class="fas fa-angle-double-right text-primary mr-2"></i>Third Party Manufacturing</li>
                            <li class="list-group-item"><i class="fas fa-angle-double-right text-primary mr-2"></i>Cosmetic Derma Frenchise</li>
                            <li class="list-group-item"><i class="fas fa-angle-double-right text-primary mr-2"></i>Nutraceutical Range</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
