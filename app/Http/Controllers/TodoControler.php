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
        return back();
    }
}
