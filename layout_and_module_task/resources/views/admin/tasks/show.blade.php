@extends('admin.layout')

@section('content')
    <table class="table">
        <h1>Show details</h1>
        @foreach ($task as $key => $value)
            <tr>
                <td>Title</td>
                <td>{{ $value['title'] }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $value['description'] }}</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>{{ $value['type'] }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{ $value['status'] }}</td>
            </tr>
            <tr>
                <td>Start_date</td>
                <td>{{ $value['start_date'] }}</td>
            </tr>
            <tr>
                <td>Due_date</td>
                <td>{{ $value['due_date'] }}</td>
            </tr>
            <tr>
                <td>Assignee</td>
                <td>{{ $value['name'] }}</td>
            </tr>
            <tr>
                <td>Estimate</td>
                <td>{{ $value['estimate'] }}</td>
            </tr>
            <tr>
                <td>Actual</td>
                <td>{{ $value['actual'] }}</td>
            </tr>
        @endforeach
    </table>
    <td>
        <a href="{{ route('tasks.index') }}" type="button" style="" class="btn btn-primary btn-icon-split"><span
                class="icon text-white-50"><i class="fas fa-long-arrow-alt-left"></i></span><span
                class="text">Back</span></a>
    </td>
@endsection
