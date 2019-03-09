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
            <form method="post" action="{{ route('updateTeam') }}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$timelog->id}}">
                <div class="form-group">
                    <label for="name">Team Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$timelog->name}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update TimeLog</button>
            </form>
        </div>
    </div>
@endsection