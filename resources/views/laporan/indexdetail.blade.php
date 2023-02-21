@extends('layouts.dash-layout')
@section('title', 'Kode Perkiraan')

@section('pagetitle')
<div class="row align-items-center">
  <div class="col">
    <!-- Page pre-title -->
    <h2 class="page-title">
      Laporan Detail
    </h2>
  </div>
</div>
@endsection

@push('beforehead')
  @livewireStyles
  @powerGridStyles
@endpush

@section('content')
@if ($message = Session::get('error'))
  <div class="alert alert-warning alert-dismissible" role="alert">
    <div class="d-flex">
      <div class="p-2">
        <span class="text-warning">
        <svg width="24" height="24">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-alert-triangle" />
        </svg>
        </span>
      </div>
      <div>
        <h4 class="alert-title">Terdapat Masalah! Data Tidak Dapat Disimpan.</h4>
        <div class="text-muted">Harap Pastikan Semua Kolom Terisi dengan benar & Untuk Kode Perkiraan Haruslah Unik / Tidak Boleh Sama.</div>
      </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
  </div>
@endif
@if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <div class="d-flex">
      <div class="p-2">
        <span class="text-success">
        <svg width="24" height="24">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-checkbox" />
        </svg>
        </span>
      </div>
      <div>
        <h4 class="alert-title">Sukses!</h4>
        <div class="text-muted">Permintaan Data Berhasil Diproses.</div>
      </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
  </div>
@endif
@if ($message = Session::get('berhasil'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <div class="d-flex">
      <div class="p-2">
        <span class="text-success">
        <svg width="24" height="24">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-checkbox" />
        </svg>
        </span>
      </div>
      <div>
        <h4 class="alert-title">Sukses!</h4>
        <div class="text-muted">Permintaan Data Berhasil Diproses. Hasil Ditampilkan Pada Tabel Terkait.</div>
      </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
  </div>
@endif
<div class="alert alert-info alert-dismissible" role="alert">
  <div class="d-flex">
    <div class="p-2">
      <span class="text-info">
      <svg width="24" height="24">
        <use xlink:href="./icons/tabler-sprite.svg#tabler-info-circle" />
      </svg>
      </span>
    </div>
    <div>
      <h4 class="alert-title">Harap Bersihkan Data Terlebih Dahulu!</h4>
      <div class="text-muted">Teliti Sebelum Menggunakan Halaman Ini. Data Yang Tampil Mungkin Adalah Bekas Olah Data Sebelumnya Yang Tersimpan. Hiraukan Pesan Ini Jika Anda Baru Saja Mengolah Data.</div>
    </div>
  </div>
  <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
</div>


<div class="row row-cards">
  <div class="card col-12">
    <div class="card-header">
      <h3 class="card-title">Pilih Jangka Waktu</h3>
    </div>
    <form action="{{ route('OlahDetailLaporan') }}" method="POST">
    @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">Dari Tanggal</label>
            <div class="input-icon mb-2">
              <input class="form-control " name="tanggalawal" id="tanggalawal" placeholder="Tanggal Transaksi" value="{{old('tanggalawal')}}">
              <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="mb-3">
            <label class="form-label">Sampai Tanggal</label>
            <div class="input-icon mb-2">
              <input class="form-control " name="tanggalakhir" id="tanggalakhir" placeholder="Tanggal Transaksi" value="{{old('tanggalakhir')}}">
              <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card footer -->
    <div class="card-footer">
      <div class="d-flex">
        <a href="./laporandetailclear" class="btn btn-ghost-danger">Bersihkan Data</a>
        <button type="submit" class="btn btn-green ms-auto">Olah Data</button>
      </div>
    </div>
    </form>
  </div>
</div>
<br>


<div class="row row-cards">
  <div class="card col-12">
    <div class="card-header">
      <h4 class="card-title">Laporan Detail</h4>
    </div>
    <div class="card-footer">
      @livewire('laporandetail-table')
    </div>
  </div> 
</div>

<br>
<div class="row row-cards">
  <div class="card col-12">
  <div class="card-body">
    <div class="row align-items-center">
      <div class="col-auto ms-auto d-print-none">
        <h2 class="page-title">
          Ingin Melihat Data Keseluruhan?
        </h2>
      </div>
      <div class="col">
        
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="{{ route('IndexLaporanmaster') }}" class="btn btn-outline-primary w-100">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            Buka  Halaman Master Data Transaksi
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<script src="./dist/libs/litepicker/dist/litepicker.js"></script>
<script>
  // @formatter:on
  document.addEventListener("DOMContentLoaded", function () {
    window.Litepicker && (new Litepicker({
      element: document.getElementById('tanggalawal'),
      buttonText: {
        previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
        nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
      },
    }));
  });
</script>
<script>
  // @formatter:on
  document.addEventListener("DOMContentLoaded", function () {
    window.Litepicker && (new Litepicker({
      element: document.getElementById('tanggalakhir'),
      buttonText: {
        previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>`,
        nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>`,
      },
    }));
  });
</script>

@push('beforebody')
  @livewireScripts
  @powerGridScripts
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
@endpush