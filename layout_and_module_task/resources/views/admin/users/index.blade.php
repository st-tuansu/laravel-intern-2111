@extends('admin.layout')

@section('content')
    <h1>List users</h1>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', ['id' => $user->id]) }}" type="button" style=""
                            class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
