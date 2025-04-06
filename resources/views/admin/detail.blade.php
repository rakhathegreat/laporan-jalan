<x-layout>
    <x-slot:header>
        <div class="flex flex-col justify-between max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 gap-4">
            <div class="flex flex-col flex-wrap justify-start">
                <div class="grid grid-cols-4 grid-rows-1 gap-4 border-b border-gray-400 pb-4">
                    <div class="col-span-2">
                        <p class="text-lg font-semibold text-gray-900">Detail</p>
                    </div>
                    <div class="col-span-2 col-start-3 flex justify-end gap-2">
                        <button class="btn btn-secondary" onclick="window.location.href='/data-jalan'">Kembali</button>
                        <button class="btn btn-primary" onclick="window.location.href='/data-jalan/{{ $dataJalan->id }}/edit'">Edit</button>
                        <button id="deleteButton" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</button>
                    </div>
                    <x-confirm title="Anda akan menghapus data ini" message="Apakah anda yakin ingin menghapus data ini?">
                        <button id="cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button id="delete" type="button" class="btn btn-danger">Hapus</button>
                    </x-confirm>
                </div>
            </div>
            <div class="grid grid-cols-5 grid-rows-5 gap-4">
                <div class="col-span-2 row-span-5">
                    <x-carousel></x-carousel>
                </div>
                <div class="col-span-3 row-span-5 col-start-3">
                    <div class="grid grid-cols-6 grid-rows-6 gap-2">
                        <div class="col-span-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Jalan</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $dataJalan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-3 row-start-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Panjang</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $dataJalan->panjang }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-3 col-start-4 row-start-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Lebar</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $dataJalan->lebar }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-6 row-start-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kondisi</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $dataJalan->kondisi_jalan->kondisi }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-6 row-start-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $dataJalan->keterangan }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-6 row-start-5">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kelurahan</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $dataJalan->alamat->kelurahan }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-3 row-start-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">RT</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $dataJalan->alamat->rt }}" disabled>
                            </div>
                        </div>
                        <div class="col-span-3 col-start-4 row-start-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">RW</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ $dataJalan->alamat->rw }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="/data-jalan/{{ $dataJalan->id }}" method="post" id="formDelete">
            @csrf
            @method('DELETE')
        </form>
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
