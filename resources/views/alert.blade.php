
<div class="position-fixed bottom-0 right-0 p-3 animate__animated animate__fadeInUp animate__faster" style="z-index: 5; right: 0; bottom: 0;">
@if(Session::has('success'))
  <div id="tSuccess" class="toast hide border-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
    <div class="toast-header border-0">
      <div class="btn-icon btn-xs btn btn-primary me-2 rounded-circle">
        <i class="ms-Icon ms-Icon--Accept btn-icon-inner"></i>
        </div>
        <span class="title-3 text-uppercase font-weight-bold text-primary me-auto">Success</span>
      <button type="button" class="ml-2 mb-1 close small" data-bs-dismiss="toast" aria-label="Close">
      <i class="ms-Icon ms-Icon--ChromeClose"></i>
      </button>
    </div>
    <div class="toast-body">
      <!-- Anda berhasil menambahkan data. -->
      {{ Session::get('success') }}
    </div>
  </div>
  @elseif(Session::has('failed'))
  <div id="tFailed" class="toast hide border-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
    <div class="toast-header border-0">
      <div class="btn-icon btn-xs btn btn-danger me-2 rounded-circle">
        <i class="ms-Icon ms-Icon--ChromeClose btn-icon-inner"></i>
        </div>
        <span class="title-3 text-uppercase font-weight-bold text-danger me-auto">Failed</span>
      <button type="button" class="ml-2 mb-1 close small" data-bs-dismiss="toast" aria-label="Close">
      <i class="ms-Icon ms-Icon--ChromeClose"></i>
      </button>
    </div>
    <div class="toast-body">
      <!-- Data gagal diinput, coba periksa kembali. -->
      {{ Session::get('failed') }}
    </div>
  </div>
  @endif
</div>