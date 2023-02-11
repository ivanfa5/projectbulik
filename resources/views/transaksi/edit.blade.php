
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
    <title>Edit Data Transaksi</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
  </head>
  <body >
    <div class="wrapper">
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          {{-- <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Empty page
                </h2>
              </div>
            </div>
          </div> --}}
        </div>
        <div class="page-body">
          <div class="container-xl">
            <!-- Content here -->
            <div class="modal modal-blur fade show" id="modal-report" tabindex="-1" role="dialog" aria-modal="true" style="display: block; padding-left: 0px;">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Transaksi</h5>
                    <a href="{{ route('IndexTransaksi') }}" class="btn btn-close" aria-label="Close">
                      
                    </a>
                    {{-- <button href="{{ route('IndexTransaksi') }}" type="button" class="btn-close" aria-label="Close"></button> --}}
                  </div>
                  <form action="{{ route('UpdateTransaksi', $datatransaksi->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Kode Transaksi</label>
                      <input disabled type="text" class="form-control" name="kodetransaksi" id="kodetransaksi" placeholder="Kode Transaksi" value="{{ $datatransaksi->kodetransaksi }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Tanggal Transaksi</label>
                      <input type="date" class="form-control" name="tanggaltransaksi" id="tanggaltransaksi" placeholder="Tanggal Transaksi" value="{{ $datatransaksi->tanggaltransaksi }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kode Perkiraan</label>
                      <select class="form-select" name="kdperkiraan" id="kdperkiraan" value="{{ $datatransaksi->kdperkiraan }}" required>
                        <option selected value="{{ $datatransaksi->kdperkiraan }}">Terpilih : {{ $datatransaksi->kdperkiraan }} - {{ $datatransaksi->panggilPerkiraan->namaperkiraan }}</option>
                          @foreach ($perkiraans as $perkiraan)
                            <option value="{{ $perkiraan->kodeperkiraan }}">{{ $perkiraan->kodeperkiraan }} - {{ $perkiraan->namaperkiraan }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="keterangan" value="{{ $datatransaksi->keterangan }}" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nominal</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text">
                          Rp
                        </span>
                        <input type="number" class="form-control" name="nominal" id="nominal" placeholder="nominal" value="{{ $nominal }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="{{ route('IndexTransaksi') }}" class="btn btn-link link-secondary">
                      Batal
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                      <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                        <path d="M16 5l3 3"></path>
                     </svg>
                      Simpan Perubahan
                    </button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <div class="modal-backdrop fade show"></div>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
  </body>
</html>