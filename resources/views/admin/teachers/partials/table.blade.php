<tr>
    <td> {{++$key}}</td>
    <td> {{$teacher->first_name}}</td>
    <td> {{$teacher->last_name}}</td>
    <td> {{$teacher->contact_number}}</td>
    <td> {{$teacher->email}}</td>
    <td> {{$teacher->gender}}</td>
    <td> {{$teacher->subject->subject_name}}</td>
    <td>
        <a type="button" class="btn btn-danger" href="{{route('teacher.delete',$teacher->id)}}">Delete <i class="far fa-trash-alt"></i></a>
        <a type="button" class="btn btn-primary" href="{{route('teacher.edit',$teacher->id)}}">Edit <i class="far fa-edit"></i></a>
    </td>
</tr>