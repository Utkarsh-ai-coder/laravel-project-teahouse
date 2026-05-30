@extends('admin.layouts.sidebar')
@section('content')
<div>
    <a href="{{ route('createUser') }}" class="btn btn-primary mb-3">Add New User</a>
</div>
<table id="example" class="display nowrap mt-3" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>E-mail</th>
            <th>Image</th>
            <th>phno</th>
            <th>course</th>
            <th>date</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><img src="{{ asset('/storage/uploads/'.$user->image) }}" alt="" width="100px" height="100px"></td>
            <td>{{ $user->phno }}</td>
            <td>{{ $user->course }}</td>
            <td>{{ $user->created_at }}</td>
            <td><a href="{{ route('edituser', $user->id) }}"><i class="fa fa-edit btn btn-success btn-sm"></i></a>
            <a href="{{ route('deleteuser', $user->id) }}" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash btn btn-danger btn-sm"></i></a></td>
        </tr>
        @endforeach


    </tbody>
</table>

@endsection
