<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<form action="<?= site_url('admin/mempelai/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <h3>Pengantin Pertama</h3>
    <label>Foto Pengantin 1</label>
    <input type="file" name="foto_pengantin_1" accept="image/*" required>
    <label>Nama Pengantin 1</label>
    <input type="text" name="nama_pengantin_1" required>
    <label>Deskripsi Pengantin 1</label>
    <textarea name="deskripsi_pengantin_1" required></textarea>

    <h3>Pengantin Kedua</h3>
    <label>Foto Pengantin 2</label>
    <input type="file" name="foto_pengantin_2" accept="image/*" required>
    <label>Nama Pengantin 2</label>
    <input type="text" name="nama_pengantin_2" required>
    <label>Deskripsi Pengantin 2</label>
    <textarea name="deskripsi_pengantin_2" required></textarea>

    <button type="submit">Simpan</button>
</form>
