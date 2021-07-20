<?php

namespace App\Controllers;

date_default_timezone_set("Asia/Jakarta");

use App\Models\loginModel;

class Login extends BaseController
{
	protected $loginModel;
	public function __construct()
	{
		$this->loginModel = new loginModel();
		helper('form');
	}

	public function index()
	{
		return view('login/user/index');
	}

	// User login
	public function administrator()
	{
		return view('login/admin/index');
	}

	public function cek_login()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password1');

		$cek = $this->loginModel->cek_login($username, $password);

		if (($cek['username'] == $username) && ($cek['password'] == $password)) {
			session()->set('id_user', $cek['id_user']);
			session()->set('username', $cek['username']);
			session()->set('fullname', $cek['fullname']);
			session()->set('email', $cek['email']);
			session()->set('mobile', $cek['mobile']);
			session()->set('user_image', $cek['user_image']);
			session()->set('status', $cek['status']);
			return redirect()->to(base_url('/Home'));
		} else if (($cek['username'] != $username) && ($cek['password'] != $password)) {
			session()->setFlashdata('gagal', 'username atau password salah!');
			return redirect()->to(base_url('/Administrator'));
		}
	}

	public function cek_login_user()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password1');

		$cek = $this->loginModel->cek_login($username, $password);

		if (($cek['username'] == $username) && ($cek['password'] == $password)) {
			session()->set('id_user', $cek['id_user']);
			session()->set('username', $cek['username']);
			session()->set('fullname', $cek['fullname']);
			session()->set('email', $cek['email']);
			session()->set('mobile', $cek['mobile']);
			session()->set('user_image', $cek['user_image']);
			session()->set('status', $cek['status']);
			return redirect()->to(base_url('/User'));
		} else if (($cek['username'] != $username) && ($cek['password'] != $password)) {
			session()->setFlashdata('gagal', 'username atau password salah!');
			return redirect()->to(base_url('/Login'));
		}
	}

	public function logout()
	{
		session()->remove('username');
		session()->remove('fullname');
		session()->remove('user_image');
		session()->remove('status');

		session()->setFlashdata('sukses', 'Anda telah berhasil logout');
		return redirect()->to(base_url('/Login'));
	}
}
