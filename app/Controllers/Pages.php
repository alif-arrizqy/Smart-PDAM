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

  public function add_user()
  {
    if (session()->get('username') == '') {
      session()->setFlashdata('gagal', 'Anda belum login !');
      return redirect()->to(base_url('/Login'));
    }
    return view('pages/add-user');
  }

  public function save_user()
  {
    // if (session()->get('username') == '') {
    //   session()->setFlashdata('gagal', 'Anda belum login !');
    //   return redirect()->to(base_url('/Login'));
    // }
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password1');
    $nama_lengkap = $this->request->getPost('nama_lengkap');
    $alamat = $this->request->getPost('alamat');
    $chatid_tele = $this->request->getPost('chatid_tele');
    $email = $this->request->getPost('email');
    $no_telp = $this->request->getPost('no_telp');
    $status = $this->request->getPost('status');
    // $validated = $this->validate([
    //   'gambar' => [
    //     'uploaded[file]',
    //     'mime_in[file,image/jpg,image/jpeg,image/png]',
    //     'max_size[file,4096]',
    //   ],
    // ]);
    // if ($validated == FALSE) {
    //   return redirect()->to('/Manage-user');
    // } else {
    $gambar = $this->request->getfile('gambar');
    $gambar->move(ROOTPATH . 'public/assets/images');
    $gbr = $gambar->getName();
    // }
    $kirimdata = [
      'username' => $username,
      'password' => $password,
      'fullname' => $nama_lengkap,
      'chatId' => $chatid_tele,
      'address' => $alamat,
      'email' => $email,
      'mobile' => $no_telp,
      'user_image' => $gbr,
      'status' => $status,
    ];
    $success = $this->mainModel->saveUser($kirimdata);
    if ($success) {
      session()->setFlashdata('sukses', 'Data User Berhasil Disimpan');
      return redirect()->to('/Manage-user');
    } else {
      session()->setFlashdata('gagal', 'Data User Gagal Disimpan');
      return redirect()->to('/Manage-user');
    }
  }
}
