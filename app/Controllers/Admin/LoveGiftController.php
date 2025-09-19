<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LoveGiftModel;

class LoveGiftController extends BaseController
{
    public function index()
    {
        return view('admin/LoveGift_form');
    }

    public function store()
    {
        $model = new LoveGiftModel();
        $input = $this->request->getPost();
        $count = count($input['nama_bank']);

        for($i=0; $i<$count; $i++){
            $model->save([
                'nama_bank' => $input['nama_bank'][$i],
                'no_rek' => $input['no_rek'][$i],
                'deskripsi' => $input['deskripsi'][$i] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Data Love Gift berhasil disimpan');
    }

    // API untuk React
    public function apiLoveGift()
    {
        $model = new LoveGiftModel();
        return $this->response->setJSON($model->findAll());
    }
}
