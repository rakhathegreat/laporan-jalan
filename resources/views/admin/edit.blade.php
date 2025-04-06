<x-layout>
    <x-slot:header>
        <div class="flex flex-col justify-between max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 gap-4">
            <div class="flex flex-col flex-wrap justify-start ">
                <p class="text-lg font-semibold text-gray-900">Detail</p>
            </div>
            <div class="flex flex-col flex-nowrap justify-start items-stretch gap-4">
                <form id="formSave" action="/data-jalan/{{ $dataJalan->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-input-container>
                        <x-input name="nama" value="{{ $dataJalan->nama }}">Nama Jalan</x-input>
                    </x-input-container>
                    <x-input-container-double>
                        <x-input name="panjang" value="{{ $dataJalan->panjang }}">Panjang</x-input>
                        <x-input name="lebar" value="{{ $dataJalan->lebar }}">Lebar</x-input>
                    </x-input-container-double>
                    <x-input-container>
                        <x-input name="kondisi" value="{{ $dataJalan->kondisi_jalan->kondisi }}">Kondisi Jalan</x-input>
                    </x-input-container>
                    <x-input-container>
                        <x-input name="keterangan" value="{{ $dataJalan->keterangan }}">Keterangan</x-input>
                    </x-input-container>
                    <x-input-container>
                        <x-input name="kelurahan" value="{{ $dataJalan->alamat->kelurahan }}">Kelurahan</x-input>
                    </x-input-container>
                    <x-input-container-double>
                        <x-input name="rt" value="{{ $dataJalan->alamat->rt }}">RT</x-input>
                        <x-input name="rw" value="{{ $dataJalan->alamat->rw }}">RW</x-input>
                    </x-input-container-double>
                </form>
            </div>
            <div class="flex flex-col flex-nowrap justify-start items-stretch gap-4">
                <div class="bg-gray-400 w-full h-0.5"></div>
                <div>
                    <button id="saveButton" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-4 rounded">Simpan</button>
                    <a href="/data-jalan/{{ $dataJalan->id }}" class="bg-indigo-500 hover:bg-indigo-700 text-white text-sm font-bold py-2 px-4 rounded">Kembali</a>
                    <x-confirm>Apakah anda yakin ingin menyimpan perubahan ini?</x-confirm>
                </div>
            </div>
        </div>
        
    </x-slot>
</x-layout>


<script>
    $(document).ready(function() {
        $('#saveButton').click(async function() {
            const confirm = await confirmAction();

            if (confirm) {
                console.log("Confirmed!");
                document.getElementById('formSave').submit();
            } else {
                console.log("Cancelled.");
            }
        });
    });
</script>
