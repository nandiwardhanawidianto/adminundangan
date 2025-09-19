<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MempelaiModel;


class MempelaiController extends BaseController
{
    public function index()
    {
        return view('admin/Mempelai_form');
    }

    public function store()
    {
        $model = new MempelaiModel();

        // Upload foto pengantin 1
        $file1 = $this->request->getFile('foto_pengantin_1');
        if ($file1 && $file1->isValid() && !$file1->hasMoved()) {
            $name1 = $file1->getRandomName();
            $file1->move(FCPATH . 'uploads', $name1);
        }

        // Upload foto pengantin 2
        $file2 = $this->request->getFile('foto_pengantin_2');
        if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
            $name2 = $file2->getRandomName();
            $file2->move(FCPATH . 'uploads', $name2);
        }

        $model->save([
            'foto_pengantin_1' => $name1 ?? null,
            'nama_pengantin_1' => $this->request->getPost('nama_pengantin_1'),
            'deskripsi_pengantin_1' => $this->request->getPost('deskripsi_pengantin_1'),
            'foto_pengantin_2' => $name2 ?? null,
            'nama_pengantin_2' => $this->request->getPost('nama_pengantin_2'),
            'deskripsi_pengantin_2' => $this->request->getPost('deskripsi_pengantin_2'),
        ]);

        return redirect()->back()->with('success', 'Data Mempelai berhasil disimpan');
    }

    // API untuk React
    public function apiMempelai()
    {
        $model = new MempelaiModel();
        return $this->response->setJSON($model->findAll());
    }
}
