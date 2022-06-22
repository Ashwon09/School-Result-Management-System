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
                        <form id="main_form" action="{{route('teacherSave')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" placeholder="Enter Teacher's Name" name="first_name">
                                <span class="text-danger error-text first_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name">
                                <span class="text-danger error-text last_name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact Number:</label>
                                <input type="number" class="form-control" id="contact_number" placeholder="Enter Contact Number" name="contact_number">
                                <span class="text-danger error-text contact_number_error"></span>

                            </div>
                            <div class="form-group">
                                <label for="contactNo">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                                <span class="text-danger error-text email_error"></span>

                            </div>

                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <div class="form-check">
                                    <input type="radio" name="gender" id="male" value="male">
                                    <label for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="gender" id="female" value="female">
                                    <label for="female">Female</label>
                                </div>
                                <span class="text-danger error-text gender_error"></span>

                            </div>

                            <div class="form-group">
                                <label for="name">Subject Name:</label>
                                <select class="form-control" id="subject_id" name="subject_id">
                                    <option disabled selected>Select Subject Name</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text subject_id_error"></span>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
@stop

@section('js')
<script>
    $(function() {
        $('#main_form').on('submit', function(e) {
            console.log('pressed')
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#main_form')[0].reset();
                        alert(data.msg);
                    }
                }
            });
        });
    });
</script>
@stop