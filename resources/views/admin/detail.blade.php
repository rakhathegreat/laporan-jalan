<x-layout>
    <x-slot:header>
        <div class="flex flex-col justify-between max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 gap-4">
            <div class="flex flex-col flex-wrap justify-start ">
                <p class="text-lg font-semibold text-gray-900">Detail</p>
            </div>
            <div class="flex flex-col flex-nowrap justify-start items-stretch gap-4">
                <x-input-container>
                    <x-input disabled value="{{ $dataJalan->nama }}">Nama Jalan</x-input>
                </x-input-container>
                <x-input-container-double>
                    <x-input disabled value="{{ $dataJalan->panjang }}">Panjang</x-input>
                    <x-input disabled value="{{ $dataJalan->lebar }}">Lebar</x-input>
                </x-input-container-double>
                <x-input-container>
                    <x-input disabled value="{{ $dataJalan->kondisi_jalan->kondisi }}">Kondisi Jalan</x-input>
                </x-input-container>
                <x-input-container>
                    <x-input disabled value="{{ $dataJalan->keterangan }}">Keterangan</x-input>
                </x-input-container>
                <x-input-container>
                    <x-input disabled value="{{ $dataJalan->alamat->kelurahan }}">Kelurahan</x-input>
                </x-input-container>
                <x-input-container-double>
                    <x-input disabled value="{{ $dataJalan->alamat->rt }}">RT</x-input>
                    <x-input disabled value="{{ $dataJalan->alamat->rw }}">RW</x-input>
                </x-input-container-double>
            </div>
            <div class="flex flex-col flex-nowrap justify-start items-stretch gap-4">
                <div class="bg-gray-400 w-full h-0.5"></div>
                <div>
                    <a href="/data-jalan" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-4 rounded">Kembali</a>
                    <a href="/data-jalan/{{ $dataJalan->id }}/edit" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-4 rounded">Edit</a>
                    <button class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded" id="deleteButton">
                        Hapus Data
                    </button>
                    <form id="formDelete" action="{{ route('data-jalan.destroy', $dataJalan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <x-confirm>Apakah anda yakin ingin menghapus data ini?</x-confirm>
                </div>
            </div>
        </div>
        
    </x-slot>
</x-layout>


<script>
    $(document).ready(function() {
        $('#deleteButton').click(async function() {
            const confirm = await confirmAction();

            if (confirm) {
                console.log("Confirmed!");
                document.getElementById('formDelete').submit();
            } else {
                console.log("Cancelled.");
            }
        });
    });
</script>
