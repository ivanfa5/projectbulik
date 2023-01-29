
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title')</title>
    <!-- SCRIPT files -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> --}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script> --}}

    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"> --}}
    
    @stack('beforehead')
  </head>
  <body>
    <div class="wrapper">
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="/dashboard">
              <img src="./logo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
              <svg width="24" height="24">
                <use xlink:href="./icons/tabler-sprite.svg#tabler-moon" />
              </svg>
            </a>
            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
              <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
              <svg width="24" height="24">
                <use xlink:href="./icons/tabler-sprite.svg#tabler-sun" />
              </svg>
            </a>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <svg width="24" height="24">
                  <use xlink:href="./icons/tabler-sprite.svg#tabler-user-circle" />
                </svg>
                <div class="d-none d-xl-block ps-2">
                  <div class="mt-1 small text-muted">Halo!</div>
                  <div>{{ Auth::user()->name }}</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">Profile & account</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" type="submit" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
              <ul class="navbar-nav">
                <li class="nav-item {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('dashboard') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg width="24" height="24">
                        <use xlink:href="./icons/tabler-sprite.svg#tabler-home" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Beranda
                    </span>
                  </a>
                </li>
                <li class="nav-item {{ (request()->is('kodeperkiraan*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('IndexKodeperkiraan') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg width="24" height="24">
                        <use xlink:href="./icons/tabler-sprite.svg#tabler-list-numbers" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Kode Perkiraan
                    </span>
                  </a>
                </li>
                <li class="nav-item {{ (request()->is('transaksi*')) ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('IndexTransaksi') }}" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                      <svg width="24" height="24">
                        <use xlink:href="./icons/tabler-sprite.svg#tabler-playlist-add" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Data Transaksi
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./index.html" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg width="24" height="24">
                        <use xlink:href="./icons/tabler-sprite.svg#tabler-report-analytics" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Laporan
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./index.html" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                      <svg width="24" height="24">
                        <use xlink:href="./icons/tabler-sprite.svg#tabler-users" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Managemen Akun
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>
      <div class="page-wrapper">
        <div class="container-xl">
          <div class="page-header d-print-none">
            @yield('pagetitle')
          </div>
          </div>
          <div class="page-body">
            <div class="container-xl">
                <!-- Content here -->
                @yield('content')
            </div>
          </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">Tema Oleh Tabler</a></li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    <a href="." class="link-secondary">Bulik</a>.
                    All rights reserved.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <script src="./dist/libs/apexcharts/dist/apexcharts.min.js"></script>

    @stack('beforebody')
  </body>
</html>