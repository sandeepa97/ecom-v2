@extends('website.components.auth-layout')
@section('content')

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{url('/')}}" class="h1"><b>{{ $seller->name }}</b></a>
    </div>
    <div class="card-body">

      @if(session('success'))
      <p class="login-box-msg text-danger">{{session('success')}}</p>
      @else
      <p class="login-box-msg">Please provide your credentials to Log in</p>
      @endif

      <form action="{{ url('/post-login') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          @if ($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
          @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <div class="col-6">
          <a href="{{url('/user-forgot-password')}}">I forgot my password</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection
