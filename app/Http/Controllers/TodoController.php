<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function index(){

        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    // Create
   public function create(){
        return view('todos.create');
    }

    // Edit
    public function edit(Todo $todo){
        return view('todos.edit', compact('todo'));
    }

    // Store
    public function store(TodoCreateRequest $request){
        Todo::create($request->all());
        // uploading
        return redirect()->back()->with('message','Todo created successfully' );
    }

    // Update
    public function update(TodoCreateRequest $request, Todo $todo){


        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('message', 'Updated!');
        // update todo
    }

}
