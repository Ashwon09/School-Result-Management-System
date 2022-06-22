@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>View Students</h1>
@stop

@section('content')
<div class="table-responsive-md">
    <table class="table  table-bordered" id="student">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Symbol Number</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Gender</th>
                <th scope="col">Class</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach($students as $student)
            <tr>
                <td> {{$i++ }}</td>
                <td> {{$student->symbol_number}}</td>
                <td> {{$student->first_name}}</td>
                <td> {{$student->last_name}}</td>
                <td> {{$student->contact_number}}</td>
                <td> {{$student->email}}</td>
                <td> {{$student->dob}}</td>
                <td> {{$student->gender}}</td>
                <td> {{$student->class}}</td>

                <td>
                    <a type="button" class="btn btn-danger" href="{{Route('student.delete',$student->id)}}">Delete <i class="far fa-trash-alt"></i></a>
                    <a type="button" class="btn btn-primary" href="{{Route('student.edit',$student->id)}}">Edit <i class="far fa-edit"></i></a>
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
        $('#student').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ]
        });
    });
    console.log('Hi!');
</script>
@stop