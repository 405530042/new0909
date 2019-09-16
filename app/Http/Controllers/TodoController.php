<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index(){

        $todos = Todo::all();

        return view ('todo.index', [ 'todos' => $todos ]);
    }

    public function update(Request $request){

        //$todo = new Todo();
       // $todo->title = $request->title;
       // $todo->save();

        //return $todo;

        $todo = Todo::create($request->all());
        return redirect('todo');
    }
}
