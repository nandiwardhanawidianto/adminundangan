<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HeroModel;

class HeroController extends BaseController
{
    public function index()
    {
        return view('admin/Hero_form'); // view di folder admin
    }

public function store()
{
    $heroModel = new HeroModel();

    // dd($this->request->getPost(), $this->request->getFiles());

    // Pastikan variabel ada
    $namaMempelai = $this->request->getPost('nama_mempelai');
    $tanggalAcara = $this->request->getPost('tanggal_acara');
    $newName = null;

    // Validasi wajib isi nama mempelai
    if (empty($namaMempelai)) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Nama mempelai wajib diisi'
        ]);
    }

    // Upload file jika ada
    $file = $this->request->getFile('foto_background');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads', $newName);
    }

    // Simpan data
    $heroModel->save([
        'nama_mempelai'   => $namaMempelai,
        'tanggal_acara'   => $tanggalAcara,
        'foto_background' => $newName
    ]);

    return $this->response->setJSON([
        'success' => true,
        'message' => 'Data Hero berhasil disimpan'
    ]);
}



    public function list()
    {
        $heroModel = new HeroModel();
        $data['heroes'] = $heroModel->orderBy('id', 'DESC')->findAll();
        return view('Admin/hero_list', $data);
    }

    // API untuk React
    public function apiHero()
    {
        $heroModel = new HeroModel();
        return $this->response->setJSON($heroModel->findAll());
    }
}
