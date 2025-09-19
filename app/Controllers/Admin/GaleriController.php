<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;

class GaleriController extends BaseController
{
    public function index()
    {
        return view('admin/Galeri_form');
    }

    public function store()
    {
        $model = new GaleriModel();

        // Cek header Content-Type
        $contentType = $this->request->getHeaderLine('Content-Type');

        if (strpos($contentType, 'application/json') !== false) {
            // ===== API JSON =====
            $json = $this->request->getJSON(true);

            $carousel1 = array_slice($json['carousel_1'] ?? [], 0, 5);
            $carousel2 = array_slice($json['carousel_2'] ?? [], 0, 5);

            foreach ($carousel1 as $foto) {
                $model->insert([
                    'carousel' => 1,
                    'foto'     => $foto ?: null
                ]);
            }
            foreach ($carousel2 as $foto) {
                $model->insert([
                    'carousel' => 2,
                    'foto'     => $foto ?: null
                ]);
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Foto Galeri berhasil disimpan via API',
                'jumlah' => [
                    'carousel_1' => count($carousel1),
                    'carousel_2' => count($carousel2)
                ]
            ]);
        } else {
            // ===== WEB FORM UPLOAD =====
            $files1 = $this->request->getFileMultiple('carousel_1') ?? [];
            $files2 = $this->request->getFileMultiple('carousel_2') ?? [];

            foreach (array_slice($files1, 0, 5) as $file) {
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $name = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/galeri', $name);
                    $model->insert([
                        'carousel' => 1,
                        'foto' => 'uploads/galeri/' . $name
                    ]);
                }
            }

            foreach (array_slice($files2, 0, 5) as $file) {
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $name = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/galeri', $name);
                    $model->insert([
                        'carousel' => 2,
                        'foto' => 'uploads/galeri/' . $name
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Foto Galeri berhasil disimpan');
        }
    }




    // API GET untuk React / client
    public function apiGaleri()
    {
        $model = new GaleriModel();
        $carousel1 = $model->where('carousel', 1)->findAll();
        $carousel2 = $model->where('carousel', 2)->findAll();

        return $this->response->setJSON([
            'carousel_1' => $carousel1,
            'carousel_2' => $carousel2
        ]);
    }
}
