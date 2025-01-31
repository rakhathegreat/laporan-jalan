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
      <div class="my-4 flex justify-between">
        <button class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded" id="deleteButton">
          Hapus Data
        </button>
        <div class="flex gap-4 w-1/3">
            <x-popup class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-4 rounded" id="openPopup">
                Filter
                <x-slot name="content">
                    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
                        <p class="text-gray-700 text-lg font-semibold mb-4">Filter</p>
                        <form action="/data-jalan" method="get" name="filter">
                            <div class="grid grid gap-4 mb-4">
                                <div>
                                    <label for="kondisi" class="block text-gray-700 text-sm font-semibold mb-2">Kondisi</label>
                                    <select name="kondisi" id="kondisi" class="bg-white border border-gray-300 rounded-md text-sm py-2 px-3 w-full">
                                        @foreach (['', 'Baik', 'Rusak', 'Rusak Berat'] as $kondisi)
                                            <option value="{{ $kondisi }}" {{ request('kondisi') == $kondisi ? 'selected' : '' }}>{{ $kondisi ? $kondisi : 'None' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="kelurahan" class="block text-gray-700 text-sm font-semibold mb-2">Desa/Kelurahan</label>
                                    <select name="kelurahan" id="kelurahan" class="bg-white border border-gray-300 rounded-md text-sm py-2 px-3 w-full">
                                        @foreach (['', 'Banjar', 'Balokang', 'Jajawar', 'Neglasari', 'Mekarsari', 'Situbatu', 'Cibeureum'] as $kelurahan)
                                            <option value="{{ $kelurahan }}" {{ request('kelurahan') == $kelurahan ? 'selected' : '' }}>{{ $kelurahan ? $kelurahan : 'None' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="rt" class="block text-gray-700 text-sm font-semibold mb-2">RT</label>
                                    <select name="rt" id="rt" class="bg-white border border-gray-300 rounded-md text-sm py-2 px-3 w-full">
                                        @foreach (['', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $rt)
                                            <option value="{{ $rt }}" {{ request('rt') == $rt ? 'selected' : '' }}>{{ $rt ? $rt : 'None' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="rw" class="block text-gray-700 text-sm font-semibold mb-2">RW</label>
                                    <select name="rw" id="rw" class="bg-white border border-gray-300 rounded-md text-sm py-2 px-3 w-full">
                                        @foreach (['', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $rw)
                                            <option value="{{ $rw }}" {{ request('rw') == $rw ? 'selected' : '' }}>{{ $rw ? $rw : 'None' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-4 rounded" id="closePopup">
                                Apply
                            </button>
                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded" id="resetFilter">
                                Reset
                            </button>
                        </form>
                    </div>
                </x-slot>
            </x-popup>
            <form action="/data-jalan" method="get" name="search" class="w-full">
                <input class="border border-gray-500 rounded-md py-1.5 px-4 text-sm w-full focus:outline-none focus:border-gray-700" type="text" name="search" id="searchInput" placeholder="Cari data jalan..." autocomplete="off" value="{{ request('search') }}">
            </form>
        </div>
      </div>
      <table class="min-w-full bg-white" id="clickableTable">
        <thead>
          <tr class="border-b border-gray-300">
            <th class="py-3 pr-8 pl-4 text-left"><input type="checkbox" name="preference" value="selected" id="selectAll"></th>
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
              <!-- <td class="py-3 pr-6 text-left text-sm font-medium text-gray-900">{{ $loop->iteration }}</td> -->
              <td class="py-3 px-6 text-left text-sm font-medium text-gray-900">{{ $data->nama }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->rt }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->rw }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">{{ $data->kelurahan }}</td>
              <td class="py-3 px-6 text-left text-sm font-normal text-gray-600">
                <x-kondisi kondisi="{{$data->kondisi}}">
                    {{ $data->kondisi }}
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
            if (!firstColumn.contains(event.target)) {
                window.location.href = row.dataset.url; 
            } else {
                checkbox = row.querySelector("input[type='checkbox']");
                checkbox.checked = !checkbox.checked;
            }
        });
    });

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
</script>

<script>
    var reset = document.getElementById('resetFilter');
    var kondisi = document.getElementById('kondisi');
    var kelurahan = document.getElementById('kelurahan');
    var rt = document.getElementById('rt');
    var rw = document.getElementById('rw');

    reset.addEventListener('click', () => {
        kondisi.value = '';
        kelurahan.value = '';
        rt.value = '';
        rw.value = '';
    })
</script>

