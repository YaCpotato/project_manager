@extends('project/layout')
@section('content')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">ダッシュボード</h3>
    <div style="margin:10px;"><a href="/project/create" class="btn btn-primary">新規作成</a></div>
  </div>
</div>
<div class="row">
  <div class="col-md-9 col-md-offset-1" style="margin-right:30px;">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">プロジェクト名</th>
        <th class="text-center"></th>
        <th class="text-center"></th>
      </tr>
      @foreach($projects as $project)
      <tr>
        <td>
          <span>{{ $project->id }}</span>
        </td>
        <td>
          <a href="/project/{{ $project->id }}/">{{ $project->name }}</a>
        </td>
        <td>
        <form action="/project/{{ $project->id }}/edit" method="get" style="margin:0px;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-success" aria-label="Left Align"><i class="far fa-edit"></i></button>
          </form>
        </td>
        <td>
          <form action="/project/{{ $project->id }}" method="post" style="margin:0px;">
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