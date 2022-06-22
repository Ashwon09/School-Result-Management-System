@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>List of Probelms</h1>
@stop

@section('content')
<div class="table-responsive-md">
    <table class="table table-bordered" id="student">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Problem</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp
            @foreach($problems as $problem)
            <tr>
                <td> {{$i++ }}</td>
                <td> {{$problem->name}}</td>
                <td> {{$problem->email}}</td>
                <td> {{$problem->problem}}</td>
                <td> {{$problem->status}}</td>
                <td>
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#status{{$problem->id}}">Change Status  <i class="far fa-edit"></i></a>
                    <a type="button" class="btn btn-danger" href="{{route('problem.deleteStatus', $problem->id)}}">Delete Problem <i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

            <div class="modal fade" id="status{{$problem->id}}" tabindex="-1" aria-labelledby="status" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('problem.updateProblem',$problem->id)}}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    Name:
                                    {{$problem->name}}
                                </div>
                                <div class="form-group">
                                    Email:
                                    {{$problem->email}}
                                </div>
                                <div class="form-group">
                                    Probelm:
                                    {{$problem->problem}}
                                </div>
                                <div class="form-group">
                                    <label for="feedback" class="col-form-label">Status:</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="pending">Pending</option>
                                        <option value="solving">Solving</option>
                                        <option value="solved">Solved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // $('#student').DataTable();
        $('#student').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ]
        });
    });
</script>
@stop