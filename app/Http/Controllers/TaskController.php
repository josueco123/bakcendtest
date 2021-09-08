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
        $tasks = Task::where('tasks.user_id','=',Auth::id())
        ->orderByDesc('id')
        ->get();

        return $tasks;//Inertia::render('MyTasks', $tasks);
    }

    public function showMyTask(){
        
        $token = csrf_token();

        return Inertia::render('MyTasks',compact('token'));
    }

    
    public function showMyFinishedTask(){
        
        $token = csrf_token();

        return Inertia::render('FinishedTasks',compact('token'));
    }
    public function getMyFinishedTasks(){
        $tasks = Task::where('tasks.user_id','=',Auth::id())
                    ->where('tasks.state','=',1)
                    ->get();

                    return $tasks;
    }

    public function showMyPendingTask(){
        
        $token = csrf_token();

        return Inertia::render('PendingTasks',compact('token'));
    }

    public function getMyPendingTasks(){
        $tasks = Task::where('tasks.user_id','=',Auth::id())
                    ->where('tasks.state','=',0)
                    ->get();

                    return $tasks;
    }

    public function getMyTasksByDue(){
        $tasks = Task::where('tasks.user_id','=',Auth::id())
        ->orderBy('due_date', 'asc')                    
                    ->get();

                    return $tasks;
    }

    public function showByDuegTask(){
        
        $token = csrf_token();

        return Inertia::render('DueTasks',compact('token'));
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
     * Store a newly created resource in storage. git remote add origin https://github.com/josueco123/bakcendtest.git
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        
       $user_id = Auth::id();
       $start_date = date('Y-m-d');
       
       $task = new Task(array(
        'description' =>$request->get('description'),
        'start_date' => $start_date,
        'due_date' =>$request->get('due_date'),
        'state' =>0,
        'user_id'=>$user_id
       ));

       $task->save();

       return redirect('/tareas/show');
    }

    public function completTask(Request $request){

        $id = $request->get('id');
        $task = Task::find($id);

        $today = date('Y-m-d');

        $task->state = 1;
        $task->due_date = $today; 
        $task->save();
        

    }

    public function deletTask(Request $request){

        $id = $request->get('id');
        $task = Task::find($id);

        
        $task->delete();        

    }

    public function editTask($id){

        $task = Task::find($id);

        return Inertia::render('EditTask',compact('task'));
    }

    public function UpdateTask(Request $request,$id){

        //$id = $request->get('id');
        $task = Task::find($id);

        $due_date = $request->get('due_date');
        $description = $request->get('description');

        $task->state = 0;
        $task->description = $description;
        $task->due_date = $due_date; 
        $task->save();

        return redirect('/tareas/show');
        

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
