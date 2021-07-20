<?php


namespace App\Controllers;

date_default_timezone_set("Asia/Jakarta");

use App\Models\mainModel;

class Pages extends BaseController
{
    protected $mainModel;
    public function __construct()
    {
        $this->mainModel = new mainModel();
        helper('form');
    }

    public function index()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda belum login !');
            return redirect()->to(base_url('/Login'));
        }
        $data['data_admin'] = $this->mainModel->myprofile();
        return view('pages/index', $data);
    }

    public function manage_user()
    {
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['listUser'] = $this->mainModel->list_user();
		// $data['viewUser'] = $this->mainModel->detail_user();
		return view('pages/manage-user', $data);
    }
}
