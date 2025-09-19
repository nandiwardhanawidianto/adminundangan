<h2>Daftar Hero</h2>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Mempelai</th>
            <th>Foto Background</th>
            <th>Tanggal Acara</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($heroes)): ?>
            <?php foreach($heroes as $hero): ?>
                <tr>
                    <td><?= $hero['id'] ?></td>
                    <td><?= $hero['nama_mempelai'] ?></td>
                    <td>
                        <?php if($hero['foto_background']): ?>
                            <img src="<?= base_url('uploads/'.$hero['foto_background']) ?>" alt="Background" width="150">
                        <?php endif; ?>
                    </td>
                    <td><?= $hero['tanggal_acara'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Belum ada data hero</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
