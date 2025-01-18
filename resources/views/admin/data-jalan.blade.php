<x-layout>
    <x-slot:header>
        <div class="flex justify-between items-center max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <p class="text-lg font-semibold text-gray-900">Data Jalan</p>
                <p class="max-w-xl text-gray-500 mt-2">Daftar semua jalan yang terdapat di Kelurahan Banjar, termasuk nama jalan, kondisi, dan informasi terkait lainnya.</p>
            </div>
            <div>
                <a href="data-jalan/create" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-4 rounded">Tambah Data</a>
            </div>
        </div>
    </x-slot>
    <div class="overflow-x-auto max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="my-4">
        <button class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-1.5 px-4 rounded" id="deleteButton">
          Hapus Data
        </button>
      </div>
      <table class="min-w-full bg-white" id="clickableTable">
        <thead>
          <tr class="border-b border-gray-300">
            <th class="py-3 pr-8 pl-4"><input type="checkbox" name="preference" value="selected" id="selectAll"></th>
            <th class="py-3 pr-6 text-left text-sm font-semibold text-gray-900">No</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">Nama Jalan</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">Lebar (m)</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">Panjang (m)</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">Kondisi</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">Alamat</th>
            <!-- <th><input class="border border-gray-300 text-sm font-normal py-1 px-4 rounded" placeholder="Search" type="text"></th> -->
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
          @foreach ($dataJalan as $data)
            <tr class=" border-b border-gray-200 hover:bg-gray-100" data-url="/data-jalan/{{ $data->id }}">
              <td class="pl-4"><input type="checkbox" name="preference" value="{{ $data->id }}"></td>
              <td class="py-3 pr-6 text-left text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
              <td class="py-3 px-6 text-left text-sm font-medium text-gray-900">{{ $data->nama }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->lebar }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->panjang }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">
                <x-kondisi kondisi="{{ $data->kondisi }}">
                    {{ $data->kondisi }}
                </x-kondisi>
              </td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->alamat }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <form action="/data-jalan/67892e5e966836393c05735e" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
    </form>
</x-layout>

<script>

    /* 
    *  Clickable table
    */

    const rows = document.querySelectorAll("#clickableTable tr[data-url]");

    rows.forEach(row => {
        row.style.cursor = "pointer";
        row.addEventListener("click", (event) => {
            const firstColumn = row.querySelector("td:first-child");
            if (!firstColumn.contains(event.target)) {
                window.location.href = row.dataset.url; 
            }
        });
    });

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
              alert('Pilih minimal satu data untuk dihapus!');
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
                  alert('Data berhasil dihapus!');
              },
              error: function(xhr) {
                  alert('Terjadi kesalahan saat menghapus data!');
                  console.error(xhr.responseText);
              }
          });
      });

      $(document).ready(function() {
          $('input[type="checkbox"]').prop('checked', false);
      });
  });

</script>
