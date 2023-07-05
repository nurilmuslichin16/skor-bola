<div class="container mt-3">
    <form id="form-input-skor">
        <div class="row">
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Home)</div>
                    <label for="nama_klub_home0" class="form-label">Nama Klub</label>
                    <select class="form-select" id="nama_klub_home0" name="nama_klub_home[]">
                        <option value="" selected>Pilih Klub</option>
                        <?php foreach ($klub as $key) : ?>
                            <option value="<?= $key['nama_klub']; ?>"><?= $key['nama_klub']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div id="error_nama_klub_home0" class="form-text" style="color: red; display: none;">Error Text</div>
                </div>
            </div>
            <div class="col-1">
                <h1 class="text-center" style="margin-top: 40px;">
                    vs
                </h1>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Away)</div>
                    <label for="nama_klub_away0" class="form-label">Nama Klub</label>
                    <select class="form-select" id="nama_klub_away0" name="nama_klub_away[]">
                        <option value="" selected>Pilih Klub</option>
                        <?php foreach ($klub as $key) : ?>
                            <option value="<?= $key['nama_klub']; ?>"><?= $key['nama_klub']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div id="error_nama_klub_away0" class="form-text" style="color: red; display: none;">Error Text</div>
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Home)</div>
                    <label for="score_home0" class="form-label">Score</label>
                    <input type="number" class="form-control" id="score_home0" name="score_home[]">
                    <div id="error_score_home0" class="form-text" style="color: red; display: none;">Error Text</div>
                </div>
            </div>
            <div class="col-1">
                <h1 class="text-center" style="margin-top: 40px;">
                    <i class="fas fa-futbol"></i>
                </h1>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Away)</div>
                    <label for="score_away0" class="form-label">Score</label>
                    <input type="number" class="form-control" id="score_away0" name="score_away[]">
                    <div id="error_score_away0" class="form-text" style="color: red; display: none;">Error Text</div>
                </div>
            </div>
            <div class="col-1">
                <div class="text-center" style="margin-top: 50px;">
                    <a onclick="add_match()" class="btn btn-secondary"><i class="fas fa-plus"></i></a><br>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <div id="list-match">

        </div>

        <a onclick="save()" class="btn btn-primary mt-3">Simpan Pertandingan</a>
    </form>
</div>

<script>
    var room = 0;

    $(document).ready(function() {
        $('#nama_klub_home').select2();
        $('#nama_klub_away').select2();
    });

    function add_match() {
        room++;

        let option = '<?php foreach ($klub as $key) {
                            echo "<option value=" . $key['nama_klub'] . " >" . $key['nama_klub'] . "</option>";
                        } ?>';

        var listMatch = $('#list-match');
        var baris = $('<div></div>').attr('class', 'room-' + room);
        var isi_html = `
                    <div class="row">
                        <div class="col-11">
                            <hr>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2">
                            <div class="mb-3">
                                <div style="font-size: 13px;">(Home)</div>
                                <label for="nama_klub_home${room}" class="form-label">Nama Klub</label>
                                <select class="form-select" id="nama_klub_home${room}" name="nama_klub_home[]">
                                    <option value="" selected>Pilih Klub</option>
                                    ${option}
                                </select>
                                <div id="error_nama_klub_home${room}" class="form-text" style="color: red; display: none;">Error Text</div>
                            </div>
                        </div>
                        <div class="col-1">
                            <h1 class="text-center" style="margin-top: 40px;">
                                vs
                            </h1>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <div style="font-size: 13px;">(Away)</div>
                                <label for="nama_klub_away${room}" class="form-label">Nama Klub</label>
                                <select class="form-select" id="nama_klub_away${room}" name="nama_klub_away[]">
                                    <option value="" selected>Pilih Klub</option>
                                    ${option}
                                </select>
                                <div id="error_nama_klub_away${room}" class="form-text" style="color: red; display: none;">Error Text</div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <div style="font-size: 13px;">(Home)</div>
                                <label for="score_home${room}" class="form-label">Score</label>
                                <input type="number" class="form-control" id="score_home${room}" name="score_home[]">
                                <div id="error_score_home${room}" class="form-text" style="color: red; display: none;">Error Text</div>
                            </div>
                        </div>
                        <div class="col-1">
                            <h1 class="text-center" style="margin-top: 40px;">
                                <i class="fas fa-futbol"></i>
                            </h1>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <div style="font-size: 13px;">(Away)</div>
                                <label for="score_away${room}" class="form-label">Score</label>
                                <input type="number" class="form-control" id="score_away${room}" name="score_away[]">
                                <div id="error_score_away${room}" class="form-text" style="color: red; display: none;">Error Text</div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="text-center" style="margin-top: 50px;">
                                <a onclick="del_match(${room})" class="btn btn-danger"><i class="fas fa-times"></i></a><br>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
        `;
        baris.html(isi_html);
        listMatch.append(baris);

        let select_home = `#nama_klub_home${room}`;
        let select_away = `#nama_klub_away${room}`;
        $(select_home).select2();
        $(select_away).select2();
    }

    function del_match(room_number) {
        $('.room-' + room_number).remove();
    }

    function save() {
        var url = "<?= base_url('inputskor/insert_multiple'); ?>";
        var form = $('#form-input-skor').serialize();

        for (let index = 0; index <= room; index++) {
            $('#error_nama_klub_home' + index).empty().hide();
            $('#error_nama_klub_away' + index).empty().hide();
            $('#error_score_home' + index).empty().hide();
            $('#error_score_away' + index).empty().hide();
        }

        $.ajax({
            url: url,
            type: "POST",
            data: form,
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    let html_message = data.result;
                    html_message += data.message.join("<br/>");

                    Swal.fire({
                        title: 'Sukses!',
                        html: html_message,
                        icon: 'success'
                    }).then(() => {
                        $('#nama_klub_home0').val("").trigger('change');
                        $('#nama_klub_away0').val("").trigger('change');
                        $('#score_home0').val("");
                        $('#score_away0').val("");
                        $('#list-match').empty();
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