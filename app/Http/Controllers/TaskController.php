<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreTaskRequest;
// use App\Http\Requests\UpdateTaskRequest;
// use App\Models\Task;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = Task::all();
        $tasks = Task::orderBy('id', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = [
            [
            'label' => 'Performed',
            'value' => 'Performed',
            ],
            [
            'label' => 'Done',
            'value' => 'Done',
            ]
            ];
        return view('tasks.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Task::create($request->validated());
        //return redirect()->route('tasks.index');

        $request->validate([
            'title' => 'required'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->sescription = $request->sescription;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $statuses = [
            [
            'label' => 'Performed',
            'value' => 'Performed',
            ],
            [
            'label' => 'Done',
            'value' => 'Done',
            ]
            ];
        return view('tasks.edit', compact('statuses', 'task'));
        //return view('tasks.edit', compact('task'));
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
        $task = Task::findOrFail($id);
        $request->validate([
            'title' => 'required'
        ]);

        $task->title = $request->title;
        $task->sescription = $request->sescription;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
