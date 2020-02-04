@extends('task/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">{{ $task->name }}</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="task-title">{{ $task->started_at }}</div>
  </div>
</div>
@endsection