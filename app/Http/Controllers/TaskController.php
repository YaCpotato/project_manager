<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task/index', compact('tasks'));
    }

    public function getAllTask()
    {
        $tasks = Task::all();
        return $tasks;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        return view('task/create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->deadline = $request->deadline;
        $task->project_id = $request->project_id;
        $task->save();

        $project = Project::find($request->project_id);
        $data = Task::query();
        $data->where('project_id',$request->project_id);
        $tasks = $data->get();

        return view('project/detail', compact('project','tasks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('task/detail', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $project = Project::find($request->project_id);
        $task = Task::findOrFail($id);
        return view('task/edit', compact('task','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($request->project_id);
        $task = Task::findOrFail($id);
        $task->name = $request->new_name;
        $task->deadline = $request->new_deadline;
        $task->save();
        $tasks = Task::all();
        return view('project/detail',compact('tasks','project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        $project = Project::find($request->project_id);
        $data = Task::query();
        $data->where('project_id',$request->project_id);
        $tasks = $data->get();
        return view('project/detail', compact('project','tasks'));
    }
}
