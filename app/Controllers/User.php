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

	public function direct_login()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}

		$data['get_idtoken'] = $this->mainModel->get_idtoken();
		return view('user/direct_login', $data);
	}

	public function monitoring($id_token, $id_user)
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}

		$date = time();
		$bulan = date("M", $date);
		// untuk get nama dan chat id user
		$data['user_data'] = $this->mainModel->myprofile();
		// cek relay aktif atau tidak
		$data['cek_relay'] = $this->mainModel->cek_relay($id_token);
		// untuk realtime data wf
		$data['get_wf'] = $this->mainModel->get_wf($id_token, $id_user);
		// untuk get pembelian token
		$data['get_harga'] = $this->mainModel->get_harga_beli($bulan, $id_user);
		// untuk total pemakaian wf per idtoken
		$data['get_jumlah_wf'] = $this->mainModel->get_jumlah_wf($id_token, $id_user);
		// untuk total pemakaian wf per bulan
		$data['get_jumlah_bulan'] = $this->mainModel->get_jumlah_wf_bulan($bulan, $id_user);
		return view('user/monitoring', $data);
	}
	
	public function index()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum logion !');
			return redirect()->to(base_url('/Login'));
		}
		
		$data['get_idtoken'] = $this->mainModel->get_idtoken();
		return view('user/index', $data);
	}


	// token
	public function token()
	{
		$data['data_user'] = $this->mainModel->myprofile();
		return view('user/token', $data);
	}

	public function save_token()
	{
		$date = time();
		// perhitungan setan kubik 
		$kubik1 = 45000;
		$kubik2 = 57000;
		$hasilk1k2 = $kubik1 + $kubik2; //18k
		$harga = $this->request->getPost('inputHarga'); //min. 20k
		$hasilHarga = $harga - $hasilk1k2;
		$kubik3 = $hasilHarga / 6000; //meter kubik

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

	// view token per bulan
	public function token_bulanan($id_user, $bulan)
	{
		$date = time();
		$bulan = Date("M", $date);
		$data['token_bulanan'] = $this->mainModel->getTokenBulanan($id_user, $bulan);
		return view('user/laporan_air', $data);
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

	public function tutup_keran($id_token, $relay)
	{
		$token_id = $id_token;
		$relay_mati = $relay;
		$this->mainModel->sendRelayMati($token_id, $relay_mati);
		return redirect()->to('/User');
	}

	// save waterflow
	// ini dikirim dari nodemcu ke webserver
	public function save_waterflow($id_token, $id_user, $waterflow)
	{
		$date = time();
		$kirimdata['id_token'] = $id_token;
		$kirimdata['id_user'] = $id_user;
		$liter = $waterflow / 1000;
		$kirimdata['waterflow'] = $liter;
		$kirimdata['tanggal'] = date("Y-m-d", $date);
		$kirimdata['bulan'] = date("M", $date);

		$bulan = date("M", $date);
		$kirimdata2['id_token'] = $id_token;
		$kirimdata2['id_user'] = $id_user;
		$kirimdata2['bulan'] = date("M", $date);

		$cek_id = $this->mainModel->cek_rekap_wf($bulan, $id_user);
		if ($cek_id <= 0) {
			$this->mainModel->add_data_waterflow($kirimdata);
			$this->mainModel->add_rekap_wf($kirimdata2);
			return redirect()->to('/User');
		} else {
			$this->mainModel->add_data_waterflow($kirimdata);
			return redirect()->to('/User');
		}
	}

	public function laporan_pam()
	{
		return view('errors/html/error_404');
	}
}
