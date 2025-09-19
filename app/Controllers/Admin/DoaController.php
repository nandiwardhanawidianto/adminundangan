<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DoaModel;

class DoaController extends BaseController
{
    public function index()
    {
        return view('admin/Doa_form');
    }

    public function store()
    {
        $model = new DoaModel();

        $model->save([
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->back()->with('success', 'Data Doa berhasil disimpan');
    }

    // API untuk React
    public function apiDoa()
    {
        $model = new DoaModel();
        return $this->response->setJSON($model->findAll());
    }
}
