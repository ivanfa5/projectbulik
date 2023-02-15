
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
              <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-status bg-danger"></div>
                  <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                    <h3>Apakah Anda Yakin?</h3>
                    <div class="text-muted">Perlu diperhatikan bahwa anda akan menghapus <br>
                      Kode perkiraan : {{ $dataperkiraan->kodeperkiraan }}<br>
                      Nama Perkiraan : {{ $dataperkiraan->namaperkiraan }}</div>
                      <br>
                      <h3>Semua data transaksi yang terkait atau memiliki kode tersebut juga akan ikut terhapus!</h3>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('DestroyKodeperkiraan',$dataperkiraan->id) }}" method="POST">
                    <div class="w-100">
                      <div class="row">
                        <div class="col"><a href="{{ route('IndexKodeperkiraan') }}" class="btn w-100">
                            Batal
                          </a></div>
                        <div class="col">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">
                            Yakin Untuk Hapus
                          </button>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
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