@extends('layout')

@section('content')
    <div class="card" style="margin-top: 40px;">
        <div class="card-header">
            Edit TimeLog
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
            <form method="post" action="{{ route('updateTimeLog') }}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$timelog->id}}">

                <div class="form-group">
                    <label for="name">Date:</label>
                    <input class="date form-control" type="date" name="date" id="date" value="{{$timelog->date}}">
                </div>

                <div class="form-group">
                    <label for="name">Login Time:</label>
                    <input class="date form-control" type="time" name="login_at" id="login_at"
                           value="{{$timelog->login_at}}">
                </div>

                <div class="form-group">
                    <label for="name">Logout  Time:</label>
                    <input class="date form-control" type="time" name="logout_at" id="logout_at"
                           value="{{$timelog->logout_at}}">
                </div>

                <div class="form-group">
                    <label for="name">User:</label>
                    <select class="browser-default custom-select" name="user_id" id="user_id">
                        <option value="0" {{ empty($timelog->user_id) ? 'selected' : '' }}>Select User</option>
                        @foreach($users as $user)
                            <option {{ ($user->id == $timelog->user_id) ? 'selected' : '' }}
                                    value="{{$user->id}}">{{$user->name}}</option>
                        @endForeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Update TimeLog</button>
            </form>
        </div>
    </div>
@endsection