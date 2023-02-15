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
  {{-- @can('isAdmin') --}}
  <!-- Page title actions -->
  {{-- <div class="col-auto ms-auto d-print-none">
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-kodeperkiraan">
        <svg width="25" height="25" class="p-1">
          <use xlink:href="./icons/tabler-sprite.svg#tabler-plus" />
        </svg>
        Tambah Kode Perkiraan
      </a>
  </div> --}}
  {{-- @endcan --}}
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
      <h4 class="alert-title">Harap Mengolah Data Ulang Untuk Menyegarkan Data!</h4>
      <div class="text-muted">Teliti Sebelum Menggunakan Halaman Ini. Data Yang Tampil Mungkin Adalah Bekas Olah Data Sebelumnya Yang Tersimpan. Hiraukan Pesan Ini Jika Anda Baru Saja Mengolah Data.</div>
    </div>
  </div>
  <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
</div>

<div class="row row-cards">
  <div class="card col-12">
    <div class="card-header">
      <h4 class="card-title">Laporan Detail</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('OlahDetailLaporan') }}" method="POST">
      @csrf
      <div class="mb-6">
        <label class="form-label">Pilih Periode Yang Ingin Ditampilkan</label>
        <div class="row g-2">
          {{-- <div class="col-3">
          </div> --}}
          <div class="col-6">
            <select name="bulan" id="bulan" class="form-select">
              <option value="" selected disabled>Bulan</option>
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
          <div class="col-6">
            <select name="tahun" id="tahun" class="form-select">
              <option value="" selected disabled>Tahun</option>
              @for ($year=date('Y'); $year>=2020; $year--)
                <option value="{{ $year }}">{{ $year }}</option>
              @endfor
            </select>
          </div>
          <div class="d-flex">
            {{-- <a href="#" class="btn btn-link">Cancel</a> --}}
            {{-- <button type="submit" class="btn btn-danger">Hapus Hasil</button> --}}
            <button type="submit" class="btn btn-primary ms-auto">Olah Data</button>
          </div>
        </form>
        </div>
      </div>
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

@push('beforebody')
  @livewireScripts
  @powerGridScripts
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
        crossorigin="anonymous"></script>
@endpush