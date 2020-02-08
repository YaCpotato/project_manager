@extends('task/layout')
@section('content')
<div class="container">
    <h1>タスク新規作成</h1>
    <form action="{{ url('task') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="body">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" required autofocus>
            <label for="body">{{ __('Deadline') }}</label>
            <input id="start" type="date" class="form-control" name="deadline">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">登録</button>
    </form>
</div>
@endsection