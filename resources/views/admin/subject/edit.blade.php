@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Subject</h1>
<h4>Edit</h4>
@stop

@section('content')
<form action="{{route('subject.updateSubject',$subject->id)}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="form-group">
        <label for="name">Subject Name:</label>
        <input type="subject_name" class="form-control" id="subject_name" value="{{$subject->subject_name}}" name="subject_name">
        <span style="color:red"> @error ('subject_name'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="name">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="4">{{$subject->description}}</textarea>
        <span style="color:red"> @error ('description'){{$message}}@enderror</span>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop