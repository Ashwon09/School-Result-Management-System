@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Student</h1>
<h4>Update</h4>
@stop

@section('content')
<form action="{{Route('student.updateStudent', $student->id)}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="form-group">
        <label for="name">First Name:</label>
        <input type="first_name" class="form-control" id="first_name" value="{{$student->first_name}}" name="first_name">
        <span style="color:red"> @error ('first_name'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="name">Last Name:</label>
        <input type="last_name" class="form-control" id="last_name" value="{{$student->last_name}}" name="last_name">
        <span style="color:red"> @error ('last_name'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="contact_number">Contact Number:</label>
        <input type="contact_number" class="form-control" id="contact_number" value="{{$student->contact_number}}" name="contact_number">
        <span style="color:red"> @error ('contact_number'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="contactNo">Email:</label>
        <input type="email" class="form-control" id="email" value="{{$student->email}}" name="email">
        <span style="color:red"> @error ('email'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="DOB">Date of Birth:</label>
        <input type="date" class="form-control" id="dob" value="{{$student->dob}}" name="dob">
        <span style="color:red"> @error ('dob'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <div class="form-check">
            <input type="radio" name="gender" id="male" value="male" @if($student->gender=='male') checked @endif>
            <label for="male">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" id="female" value="female" @if($student->gender=='female') checked @endif>
            <label for="female">Female</label>
        </div>
        <span style="color:red"> @error ('gender'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="class">Class:</label>
        <select class="form-control" id="class" name="class">
            <option value="Grade 1" @if($student->class=='Grade 1') selected @endif>Grade 1</option>
            <option value="Grade 2" @if($student->class=='Grade 2') selected @endif>Grade 2</option>
            <option value="Grade 3" @if($student->class=='Grade 3') selected @endif>Grade 3</option>
            <option value="Grade 4" @if($student->class=='Grade 4') selected @endif>Grade 4</option>
            <option value="Grade 5" @if($student->class=='Grade 5') selected @endif>Grade 5</option>
            <option value="Grade 6" @if($student->class=='Grade 6') selected @endif>Grade 6</option>
            <option value="Grade 7" @if($student->class=='Grade 7') selected @endif>Grade 7</option>
            <option value="Grade 6" @if($student->class=='Grade 8') selected @endif>Grade 8</option>
            <option value="Grade 9" @if($student->class=='Grade 9') selected @endif>Grade 9</option>
            <option value="Grade 10" @if($student->class=='Grade 10') selected @endif>Grade 10</option>
        </select>
        <span style="color:red"> @error ('class'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="fatherName">Father's Name:</label>
        <input type="fatherName" class="form-control" id="father_name" value="{{$student->father_name}}" name="father_name">
        <span style="color:red"> @error ('father_name'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="subject">Province:</label>
        <select class="form-control" id="province" name="province">
            <option value="Province 1" @if($student->province=='Province 1') selected @endif>Province 1</option>
            <option value="Province 2" @if($student->province=='Province 2') selected @endif>Province 2</option>
            <option value="Province 3" @if($student->province=='Province 3') selected @endif>Province 3</option>
            <option value="Province 4" @if($student->province=='Province 4') selected @endif>Province 4</option>
            <option value="Province 5" @if($student->province=='Province 5') selected @endif>Province 5</option>
            <option value="Province 6" @if($student->province=='Province 6') selected @endif>Province 6</option>
            <option value="Province 7" @if($student->province=='Province 7') selected @endif>Province 7</option>
        </select>
        <span style="color:red"> @error ('province'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="district">District:</label>
        <input type="district" class="form-control" id="district" value="{{$student->district}}" name="district">
        <span style="color:red"> @error ('district'){{$message}}@enderror</span>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="address" class="form-control" id="address" value="{{$student->address}}" name="address">
        <span style="color:red"> @error ('address'){{$message}}@enderror</span>
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