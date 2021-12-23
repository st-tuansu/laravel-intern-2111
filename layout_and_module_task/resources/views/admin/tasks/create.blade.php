@extends('admin.layout')
@section('content')
    <h1>Create task</h1>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <table class="table">
            <tr>
                <td><input type="text" class="form-control form-control-user" id="title" name="title" placeholder="Title"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><input type="text" class="form-control form-control-user" id="description" name="description"
                        placeholder="Description" value="{{ old('description') }}">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><input type="text" class="form-control form-control-user" id="type" name="type" placeholder="Type"
                        value="{{ old('type') }}">
                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><input type="text" class="form-control form-control-user" id="status" name="status" placeholder="Status"
                        value="{{ old('status') }}">
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><input type="date" class="form-control form-control-user" id="start_date" name="start_date"
                        placeholder="Start_date" value="{{ old('start_date') }}">
                    @error('start_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><input type="date" class="form-control form-control-user" id="due_date" name="due_date"
                        placeholder="Due_date" value="{{ old('due_date') }}">
                    @error('due_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <p>Chose assignee</p>
                    <select multiple="true" name="assignee" id="assignee" class="form-control select2">
                        @foreach ($users as $user)
                            <option value="{{ $uer->id }}" selected="selected">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="text" class="form-control form-control-user" id="estimate" name="estimate"
                        placeholder="Estimate" value="{{ old('estimate') }}">
                    @error('estimate')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><input type="text" class="form-control form-control-user" id="actual" name="actual" placeholder="Actual"
                        value="{{ old('Actual') }}">
                    @error('actual')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <a href="{{ route('tasks.index') }}" type="button" style=""
                        class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i
                                class="fas fa-long-arrow-alt-left"></i></span><span class="text">Back</span></a>
                    <input type="submit" class="btn btn-primary" value="Add Task">
                </td>
            </tr>
        </table>
    </form>
@endsection
