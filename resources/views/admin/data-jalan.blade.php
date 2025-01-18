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
      <table class="min-w-full bg-white" id="clickableTable">
        <thead>
          <tr class="border-b border-gray-300">
            <th class="py-3 pr-8 pl-4"><input type="checkbox" name="preference" value="selected"></th>
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
              <td class="pl-4"><input type="checkbox" name="preference" value="selected"></td>
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
</x-layout>

<script>
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

    const all = document.querySelectorAll("#clickableTable input[name=preference]");
    const checkAll = document.querySelector("#clickableTable input[name=preference]:first-child");
    
    checkAll.addEventListener("click", (event) => {
        const checked = event.target.checked;
        all.forEach(input => {
            input.checked = checked;
        });
    });
</script>
