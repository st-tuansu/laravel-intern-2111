@extends('admin.layout')

@section('content')
    <table class="table">
        <h1>Show details</h1>
        <tr>
            <td>Name</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $user->email }}</td>
        </tr>
    </table>
    <h2>Tasks</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Type</th>
                <th>Status</th>
                <th>Start_date</th>
                <th>Due_date</th>
                <th>Assignee</th>
                <th>Estimate</th>
                <th>Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->type }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->estimate }}</td>
                    <td>{{ $task->actual }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </table>
    <td>
        <a href="{{ route('users.index') }}" type="button" style="" class="btn btn-primary btn-icon-split"><span
                class="icon text-white-50"><i class="fas fa-long-arrow-alt-left"></i></span><span
                class="text">Back</span></a>
    </td>
@endsection
