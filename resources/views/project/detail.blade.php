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
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">タスク名</th>
        <th class="text-center">登録日</th>
        <th class="text-center">期限日</th>
        <th class="text-center"></th>
        <th class="text-center"></th>
      </tr>
      @foreach($tasks as $task)
      <tr>
        <td>
          <span>{{ $task->id }}</span>
        </td>
        <td>
          <a href="/task/{{ $task->id }}/">{{ $task->name }}</a>
        </td>
        <td>
          <span>{{ $task->created_at->format('Y/m/d') }}</span>
        </td>
        <td>
          <span>{{ $task->deadline }}</span>
        </td>
        <td>
          <form action="/task/{{ $task->id }}/edit" method="get">
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-success" aria-label="Left Align"><i class="far fa-edit"></i></button>
          </form>
        </td>
        <td>
          <form action="/task/{{ $task->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection