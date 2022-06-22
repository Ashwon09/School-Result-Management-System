@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Teacher</h1>
<h4>View</h4>
@stop

@section('content')
<div class="table-responsive-md">
    <table class="table table-bordered" id="teachers">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Subject</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @each('admin.teachers.partials.table',$teachers, 'teacher')
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
        $('#teachers').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ]
        });
    });
</script>
@stop