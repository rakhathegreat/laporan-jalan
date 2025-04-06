<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast text-bg-danger align-items-center flex" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body">
      {{ $slot }}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

<script>
    function alertAction() {
        const toast = document.getElementById('liveToast');
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
    }
</script>