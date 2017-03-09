<?php

namespace App\Http\Controllers;
use App\Models\Kanban;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
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

    public function addKanban(Request $request)
    {
        $kanban = new Kanban;
        $kanban->title = $request->title;
        $kanban->description = $request->description;
        $kanban->save();

        $user = User::find(Auth::id());
        $user->kanbans()->attach($kanban->id);

        //Session::flash('alert-succes', 'Post saved successfully');

        return redirect('/');
    }

    public function addTask(Request $request)
    {

        $task = new task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->state_id = $request->state;
        $task->save();


        //Session::flash('alert-succes', 'Post saved successfully');

        return redirect($request->path());
    }

    public function addUserToKanban(Request $request)
    {
        $user = User::find($request->id);
        $user->kanbans()->attach($request->kabanId);

        return json_encode('Le membre à bien été invité à votre kanban');
    }
}
