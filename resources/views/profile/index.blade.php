@extends('layouts.dash-layout')
@section('title', 'Profil & Akun')

@section('pagetitle')
<div class="row align-items-center">
  <div class="col">
    <!-- Page pre-title -->
    <h2 class="page-title">
      Profil & Akun
    </h2>
  </div>
</div>
@endsection

@section('content')
@if (session('status') === 'profile-updated')
  <div class="alert alert-important alert-success alert-dismissible" role="alert">
    <div class="d-flex">
      <div class="w-4">
        <svg width="24" height="24">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-check" />
        </svg>
      </div>
      <div>
        Informasi Akun Berhasil Disimpan!
      </div>
    </div>
    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
  </div>
  @endif

  @if (session('status') === 'password-updated')
  <div class="alert alert-important alert-success alert-dismissible" role="alert">
    <div class="d-flex">
      <div class="w-4">
        <svg width="24" height="24">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-check" />
        </svg>
      </div>
      <div>
        Sandi Berhasil Diubah
      </div>
    </div>
    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
  </div>
  @endif

  <div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Informasi Akun</h3>
      </div>
      <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
      </form>
      <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('patch')
          <div class="form-group mb-3 ">
            <label class="form-label">Nama</label>
            <div>
              <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}" required autofocus autocomplete="name">
              {{-- <small class="form-hint">We'll never share your email with anyone else.</small> --}}
            </div>
          </div>
          <div class="form-group mb-3 ">
            <label class="form-label">Email</label>
            <div>
              <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" required autofocus autocomplete="email">
              {{-- <small class="form-hint">We'll never share your email with anyone else.</small> --}}
            </div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-green">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ganti Password</h3>
      </div>
      <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
      </form>
      <div class="card-body">
        <form action="{{ route('password.update') }}" method="POST">
          @csrf
          @method('put')
          <div class="form-group mb-3 ">
            <label class="form-label">Sandi Sekarang</label>
            <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
          </div>
          <div class="form-group mb-3 ">
            <label class="form-label">Sandi Baru</label>
            <input id="password" name="password" type="password" class="form-control" autocomplete="new-password">
          </div>
          <div class="form-group mb-3 ">
            <label class="form-label">Konfirmasi Sandi</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-green">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection