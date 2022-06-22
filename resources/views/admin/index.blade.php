@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>ADMIN</h1>
@stop

@section('content')
<div class="text-center">
    <h4>Welcome to Admin panel where you can add, view, update and delete records.</h4>
</div>
<div class="row py-5">
    <div class="col-4">
        <div class="small-box bg-success py-4">
            <div class="inner">
                <h3>{{$students->count()}}<sup style="font-size: 20px"></sup></h3>

                <h5>Students Registered</h5>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('student.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-4">
        <div class="small-box bg-warning py-4">
            <div class="inner">
                <h3>{{$teachers->count()}}<sup style="font-size: 20px"></sup></h3>

                <h5>Teachers Registered</h5>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('teacher.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-4">
        <div class="small-box bg-info py-4">
            <div class="inner">
                <h3>{{$subjects->count()}}<sup style="font-size: 20px"></sup></h3>

                <h5>Subjects Registered</h5>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('subject.view')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
    //alert('hi');
</script>
@stop