
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - BULIK</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
  </head>
  <body  class=" border-top-wide border-success d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./logo.png" height="55" alt=""></a>
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form class="card card-md" method="POST" action="{{ route('login') }}">
        @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Silahkan Masuk</h2>
            @error('email')
            <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                  <div class="w-4">
                    <svg width="24" height="24">
                      <use xlink:href="./icons/tabler-sprite.svg#tabler-alert-circle" />
                    </svg>
                  </div>
                  <div>
                    {{ $message }}
                  </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>
            @enderror
            @error('password')
            <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                  <div class="w-4">
                    <svg width="24" height="24">
                      <use xlink:href="./icons/tabler-sprite.svg#tabler-alert-circle" />
                    </svg>
                  </div>
                  <div>
                    {{ $message }}
                  </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
              </div>
            @enderror
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input id="email" type="email" name="email" :value="old('email')" required autofocus class="form-control" placeholder="Ketikkan email">
            </div>
            <div class="mb-2">
              <label class="form-label">Password<span class="form-label-description">
                  {{-- <a href="./forgot-password.html">I forgot password</a> --}}
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control"  placeholder="Ketikkan Password"  autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="mb-2">
              {{-- <label class="form-check"> --}}
                {{-- <input id="remember_me" type="checkbox" name="remember" class="form-check-input"/> --}}
                {{-- <span class="form-check-label">Remember me on this device</span> --}}
              {{-- </label> --}}
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-success w-100">Sign in</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          {{-- Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a> --}}
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js"></script>
    <script src="./dist/js/demo.min.js"></script>
  </body>
</html>