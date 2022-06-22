@extends('FrontEnd.master')
@section('body')
<div class="container custom-container">
    <div class="row mt-4">
        <div class="col md-12 mt-3">
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card mt-3">
                <h4 class="card-header custom-head text-center">Register Student</h4>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">First Name:</label>
                        <input type="first_name" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name">
                        <span style="color:red"> @error ('first_name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name:</label>
                        <input type="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name">
                        <span style="color:red"> @error ('last_name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="contact_number" class="form-control" id="contact_number" placeholder="Enter Contact Number" name="contact_number">
                        <span style="color:red"> @error ('contact_number'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="contactNo">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                        <span style="color:red"> @error ('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="DOB">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" placeholder="Enter DOB" name="dob">
                        <span style="color:red"> @error ('dob'){{$message}}@enderror</span>
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
                        <span style="color:red"> @error ('gender'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="Class">Class:</label>
                        <select class="form-control" id="class" name="class">
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                            <option value="Grade 5">Grade 5</option>
                            <option value="Grade 6">Grade 6</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 6">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                        </select>
                        <span style="color:red"> @error ('class'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="fatherName">Father's Name:</label>
                        <input type="fatherName" class="form-control" id="father_name" placeholder="Enter Father's name" name="father_name">
                        <span style="color:red"> @error ('father_name'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="subject">Province:</label>
                        <select class="form-control" id="province" name="province">
                            <option value="Province 1">Province 1</option>
                            <option value="Province 2">Province 2</option>
                            <option value="Province 3">Province 3</option>
                            <option value="Province 4">Province 4</option>
                            <option value="Province 5">Province 5</option>
                            <option value="Province 6">Province 6</option>
                            <option value="Province 7">Province 7</option>
                        </select>
                        <span style="color:red"> @error ('province'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <input type="district" class="form-control" id="district" placeholder="Enter District" name="district">
                        <span style="color:red"> @error ('district'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="address" class="form-control" id="address" placeholder="Enter address" name="address">
                        <span style="color:red"> @error ('address'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="address">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        <span style="color:red"> @error ('password'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="address">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter password confirmation" name="password_confirmation">
                        <span style="color:red"> @error ('password_confirmation'){{$message}}@enderror</span>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@stop

@push('links')
<style>
    .form-group {
        margin-right: 1rem;
        margin-left: 1rem;
    }
    .custom-container{
        background-color: snow;
        max-width:  100%;
        max-height: 100%;
    }
    .custom-head{
        background-color: #ee0979;
        color: snow;
    }

</style>
@endpush