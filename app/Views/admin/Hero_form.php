<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<form action="<?= site_url('admin/hero/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label>Nama Kedua Mempelai</label>
    <input type="text" name="nama_mempelai" class="form-input" required>

    <label>Foto Background</label>
    <input type="file" name="foto_background" accept="image/*" class="form-input" required>

    <label>Tanggal Acara</label>
    <input type="date" name="tanggal_acara" class="form-input" required>

    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
</form>
