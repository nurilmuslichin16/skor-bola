<div class="container mt-3">
    <form id="form-input-klub">
        <div class="row">
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Home)</div>
                    <label for="nama_klub" class="form-label">Nama Klub</label>
                    <input type="text" class="form-control" id="nama_klub" name="nama_klub" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="kota_klub" class="form-label">Score</label>
                    <input type="number" class="form-control" id="kota_klub" name="kota_klub" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-1">
                <h1 class="text-center" style="margin-top: 50px;">
                    vs
                    <i class="fas fa-futbol"></i>
                </h1>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Away)</div>
                    <label for="nama_klub" class="form-label">Nama Klub</label>
                    <input type="text" class="form-control" id="nama_klub" name="nama_klub" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="kota_klub" class="form-label">Score</label>
                    <input type="number" class="form-control" id="kota_klub" name="kota_klub" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-2 text-center" style="margin-top: 80px;">
                <a onclick="save()" class="btn btn-primary">Simpan</a>
            </div>
            <div class="col-5"></div>
        </div>
    </form>
</div>

<script>
    function save() {
        Swal.fire(
            'Sukses!',
            'Hasil Pertandingan berhasil disimpan',
            'success'
        )
    }
</script>