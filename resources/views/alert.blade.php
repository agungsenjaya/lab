<div class="position-fixed p-3 animate__animated animate__fadeInUp animate__faster justify-content-center d-flex" style="z-index: 5; right: 0; left:0; bottom: 0;">
@if(Session::has('success'))
<div id="liveToast" class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header bg-transparent text-white">
    <strong class="me-auto"> <i class="bi bi-check-circle-fill me-2"></i>Success</strong>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{ Session::get('success') }}
  </div>
</div>
@elseif(Session::has('failed'))
<div id="liveToast" class="toast bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header bg-transparent text-white">
    <strong class="me-auto"> <i class="bi bi-x-circle-fill me-2"></i>Failed</strong>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{ Session::get('failed') }}
  </div>
</div>
@endif
<div id="ToastPrice" class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header bg-transparent text-white">
    <strong class="me-auto"> <i class="bi bi-check-circle-fill me-2"></i>Success</strong>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
      Harga berhasil diinput
  </div>
</div>
</div>