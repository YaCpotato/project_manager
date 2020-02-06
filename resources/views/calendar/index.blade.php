@extends('calendar/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">イベントボード</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-9 col-md-offset-1" style="margin-right:30px;">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">イベント名</th>
        <th class="text-center">開始日</th>
        <th class="text-center">終了日</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($events as $event)
      <tr>
        <td>
          <a href="/event/{{ $event->id }}/edit">{{ $event->id }}</a>
        </td>
        <td>
          <a href="/event/{{ $event->id }}/">{{ $event->name }}</a>
        </td>
        <td>
          <span>{{ $event->startDateTime }}</span>
        </td>
        <td>
          <span>{{ $event->endDateTime }}</span>
        </td>
        <td>
          <form action="/event/{{ $event->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    <div><a href="/event/create" class="btn btn-default">新規作成</a></div>
  </div>
  <single-calendar></single-calendar>
</div>
@endsection