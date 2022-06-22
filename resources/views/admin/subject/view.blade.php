@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>View Students</h1>
@stop

@section('content')
<div class="table-responsive-md">
    <table class="table  table-bordered" id="subject">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach($subjects as $subject)
            <tr>
                <td> {{$i++ }}</td>
                <td> {{$subject->subject_name}}</td>
                <td> {{$subject->description}}</td>
                <td>
                    <a type="button" class="btn btn-danger" href="{{route('subject.delete',$subject->id)}}">Delete <i class="far fa-trash-alt"></i></a>
                    <a type="button" class="btn btn-primary" href="{{route('subject.edit',$subject->id)}}">Edit <i class="far fa-edit"></i></a>
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
        $('#subject').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ]
        });
    });
    console.log('Hi!');
</script>
@stop