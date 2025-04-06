<x-layout>
    <x-slot:header>
        <div class="flex justify-between items-center max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <p class="text-lg font-semibold text-gray-900">Data Jalan</p>
                <p class="max-w-xl text-gray-500 mt-2">Daftar semua jalan yang terdapat di Kelurahan Banjar, termasuk nama jalan, kondisi, dan informasi terkait lainnya.</p>
            </div>
            <div>
                <button class="btn btn-primary" onclick="window.location.href='/data-jalan/create'">Tambah Data</button>
            </div>
        </div>
    </x-slot>
    <div class="overflow-x-auto max-w-7xl mx-auto sm:px-6 lg:px-8 sticky top-0 z-10 bg-white">
      <div class="my-4 flex justify-between">
        <button id="deleteButton" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</button>
        <x-alert>Tidak ada data yang dipilih</x-alert>
        <x-confirm>Apakah anda yakin ingin menghapus data yang dipilih?</x-confirm>
        <div class="flex gap-4 w-1/3">
            <x-filter></x-filter>
            <form action="/data-jalan" method="get" name="search" class="w-full">
                <input name="search" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." value="{{ request('search') }}">
            </form>
        </div>
      </div>
      {{ $dataJalan->links() }}
      <table class="min-w-full bg-white" id="clickableTable">
        <thead>
          <tr class="border-b border-gray-300">
            <th class="py-3 pr-0 pl-4 text-left"><input type="checkbox" name="preference" value="selected" id="selectAll"></th>
            <th class="py-3 px-0 text-left text-sm font-semibold text-gray-900">No</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">Nama Jalan</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">RT</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">RW</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">Desa/Kelurahan</th>
            <th class="py-3 px-6 text-left text-sm font-semibold text-gray-900">Kondisi</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
          @foreach ($dataJalan as $data)
            <tr class=" border-b border-gray-200 hover:bg-gray-100" data-url="/data-jalan/{{ $data->id }}">
              <td class="pl-4"><input type="checkbox" name="preference" value="{{ $data->id }}"></td>
              <td class="py-3 pr-6 text-left text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
              <td class="py-3 px-6 text-left text-sm font-medium text-gray-900">{{ $data->nama }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->alamat->rt }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->alamat->rw }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->alamat->kelurahan }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">
                <x-kondisi kondisi="{{$data->kondisi_jalan->kondisi}}">
                    {{ $data->kondisi_jalan->kondisi }}
                </x-kondisi>
              </td>
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
            const checkbox = firstColumn?.querySelector("input[type='checkbox']");

            if (event.target === checkbox) {
                event.stopPropagation();
                return;
            }

            if (!firstColumn.contains(event.target)) {
                window.location.href = row.dataset.url;
                return;
            }

            if (checkbox) {
                checkbox.checked = !checkbox.checked;
            }
        });
    });


        $(function() {
            $('#selectAll').click(function() {
                $('input[name="preference"]').prop('checked', $(this).prop('checked'));
            });

            $('#deleteButton').click(async function(e) {
                e.preventDefault();

                let ids = [];
                $('input:checkbox[name="preference"]:checked').each(function() {
                    ids.push($(this).val());
                });

                if (ids.length === 0) {
                    alertAction();
                    return;
                }

                const confirmCheck = await confirmAction();
                if (!confirmCheck) {
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
</script>
