<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$tasks = Task::all();
        $tasks = Task::where('tasks.user_id','=',1)
        ->where('tasks.state','=',0)
        ->get();
        echo $tasks;
    }

    public function getMyTask(){
        $tasks = Task::where('tasks.user_id','=',Auth::id())->get();
    }

    public function getMyFinishedTasks(){
        $tasks = Task::where('tasks.user_id','=',Auth::id())
                    ->and('tasks.state','=',1)
                    ->get();
    }

    public function getMyPendingTasks(){
        $tasks = Task::where('tasks.user_id','=',Auth::id())
                    ->and('tasks.state','=',0)
                    ->get();
    }

    public function getMyTasksByDue(){
        $tasks = Task::where('tasks.user_id','=',Auth::id())
                    ->orderByDesc('due_date')
                    ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('CreateTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
