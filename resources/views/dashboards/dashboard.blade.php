@extends('layouts.dash-layout')
@section('title', 'Beranda')

@section('pagetitle')
<div class="row align-items-center">
  <div class="col">
    <!-- Page pre-title -->
    <div class="page-pretitle">
      Selamat Datang!
    </div>
    <h2 class="page-title">
      {{ Auth::user()->name }}
    </h2>
  </div>
</div>
@endsection

@section('content')
  <div class="col-12">
    <div class="card card-active text-center">
      <div class="card-body">
        <!-- Page pre-title -->
      <div class="title">
        <h2 class="h-3">Bulik</h2>
      </div>
      <div class="page-pretitle">
        Pembukuan Elektronik
      </div>
      </div>
    </div>
  </div>

  {{-- <br> --}}
  {{-- <div class="row row-cards">
  <div class="col-md-6 col-xl-3">
    <div class="card card-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
              <svg width="24" height="24">
                <use xlink:href="./icons/tabler-sprite.svg#tabler-list-numbers" />
              </svg>
            </span>
          </div>
          <div class="col">
            <div class="font-weight-medium">
              132
            </div>
            <div class="text-muted">
              Jumlah Kode Perkiraan
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card card-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
              <svg width="24" height="24">
                <use xlink:href="./icons/tabler-sprite.svg#tabler-report-money" />
              </svg>
            </span>
          </div>
          <div class="col">
            <div class="font-weight-medium">
              132
            </div>
            <div class="text-muted">
              Transaksi Pemasukan
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card card-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
              <svg width="24" height="24">
                <use xlink:href="./icons/tabler-sprite.svg#tabler-report-money" />
              </svg>
            </span>
          </div>
          <div class="col">
            <div class="font-weight-medium">
              132
            </div>
            <div class="text-muted">
              Transaksi Pengeluaran
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card card-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
              <svg width="24" height="24">
                <use xlink:href="./icons/tabler-sprite.svg#tabler-users" />
              </svg>
            </span>
          </div>
          <div class="col">
            <div class="font-weight-medium">
              132
            </div>
            <div class="text-muted">
              Pengguna
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div> --}}

  <br>
  <div class="row align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <p class="h-1">
        Semoga Harimu Menyenangkan!
      </p>
      <h2 class="page-title">
        Mari Kita Mulai
      </h2>
    </div>
  </div>
  <br>
  <div class="card">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-auto ms-auto d-print-none">
          <h2 class="page-title">
            1
          </h2>
        </div>
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Langkah Pertama
          </div>
          <h2 class="page-title">
            Inisialisasi Kode Perkiraan
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <a href="{{ route('IndexKodeperkiraan') }}" class="btn btn-outline-primary w-100">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              Buka Halaman
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="card">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-auto ms-auto d-print-none">
          <h2 class="page-title">
            2
          </h2>
        </div>
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Langkah Kedua
          </div>
          <h2 class="page-title">
            Tambahkan Data Transaksi
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <a href="{{ route('IndexTransaksi') }}" class="btn btn-outline-primary w-100">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              Buka Halaman
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="card">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-auto ms-auto d-print-none">
          <h2 class="page-title">
            3
          </h2>
        </div>
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Langkah Ketiga
          </div>
          <h2 class="page-title">
            Lihat Laporan Detail / Group
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <a href="{{ route('IndexLaporandetail') }}" class="btn btn-outline-primary w-100">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              Buka Halaman
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('beforebody')
  <!-- Tabler Core -->
  <script src="./dist/js/tabler.min.js"></script>
  <script src="./dist/js/demo.min.js"></script>
  @endpush
  
@endsection