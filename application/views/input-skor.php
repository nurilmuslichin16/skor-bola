<div class="container mt-3">
    <form id="form-input-skor">
        <div class="row">
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Home)</div>
                    <label for="nama_klub_home" class="form-label">Nama Klub</label>
                    <select class="form-select" id="nama_klub_home" name="nama_klub_home">
                        <option value="" selected>Pilih Klub</option>
                        <?php foreach ($klub as $key) : ?>
                            <option value="<?= $key['nama_klub']; ?>"><?= $key['nama_klub']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div id="error_nama_klub_home" class="form-text" style="color: red; display: none;">Error Text</div>
                </div>
                <div class="mb-3">
                    <label for="score_home" class="form-label">Score</label>
                    <input type="number" class="form-control" id="score_home" name="score_home" placeholder="0">
                    <div id="error_score_home" class="form-text" style="color: red; display: none;">Error Text</div>
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
                    <label for="nama_klub_away" class="form-label">Nama Klub</label>
                    <select class="form-select" id="nama_klub_away" name="nama_klub_away">
                        <option value="" selected>Pilih Klub</option>
                        <?php foreach ($klub as $key) : ?>
                            <option value="<?= $key['nama_klub']; ?>"><?= $key['nama_klub']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div id="error_nama_klub_away" class="form-text" style="color: red; display: none;">Error Text</div>
                </div>
                <div class="mb-3">
                    <label for="score_away" class="form-label">Score</label>
                    <input type="number" class="form-control" id="score_away" name="score_away" placeholder="0">
                    <div id="error_score_away" class="form-text" style="color: red; display: none;">Error Text</div>
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
    $(document).ready(function() {
        $('#nama_klub_home').select2();
        $('#nama_klub_away').select2();
    });

    function save() {
        var url = "<?= base_url('inputskor/insert'); ?>";
        var form = $('#form-input-skor').serialize();

        $('#error_nama_klub_home').empty().hide();
        $('#error_nama_klub_away').empty().hide();
        $('#error_score_home').empty().hide();
        $('#error_score_away').empty().hide();

        $.ajax({
            url: url,
            type: "POST",
            data: form,
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    Swal.fire(
                        'Sukses!',
                        data.message,
                        'success'
                    ).then(() => {
                        $('#nama_klub_home').val("").trigger('change');
                        $('#nama_klub_away').val("").trigger('change');
                        $('#score_home').val("");
                        $('#score_away').val("");
                    })
                } else {
                    if (Array.isArray(data.message)) {
                        for (let index = 0; index < data.message.length; index++) {
                            const message = data.message[index];
                            const input = data.input[index];

                            $("#error_" + input).show().append(message);
                        }

                        Swal.fire(
                            'Peringatan!',
                            'Ada yang salah, coba cek lagi.',
                            'warning'
                        )
                    } else {
                        Swal.fire(
                            'Gagal!',
                            data.message,
                            'error'
                        )
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                Swal.fire(
                    'Server Error!',
                    'Error adding / update data.',
                    'error'
                )
            }
        })
    }
</script>