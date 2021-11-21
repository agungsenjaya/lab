<!-- Modal -->
<div id="modalLogout" class="modal fade" role="dialog" aria-labelledby="modalLogoutLabel" aria-hidden="true">
  <div class="modal-dialog rounded" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="mb-0">Apakah anda yakin akan keluar akun?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-lab" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout Now</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->