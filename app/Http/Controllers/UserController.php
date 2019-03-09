<?php
/**
 * Created by PhpStorm.
 * User: asad
 * Date: 2019-03-09
 * Time: 11:02
 */

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create(){
        $teams = Team::all();
        return view('user.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'team_id' => 'required',
        ]);

        $validatedData['password'] = md5($validatedData['password']);

        User::create($validatedData);
        return redirect('/users')->with('success', 'User is successfully created');
    }

    public function edit($id)
    {
        $user = user::findOrFail($id);
        $teams = Team::all();
        return view('user.edit', compact('user','teams'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'team_id' => 'required',
        ]);
        User::whereId($id)->update($validatedData);
        return redirect('/users')->with('success', 'User is successfully updated');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success', 'User is successfully deleted');
    }
}