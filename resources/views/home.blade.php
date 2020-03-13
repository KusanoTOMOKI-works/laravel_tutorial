@extends('layout')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">
            Make a folder,
          </div>
          <div class="panel-body">
            <div class="text-center">
              <a href="{{ route('folders.create') }}"
                 class="btn btn-primary">
                 フォルダーを作成する。
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
