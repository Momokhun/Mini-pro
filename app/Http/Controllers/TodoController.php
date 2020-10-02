<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests;
use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;


class TodoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $todos = auth()->user()->todos->sortBy('completed');
        //$todos = Todo::orderBy('completed')->get();

        return view('todos.index', compact('todos'));
    }

    public function create() {
        return view('todos.create');
    }

    public function show(Todo $todo) {
        return view('todos.show', compact('todo'));
    }

    public function store(TodoCreateRequest $request) {

        // $userId = auth()->id();
        // $request['user_id'] = $userId;
        // Todo::create($request->all());
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach ($request->step as $step ) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        return redirect(route('todo.index'))->with('message', '新しいタスクが作成されました!');
    }

    public function edit(Todo $todo) {
        //$todo = Todo::find($todo);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo) {
        $todo->update(['title' => $request->title]);
        if($request->stepName){
            foreach ($request->stepName as $key => $value ) {
                $id = $request->stepId[$key];
                if(!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', 'タスクの内容が変更されました!');
    }

    public function complete(Todo $todo) {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', '1件のタスクを完了としました!');
    }

    public function incomplete(Todo $todo) {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', '1件のタスクを未完了としました!');
    }

    public function destroy(Todo $todo) {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', '1件のタスクを削除しました!');
    }

}
