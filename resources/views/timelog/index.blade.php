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
            <div class="row">
                <div class="col-md-3">
                    <select class="browser-default custom-select" name="search_filter" id="search_filter">
                        <option value="" selected>Select Filter</option>
                        <option value="team">Team</option>
                        <option value="user">User</option>
                        <option value="date">Date</option>
                        <option value="current_week">Current Week</option>
                        <option value="current_month">Current Month</option>
                        <option value="last_3_week">Last Three Months</option>
                    </select>
                </div>

                <div style="display: none" id="date_filter_div" class="col-md-3">
                    <select class="browser-default custom-select" name="date_filter" id="date_filter">
                        <option value="" selected>Select Date Filter</option>
                        <option value="year">Year</option>
                        <option value="week">Week</option>
                        <option value="day">Day</option>
                    </select>
                </div>

                <div style="display: none" id="year_div" class="col-md-3">
                    <select class="browser-default custom-select" name="year" id="year">
                        <option value="" selected>Select Year:</option>
                        @foreach($years as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endForeach
                    </select>
                </div>

                <div style="display: none" id="week_div" class="col-md-3">
                    <div class="form-group">
                        <input class="date form-control" type="week" name="week" id="week">
                    </div>
                </div>

                <div style="display: none" id="day_div" class="col-md-3">
                    <div class="form-group">
                        <input class="date form-control" type="date" name="day" id="day">
                    </div>
                </div>

                <div style="display: none" id="team_filter_div" class="col-md-3">
                    <select class="browser-default custom-select" name="team_filter" id="team_filter">
                        <option value="" selected>Select Team</option>
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endForeach
                    </select>
                </div>

                <div style="display: none" id="user_filter_div" class="col-md-3">
                    <select class="browser-default custom-select" name="user_filter" id="user_filter">
                        <option value="" selected>Select User</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endForeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <a href="javascript:{}" class="btn btn-primary" id="refresh_data">Refresh</a>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <a href="{{ route('createTimeLog')}}" class="btn btn-success">Create TimeLog</a>
            </div><br>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <td>User Name</td>
                <td>Log Date</td>
                <td>Login Time</td>
                <td>Logout Time</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody id="timelogs_listing">
            @include('timelog.partials.listing', ['timelogs' => $timelogs])
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        var page = 1;
        $(document).ready(function () {
            $('#search_filter').on('change', function (e) {
                var value = this.value;
                $('#date_filter').val('');
                $('#team_filter').val('');
                $('#user_filter').val('');
                reset_date();


                if(value == 'date'){
                    $('#date_filter_div').show();
                    $('#team_filter_div').hide();
                    $('#user_filter_div').hide();
                }else if(value == 'user'){
                    $('#date_filter_div').hide();
                    $('#team_filter_div').hide();
                    $('#user_filter_div').show();
                }else if(value == 'team'){
                    $('#date_filter_div').hide();
                    $('#team_filter_div').show();
                    $('#user_filter_div').hide();
                }else{
                    $('#date_filter_div').hide();
                    $('#team_filter_div').hide();
                    $('#user_filter_div').hide();
                }
            });

            $('#date_filter').on('change', function () {
                var value = this.value;
                reset_date();

                if(value == 'year'){
                    $('#year_div').show();
                }else if(value == 'week'){
                    $('#week_div').show();
                }else if(value == 'day'){
                    $('#day_div').show();
                }
            });

            $('#refresh_data').on('click', function () {
                page = 0 ;
                fetch_data();
            });

            $(window).scroll(function() {
                fetch_data();
            });

            var ajaxDataFetch = null;

            function fetch_data() {
                let search_filter = $('#search_filter').val();
                let date_filter = $('#date_filter').val();
                let team_filter = $('#team_filter').val();
                let user_filter = $('#user_filter').val();
                let year = $('#year').val();
                let week = $('#week').val();
                let day = $('#day').val();

                if(ajaxDataFetch != null){ return;}

                ajaxDataFetch = $.ajax({
                    url: '{{route('fetchTimeLogsAjax')}}',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        'search_filter': search_filter,
                        'date_filter' : date_filter,
                        'team_filter' : team_filter,
                        'user_filter' : user_filter,
                        'year' : year,
                        'week' : week,
                        'day' : day,
                        'page' : page
                    },
                    success: function(data)
                    {
                        page = page + 1;
                        if(page == 1){
                            $('#timelogs_listing').html(data.html);
                        }else{
                            $('#timelogs_listing').append(data.html);
                        }
                        ajaxDataFetch = null;
                    }
                })
            }

            function reset_date(){
                $('#year_div').hide();
                $('#week_div').hide();
                $('#day_div').hide();
                $('#year').val('');
                $('#week').val('');
                $('#day').val('');
            }
        });
    </script>
@endsection