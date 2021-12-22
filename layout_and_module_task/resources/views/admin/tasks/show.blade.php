@extends('admin.layout')

@section('content')
    <table class="table">
        <h1>Show details</h1>
        <tr>
            <td>Title</td>
            <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{ $task->description }}</td>
        </tr>
        <tr>
            <td>Type</td>
            <td>{{ $task->type }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ $task->status }}</td>
        </tr>
        <tr>
            <td>Start_date</td>
            <td>{{ $task->start_date }}</td>
        </tr>
        <tr>
            <td>Due_date</td>
            <td>{{ $task->due_date }}</td>
        </tr>
        <tr>
            <td>Assignee</td>
            <td>{{ $task->name }}</td>
        </tr>
        <tr>
            <td>Estimate</td>
            <td>{{ $task->estimate }}</td>
        </tr>
        <tr>
            <td>Actual</td>
            <td>{{ $task->actual }}</td>
        </tr>

    </table>
    <td>
        <a href="{{ route('tasks.index') }}" type="button" style="" class="btn btn-primary btn-icon-split"><span
                class="icon text-white-50"><i class="fas fa-long-arrow-alt-left"></i></span><span
                class="text">Back</span></a>
    </td>
@endsection
