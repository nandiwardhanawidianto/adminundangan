<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form action="<?= site_url('admin/acara/store') ?>" method="post">
    <?= csrf_field() ?>

    <div id="acara-container">
        <div class="acara-item">
            <h4>Acara 1</h4>
            <label>Tanggal</label>
            <input type="date" name="tanggal[]" required>
            <label>Nama Acara</label>
            <input type="text" name="nama_acara[]" required>
            <label>Deskripsi Waktu</label>
            <input type="text" name="deskripsi_waktu[]">
            <label>Deskripsi Alamat</label>
            <input type="text" name="deskripsi_alamat[]">
            <label>Link Google Maps</label>
            <input type="text" name="link_maps[]">
            <button type="button" class="remove-acara">Hapus</button>
        </div>
    </div>

    <button type="button" id="add-acara">Tambah Acara</button>
    <button type="submit">Simpan</button>
</form>

<script>
let maxAcara = 3;
let container = document.getElementById('acara-container');
let addBtn = document.getElementById('add-acara');

addBtn.addEventListener('click', function() {
    let count = container.getElementsByClassName('acara-item').length;
    if(count >= maxAcara) return alert('Maksimal 3 acara');

    let newItem = container.getElementsByClassName('acara-item')[0].cloneNode(true);
    newItem.querySelectorAll('input').forEach(input => input.value = '');
    newItem.querySelector('h4').innerText = 'Acara ' + (count+1);
    container.appendChild(newItem);
});

// Hapus acara
container.addEventListener('click', function(e){
    if(e.target && e.target.classList.contains('remove-acara')){
        if(container.getElementsByClassName('acara-item').length > 1){
            e.target.parentElement.remove();
        } else {
            alert('Minimal harus ada 1 acara');
        }
    }
});
</script>
