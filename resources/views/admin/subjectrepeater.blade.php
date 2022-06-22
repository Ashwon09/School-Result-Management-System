@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class=col-1></div>
    <div class="col-10">
        @if(session()->has('message'))
        <div class="alert alert-success fade in alert-dismiss show">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" style="font-size:20px">x</span>
        </div>
        @endif
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark mb-3 ">
                <h2>Register Subject</h2>
            </div>
            <div class="p-3">
                <form action="{{route('saveSubject')}}" method="post">
                    @csrf
                    <span style="color:red;"> @error ('subject_name*'){{$message}}@enderror</span>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Subject Description</th>
                                <th class="text-center"><a class="btn btn-info addRow">+</a></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="subject_name" placeholder="Enter Subject Name" name="subject_name[]">
                                </td>
                                <td>
                                    <textarea class="form-control" id="description" name="description[]" placeholder="Enter Subject Description" rows="1"></textarea>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-danger remove">-</a>
                                </td>
                               

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">
                                    <button type="submit" class="btn btn-success">Add Subject</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
    $('.addRow').on('click', function() {
        addRow();
    });

    function addRow() {
        var tr = '<tr>' +
            '<td>' +
            '<input type="text" class="form-control" id="subject_name" placeholder="Enter Subject Name" name="subject_name[]">' +
            '</td>' +
            '<td>' +
            '<textarea class="form-control" id="description" name="description[]" placeholder="Enter Subject Description" rows="1"></textarea>' +
            '</td>' +
            '<td class="text-center">' +
            '<a class="btn btn-danger remove">-</a>' +
            '</td>' +
            '</tr>';

        $('tbody').append(tr);
    };

    $('tbody').on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
</script>
@stop