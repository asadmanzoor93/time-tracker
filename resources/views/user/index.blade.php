@extends('layout')

@section('content')
    <div style="margin-top: 40px">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div>
            <h1>Users</h1><br>
            <div><a href="{{ route('createUser')}}" class="btn btn-success">Create User</a></div>
            <br>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>User Name</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td class="row">
                        <a href="{{ route('editUser',$user->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('deleteUser', $user->id)}}" method="get">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection