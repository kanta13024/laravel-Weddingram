<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Folder;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $folder)
    {
        $folders = Folder::all();

        $current_folder = Folder::find($folder);
        $tasks = $current_folder->tasks()->get();


        return view('dashboard/tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $folder,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $folder)
    {
        return view ('dashboard/tasks/create', [
            'folder_id' => $folder,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $folder, CreateTask $request)
    {
        $current_folder = Folder::find($folder);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->action('Dashboard\TaskController@index', ['folder' => $current_folder->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $folder, int $task)
    {
        $task = Task::find($task);

        return view('dashboard/tasks/edit', [
            'folder' => $folder,
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $folder, int $task, EditTask $request)
    {
        $task = Task::find($task);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->update();

        return redirect()->action('Dashboard\TaskController@index', ['folder' => $folder]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $current_folder_id)
    {
        $task = Task::find($request->id);
        $task->delete();
        return redirect()->action('Dashboard\TaskController@index', ['folder' => $current_folder_id]);
    }
}
