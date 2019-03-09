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
        $timelogs = TimeLog::all();
        return view('timelog.index', compact('timelogs'));
    }

    public function create(){
        $users = User::all();
        return view('timelog.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        TimeLog::create($validatedData);
        return redirect('/timelog')->with('success', 'TimeLog is successfully created');
    }

    public function edit($id)
    {
        $timelog = TimeLog::findOrFail($id);
        return view('timelog.edit', compact('timelog'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $request->validate([
            'name' => 'required'
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
}