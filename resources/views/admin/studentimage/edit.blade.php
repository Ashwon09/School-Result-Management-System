@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="row">
    <div class=col-1></div>
    <div class="col-10">
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark mb-3 ">
                <h2>Upload Student Image</h2>
            </div>
            <div class="p-3">
                <form action="{{route('image.update',$student_image->id)}}" method="post" enctype="multipart/form-data" id="form">
                <input type="hidden" name="_method" value="PUT">    
                @csrf
                    <div class="form-group">
                        <label for="name">Student Name:</label>
                        <select class="form-control" id="student_id" name="student_id">
                            @foreach($students as $student)
                            <option value="{{$student->id}}" @if ($student->id==$student_image->student_id) selected @endif>{{$student->first_name . ' ' . $student->last_name}}</option>
                            @endforeach
                        </select>
                        <span style="color:red"> @error ('student_id'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="image">Student Image:</label>
                        <input type="file" name="student_image" class="form-control dropify" id="image_input"  data-allowed-file-extensions="jpg png jpeg" data-default-file="{{asset('images/' .$student_image->student_image)}}">
                        <span style="color:red"> @error ('student_image'){{$message}}@enderror</span>

                    </div>
                    <div class="image-holder">
                        <img src="{{asset('images/' . $student_image->student_image)}}" style="max-width:100px;margin-bottom:10px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />


@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"> </script>



<script>
    $('.dropify').dropify();

    $(document).ready(function() {
        $('#student_id').select2();
    });
    $(function() {
        $('#image_input').on('change', function() {
            let image_path = $(this)[0].value;
            var image_holder = $('.image-holder');
            var extension = image_path.substring(image_path.lastIndexOf('.') + 1).toLowerCase();

            if (extension == 'jpeg' || extension == 'jpg' || extension == 'png') {
                if (typeof(FileReader) != 'undefined') {
                    image_holder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('<img/>', {
                            'src': e.target.result,
                            'class': 'img-fluid',
                            'style': 'max-width:100px;margin-bottom:10px;'
                        }).appendTo(image_holder);
                    }
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    $(image_holder).html('This browser does not support fileReader');
                }

            } else {
                $(image_holder).empty();
            }
        });
    });
</script>
@stop