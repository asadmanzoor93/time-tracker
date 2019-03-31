<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'status'];

    public function todoItem($title, $id){
        if(empty($id)){
            $todoItem = new Todo();
            $todoItem->status = 'Created';
        }else{
            $todoItem = $this->where('id',$id)->first();
            if(empty($todoItem)){
                return ['status'=>false, 'message'=>'Please enter valid todo-item id !'];
            }
            $todoItem->status = 'Updated';
        }
        $todoItem->title = $title;
        $todoItem->save();


        return ['status'=>true, 'title'=>$title];

    }

}