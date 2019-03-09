@extends('layout')

@section('content')
    <div style="margin-top: 40px">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div>
            <h1>TimeLogs</h1><br>
            <div><a href="{{ route('createTimeLog')}}" class="btn btn-success">Create TimeLog</a></div>
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
            @foreach($timelogs as $timelog)
                <tr>
                    <td>{{$timelog->id}}</td>
                    <td></td>
                    <td class="row">
                        <a href="{{ route('editTimeLog',$timelog->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('deleteTimeLog', $timelog->id)}}" method="get">
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