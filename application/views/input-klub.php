<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <form id="form-input-klub">
                <div class="mb-3">
                    <label for="nama_klub" class="form-label">Nama Klub</label>
                    <input type="text" class="form-control" id="nama_klub" name="nama_klub" aria-describedby="emailHelp">
                    <div id="error_nama_klub" class="form-text" style="color: red; display: none;">Error Text</div>
                </div>
                <div class="mb-3">
                    <label for="kota_klub" class="form-label">Kota Klub</label>
                    <input type="text" class="form-control" id="kota_klub" name="kota_klub" aria-describedby="emailHelp">
                    <div id="error_kota_klub" class="form-text" style="color: red; display: none;">Error Text</div>
                </div>
                <a onclick="save()" class="btn btn-primary">Simpan</a>
            </form>
        </div>
        <div class="col-6"></div>
    </div>
</div>

<script>
    function save() {
        var url = "<?= base_url('inputklub/insert'); ?>";
        var form = $('#form-input-klub').serialize();

        $('#error_nama_klub').empty().hide();
        $('#error_kota_klub').empty().hide();

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
                        $('#nama_klub').val("")
                        $('#kota_klub').val("")
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
                Swal.fire(
                    'Server Error!',
                    'Error adding / update data.',
                    'error'
                )
            }
        })
    }
</script>