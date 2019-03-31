<?php
/**
 * Created by PhpStorm.
 * User: asad
 * Date: 2019-03-09
 * Time: 11:49
 */

namespace App\Http\Controllers;

use App\Team;
use App\Todo;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('team.index', compact('teams'));
    }

    public function create(){
        return view('team.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Team::create($validatedData);
        return redirect('/teams')->with('success', 'Team is successfully created');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('team.edit', compact('team'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        Team::whereId($id)->update($validatedData);
        return redirect('/teams')->with('success', 'Team is successfully updated');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect('/teams')->with('success', 'Team is successfully deleted');
    }

    /***
     *
     *  Todo API Implementation
     *
     */

    public function listTodoItems(){
        $todoItem = Todo::all();
        return response()->json(['status'=>true, 'todoItem'=>$todoItem]);
    }

    public function getTodoItem($id){
        if (empty($id)){
            return response()->json(['status'=>false, 'message'=>'Please enter todo-item id !']);
        }
        $todoItem = Todo::find($id);
        return response()->json(['status'=>true, 'todoItem'=>$todoItem]);
    }

    public function todoItem(Request $request){
        $id = $request->input('id');
        $title = $request->input('title');
        if (empty($title)){
            return response()->json(['status'=>false, 'message'=>'Please enter todo-item title !']);
        }
        $todo = new Todo();
        $status = $todo->todoItem($title, $id);
        return response()->json($status);
    }

    public function deleteTodo($id){
        $todoItem = Todo::find($id);
        if (empty($todoItem)){
            return response()->json(['status'=>false, 'message'=>'Please enter valid todo-item id !']);
        }
        $todoItem->delete();
        return response()->json(['status'=>true, 'message'=>'Todo-item deleted successfully !']);
    }

}