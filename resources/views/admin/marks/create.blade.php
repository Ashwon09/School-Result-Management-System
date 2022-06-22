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
                <h2>Create Marks</h2>
            </div>
            <div class="p-3">
                <form action="{{route('marks.createMarks')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Student Name:</label>
                        <select class="form-control" id="student_id" name="student_id">
                            <option disabled selected>Enter Student's Name</option>
                            @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->first_name . ' ' . $student->last_name}}</option>
                            @endforeach
                        </select>
                        <span style="color:red"> @error ('student_id'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Subject Name:</label>
                        <select class="form-control" id="subject_id" name="subject_id">
                            <option disabled selected>Enter Subject's Name</option>
                            @foreach($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                            @endforeach
                        </select>
                        <span style="color:red"> @error ('subject_id'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="Class">Class:</label>
                        <select class="form-control" id="class" name="class">
                            <option disabled selected>Enter Student's Class</option>
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
                        <span style="color:red"> @error ('class'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="name">Marks:</label>
                        <input for="marks" type="number" class="form-control" id="marks" name="marks" placeholder="Enter Marks in Numbers">
                        <span style="color:red"> @error ('marks'){{$message}}@enderror</span>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#student_id').select2();
    });

    $(document).ready(function() {
        $('#subject_id').select2();
    });
</script>
@stop