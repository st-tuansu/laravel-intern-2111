@extends('admin.layout')

@section('content')
    <h1>List tasks</h1>
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
            @foreach ($tasks as $key => $value)
                <tr>
                    <td>{{ $value['id'] }}</td>
                    <td>{{ $value['title'] }}</td>
                    <td>{{ $value['description'] }}</td>
                    <td>{{ $value['type'] }}</td>
                    <td>{{ $value['status'] }}</td>
                    <td>{{ $value['start_date'] }}</td>
                    <td>{{ $value['due_date'] }}</td>
                    <td>{{ $value['name'] }}</td>
                    <td>{{ $value['estimate'] }}</td>
                    <td>{{ $value['actual'] }}</td>
                    <td>
                        <form action="{{ route('tasks.destroy', ['id' => $value['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('tasks.show', ['id' => $value['id']]) }}" type="button" style=""
                                class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('tasks.edit', ['id' => $value['id']]) }}" type="button"
                                class="btn btn-warning btn-circle btn-sm"><i class="far fa-edit"></i></a>
                            <button type="submit" onclick="return confirm('Are you want delete?')"
                                class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
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
