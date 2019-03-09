@extends('layout')

@section('content')
    <div class="card" style="margin-top: 40px;">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('updateUser') }}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$user->id}}">
                <div class="form-group">
                    <label for="name">User Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}"/>
                </div>
                <div class="form-group">
                    <label for="email">User Email:</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}"/>
                </div>

                <div class="form-group">
                    <label for="team_id">Team:</label>
                    <select class="browser-default custom-select" id="team_id" name="team_id">
                        <option {{ empty($user->team_id) ? 'selected' : '' }}>Select User</option>
                        @foreach($teams as $team)
                            <option {{ ($user->team_id == $team->id) ? 'selected' : '' }} value="{{$team->id}}">{{$team->name}}</option>
                        @endForeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
@endsection