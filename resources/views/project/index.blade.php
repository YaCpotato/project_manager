@extends('project/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">ダッシュボード</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-9 col-md-offset-1" style="margin-right:30px;">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">プロジェクト名</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($projects as $project)
      <tr>
        <td>
          <a href="/projects/{{ $project->id }}/edit">{{ $project->id }}</a>
        </td>
        <td>
          <a href="/projects/{{ $project->id }}/">{{ $project->name }}</a>
        </td>
        <td>
          <form action="/project/{{ $project->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    <div><a href="/projects/create" class="btn btn-default">新規作成</a></div>
  </div>
</div>
@endsection