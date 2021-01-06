<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Todo;

class TodoController extends Controller
{

    public function AllTodos(){

        return auth()->user()->todos;

    }


    public function CreateTodo(TaskCreateRequest $request){

        // create relationship between to user and newly created todo
        return auth()->user()->todos()->create($request->validated());


    }

    public function UpdateTodo(TaskUpdateRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
        return $todo;
    }

    public function CompleteTodo(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
        return $todo;
    }
    public function DeleteTodo(Todo $todo)
    {

        $todo->delete();
        return ['status'=>200];
    }



}
