<?php

namespace App\Http\Controllers;
use App\Models\Kanban;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //Actual user
        $user = User::find(Auth::id());

        $tasksInGoing = Task::where('state_id','=','2')->get() ;
        $kanbans = Kanban::orderBy('title')->get();
        return view('home')
            ->withTasksInGoing($tasksInGoing)
            ->withKanbans($user->kanbans);
    }

    public function addKanban(Request $request)
    {
        $kanban = new Kanban;
        $kanban->title = $request->title;
        $kanban->description = $request->description;
        $kanban->save();

        $user = User::find(Auth::id());
        $user->kanbans()->attach($kanban->id);

        //Session::flash('alert-succes', 'Post saved successfully');

        return redirect('home');
    }


    function kanban($id)
    {
        $users = User::all();
        $kanban = Kanban::find($id);
        return view('kanban')
            ->withUsers($users)
            ->withKanban($kanban);
    }
}
