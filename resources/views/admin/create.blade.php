<x-layout>
    <x-slot:header>
        <div class="flex flex-col justify-between max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <p class="text-lg font-semibold text-gray-900">Tambah Data Jalan</p>
            <p class="max-w-xl text-gray-500 mt-2">Silahkan isi data-data jalan yang ingin ditambahkan.</p>
        </div>
        <div class="flex flex-col justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 gap-4">
            <div class="flex flex-col flex-nowrap justify-start items-stretch gap-4">
                <form id="formCreate" action="/data-jalan" method="POST">
                    @csrf
                    <div class="col-span-3 row-span-5 col-start-3">
                        <div class="grid grid-cols-6 grid-rows-6 gap-2">
                            <div class="col-span-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Jalan</label>
                                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama Jalan">
                                </div>
                            </div>
                            <div class="col-span-3 row-start-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Panjang</label>
                                    <input type="number" name="panjang" class="form-control" id="exampleFormControlInput1" placeholder="Panjang">
                                </div>
                            </div>
                            <div class="col-span-3 col-start-4 row-start-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Lebar</label>
                                    <input type="number" name="lebar" class="form-control" id="exampleFormControlInput1" placeholder="Lebar">
                                </div>
                            </div>
                            <div class="col-span-6 row-start-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kondisi</label>
                                    <select name="kondisi" class="form-select" aria-label="Default select example">
                                        <option value=" " selected>-- Pilih Kondisi --</option>
                                        <option value="1">Baik</option>
                                        <option value="2">Rusak</option>
                                        <option value="3">Rusak Berat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-6 row-start-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Keterangan">
                                </div>
                            </div>
                            <div class="col-span-6 row-start-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kelurahan</label>
                                    <input type="text" name="kelurahan" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Kelurahan">
                                </div>
                            </div>
                            <div class="col-span-3 row-start-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">RT</label>
                                    <select name="rt" class="form-select" aria-label="Default select example">
                                        <option value="" selected>-- Pilih RT --</option>
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
                                        <option value="" selected>-- Pilih RW --</option>
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
            <div class="flex justify-end gap-2 pb-4">
                <button class="btn btn-secondary" onclick="window.location.href='/data-jalan'">Kembali</button>
                <button id="saveButton" class="btn btn-primary">Simpan</button>
                <x-confirm title="Anda akan menyimpan perubahan" message="Apakah anda yakin ingin menyimpan perubahan ini?">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" id="confirm" class="btn btn-primary">Simpan</button>
                </x-confirm>
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
            document.getElementById('formCreate').submit();
            successAction();
        } else {
            console.log("Cancelled.");
        }
    });
</script>