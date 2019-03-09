@extends('layout')

@section('content')
    <div>
        <div class="card-header">
            Create Team
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
            <form method="post" action="{{ route('saveTeam') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Team Name:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
                <button type="submit" class="btn btn-primary">Create Team</button>
            </form>
        </div>
    </div>
@endsection