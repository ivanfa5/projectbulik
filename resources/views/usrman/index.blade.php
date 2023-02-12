@extends('layouts.dash-layout')
@section('title', 'Management Akun')

@section('pagetitle')
<div class="row align-items-center">
  <div class="col">
    <!-- Page pre-title -->
    <h2 class="page-title">
      Management Akun
    </h2>
  </div>
  @can('isAdmin')
  <!-- Page title actions -->
  <div class="col-auto ms-auto d-print-none">
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-kodeperkiraan">
        <svg width="25" height="25" class="p-1">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-plus" />
        </svg>
        Tambah Akun
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
        <h5 class="modal-title">Tambah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('StoreUsrman') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Nama Akun</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Nama Akun" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Konfirmasi Password</label>
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password" required>
        </div>
        <label class="form-label">Jenis Akun</label>
        <div class="form-selectgroup-boxes row mb-3">
          <div class="col-lg-6">
            <label class="form-selectgroup-item">
              <input type="radio" name="role" id="role" value="user" class="form-selectgroup-input" checked required>
              <span class="form-selectgroup-label d-flex align-items-center p-3">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="form-selectgroup-title strong mb-1">User</span>
                  <span class="d-block text-muted">Akun User adalah jenis akun dasar dan hanya bisa membaca data di website</span>
                </span>
              </span>
            </label>
          </div>
          <div class="col-lg-6">
            <label class="form-selectgroup-item">
              <input type="radio" name="role" id="role" value="admin" class="form-selectgroup-input">
              <span class="form-selectgroup-label d-flex align-items-center p-3">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="form-selectgroup-title strong mb-1">Admin</span>
                  <span class="d-block text-muted">Akun Admin adalah jenis akun dengan segala akses yang ada di website</span>
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
        {{-- <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
          <svg width="25" height="25" class="p-1">
            <use xlink:href="./icons/tabler-sprite.svg#tabler-plus" />
          </svg>
          Tambah Kode Perkiraan
        </a> --}}
      </div>
    </form>
    </div>
  </div>
</div>
@endcan

@if ($errors->any())
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
        <div class="text-muted">Harap Pastikan Semua Kolom Terisi dengan benar.</div>
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
  <div class="card-body">
    <p>Halo {{ Auth::user()->name }}, Kamu sedang berada di halaman management akun secara global, jika kamu ingin menuju halaman akun milik mu silahkan klik tombol berikut.</p>
  </div>
  <!-- Card footer -->
  <div class="card-footer">
    <a href="{{ route('profile.edit') }}" class="btn btn-green">Profilku</a>
  </div>
</div>

<br>

<div class="card">
  <div class="table p-2">
    @livewire('user-table')
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