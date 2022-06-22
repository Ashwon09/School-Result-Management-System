@extends('student.layout.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card text-center">
                <div class="card-header text-white bg-dark mb-3">
                    <h2> Status</h2>
                </div>
                <div class="card-body">
                    <h5 class="text-center">Your request is Pending</h5>
                    <p class="card-text">
                        Please call the school if the request made has been more than a week
                    </p>
                    <a href="{{route('contact')}}" class="btn btn-primary">Contact Us</a>
                </div>
                <div class="card-footer text-muted">
                    ABCD school
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection