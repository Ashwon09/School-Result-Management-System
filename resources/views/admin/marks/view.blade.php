@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
@if(session()->has('message'))
<div class="alert alert-danger fade in alert-dismiss show">
    {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="font-size:20px">x</span>
</div>
@endif
<h1>View Students</h1>
@stop

@section('content')
<div class="table-responsive-md">
    <table class="table table-bordered" id="marks">
        <thead class="thead-dark">
            <tr>
                <th>S.N.</th>
                <th> Symbol Number</th>
                <th>Student Name</th>
                <th>Subject Name</th>
                <th>Class</th>
                <th>Marks</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach($marks as $mark)
            <tr>
                <td> {{$i++ }}</td>
                <td> {{$mark->student->symbol_number}}</td>
                <td> {{$mark->student->first_name . ' '. $mark->student->last_name }}</td>
                <td> {{$mark->subject->subject_name}}</td>
                <td> {{$mark->class}}</td>
                <td> {{$mark->marks}}</td>
                <td> {{$mark->grade}}</td>
                <td>
                    <a type="button" class="btn btn-danger" href="{{route('marks.delete', $mark->id)}}">Delete <i class="far fa-trash-alt"></i></a>
                    <a type="button" class="btn btn-primary" href="{{route('marks.edit',$mark->id)}}">Edit <i class="far fa-edit"></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // $('#student').DataTable();
        $('#marks').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ]
        });
    });
    console.log('Hi!');
</script>
@stop