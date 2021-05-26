<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Todo;

class TodoControler extends Controller {
    public function index() {
        $data = Todo::all();
        return Inertia::render("index",["data"=>$data] );
    }   

    public function new(Request $request) {
        Todo::create($request->all());
        return back()->with(['message' => 'New Todo is added in List', 'type' => 'success']);
        
    }

    public function destroy(Request $request) {
        if ($request->has('id')) {
            Todo::find($request->all('id'))->first()->delete();
            return back()->with(['message' => 'Todo Item Deleted', 'type' => 'danger']);
        }
    }
    
    public function uncomplete(Request $request){
        Todo::find($request->input('id'))->update(['completed' => false]);
        return back()->with(['message' => 'Work Uncomplet', 'type' => 'warning']);
    }

    public function complete(Request $request){
        Todo::find($request->input('id'))->update(['completed' => true]);
        return back()->with(['message' => 'Work Completed', 'type' => 'warning']);
    }

}
