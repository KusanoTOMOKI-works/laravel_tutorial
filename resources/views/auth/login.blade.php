@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">
          LOGIN
        </div>

        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p> {{ $message }}</p>
            @endforeach
          </div>
        @endif

        <form action="{{ route('login') }}"
              method="POST">
          @csrf
          <div class="form-group">
            <label for="email">mail address</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" />
          </div>

          <div class="text-right">
            <button type="submit" class="btn btn-primary"> Submit </button>
          </div>
        </form>
      </nav>
    </div>

    <div class="text-center">
      <a href="{{ route('password.request') }}">
        Change your password.
      </a>
    </div>
  </div>
</div>
@endsection
