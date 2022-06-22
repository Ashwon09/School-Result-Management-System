@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<section>
    <div class="section-body">
        <div class="row">
            <div class=col-1></div>
            <div class="col-10">
                <div class="card mt-4">
                    <div class="card-header text-center text-white bg-dark mb-3 ">
                        <h2>Register Teacher</h2>
                    </div>
                    <div class="p-3">
                        <form  action="{{route('teacher.createTeacher')}}" method="POST">
                            @include('admin.teachers.partials.form')
                        </form>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop