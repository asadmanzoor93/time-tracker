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
            <form method="post" action="{{ route('saveTeam') }}">
                @csrf


                <div style="position: relative">

                    <strong>Timepicker:</strong>

                    <input class="timepicker form-control" type="text">

                </div>

                <div class="container">
                    <div class='col-md-5'>
                        <div class="form-group">
                            <label for="name">Login Time:</label>
                            <div class='input-group date' id='datetimepicker6'>
                                <input type='text' class="form-control" name="login_at" id="login_at"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class='col-md-5'>
                        <div class="form-group">
                            <label for="name">Logout Time:</label>
                            <div class='input-group date' id='datetimepicker7'>
                                <input type='text' class="form-control" name="logout_at" id="logout_at" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="name">User:</label>
                    <select class="browser-default custom-select">
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
    @section('script')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datetimepicker6').datetimepicker();
                $('#datetimepicker7').datetimepicker({
                    useCurrent: false
                });
                $("#datetimepicker6").on("dp.change", function (e) {
                    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                });
                $("#datetimepicker7").on("dp.change", function (e) {
                    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                });
            });
        </script>
    @endsection
@endsection