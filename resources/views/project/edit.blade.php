@extends('project/layout')
@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <form action="{{ url('project/'.$project->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control" name="new_name" value="{{ $project->name }}" required autofocus>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection