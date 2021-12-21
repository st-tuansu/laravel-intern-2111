@extends('admin.layout')

@section('content')
    <h1>Edit task</h1>
    <form action="{{ route('tasks.update', ['id' => $id]) }}" method="post">
        @csrf
        @method('PATCH')
        <table class="table">
            @foreach ($task as $key => $value)
                <tr>
                    <td><input type="text" name="title" class="form-control form-control-user" id="title" placeholder="Title"
                            value="{{ $value['title'] }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="description" class="form-control form-control-user" id="description"
                            placeholder="Description" value="{{ $value['description'] }}">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="type" class="form-control form-control-user" id="type" placeholder="Type"
                            value="{{ $value['type'] }}">
                        @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="status" class="form-control form-control-user" id="status"
                            placeholder="Status" value="{{ $value['status'] }}">
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="date" name="start_date" class="form-control form-control-user" id="start_date"
                            placeholder="Start_date" value="{{ $value['start_date'] }}">
                        @error('start_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="date" name="due_date" class="form-control form-control-user" id="due_date"
                            placeholder="Due_date" value="{{ $value['due_date'] }}">
                        @error('due_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="assignee" class="form-control form-control-user" id="assignee"
                            placeholder="Assignee" value="{{ $value['assignee'] }}">
                        @error('assignee')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="estimate" class="form-control form-control-user" id="estimate"
                            placeholder="Estimate" value="{{ $value['estimate'] }}">
                        @error('estimate')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="actual" class="form-control form-control-user" id="actual"
                            placeholder="Actual" value="{{ $value['actual'] }}">
                        @error('actual')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ route('tasks.index') }}" type="button" style=""
                            class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i
                                    class="fas fa-long-arrow-alt-left"></i></span><span
                                class="text">Back</span></a>
                        <input type="submit" class="btn btn-primary" value="Update Task">
                    </td>
                </tr>
            @endforeach
        </table>
    </form>
@endsection
