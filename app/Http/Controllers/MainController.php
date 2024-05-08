<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $todos=DB::table('todos')->get();
        $firstItem = $todos->first();
        return view('todos.index', compact('todos'));
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(TodoRequest $request)
    {
        // return $request->all();
        $title=$request->input('title');
        $description=$request->input('description');

            $data=[
                'title'=>$title,
                'description'=>$description,
                'is_completed'=>0,
            ];
            DB::table('todos')->insert($data);
            return redirect('/todos/index')->with('message','Inserted data successfully');
    }
    public function show($id)
    {
        $todo= DB::table('todos')->find($id);
        if(! $todo) {
        return to_route('todos.index')->with('message', 'Unable to locate the Todo');
        }
        return view('todos.show', ['todo' => $todo]);
    }
    public function edit($id)
    {
        $todo= DB::table('todos')->find($id);
        if(! $todo) {
        return to_route('todos.index')->with('message', 'Unable to locate the Todo');
        }
        return view('todos.edit', ['todo' => $todo]);
    }
    public function update(TodoRequest $request)
    {
        // return $request->all();
        $id=$request->input('uid');
        $title=$request->input('title');
        $description=$request->input('description');

            $data=[
                'title'=>$title,
                'description'=>$description,
            ];
            DB::table('todos')->where('id','=',$id)->update($data);
            return redirect('/todos/index')->with('message','Data updated successfully');
    }
    public function destroy($id){

        DB::table('todos')->where('id','=',$id)->delete();
        return redirect('/todos/index')->with('message','Todo has been deleted');
    }
    public function task($id){

        $todo= DB::table('todos')->find($id);
        if(! $todo) {
        return to_route('todos.index')->with('message', 'Unable to locate the Todo');
        }
        return view('todos.task', ['todo' => $todo]);
    }
    public function updatetask(Request $request){
        // return $request->all();
        $id=$request->input('uid');
        $task=$request->input('task');
        $data=[
            'is_completed'=>$task,
        ];
        DB::table('todos')->where('id','=',$id)->update($data);
        return redirect('/todos/index')->with('message','Task completed successfully');
    }
}
