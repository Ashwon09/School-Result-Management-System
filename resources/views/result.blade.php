@extends('FrontEnd.master')

@section('body')
    <div class="py-4"></div>
    <div class="py-4 sm:pt-0">
        <div class="container">
            <h3 class="text-center m-4">Student's Name: {{$student->first_name . ' '. $student->last_name}} </h3>
            <h3 class="text-center mt-3 mb-4">Student's Symbol Number: {{$student->symbol_number}}</h3>

        </div>
        <div class="container pt-3 pb-5">
            <table class="table table-striped table-hover pb-5" id="result">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Subject Description</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($marks as $mark)
                    <tr @if($mark->marks< 40) class="text-danger" @endif>
                            <td>{{$i++}}</td>
                            <td>{{$mark->class}}</td>
                            <td>{{$mark->subject->subject_name}} @if($mark->marks< 40) * @endif</td>
                            <td>{{$mark->subject->description}}</td>
                            <td>{{$mark->marks}}</td>
                            <td>{{$mark->grade}}</td>
                    </tr>
                    @endforeach
                    <tr class="table-info">
                        <td colspan="2"></td>
                        <td>Percentage: {{$percentage}}%</td>
                        <td>Student's Description: {{$grade[1]}}</td>
                        <td>Total Marks: {{$sum}}/{{$count}}00</td>
                        <td>Grade : {{$grade[0]}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="py-4"></div>

@endsection
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    @endpush

    @push('links')
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .header {
            font-weight: bold;
        }

    </style>
    @endpush