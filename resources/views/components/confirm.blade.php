
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>{{ $message }}</p>
      </div>
      <div class="modal-footer">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>


<script>
    async function confirmAction() {
        return new Promise((resolve) => {
            const confirm = document.getElementById('modal');
            const bsModal = new bootstrap.Modal(confirm);
            bsModal.show();

            document.getElementById('delete').addEventListener('click', () => {
                resolve(true);
                bsModal.hide();
            });
        });
    }
</script>