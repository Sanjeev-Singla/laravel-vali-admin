@extends("users.layout.master")
@section("content")

<section class="login-content">
  <div class="logo">
    <h1>Regitration</h1>
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

  <div style="width: 30%">
    <div class="tile">
      <div class="tile-body">
        <form method="POST" action="{{ url('user/register-submit') }}">
          @csrf
          <h3 class="login-head" style="text-align: center;"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP</h3><hr>
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter full name" required="">
            @error('name')
              <li class="text-danger">{{ $message }}</li>
            @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Phone</label>
            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" required>
          @error('phone')
            <li class="text-danger">{{ $message }}</li>
          @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" required>
          @error('email')
            <li class="text-danger">{{ $message }}</li>
          @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
          @error('password')
            <li class="text-danger">{{ $message }}</li>
          @enderror
          </div>

          <div class="form-group">
            <label class="control-label">Confirm Password</label>
            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
          @error('confirm_password')
            <li class="text-danger">{{ $message }}</li>
          @enderror
          </div>
          
          <div class="form-group">
            <label class="control-label">Gender</label>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" value="male" required>Male
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" value="female">Female
              </label>
            </div>
          </div>
          
          <div class="tile-footer">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>
          </div>
        </form>
        <div class="form-group" style="text-align: center;margin-top: 20px;">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  Already Registered?<a href="{{ url('user/login') }}"> Sign In</a>
                </label>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

@endsection