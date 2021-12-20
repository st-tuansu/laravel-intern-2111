@extends('admin.layout')

@section('content')
    {{ $result }}
    <br>
    <br>
    <a href="{{ route('tasks.index') }}" type="button" style="" class="btn btn-primary btn-icon-split"><span
            class="icon text-white-50"><i class="fas fa-long-arrow-alt-left"></i></span><span
            class="text">Back</span></a>
@endsection
