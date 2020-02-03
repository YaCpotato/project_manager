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
        <th class="text-center">プロジェクト名</th>
        <th class="text-center">完了日</th>
        <th class="text-center">開始日</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($tasks as $task)
      <tr>
        <td>
          <a href="/task/{{ $task->id }}/edit">{{ $task->id }}</a>
        </td>
        <td>
          <a href="/task/{{ $task->id }}/">{{ $task->name }}</a>
        </td>
        <td>
          <a href="/task/{{ $task->id }}/">{{ $task->completed_at }}</a>
        </td>
        <td>
          <a href="/task/{{ $task->id }}/">{{ $task->started_at }}</a>
        </td>
        <td>
          <form action="/task/{{ $task->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    <div><a href="/task/create" class="btn btn-default">新規作成</a></div>
  </div>
</div>
@endsection