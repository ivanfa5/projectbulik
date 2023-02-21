@extends('layouts.dash-layout')
@section('title', 'Kode Perkiraan')

@section('pagetitle')
<div class="row align-items-center">
  <div class="col">
    <!-- Page pre-title -->
    <h2 class="page-title">
      Kode Perkiraan
    </h2>
  </div>
  @can('isAdmin')
  <!-- Page title actions -->
  <div class="col-auto ms-auto d-print-none">
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-kodeperkiraan">
        <svg width="25" height="25" class="p-1">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-plus" />
        </svg>
        Tambah Kode Perkiraan
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
<div class="modal modal-blur fade" id="modal-kodeperkiraan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kode Perkiraan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('StoreKodeperkiraan') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Kode Perkiraan</label>
          <input type="text" class="form-control" name="kodeperkiraan" id="kodeperkiraan" placeholder="Kode Perkiraan" required>
          <small class="form-hint">Kode Perkiraan Haruslah Terdiri Dari 3 Buah Angka & Unik. Contoh: 110.</small>
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Perkiraan</label>
          <input type="text" class="form-control" name="namaperkiraan" id="namaperkiraan" placeholder="Nama Perkiraan" required>
        </div>
        <label class="form-label">Jenis Perkiran</label>
        <div class="form-selectgroup-boxes row mb-3">
          <div class="col-lg-6">
            <label class="form-selectgroup-item">
              <input type="radio" name="jenisperkiraan" id="jenisperkiraan" value="debit" class="form-selectgroup-input" required>
              <span class="form-selectgroup-label d-flex align-items-center p-3">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="form-selectgroup-title strong mb-1">Debit</span>
                  <span class="d-block text-muted">Semua transaksi yang berjenis Debit adalah transaksi yang diterima atau pemasukan</span>
                </span>
              </span>
            </label>
          </div>
          <div class="col-lg-6">
            <label class="form-selectgroup-item">
              <input type="radio" name="jenisperkiraan" id="jenisperkiraan" value="kredit" class="form-selectgroup-input">
              <span class="form-selectgroup-label d-flex align-items-center p-3">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="form-selectgroup-title strong mb-1">Kredit</span>
                  <span class="d-block text-muted">Semua transaksi yang berjenis Kredit adalah transaksi yang dibayar atau keluar</span>
                </span>
              </span>
            </label>
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
    @livewire('perkiraan-table')
  </div>
</div>
{{-- <div class="modal-backdrop fade show"></div> --}}
@endsection

@push('beforebody')
  @livewireScripts
  @powerGridScripts
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
@endpush