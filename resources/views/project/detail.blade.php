@extends('project/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">{{ $project->name }}</h3>
  </div>
</div>
<div class="row">
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
</div>
<p>プロジェクト個別画面です</p>
</div>
@endsection