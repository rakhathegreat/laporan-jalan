<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
  Filter
</button>

<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Filter Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/data-jalan" method="get" name="filter">
            <div class="flex flex-col flex-nowrap justify-start items-stretch gap-2">
                <div>
                    <label for="kondisi" class="form-label text-sm">Kondisi</label>
                    <select id="kondisi" name="kondisi" class="form-select form-select-sm" aria-label="Default select example">
                        <option value="" selected>-- Pilih Kondisi --</option>
                        @foreach (['Baik', 'Rusak', 'Rusak Berat'] as $kondisi)
                            <option value="{{ $kondisi }}" {{ request('kondisi') == $kondisi ? 'selected' : '' }}>{{ $kondisi }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="kelurahan" class="form-label text-sm">Desa/Kelurahan</label>
                    <select id="kelurahan" name="kelurahan" class="form-select form-select-sm" aria-label="Default select example">
                        <option value="" selected>-- Pilih Kelurahan --</option>
                        @foreach (['Banjar', 'Balokang', 'Jajawar', 'Neglasari', 'Mekarsari', 'Situbatu', 'Cibeureum'] as $kelurahan)
                            <option value="{{ $kelurahan }}" {{ request('kelurahan') == $kelurahan ? 'selected' : '' }}>{{ $kelurahan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-row gap-4">
                    <div>
                        <label for="rt" class="form-label text-sm">RT</label>
                        <select id="rt" name="rt" class="form-select form-select-sm" aria-label="Default select example">
                            <option value="" selected>-- Pilih RT --</option>
                            @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $rt)
                                <option value="{{ $rt }}" {{ request('rt') == $rt ? 'selected' : '' }}>{{ $rt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="rw" class="form-label text-sm">RW</label>
                        <select id="rw" name="rw" class="form-select form-select-sm" aria-label="Default select example">
                            <option value="" selected>-- Pilih RW --</option>
                            @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $rw)
                                <option value="{{ $rw }}" {{ request('rw') == $rw ? 'selected' : '' }}>{{ $rw }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id="reset" type="button" class="btn btn-primary">Reset</button>
        <button id="apply" type="button" class="btn btn-primary">Apply</button>
      </div>
    </div>
  </div>
</div>

<script>
    var reset = document.getElementById('reset');
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

    var apply = document.getElementById('apply');
    apply.addEventListener('click', () => {
        document.forms['filter'].submit();
    })
</script>
