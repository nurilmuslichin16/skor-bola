<div class="container mt-3 text-center">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Klub</th>
                <th scope="col">Ma</th>
                <th scope="col">Me</th>
                <th scope="col">S</th>
                <th scope="col">K</th>
                <th scope="col">GM</th>
                <th scope="col">GK</th>
                <th scope="col">Point</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($list_klub) > 0) { ?>
                <?php foreach ($list_klub as $key => $value) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $value['nama_klub'] . ' - ' . $value['kota_klub']; ?></td>
                        <td><?= $value['ma']; ?></td>
                        <td><?= $value['me']; ?></td>
                        <td><?= $value['s']; ?></td>
                        <td><?= $value['k']; ?></td>
                        <td><?= $value['gm']; ?></td>
                        <td><?= $value['gk']; ?></td>
                        <td><?= $value['point']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php } else { ?>
                <tr>
                    <th colspan="9">Data Klub Belum Ada <i class="far fa-sad-tear"></i></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>