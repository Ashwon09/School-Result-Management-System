@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')

<div class="text-center">
    <h1>Password Reset Form</h1>
</div>
@stop

@section('content')
@if(session()->has('message'))
<div class="alert alert-danger fade in alert-dismiss show">
    {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="font-size:20px">x</span>
</div>
@endif
@if(session()->has('messageall'))
<div class="alert alert-success fade in alert-dismiss show mt-4">
    {{ session()->get('messageall') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="font-size:20px">x</span>
</div>
@endif

<div class="row">
    <div class=col-2></div>
    <div class="col-8">
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark mb-3 ">
                <h2>Student Details</h2>
            </div>

            <form action="{{route('resetPassword')}}" metod="POST">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <table class="table-custom">
                    <tr>
                        <td>Enter Student's First Name</td>
                        <td> <input type="text" class="form-control" id="first_name" placeholder="Enter Student's First Name" name="first_name"></td>
                        <td><span style="color:red"> @error ('first_name'){{$message}}@enderror</span></td>
                    </tr>
                    <tr>
                        <td>Enter Student's Last Name</td>
                        <td> <input type="text" class="form-control" id="last_name" placeholder="Enter Student's Last Name" name="last_name"></td>
                        <td><span style="color:red"> @error ('last_name'){{$message}}@enderror</span></td>
                    </tr>

                    <tr>
                        <td>Enter Student's Email</td>
                        <td> <input type="text" class="form-control" id="email" placeholder="Enter Student's Email" name="email"></td>
                        <td><span style="color:red"> @error ('email'){{$message}}@enderror</span></td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-right">
                            <button class="btn btn-danger">Reset Password  <i class="fas fa-key"></i> <i class="fas fa-unlock-alt"></i></button>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .table-custom {
        border-collapse: separate;
        border-spacing: 26px 30px;
        margin-left: 1rem;
    }

    td {
        padding: 0 20px;
    }
</style>

@stop

@section('js')

<script>


</script>
@stop