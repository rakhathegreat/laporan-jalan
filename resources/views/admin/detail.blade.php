<x-layout>
    <x-slot:header>
        <div class="flex flex-col justify-between max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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
        </div>
    </x-slot>
</x-layout>