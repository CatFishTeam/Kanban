<?php

namespace App\Http\Controllers;
use App\Models\Kanban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        $kanbans = Kanban::orderBy('title')->get();
        return view('home')
            ->withTasks($task)
            ->withKanbans($kanbans);
    }

    public function addKanban(Request $request)
    {
        $kanban = new Kanban;

        $kanban->title = $request->title;
        $kanban->description = $request->description;

        $kanban->save();

        //Session::flash('alert-succes', 'Post saved successfully');

        return redirect('home');
    }


    function kanban()
    {
        return view('kanban');
    }
}
