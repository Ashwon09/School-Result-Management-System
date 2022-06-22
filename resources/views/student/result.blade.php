@extends('student.layout.master')

@section('content')
<div class="content-wrapper">
    <div class="card mx-5 mt-5 text-center">
        <div class="card-header  text-white bg-dark ">
            <h2>Result</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="marks">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($marks as $mark)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$mark->class}}</td>
                        <td>{{$mark->subject->subject_name}}</td>
                        <td>{{$mark->marks}}</td>
                        <td>{{$mark->grade}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            <h6>ABCD school</h6>
            <h6>Kathmandu, Kathmandu</h6>
        </div>
    </div>
</div>
@endsection