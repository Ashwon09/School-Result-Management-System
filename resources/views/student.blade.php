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
            <h2>View Result</h2>
        </div>
        <div class="p-3">
            <form action="{{route('viewResult')}}" method="get">
                <div class="form-group py-1">
                    <label for="Label">Symbol Number</label>
                    <input type="symbol_number" class="form-control my-2" id="symbol_number" placeholder="Enter Symbol Number" name="symbol_number">
                </div>
                <div class="form-group py-1">
                    <label for="Label">Date of Birth</label>
                    <input type="date" class="form-control my-2" id="dob" placeholder="dob" name="dob">
                </div>
                <div class="form-group py-1">
                    <label for="Label">Enter Class</label>
                    <select class="form-control my-2" id="class" name="class">
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                        <option value="Grade 4">Grade 4</option>
                        <option value="Grade 5">Grade 5</option>
                        <option value="Grade 6">Grade 6</option>
                        <option value="Grade 7">Grade 7</option>
                        <option value="Grade 6">Grade 8</option>
                        <option value="Grade 9">Grade 9</option>
                        <option value="Grade 10">Grade 10</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary px-5 ">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
@endpush

@push('links')
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

<style>
    body {
        font-family: 'Nunito', sans-serif;
    }

    .header {
        font-weight: bold;
    }
</style>
@endpush