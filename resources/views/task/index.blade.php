@extends('task/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">全タスクリスト</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-9 col-md-offset-1" style="margin-right:30px;">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">タスク名</th>
        <th class="text-center">開始日</th>
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
          <a href="/task/{{ $task->id }}/">{{ $task->created_at->format('Y/m/d') }}</a>
        </td>
        <td>
          <a href="/task/{{ $task->id }}/">{{ $task->deadline }}</a>
        </td>
        <td>
          <form action="/task/{{ $task->id }}/edit" method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-success" aria-label="Left Align"><i class="far fa-edit"></i></button>
          </form>
        </td>
        <td>
          <form action="/task/{{ $task->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection