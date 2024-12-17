@extends('layouts.user_type.guest')

@section('content')

  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-4">
      <div class="page-header align-items-start min-vh-50 pt-0 pb-10 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Selamat Datang</h1>
              <p class="text-lead text-white">Kamu bisa coba login menggunakan akun <b>admin@softui.com</b> dan password <b>secret</b> untuk mencoba aplikasi ini.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-left pt-4 pb-0">
                <h5>Login dulu ya</h5>
              </div>
              <div class="card-body pt-4">
                <form role="form text-left" method="POST" action="/session">
                  @csrf
                  {{-- <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon">
                    @error('name')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div> --}}
                  <label for="email">Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon" value="admin@softui.com">
                    @error('email')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <label for="password">Password</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="secret" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btx btx-primary w-100 my-4">Masuk</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
