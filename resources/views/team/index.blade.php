@extends('layout')

@section('content')
    <div style="margin-top: 40px">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div>
            <h1>Teams</h1><br>
            <div><a href="{{ route('createTeam')}}" class="btn btn-success">Create Team</a></div>
            <br>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Team Name</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{$team->id}}</td>
                    <td>{{$team->name}}</td>
                    <td class="row">
                        <a href="{{ route('editTeam',$team->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('deleteTeam', $team->id)}}" method="get">
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