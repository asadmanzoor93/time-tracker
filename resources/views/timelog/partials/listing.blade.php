@foreach($timelogs as $timelog)
    <tr>
        <td>{{$timelog->user['name']}}</td>
        <td>{{$timelog->date}}</td>
        <td>{{date('h:m A', strtotime($timelog->login_at))}}</td>
        <td>{{date('h:m A', strtotime($timelog->logout_at))}}</td>
        <td class="row">
            <a href="{{ route('editTimeLog',$timelog->id)}}" class="btn btn-primary">Edit</a>
            <form action="{{ route('deleteTimeLog', $timelog->id)}}" method="get">
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
@endforeach