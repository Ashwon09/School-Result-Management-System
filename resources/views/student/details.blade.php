@extends('student.layout.master')

@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card mt-4">
                <div class="card-header text-center text-white bg-dark mb-3 ">
                    <h2>Student Details</h2>
                </div>
                <table class="table-custom">
                    <tr>
                        <td>Symbol Number</td>
                        <td>{{$student->symbol_number}}</td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td>{{$student->first_name}}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{{$student->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>{{$student->contact_number}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$student->email}}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>{{$student->dob}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{$student->gender}}</td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td>{{$student->class}}</td>
                    </tr>
                    <tr>
                        <td>Father's Name</td>
                        <td>{{$student->father_name}}</td>
                    </tr>
                    <tr>
                        <td>Province</td>
                        <td>{{$student->province}}</td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td>{{$student->district}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$student->address}}</td>
                    </tr>
                </table>
                @if (Auth::User()->role == 'student')
                <div class="card-footer  text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editmodal">Edit Information  <i class="far fa-edit"></i></button>
                </div>
                @endif
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>


<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('studenthome.changeDetails')}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="number" class="form-control" id="contact_number" value="{{$student->contact_number}}" name="contact_number">
                        <span style="color:red"> @error ('contact_number'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="DOB">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" value="{{$student->dob}}" name="dob">
                        <span style="color:red"> @error ('dob'){{$message}}@enderror</span>
                    </div>
                
                    <div class="form-group">
                        <label for="subject">Province:</label>
                        <select class="form-control" id="province" name="province">
                            <option value="Province 1" @if($student->province=='Province 1') selected @endif>Province 1</option>
                            <option value="Province 2" @if($student->province=='Province 2') selected @endif>Province 2</option>
                            <option value="Province 3" @if($student->province=='Province 3') selected @endif>Province 3</option>
                            <option value="Province 4" @if($student->province=='Province 4') selected @endif>Province 4</option>
                            <option value="Province 5" @if($student->province=='Province 5') selected @endif>Province 5</option>
                            <option value="Province 6" @if($student->province=='Province 6') selected @endif>Province 6</option>
                            <option value="Province 7" @if($student->province=='Province 7') selected @endif>Province 7</option>
                        </select>
                        <span style="color:red"> @error ('province'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <input type="district" class="form-control" id="district" value="{{$student->district}}" name="district">
                        <span style="color:red"> @error ('district'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="address" class="form-control" id="address" value="{{$student->address}}" name="address">
                        <span style="color:red"> @error ('address'){{$message}}@enderror</span>
                    </div>
                    <div id="err" style="color: red"></div>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary custom-edit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table-custom {
        border-collapse: separate;
        border-spacing: 26px 15px;
    }
</style>
@endpush

@push('scripts')

@endpush