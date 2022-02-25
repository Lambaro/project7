<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //->except('index');
    }

    public function index(){
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    // Create
   public function create(){
        return view('todos.create');
    }

    public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }

    // Edit
    public function edit(Todo $todo){
        return view('todos.edit', compact('todo'));
    }

    // Store
    public function store(TodoCreateRequest $request){

       $todo = auth()->user()->todos()->create($request->all());
       if($request->step){
           foreach( (array)$request->step as $step){
               $todo->steps()->create(['name' => $step]);
           }
       }
        return redirect(route('todo.index'))->with('message','Todo created successfully' );
    }

    // Update
    public function update(TodoCreateRequest $request, Todo $todo){


        $todo->update(['title' => $request->title]);
        if($request->stepName){
            foreach((array)$request->stepName as $key => $value){
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name' => $value]);
                }else{
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', 'Updated!');
        // update todo
    }
    public function complete(Todo $todo){

        $todo->update(['completed'=> true]);
        return redirect()->back()->with('message','Task Marked as completed!' );
    }
    public function incomplete(Todo $todo){

        $todo->update(['completed'=> false]);
        return redirect()->back()->with('message','Task Marked as incompleted!' );
    }

    public function destroy(Todo $todo){

        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message','Task deleted!' );
    }



}
