@extends('project/layout')
@section('content')
<div class="container">
    <h1>プロジェクト新規作成</h1>
    <form action="{{ url('project') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="body">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" required autofocus>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">登録</button>
    </form>
</div>
@endsection