<x-layout>
    <x-slot:header>
        <div class="flex flex-col justify-between max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 gap-4">
            <div class="flex flex-col flex-wrap justify-start ">
                <p class="text-lg font-semibold text-gray-900">Ubah Data</p>
            </div>
            <div class="flex flex-col flex-nowrap justify-start items-stretch gap-4">
                <form id="formSave" action="/data-jalan/{{ $dataJalan->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-span-3 row-span-5 col-start-3">
                        <div class="grid grid-cols-6 grid-rows-6 gap-2">
                            <div class="col-span-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Jalan</label>
                                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="{{ $dataJalan->nama }}">
                                </div>
                            </div>
                            <div class="col-span-3 row-start-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Panjang</label>
                                    <input type="number" name="panjang" class="form-control" id="exampleFormControlInput1" value="{{ $dataJalan->panjang }}">
                                </div>
                            </div>
                            <div class="col-span-3 col-start-4 row-start-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Lebar</label>
                                    <input type="number" name="lebar" class="form-control" id="exampleFormControlInput1" value="{{ $dataJalan->lebar }}">
                                </div>
                            </div>
                            <div class="col-span-6 row-start-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kondisi</label>
                                    <select name="kondisi" class="form-select" aria-label="Default select example">
                                        <option value="{{ $dataJalan->kondisi_jalan->kondisi }}" selected>{{ $dataJalan->kondisi_jalan->kondisi }}</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                        <option value="Rusak Berat">Rusak Berat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-6 row-start-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="exampleFormControlInput1" value="{{ $dataJalan->keterangan }}">
                                </div>
                            </div>
                            <div class="col-span-6 row-start-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kelurahan</label>
                                    <input type="text" name="kelurahan" class="form-control" id="exampleFormControlInput1" value="{{ $dataJalan->alamat->kelurahan }}">
                                </div>
                            </div>
                            <div class="col-span-3 row-start-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">RT</label>
                                    <select name="rt" class="form-select" aria-label="Default select example">
                                        <option selected>{{ $dataJalan->alamat->rt }}</option>
                                        @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $rt)
                                            <option value="{{ $rt }}">{{ $rt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-3 col-start-4 row-start-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">RW</label>
                                    <select name="rw" class="form-select" aria-label="Default select example">
                                        <option selected>{{ $dataJalan->alamat->rw }}</option>
                                        @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $rw)
                                            <option value="{{ $rw }}">{{ $rw }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col flex-nowrap justify-start items-stretch gap-4">
                <div class="bg-gray-400 w-full h-0.5"></div>
                <div>
                    <button id="saveButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='/data-jalan/{{ $dataJalan->id }}' ">Batal</button>
                    <x-confirm title="Anda akan menyimpan perubahan" message="Apakah anda yakin ingin menyimpan perubahan ini?">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="button" id="confirm" class="btn btn-primary">Simpan</button>
                    </x-confirm>
                </div>
            </div>
        </div>
        
    </x-slot>
</x-layout>


<script>
    async function showConfirmationModal() {
        return new Promise((resolve) => {
            const confirm = document.getElementById('modal');
            const bsModal = new bootstrap.Modal(confirm);
            bsModal.show();

            document.getElementById('confirm').addEventListener('click', () => {
                resolve(true);
                bsModal.hide();
            });
        });
    }

    document.getElementById('saveButton').addEventListener('click', async () => {
        const confirmed = await showConfirmationModal();

        if (confirmed) {
            console.log("Confirmed!");
            document.getElementById('formSave').submit();
            successAction();
        } else {
            console.log("Cancelled.");
        }
    });
</script>
