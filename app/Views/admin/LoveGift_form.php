<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form action="<?= site_url('admin/lovegift/store') ?>" method="post">
    <?= csrf_field() ?>

    <div id="gift-container">
        <div class="gift-item">
            <h4>Love Gift 1</h4>
            <label>Nama Bank</label>
            <input type="text" name="nama_bank[]" required>
            <label>No Rek Bank</label>
            <input type="text" name="no_rek[]" required>
            <label>Deskripsi</label>
            <input type="text" name="deskripsi[]">
            <button type="button" class="remove-gift">Hapus</button>
        </div>
    </div>

    <button type="button" id="add-gift">Tambah Love Gift</button>
    <button type="submit">Simpan</button>
</form>

<script>
let maxGift = 3;
let container = document.getElementById('gift-container');
let addBtn = document.getElementById('add-gift');

addBtn.addEventListener('click', function(){
    let count = container.getElementsByClassName('gift-item').length;
    if(count >= maxGift) return alert('Maksimal 3 Love Gift');

    let newItem = container.getElementsByClassName('gift-item')[0].cloneNode(true);
    newItem.querySelectorAll('input').forEach(input => input.value = '');
    newItem.querySelector('h4').innerText = 'Love Gift ' + (count+1);
    container.appendChild(newItem);
});

container.addEventListener('click', function(e){
    if(e.target && e.target.classList.contains('remove-gift')){
        if(container.getElementsByClassName('gift-item').length > 1){
            e.target.parentElement.remove();
        } else {
            alert('Minimal 1 Love Gift harus ada');
        }
    }
});
</script>
