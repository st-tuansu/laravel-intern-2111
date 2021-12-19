<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = array(
            'Exercise 1' => array(
                'title' => 'Exercise 1',
                'description' => 'Find the largest number in the sequence',
                'type' => 'advance',
                'status' => 'complete',
                'start_date' => '15/12/2021',
                'due_date' => '18/12/2021',
                'assignee' => 'Tuan',
                'estimate' => '1 day',
                'actual' => '2 days'
            ),
            'Exercise 2' => array(
                'title' => 'Exercise 2',
                'description' => 'Use recursion to remove duplicates from an array',
                'type' => 'advance',
                'status' => 'unfinished',
                'start_date' => '16/12/2021',
                'due_date' => '17/12/2021',
                'assignee' => 'Thao',
                'estimate' => '1 hour',
                'actual' => '6 hours'
            )
        );
        return view('admin.tasks.index', compact('task'));
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
    public function store(StoreTaskRequest $request)
    {
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
        $task = array(
            'title' => 'Exercise 1',
            'description' => 'Find the largest number in the sequence',
            'type' => 'advance',
            'status' => 'complete',
            'start_date' => '17/12/2021',
            'due_date' => '18/12/2021',
            'assignee' => 'Tuan',
            'estimate' => '1 day',
            'actual' => '2 days'
        );
        return view('admin.tasks.show', compact('task', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = array(
            'title' => 'Exercise 1',
            'description' => 'Find the largest number in the sequence',
            'type' => 'advance',
            'status' => 'complete',
            'start_date' => '2021-02-17',
            'due_date' => '2021-12-18',
            'assignee' => 'Tuan',
            'estimate' => '1 day',
            'actual' => '2 days'
        );
        return view('admin.tasks.edit', compact('task', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, $id)
    {
        return view('admin.tasks.update', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = "Delete successful";
        return view('admin.tasks.destroy', compact('result', 'id'));
    }
}
