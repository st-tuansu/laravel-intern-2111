<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::getAllTask();

        return view('admin.tasks.index', compact('tasks'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

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
        Task::create($request->all());

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
        $task = Task::getOneTask($id);

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
        $users = User::all();
        $task = Task::getOneTask($id);

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
        $task = Task::find($id);
        $task->update($request->all());

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
        Task::find($id)->delete();

        return back()->with('success', 'Task deleted successfully!');
    }


    public function practice()
    {
        $data = DB::table('users')->get(); //Lấy tất cả dữ liệu trong table.

        $data1 = DB::table('users')->select('name')->where('id', 1)->first(); //Lấy ra một dữ liệu trong table.

        $chunk = DB::table('users')->orderBy('id')->chunk(5, function ($users) { //Chunk giá trị trả về.
            foreach ($users as $user) {
                echo $user->email;
            }
        });

        $taskCount = DB::table('users')->count(); //Đếm số lượng record trả về.

        if (DB::table('users')->where('id', 2)->exists()) { //Kiểm tra sự tồn tại của dữ liệu
            $exists = "Tồn tại user";
        } else {
            $exists = "Không tồn tại user";
        }

        $join = DB::table('tasks') //Join table
            ->select('tasks.*', 'users.name')
            ->join('users', 'tasks.assignee', '=', 'users.id')
            ->get();

        $first = DB::table('users')
            ->where('id', 3);

        $users = DB::table('users')
            ->where('id', 1)
            ->union($first) //Union query
            ->get();

        $result = DB::table('users') // Where query
            ->whereIn('id', [4, 5, 6])
            ->orwhere('name', 'Delilah')
            ->get();

        //echo dd($result);
    }
}
