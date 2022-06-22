@csrf
<div class="form-group">
    <label for="name">First Name:</label>
    <input type="text" class="form-control" id="first_name" value="{{ old('first_name', isset($teacher->first_name) ? $teacher->first_name : '') }}" placeholder="Enter Teacher's Name" name="first_name">
    <span style="color:red"> @error ('first_name'){{$message}}@enderror</span>
</div>
<div class="form-group">
    <label for="name">Last Name:</label>
    <input type="text" class="form-control" id="last_name" value="{{ old('last_name', isset($teacher->last_name) ? $teacher->last_name : '') }}" placeholder="Enter Last Name" name="last_name">
    <span style="color:red"> @error ('last_name'){{$message}}@enderror</span>
</div>
<div class="form-group">
    <label for="contact_number">Contact Number:</label>
    <input type="number" class="form-control" id="contact_number" value="{{ old('contact_number', isset($teacher->contact_number) ? $teacher->contact_number : '') }}" placeholder="Enter Contact Number" name="contact_number">
    <span style="color:red"> @error ('contact_number'){{$message}}@enderror</span>
</div>
<div class="form-group">
    <label for="contactNo">Email:</label>
    <input type="email" class="form-control" id="email" value="{{ old('email', isset($teacher->email) ? $teacher->email : '') }}" placeholder="Enter Email" name="email">
    <span style="color:red"> @error ('email'){{$message}}@enderror</span>
</div>

<div class="form-group">
    <label for="gender">Gender:</label>
    <div class="form-check">

        <input type="radio" name="gender" id="male" value="male" @if(isset($teacher)) @if($teacher->gender == 'male') checked @endif @endif>
        <label for="male">Male</label>
    </div>
    <div class="form-check">
        <input type="radio" name="gender" id="female" value="female" @if(isset($teacher)) @if($teacher->gender == 'female') checked @endif @endif>
        <label for="female">Female</label>
    </div>
    <span style="color:red"> @error ('gender'){{$message}}@enderror</span>
</div>

<div class="form-group">
    <label for="name">Subject Name:</label>
    <select class="form-control" id="subject_id" name="subject_id">
    <option disabled selected>Select Subject Name</option>
        @foreach($subjects as $subject)
        <option value="{{$subject->id}}" @if(isset($teacher)) @if($teacher->subject_id == $subject->id) selected @endif @endif>{{$subject->subject_name}}</option>
        @endforeach
    </select>
    <span style="color:red"> @error ('subject_id'){{$message}}@enderror</span>

</div>


<button type="submit" class="btn btn-primary">Submit</button>