@extends('calendar/layout')
@section('content')
<div class="container-sm ops-main" id="app">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">イベントボード</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-5" style="margin-right:30px;">
    <table class="table text-center">
      <tr>
        <th class="text-center">イベント名</th>
        <th class="text-center">開始日</th>
        <th class="text-center">終了日</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($events as $event)
      <tr>
        <td>
          <span>{{ $event->name }}</span>
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
            <button type="submit" class="btn btn-xs btn-danger" disabled aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="col-md-6" style="margin-right:10px;">
    <single-calendar></single-calendar>
  </div>
  <script src="{{ asset('/js/app.js') }}"></script>
</div>
@endsection
@section('style')
<style>
single-calendar{
    width:60vw;
    height:auto;
}
</style>
@endsection