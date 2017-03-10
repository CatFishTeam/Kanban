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
        $user = User::find(Auth::id());
        $tasksInGoing = User::find(Auth::id())->tasks->where('state_id','!=','4');

        return view('home')
            ->with('tasksInGoing',$tasksInGoing)
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

    public function showKanban($id)
    {
        $kanban = Kanban::find($id);
        $tasks = $this->getTasks($id,1);
        $users = User::all();
        $usersIn = array();
        $usersNotIn;
        foreach ($users as $user){
            foreach($kanban->users as $userk){
                if($userk->id == $user->id)
                {
                    array_push($usersIn,$userk);
                }
            }
        }
        $usersNotIn = $users->diff($usersIn);

        return view('kanban')
            ->with('usersNotIn',$usersNotIn)
            ->with('usersIn',$usersIn)
            ->withUsers($users)
            ->withKanban($kanban)
            ->withTasks($tasks);
    }

    function getTasks($id){
        $tasks = Task::where('kanban_id', $id)->get();
        return $tasks;
    }

}
