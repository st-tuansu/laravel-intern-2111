<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
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
        $data = DB::table('tasks')
            ->select('tasks.*', 'users.name')
            ->join('users', 'tasks.assignee', '=', 'users.id')
            ->get();
        $tasks = json_decode($data, true);
        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $data = $request->all();
        $result = DB::table('tasks')
            ->insertGetId(array(
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'status' => $data['status'],
                'start_date' => $data['start_date'],
                'due_date' => $data['due_date'],
                'assignee' => $data['assignee'],
                'estimate' => $data['estimate'],
                'actual' => $data['actual'],
            ));
        $result = "Insert successful";
        return view('admin.tasks.store', compact('result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tasks')
            ->select('tasks.*', 'users.name')
            ->join('users', 'tasks.assignee', '=', 'users.id')
            ->where('tasks.id', $id)
            ->get();
        $task = json_decode($data, true);
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
        $data = DB::table('tasks')
            ->select('tasks.*', 'users.name')
            ->join('users', 'tasks.assignee', '=', 'users.id')
            ->where('tasks.id', $id)
            ->get();
        $task = json_decode($data, true);
        return view('admin.tasks.edit', compact('task', 'id'));
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
        $data = $request->all();
        $result = DB::table('tasks')
            ->where('id', $id)
            ->update(array(
                'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'status' => $data['status'],
                'start_date' => $data['start_date'],
                'due_date' => $data['due_date'],
                'assignee' => $data['assignee'],
                'estimate' => $data['estimate'],
                'actual' => $data['actual'],
            ));
        return view('admin.tasks.update', compact('data', 'id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DB::table('tasks')->where('id', $id)->exists()) {
            DB::table('tasks')->where('id', $id)->delete();
            $result = "Delete successful";
            return view('admin.tasks.destroy', compact('result', 'id'));
        }
    }


    public function practice()
    {
        $data = DB::table('users')->get(); //Lấy tất cả dữ liệu trong table.

        $data1 = DB::table('users')->select('users.name')->where('id', 1)->get(); //Lấy ra một dữ liệu trong table.

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
