<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Admin - Buka Undangan</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!-- Tailwind CDN (opsional) -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Admin - Buka Undangan</h1>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="mb-4 p-3 bg-green-100 text-green-800 rounded"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php $errors = session()->getFlashdata('errors') ?? (isset($errors) ? $errors : []); ?>
    <?php if(!empty($errors)): ?>
      <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
        <ul>
        <?php foreach($errors as $err): ?>
          <li><?= esc($err) ?></li>
        <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/invitation/store') ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>

      <label class="block mb-2">Nama Mempelai</label>
      <input type="text" name="nama_mempelai" value="<?= set_value('nama_mempelai', $invitation['nama_mempelai'] ?? '') ?>" class="w-full p-2 border rounded mb-4">

      <label class="block mb-2">Foto Background (jpg/png/webp/svg) max 2MB</label>
      <?php if(!empty($invitation['background_photo'])): ?>
        <div class="mb-2">
          <img src="<?= base_url($invitation['background_photo']) ?>" alt="bg" class="w-full max-h-48 object-cover rounded">
        </div>
      <?php endif; ?>
      <input type="file" name="background_photo" class="w-full mb-4">

      <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
    </form>
  </div>
</body>
</html>
