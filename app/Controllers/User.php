<?php


namespace App\Controllers;


date_default_timezone_set("Asia/Jakarta");

use App\Models\mainModel;

class User extends BaseController
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
		return view('user/index', $data);
	}


	// token
	public function token()
	{
		$data['data_user'] = $this->mainModel->myprofile();
		$data['kd'] = $this->mainModel->auto_kode();
		return view('user/token', $data);
	}

	public function save_token()
	{
		$date = time();
		// perhitungan setan kubik 
		$kubik1 = 8000;
		$kubik2 = 10000;
		$hasilk1k2 = $kubik1+$kubik2; //18k
		$harga = $this->request->getPost('inputHarga'); //min. 20k
		$hasilHarga = $harga - $hasilk1k2;
		$kubik3 = $hasilHarga / 1100; //meter kubik
		
		// hitung kubik
		$hasilKubik = $kubik3 + 20;
		round($jumlah_air = $hasilKubik * 1000);

		$kode = $this->request->getPost('kode');
		$id_user = $this->request->getPost('id_user');
		$id_token = $this->request->getPost('id_token');

		$kirimdata = [
			'id_token' => $id_token,
			'id_user' => $id_user,
			'harga' => $harga,
			'jumlah_air' => $jumlah_air,
			'kode' => $kode,
			'tanggal' => date("Y-m-d", $date),
			'bulan' => date("M", $date)
		];
		$kirimdata2 = [
			'id_token' => $id_token,
			'id_user' => $id_user,
			'kode' => $kode,
		];
		$success = $this->mainModel->addToken($kirimdata);
		$success = $this->mainModel->addRelay($kirimdata2);
		if ($success) {
			session()->setFlashData('sukses', 'Data berhasil disimpan');
			return redirect()->to('/Token');
		} else {
			session()->setFlashData('gagal', 'Data gagal disimpan');
			return redirect()->to('/Token');
		}
	}

	// relay
	public function find_kode($kode)
	{
		$data['get_kode'] = $this->mainModel->findKode($kode);
		return view('user/find_kode', $data);
	}


	public function relay_aktif($id_token, $id_user, $relay_status)
	{
		$token_id = $id_token;
		$user_id = $id_user;
		$relay_akt = $relay_status;
		$data['relay_aktif'] = $this->mainModel->getRelayAktif($token_id, $user_id, $relay_akt);
		return view('user/relay_aktif', $data);
	}

	// save waterflow
	public function save_waterflow($id_token, $id_user, $waterflow)
	{
		$date = time();
		$kirimdata['id_token'] = $id_token;
		$kirimdata['id_user'] = $id_user;
		$kirimdata['waterflow'] = $waterflow;
		$kirimdata['tanggal'] = date("Y-m-d", $date);
		$kirimdata['bulan'] = date("M", $date);
		$this->mainModel->add_data_waterflow($kirimdata);
		return redirect()->to('/User');
	}

	public function laporan_pam()
	{
	}
}
