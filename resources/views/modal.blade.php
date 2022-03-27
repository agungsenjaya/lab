<!-- Modal Logout -->
<div id="modalLogout" class="modal fade" role="dialog" aria-labelledby="modalLogoutLabel" aria-hidden="true">
  <div class="modal-dialog rounded" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalDelLabel"><i class="bi bi-info-circle me-2"></i>Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="mb-0">Apakah anda yakin akan keluar akun?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout Now</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Logout -->

<!-- Modal Load -->
<div class="modal" id="modalLoad" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="modalLoadLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body text-center text-white">
        <div class="page-spinner"></div>
        <div>
          <span class="text-uppercase title-3">Loading..</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal End Load -->