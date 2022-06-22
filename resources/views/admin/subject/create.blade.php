@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class=col-1></div>
    <div class="col-10">
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark mb-3 ">
                <h2>Register Subject</h2>
            </div>
            <div class="p-3">
                <form action="{{route('subject.createSubject')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Subject Name:</label>
                        <input type="text" class="form-control" id="subject_name" placeholder="Enter Subject Name" name="subject_name">
                        <span style="color:red"> @error ('subject_name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Description:</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Subject Description" rows="4"></textarea>
                        <span style="color:red"> @error ('description'){{$message}}@enderror</span>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop