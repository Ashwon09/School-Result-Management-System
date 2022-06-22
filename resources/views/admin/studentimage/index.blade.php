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
                <th>Student Name</th>
                <th>Student Image</th>
                <th>Action</th>
             
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach($student_images as $student_image)
            <tr>
                <td> {{$i++ }}</td>
                <td>{{$student_image->student->first_name . ' ' .$student_image->student->last_name }}</td>
                <td> <img src="{{asset('images/'. $student_image->student_image)}}" alt="" width='100' height='100'> </td>
                
                <td>
                    <a type="button" class="btn btn-danger" href="{{route('image.delete',$student_image->id)}}">Delete <i class="far fa-trash-alt"></i></a>
                    <a type="button" class="btn btn-primary" href="{{route('image.edit',$student_image->id)}}">Edit <i class="far fa-edit"></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
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
   
   
</script>
@stop