<?php
/**
 * Created by PhpStorm.
 * User: asad
 * Date: 2019-03-09
 * Time: 12:05
 */

namespace App\Http\Controllers;

use App\TimeLog;
use App\Team;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeLogController extends Controller
{
    public function index()
    {
        $timelog_obj = new TimeLog();
        $timelogs = $timelog_obj->fetchIndexTimeLogs();
        $users = User::all();
        $teams = Team::all();
        $years = range(2000, strftime("%Y", time()));
        return view('timelog.index', compact('timelogs', 'users', 'teams', 'years'));
    }

    public function create(){
        $users = User::all();
        return view('timelog.create', compact('users'));
    }

    public function store(Request $request)
    {
        // validator extended to check login-logout time dependence
        $validatedData = $request->validate([
            'date' => 'required',
            'user_id' => 'required',
            'login_at' => 'required',
            'logout_at' => 'greater_than:login_at'
        ]);

        TimeLog::create($validatedData);
        return redirect('/timelogs')->with('success', 'TimeLog is successfully created');
    }

    public function edit($id)
    {
        $timelog = TimeLog::findOrFail($id);
        $users = User::all();
        return view('timelog.edit', compact('timelog', 'users'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $request->validate([
            'date' => 'required',
            'user_id' => 'required',
            'login_at' => 'required',
            'logout_at' => 'greater_than:login_at'
        ]);

        TimeLog::whereId($id)->update($validatedData);
        return redirect('/timelogs')->with('success', 'TimeLog is successfully updated');
    }

    public function destroy($id)
    {
        $timelog = TimeLog::findOrFail($id);
        $timelog->delete();
        return redirect('/timelogs')->with('success', 'TimeLog is successfully deleted');
    }

    public function fetchTimeLogsAjax(Request $request){
        $data = $request->all();
        $offset = $data['page'] * 5;

        $timelog_obj = new TimeLog();
        $timelogs = $timelog_obj->fetchTimeLogsAjax($data['user_filter'], $data['team_filter'], $data['search_filter'],
                                                    $data['year'], $data['week'], $data['day'], $offset,5);
        $innerHTML = view('timelog.partials.listing')->with('timelogs', $timelogs)->render();
        return response()->json( array('success'=>true, 'html' => $innerHTML));
    }
}