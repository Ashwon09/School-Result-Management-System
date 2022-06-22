@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Teacher</h1>
<h4>Update</h4>
@stop

@section('content')
<section>
    <div class="section-body">
        <form class="form form-validate floating-label" action="{{route('teacher.updateTeacher',$teacher->id)}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            @include('admin.teachers.partials.form')
        </form>
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