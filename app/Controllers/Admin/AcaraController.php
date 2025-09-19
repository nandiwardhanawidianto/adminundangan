<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AcaraModel;

class AcaraController extends BaseController
{
    public function index()
    {
        return view('admin/Acara_form');
    }

    public function store()
    {
        $model = new AcaraModel();

        // Deteksi request JSON (API) atau Form biasa
        $contentType = $this->request->getHeaderLine('Content-Type');

        if (strpos($contentType, 'application/json') !== false) {
            // === INPUT DARI API ===
            $json = $this->request->getJSON(true);

            $acaras = $json['acaras'] ?? [];

            if (!is_array($acaras) || count($acaras) === 0) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Data acara tidak boleh kosong'
                ])->setStatusCode(400);
            }

            // Maksimal 3 acara
            $acaras = array_slice($acaras, 0, 3);

            foreach ($acaras as $acara) {
                $model->insert([
                    'tanggal'          => $acara['tanggal'] ?? null,
                    'nama_acara'       => $acara['nama_acara'] ?? null,
                    'deskripsi_waktu'  => $acara['deskripsi_waktu'] ?? null,
                    'deskripsi_alamat' => $acara['deskripsi_alamat'] ?? null,
                    'link_maps'        => $acara['link_maps'] ?? null,
                ]);
            }

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Data acara berhasil disimpan',
                'jumlah'  => count($acaras)
            ]);

        } else {
            // === INPUT DARI FORM ADMIN ===
            $input = $this->request->getPost();

            if (empty($input['nama_acara'])) {
                return redirect()->back()->with('error', 'Minimal 1 acara harus diisi');
            }

            $count = count($input['nama_acara'] ?? []);

            for ($i = 0; $i < $count; $i++) {
                $model->insert([
                    'tanggal'          => $input['tanggal'][$i] ?? null,
                    'nama_acara'       => $input['nama_acara'][$i] ?? null,
                    'deskripsi_waktu'  => $input['deskripsi_waktu'][$i] ?? null,
                    'deskripsi_alamat' => $input['deskripsi_alamat'][$i] ?? null,
                    'link_maps'        => $input['link_maps'][$i] ?? null,
                ]);
            }

            return redirect()->back()->with('success', 'Data Acara berhasil disimpan');
        }
    }

    // API untuk React / Postman
    public function apiAcara()
    {
        $model = new AcaraModel();
        return $this->response->setJSON($model->findAll());
    }
}
