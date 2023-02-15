@extends('layouts.dash-layout')
@section('title', 'Kode Perkiraan')

@section('pagetitle')
<div class="row align-items-center">
  <div class="col">
    <!-- Page pre-title -->
    <h2 class="page-title">
      Master Data Laporan Transaksi
    </h2>
  </div>
</div>
@endsection

@push('beforehead')
  @livewireStyles
  @powerGridStyles
@endpush

@section('content')

<div class="row row-cards">
  <div class="card col-12">
    <div class="card-header">
      <h4 class="card-title">Master Data Laporan Transaksi</h4>
    </div>
    <div class="card-body">
      @livewire('laporan-table')
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