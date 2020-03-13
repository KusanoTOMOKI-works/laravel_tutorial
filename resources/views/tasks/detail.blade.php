@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-offset-3 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Task's Detail.
          </div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <td>Title</td>
                <td>{{ $task->title }}</td>
              </tr>
              <tr>
                <td>STATUS</td>
                <td>{{ $task->status_label }}</td>
              </tr>
              <tr>
                <td>DueDATE</td>
                <td>{{ $task->formatted_due_date }}</td>
              </tr>
              <tr>
                <td>Created date</td>
                <td>{{ $task->created_at }}</td>
              </tr>
              <tr>
                <td>Updated date</td>
                <td>{{ $task->updated_at }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <a href="{{ route('tasks.index', ['id' => $folder_id]) }}" class="btn btn-primary btn-sm">BACK</a>
    </div>
  </div>
@endsection
