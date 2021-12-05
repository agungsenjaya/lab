<div class="position-fixed p-3 animate__animated animate__fadeInUp animate__faster" style="z-index: 5; right: 0; bottom: 0;">
@if(Session::has('success'))
<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header text-lab">
    <!-- <img src="..." class="rounded me-2" alt="..."> -->
    <i class="bi bi-bell-fill me-2"></i>
    <span class="me-auto title-3 fw-bold text-uppercase">Success</span>
    <small class="text-muted">Now</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{ Session::get('success') }}
  </div>
</div>
@elseif(Session::has('failed'))
<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <!-- <img src="..." class="rounded me-2" alt="..."> -->
    <i class="bi bi-bell-fill me-2"></i>
    <span class="me-auto title-3 fw-bold text-uppercase">Failed</span>
    <small class="text-muted">Now</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{ Session::get('failed') }}
  </div>
</div>
@endif
</div>