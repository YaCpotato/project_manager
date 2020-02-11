@extends('task/layout')
@section('content')
<div class="container">
    <h1>{{ $task->name }}</h1>
    <form action="{{ url('task/'.$task->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control" name="new_name" value="{{ $task->name }}" required autofocus>
            <label for="body">{{ __('Deadline') }}</label>
            <input id="start" type="date" class="form-control" name="new_deadline" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection