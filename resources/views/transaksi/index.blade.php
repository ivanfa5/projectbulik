@extends('layouts.dash-layout')
@section('title', 'Transaksi')

@section('pagetitle')
<div class="row align-items-center">
  <div class="col">
    <!-- Page pre-title -->
    <h2 class="page-title">
      Transaksi
    </h2>
  </div>
  @can('isAdmin')
  <!-- Page title actions -->
  <div class="col-auto ms-auto d-print-none">
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-transaksi">
        <svg width="25" height="25" class="p-1">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-plus" />
        </svg>
        Tambah Transaksi
      </a>
  </div>
  @endcan
</div>
@endsection

@push('beforehead')
  @livewireStyles
  @powerGridStyles
@endpush

@section('content')
@can('isAdmin')
<div class="modal modal-blur fade" id="modal-transaksi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('StoreTransaksi') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Kode Transaksi</label>
          <input type="text" class="form-control" name="kodetransaksi" id="kodetransaksi" placeholder="Kode Transaksi" value="{{ $code }}" required>
          <small class="form-hint">Kode Transaksi Haruslah Terdiri Dari 8 Buah Karakter dengan format tahun, bulan, 4 angka & Unik. Contoh: T23011405.</small>
        </div>
        <div class="mb-3">
          <label class="form-label">Tanggal Transaksi</label>
          <div class="input-icon mb-2">
            <input class="form-control " name="tanggaltransaksi" id="tanggaltransaksi" placeholder="Tanggal Transaksi"/>
            <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
            </span>
          </div>
        </div>
        <div class="form-group mb-3 ">
          <label class="form-label">Kode Perkiraan</label>
          <div>
            <select class="form-select" name="kdperkiraan" id="kdperkiraan" required>
              <option selected disabled>-- Pilih Kode Perkiraan --</option>
                @foreach ($perkiraans as $perkiraan)
                  <option value="{{ $perkiraan->kodeperkiraan }}">{{ $perkiraan->kodeperkiraan }} - {{ $perkiraan->namaperkiraan }}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Keterangan</label>
          <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Nominal</label>
          <div class="input-group mb-2">
            <span class="input-group-text">
              Rp
            </span>
            <input type="number" class="form-control" name="nominal" id="nominal" placeholder="nominal" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">
          <svg width="25" height="25" class="p-1">
            <use xlink:href="./icons/tabler-sprite.svg#tabler-plus" />
          </svg>
          Simpan
        </button>
      </div>
    </form>
    </div>
  </div>
</div>
@endcan

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

<div class="card">
  <div class="table p-2">
    @livewire('transaksi-table')
  </div>
</div>
{{-- <div class="modal-backdrop fade show"></div> --}}
@endsection

<script src="./dist/libs/litepicker/dist/litepicker.js"></script>
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.Litepicker && (new Litepicker({
      element: document.getElementById('tanggaltransaksi'),
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