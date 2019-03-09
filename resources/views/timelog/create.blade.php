@extends('layout')

@section('content')

    <div>
        <div class="card-header">
            Create TimeLog
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

            <form method="post" action="{{ route('saveTimeLog') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Date:</label>
                    <input class="date form-control" type="date" name="date" id="date">
                </div>

                <div class="form-group">
                    <label for="name">Login Time:</label>
                    <input class="date form-control" type="time" name="login_at" id="login_at">
                </div>

                <div class="form-group">
                    <label for="name">Logout  Time:</label>
                    <input class="date form-control" type="time" name="logout_at" id="logout_at">
                </div>

                <div class="form-group">
                    <label for="name">User:</label>
                    <select class="browser-default custom-select" name="user_id" id="user_id">
                        <option selected>Select User</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endForeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create TimeLog</button>
            </form>
        </div>
    </div>
   @endsection