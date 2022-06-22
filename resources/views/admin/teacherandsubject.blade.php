@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<div class="row">
    <div class=col-2></div>
    <div class="col-8">
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark mb-3 ">
                <h2>Student Details</h2>
            </div>
            <form action="{{route('display')}}" method="post">
                @csrf
                <table class="table-custom">
                    <tr>
                        <td>Enter Subject's Name</td>
                        <td>
                            <select class="form-control" id="subject_id" name="subject_id">
                                <option disabled selected>Select Subject</option>
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Enter teacher's Name</td>
                        <td>
                            <select class="form-control" class="teacher_id" id="teacher_id" name="teacher_id">
                                <div class="teacher_id">

                                    <option disabled="true" selected="true">Select Teacher</option>
                                </div>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" readonly></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button class="btn btn-danger">submit</button>
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
<style>
    .table-custom {
        border-collapse: separate;
        border-spacing: 26px 30px;
        margin-left: 6rem;
    }

    td {
        padding: 0 20px;
    }
</style>
@stop

@section('js')

<script>
    $(document).ready(function() {

        $(document).on('change', '#subject_id', function() {
            // console.log("hmm its change");
            $("#teacher_id").empty(); //clear options in select
            document.getElementById("email").value = "";
            var sub_id = $(this).val();
            // console.log(sub_id);
            $.ajax({
                type: 'get',
                url: "{{route('findTeacher')}}",
                data: {
                    'id': sub_id
                },
                success: function(data) {
                    console.log(data);
                    var ddlr = document.getElementById("teacher_id");
                    var opt = document.createElement("OPTION");
                    opt.innerHTML = 'Select teacher';
                    opt.disabled = true;
                    opt.selected = true;
                    ddlr.options.add(opt)

                    for (var i = 0; i < data.length; i++) {
                        //add options in select
                        var ddl = document.getElementById("teacher_id");
                        var option = document.createElement("OPTION");
                        option.innerHTML = data[i].first_name + ' ' + data[i].last_name;
                        option.value = data[i].id;
                        ddl.options.add(option)

                    }
                    // console.log(op); 

                    // div.find('.teacher_id').html(" ");
                    // div.find('.teacher_id').append(op);

                },
                error: function() {

                }
            });
        });

        $(document).on('change', '#teacher_id', function() {
            var teacher_id = $(this).val();

            console.log(teacher_id);
            var op = "";
            $.ajax({
                type: 'get',
                url: "{{route('findTeacherEmail')}}",
                data: {
                    'id': teacher_id
                },
                dataType: 'json',
                success: function(data) {
                    //   console.log("email");
                    // console.log(data.email);
                    document.getElementById("email").value = data.email;

                },
                error: function() {

                }
            });

        });
    });
</script>
@stop