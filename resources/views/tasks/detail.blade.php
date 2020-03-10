@extends('layout')

@section('contents')
  <div class="container">
    <div class="row">
      <div class="col col-offset-3 col-mid-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Task's Detail.
          </div>
          <div class="panel-body">
            Title   :: {{ $task->title }}
            STATUS  ::{{ $task->status_label }}
            DueDATE ::{{$task->fomatted_due_date }}
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
