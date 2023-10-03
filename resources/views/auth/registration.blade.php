@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Register</div>
                  <div class="card-body">
  
                      <form action="{{ route('register.post') }}" method="POST" name="registration" id="registration">
                          @csrf
                          <!-- First name -->
                          <div class="form-group row">
                              <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="first_name" class="form-control" name="first_name" required autofocus>
                                  @if ($errors->has('first_name'))
                                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                  @endif
                              </div>
                          </div>

                          <!-- last name -->
                          <div class="form-group row">
                              <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="last_name" class="form-control" name="last_name" required >
                                  @if ($errors->has('last_name'))
                                      <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="mobile_no" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
                              <div class="col-md-6">
                                  <input type="text" id="mobile_no" class="form-control" name="mobile_no" required>
                                  @if ($errors->has('mobile_no'))
                                      <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                  @endif
                              </div>
                          </div>
  
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="confirm_password" class="form-control" name="confirm_password" required>
                                  @if ($errors->has('confirm_password'))
                                      <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="referral_code" class="col-md-4 col-form-label text-md-right">Referral Code</label>
                              <div class="col-md-6">
                                  <input type="password" id="referral_code" class="form-control" name="referral_code" required>
                                  @if ($errors->has('referral_code'))
                                      <span class="text-danger">{{ $errors->first('referral_code') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <!-- <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div> -->
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection