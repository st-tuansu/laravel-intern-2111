<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class TaskController extends Controller
{

    private TaskRepositoryInterface $taskRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(TaskRepositoryInterface $taskRepository, UserRepositoryInterface $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = Task::getAllTask();
        $tasks = $this->taskRepository->getAllTasks();

        return view('admin.tasks.index', compact('tasks'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$users = User::all();
        $users  = $this->userRepository->getAllUsers();

        return view('admin.tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //Task::create($request->all());
        $this->taskRepository->createTask($request->validated());

        return back()->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$task = Task::getOneTask($id);
        $task = $this->taskRepository->getTaskById($id);

        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$users = User::all();
        //$task = Task::getOneTask($id);

        $users = $this->userRepository->getAllUsers();
        $task = $this->taskRepository->getTaskById($id);

        return view('admin.tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        //$task = Task::find($id);
        //$task->update($request->all());

        $this->taskRepository->updateTask($id, $request->validated());
        return back()->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Task::find($id)->delete();

        $this->taskRepository->deleteTask($id);
        return back()->with('success', 'Task deleted successfully!');
    }
}
