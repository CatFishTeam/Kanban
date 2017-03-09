<?php

namespace App\Http\Controllers;
use App\Models\Kanban;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;

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

    public function addTask(Request $request)
    {

        $path = $request->path();
        $path = str_replace("/add", "", $path);
        $kanbanId = str_replace("kanban/","",$path);
        $task = new task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->state_id = $request->state;
        $task->kanban_id = $kanbanId;
        $task->save();

        //Session::flash('alert-succes', 'Post saved successfully');

        return redirect($path);
    }

    public function addUserToKanban(Request $request)
    {
        $user = User::find($request->id);
        $user->kanbans()->attach($request->kabanId);

        return json_encode('Le membre à bien été invité à votre kanban');
    }
}
