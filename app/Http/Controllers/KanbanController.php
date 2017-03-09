<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KanbanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $task = ['yolo','swag'];
        $kanbans = ['test','swag'];
        return view('home')
            ->withTasks($task)
            ->withKanbans($kanbans);
    }

    function kanban()
    {
        return view('kanban');
    }
}
