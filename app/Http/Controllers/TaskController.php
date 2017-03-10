<?php

namespace App\Http\Controllers;
use App\Models\Kanban;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        if(!is_null($request->task_id) && isset($request->task_id)){
            Task::where('id', $request->task_id)
                ->update([
                    'title'       =>$request->title,
                    'description' =>$request->description,
                    'state_id'    =>$request->state,
                    'user_id'     =>$request->userId
                ]);
        }
        else {
            $task = new task;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->state_id = $request->state;
            $task->kanban_id = $kanbanId;
            $task->user_id = $request->userId;
            $task->save();
        }


        //Session::flash('alert-succes', 'Post saved successfully');

        return redirect($path);
    }

    public function addUserToKanban(Request $request)
    {
        $user = User::findOrFail($request->id);
        $kanban = Kanban::find($request->kanbanId);
        $user->kanbans()->save($kanban);

        Mail::send('emails.subscribe', ['user' => $user,'kanban' => $kanban], function ($m) use ($user, $kanban) {
            $m->from('hello@app.com', 'Kaban Team');
            $m->to($user->email, $user->name)->subject('Vous avez été invité à rejoindre une team Kanban !');
        });

        return json_encode('Le membre à bien été invité à votre kanban');
    }
}
