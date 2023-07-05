<div class="container mt-3">
    <form id="form-input-klub">
        <div class="row">
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Home)</div>
                    <label for="nama_klub_home" class="form-label">Nama Klub</label>
                    <input type="text" class="form-control" id="nama_klub_home" name="nama_klub_home[]" aria-describedby="emailHelp">
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
                    <label for="nama_klub_away" class="form-label">Nama Klub</label>
                    <input type="text" class="form-control" id="nama_klub_away" name="nama_klub_away[]" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-2">
                <div class="mb-3">
                    <div style="font-size: 13px;">(Home)</div>
                    <label for="score_home" class="form-label">Score</label>
                    <input type="number" class="form-control" id="score_home" name="score_home[]" aria-describedby="emailHelp">
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
                    <label for="score_away" class="form-label">Score</label>
                    <input type="number" class="form-control" id="score_away" name="score_away[]" aria-describedby="emailHelp">
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

    function add_match() {
        room++;
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
                                <label for="nama_klub_home" class="form-label">Nama Klub</label>
                                <input type="text" class="form-control" id="nama_klub_home" name="nama_klub_home[]" aria-describedby="emailHelp">
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
                                <label for="nama_klub_away" class="form-label">Nama Klub</label>
                                <input type="text" class="form-control" id="nama_klub_away" name="nama_klub_away[]" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <div style="font-size: 13px;">(Home)</div>
                                <label for="score_home" class="form-label">Score</label>
                                <input type="number" class="form-control" id="score_home" name="score_home[]" aria-describedby="emailHelp">
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
                                <label for="score_away" class="form-label">Score</label>
                                <input type="number" class="form-control" id="score_away" name="score_away[]" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="text-center" style="margin-top: 50px;">
                                <a onclick="del_match(` + room + `)" class="btn btn-danger"><i class="fas fa-times"></i></a><br>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
        `;
        baris.html(isi_html);
        listMatch.append(baris);
    }

    function del_match(room_number) {
        $('.room-' + room_number).remove();
    }

    function save() {
        Swal.fire(
            'Sukses!',
            'Hasil Pertandingan berhasil disimpan',
            'success'
        )
    }
</script>