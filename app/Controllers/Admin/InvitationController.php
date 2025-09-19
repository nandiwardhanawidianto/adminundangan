<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InvitationModel;

class InvitationController extends BaseController
{
    protected $invitationModel;

    public function __construct()
    {
        $this->invitationModel = new InvitationModel();
        helper('form'); 
    }

    // Tampilkan form admin (GET /admin/invitation)
    public function index()
    {
        // load existing record pertama (misal id 1) untuk edit
        $invitation = $this->invitationModel->find(1);

         // Jika null, buat array kosong
        if (!is_array($invitation)) {
            $invitation = [];
        }

        // Kirim ke view
        return view('admin/invitation_form', ['invitation' => $invitation]);
    }

    // Simpan data dari form (POST /admin/invitation/store)
    public function store()
    {
        helper(['form','url']);

        $rules = [
            'nama_mempelai' => 'required|min_length[2]|max_length[255]',
            'background_photo' => [
                'uploaded[background_photo]',
                'max_size[background_photo,2048]', // 2MB
                'is_image[background_photo]',
                'mime_in[background_photo,image/jpg,image/jpeg,image/png,image/webp,image/svg+xml]'
            ],
        ];

        if (! $this->validate($rules)) {
            // kembalikan error ke view
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // handle upload
        $file = $this->request->getFile('background_photo');
        $filename = null;
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            // simpan di public/uploads/
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/uploads/', $newName);
            $filename = 'uploads/' . $newName; // path relative ke public
        }

        // Simpan ke DB: kalau record ada (id 1) update, kalau tidak create
        $existing = $this->invitationModel->find(1);
        $saveData = [
            'nama_mempelai' => $this->request->getPost('nama_mempelai'),
        ];
        if ($filename) {
            $saveData['background_photo'] = $filename;
        }

        if ($existing) {
            $this->invitationModel->update(1, $saveData);
        } else {
            // optional set id = 1, atau biarkan auto
            $this->invitationModel->insert($saveData);
        }

        return redirect()->to('/admin/invitation')->with('success','Data tersimpan.');
    }

    // API: Dapatkan data invitation (GET /api/invitation/1)
    public function apiShow($id = 1)
    {
        // CORS header untuk akses dari React dev host (jika perlu)
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Access-Control-Allow-Methods', 'GET, OPTIONS');

        $inv = $this->invitationModel->find($id);
        if (! $inv) {
            return $this->response->setStatusCode(404)->setJSON(['error'=>'Not found']);
        }
        // Buat absolute URL untuk gambar agar React bisa langsung pakai
        if (! empty($inv['background_photo'])) {
            $inv['background_photo'] = base_url($inv['background_photo']);
        }
        return $this->response->setJSON($inv);
    }

    // Optional: handle OPTIONS preflight
    public function options()
    {
        $this->response->setHeader('Access-Control-Allow-Origin','*');
        $this->response->setHeader('Access-Control-Allow-Methods','GET, POST, OPTIONS');
        $this->response->setHeader('Access-Control-Allow-Headers','Content-Type');
        return $this->response;
    }
}
