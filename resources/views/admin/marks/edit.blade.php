@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Marks</h1>
<h4>Update</h4>
@stop

@section('content')
<form action="{{route('marks.updateMarks',[$mark->id])}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="form-group">
        <label for="name">Student Name:</label>
        <select class="form-control" id="student_id" name="student_id" disabled>
            @foreach($students as $student)
            <option value="{{$student->id}}" @if ($mark->student_id==$student->id) selected @endif>{{$student->first_name . ' ' . $student->last_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Subject Name:</label>
        <select class="form-control" id="subject_id" name="subject_id" disabled>
            @foreach($subjects as $subject)
            <option value="{{$subject->id}}" @if ($mark->subject_id==$subject->id) selected @endif >{{$subject->subject_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="class">Class:</label>
        <select class="form-control" id="class" name="class" disabled>
            <option value="Grade 1" @if($mark->class=='Grade 1') selected @endif>Grade 1</option>
            <option value="Grade 2" @if($mark->class=='Grade 2') selected @endif>Grade 2</option>
            <option value="Grade 3" @if($mark->class=='Grade 3') selected @endif>Grade 3</option>
            <option value="Grade 4" @if($mark->class=='Grade 4') selected @endif>Grade 4</option>
            <option value="Grade 5" @if($mark->class=='Grade 5') selected @endif>Grade 5</option>
            <option value="Grade 6" @if($mark->class=='Grade 6') selected @endif>Grade 6</option>
            <option value="Grade 7" @if($mark->class=='Grade 7') selected @endif>Grade 7</option>
            <option value="Grade 6" @if($mark->class=='Grade 8') selected @endif>Grade 8</option>
            <option value="Grade 9" @if($mark->class=='Grade 9') selected @endif>Grade 9</option>
            <option value="Grade 10" @if($mark->class=='Grade 10') selected @endif>Grade 10</option>
        </select>
        <span style="color:red"> @error ('class'){{$message}}@enderror</span>
    </div>

    <div class="form-group">
        <label for="name">Marks:</label>
        <input for="marks" class="form-control" id="marks" name="marks" value="{{$mark->marks}}">
        <span style="color:red"> @error ('marks'){{$message}}@enderror</span>
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