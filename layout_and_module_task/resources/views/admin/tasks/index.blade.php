@extends('admin.layout')

@section('content')
    <h1>List tasks</h1>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->type_label }}</td>
                    <td>{{ $task->status_label }}</td>
                    <td>{{ $task->start_date_label }}</td>
                    <td>{{ $task->due_date_label }}</td>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ $task->estimate }}</td>
                    <td>{{ $task->actual }}</td>
                    <td>
                        <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you want delete?')"
                                class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('tasks.show', ['id' => $task->id]) }}" type="button" style=""
                            class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" type="button"
                            class="btn btn-warning btn-circle btn-sm"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <td>
            <a href="{{ route('tasks.create') }}" type="button" style="" class="btn btn-primary btn-icon-split"><span
                    class="icon text-white-50"><i class="fas fa-plus"></i></span><span
                    class="text">Create</span></a>
        </td>
    </table>
@endsection
