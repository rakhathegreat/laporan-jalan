/* 
*  Hapus data
*/

    $(function() {
      $('#selectAll').click(function() {
          $('input[name="preference"]').prop('checked', $(this).prop('checked'));
      });

      $('#deleteButton').click(function(e) {
          e.preventDefault();

          let ids = [];
          $('input:checkbox[name="preference"]:checked').each(function() {
              ids.push($(this).val());
          });

          if (ids.length === 0) {
              alert('Tidak ada data yang dipilih.');
              return;
          }

          if (!confirm('Apakah Anda yakin ingin menghapus data yang dipilih?')) {
              return;
          }

          $.ajax({
              url: "{{ route('data-jalan.delete') }}", 
              type: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  _method: 'DELETE',
                  ids: ids
              },
              success: function(response) {
                  $.each(ids, function(index, id) {
                      $('tr[data-url="/data-jalan/' + id + '"]').remove();
                  });
              },
              error: function(xhr) {
                  console.error(xhr.responseText);
              }
          });
      });

      $(document).ready(function() {
          $('input[type="checkbox"]').prop('checked', false);
      });
  });