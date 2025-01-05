@extends('layouts.loginlay')

@section('content')
<section class="h-100 gradient-form" style="background-color: #ffffff;">
  <div class="container-xxl py-5 h-100 mt-custom-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="shadow rounded-3 text-cblak mt-custom-5">
          <!-- Back Button -->

          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card card-body p-md-3 md-3 mt-custom-5">
              <a href="/" class="btn  position-absolute top-0 start-0 m-3">
              <span class="fw-bold text-dark">
              <i class="bi bi-box-arrow-left"></i>
              </span>
              </a>
                <div class="text-center">
                  <h4 class=" mb-5 pb-2">Admin Log In</h4>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-outline mx-3">
                    <input type="email" id="email" name="email" class="form-control"
                      placeholder="Email address" />
                    <label class="form-label" for="email">Email Address</label>
                    @if($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                  </div>

                    <div class="form-outline mx-3">
                        <input type="password" id="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                        @if($errors->has('password'))
                            <div class="alert alert-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-check mb-5 mx-3">
                        <input class="form-check-input" type="checkbox" name="check_example" id="check_example">
                        <label class="form-check-label" for="check_example">
                        Keep me logged in
                        </label>
                    </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                      in</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Library Management System</h4>
                <p class="small mb-0">LMS adalah aplikasi berbasis web yang efisien untuk
                    pengelolaan perpustakaan dengan berbagai manfaat, baik untuk pengelola perpustakaan maupun
                    End User. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
