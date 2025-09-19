<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('admin/galeri/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <h3>Carousel 1 (max 5 foto)</h3>
    <input type="file" name="carousel_1[]" multiple accept="image/*">

    <h3>Carousel 2 (max 5 foto)</h3>
    <input type="file" name="carousel_2[]" multiple accept="image/*">

    <button type="submit">Simpan</button>
</form>
