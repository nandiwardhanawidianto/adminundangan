<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<form action="<?= site_url('admin/doa/store') ?>" method="post">
    <?= csrf_field() ?>

    <label>Deskripsi Doa</label>
    <textarea name="deskripsi" required></textarea>

    <button type="submit">Simpan</button>
</form>
