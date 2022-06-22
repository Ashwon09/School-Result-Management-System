@extends('FrontEnd.master')

@section('body')
<div class="py-4 sm:pt-0">
</div>
@if(session()->has('message'))
<div class="alert alert-danger fade in alert-dismiss show mt-4">
    {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="font-size:20px">x</span>
</div>
@endif
<div class="container-fluid p-5  ">
    <div class="card mt-2">
        <div class="card-header text-center text-white bg-dark mb-3 ">
            <h2>Send Email</h2>
        </div>
        <div class="p-3">
            <form action="{{route('mail')}}" method="get">
            <div class="form-group py-1">
                    <label for="Label">To</label>
                    <input type="email" class="form-control my-2" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group py-1">
                    <label for="Label">Name</label>
                    <input type="text" class="form-control my-2" id="name" placeholder="Enter Name" name="name">
                </div>
                <div class="form-group py-1">
                    <label for="Label">Address</label>
                    <input type="text" class="form-control my-2" id="address" placeholder="Enter Address" name="address">
                </div>
                <div class="form-group py-1">
                    <label for="Label">Date of Birth</label>
                    <input type="date" class="form-control my-2" id="dob" placeholder="Enter date of Birth" name="dob">
                </div>
                
                <button type="submit" class="btn btn-primary px-5 ">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
@push('scripts')

@endpush

@push('links')

@endpush