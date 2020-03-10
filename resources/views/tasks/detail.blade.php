@extends('layout')

@section('styles')
    @include('share.flatpicker.styles')
@endsection


@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <div class="panel panel-default">
        Task Detail Description.
      </div>

      <div class="panel-body">

      <div class="panel-title">
        {{　$task->title }}
      </div>



      <!-- Taskの詳細記入ページへの移行  -->
      <a href="{{ route()}}"
          class="btn btn-default btn-block">
          Provide detail.
      </a>
      <!-- Task の削除確認 -->
      <a href="#"
          class="btn btn-danger btn-block">
          DELETE
      </a>


      </div>

    </div>

  </div>

</div>





@endsection
