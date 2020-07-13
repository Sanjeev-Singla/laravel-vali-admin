@extends("users.layout.master")
@section("content")

<section class="login-content">
  <div class="logo">
    <h1>User Login</h1>
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
    <form class="login-form" action="{{ url('user/login-submit') }}" method="POST">
      @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
      <div class="form-group">
        <label class="control-label">E-MAIL</label>
        <input class="form-control" name="email" type="email" value="" placeholder="E-MAIL" required autofocus>
        @error('email')
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
  <!--Forgot Password-->
      <div class="form-group">
        <div class="utility">
          <div class="animated-checkbox">
            <label>
              Register<a href="{{ url('user/register') }}"> Sign Up</a>
            </label>
          </div>
          <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
        </div>
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block">SIGN IN<i class="fa fa-sign-in fa-lg fa-fw"></i></button>
      </div>
    </form>
    <form class="forget-form" action="" method="POST">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
        <div class="form-group">
            <label class="control-label">E-MAIL</label>
            <input class="form-control" name="email" type="email" placeholder="E-MAIL" required autofocus> 
        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
        </div>
        <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i>Back to Login</a></p>
        </div>
    </form>
  </div>
</section>

@endsection