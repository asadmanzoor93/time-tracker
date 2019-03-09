@extends('layout')

@section('content')
    <div>
        <div class="card-header">
            Create User
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('saveUser') }}">
                @csrf
                <div class="form-group">
                    <label for="name">User Name:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
                <div class="form-group">
                    <label for="email">User Email:</label>
                    <input type="text" class="form-control" name="email" id="email"/>
                </div>
                <div class="form-group">
                    <label for="password">User Password:</label>
                    <input type="password" class="form-control" name="password" id="password"/>
                </div>
                <div class="form-group">
                    <label for="team_id">Team:</label>
                    <select class="browser-default custom-select" id="team_id" name="team_id">
                        <option selected>Select User</option>
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endForeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        </div>
    </div>
@endsection