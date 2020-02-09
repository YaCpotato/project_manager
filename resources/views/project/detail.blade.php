@extends('project/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">{{ $project->name }}</h3>
    <form action="/task/create" method="get">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="project_id" value="{{ $project->id }}">
      <button type="submit" class="btn btn-primary" aria-label="Left Align">タスク追加</button>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table text-center">
    @foreach($tasks as $task)
      <tr>
        <td>
          <a href="/tasks/{{ $task->id }}/edit">{{ $task->id }}</a>
        </td>
        <td>
          <a href="/tasks/{{ $task->id }}/">{{ $task->name }}</a>
        </td>
      </tr>
    @endforeach
    </table>
  </div>
</div>
@endsection