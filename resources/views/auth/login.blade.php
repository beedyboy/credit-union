@extends('layouts.master-mini')
@section('content')


<!-- <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <h2 style="font-weight: 500;">Express Union</h2>
  <p>Login to your bank</p>
    
</div> -->


<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/login_1.jpg') }}); background-size: cover;">

  <div class="row w-100">

    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper">
        <form class="login-form" action="/auth/login" method="post">
          @csrf
          <div class="form-group">
            <label class="label">Email</label>
            <div class="input-group">
              <input type="emaik" name="email" class="form-control" placeholder="Account Email Address" autofocus>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="label">Password</label>
            <div class="input-group">
              <input type="password"  name="password" class="form-control" placeholder="*********">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
          </div>
          <div class="form-group d-flex justify-content-between">
            <div class="form-check form-check-flat mt-0">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
            </div>
            <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
          </div>
          <div class="form-group">
            @if (session()->has('error'))
            {{ session('error') }}
            @elseif (session()->has('success'))
            {{ session('success') }}
            @endif
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
          </div>
        </form>
      </div>
      <ul class="auth-footer">
        <li>
          <a href="#">Conditions</a>
        </li>
        <li>
          <a href="#">Help</a>
        </li>
        <li>
          <a href="#">Terms</a>
        </li>
      </ul>
      <!-- <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p> -->
    </div>
  </div>
</div>
@endsection