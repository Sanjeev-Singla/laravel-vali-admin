@extends("admin.layout.master")
@section("content")

<section class="login-content">
  <div class="logo">
    <h1>Admin Login</h1>
  </div>

  @if(Session::has('message'))
  <div class="col-lg-3">
    <div class="bs-component">
      <div class="alert alert-dismissible {{ Session::get('alert-class', 'alert-info') }}">
        <button class="close" type="button" data-dismiss="alert">×</button><strong>{{ Session::get('message') }}</strong>
      </div>
    </div>
  </div>
  @endif

  <div class="login-box">
    <form class="login-form" action="{{ url('admin/login-submit') }}" method="POST">
      @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
      
      <div class="form-group">
        <label class="control-label">USERNAME</label>
        <input class="form-control" name="username" type="text" value="" placeholder="USERNAME" required autofocus>
        @error('username')
          <li class="text-danger">{{ $message }}</li>
        @enderror
      </div>

      <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input class="form-control" name="password" type="password" placeholder="PASSWORD" required>
        @error('password')
          <li class="text-danger">{{ $message }}</li>
        @enderror
      </div>

      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block">SIGN IN<i class="fa fa-sign-in fa-lg fa-fw"></i></button>
      </div>
    </form>
  </div>
</section>

@endsection