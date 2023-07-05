<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputKlub extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('klub_model');
	}

	public function index()
	{
		$data['content'] = 'input-klub';

		$this->load->view('template', $data);
	}

	public function insert()
	{
		$this->_validate();

		$nama_klub	= $this->input->post('nama_klub');
		$kota_klub	= $this->input->post('kota_klub');

		$cek_klub 	= $this->klub_model->cekKlub($nama_klub)->num_rows();
		if ($cek_klub <= 0) {
			$data = [
				'nama_klub'	=> $nama_klub,
				'kota_klub'	=> $kota_klub
			];

			if ($this->klub_model->insert($data)) {
				echo json_encode(
					[
						'status' 	=> TRUE,
						'message' 	=> 'Klub ' . $nama_klub . ' berhasil disimpan.',
					]
				);
			} else {
				echo json_encode(
					[
						'status' 	=> FALSE,
						'message' 	=> 'Opps! Gagal menyimpan. Silahkan coba beberapa saat lagi.',
					]
				);
			}
		} else {
			echo json_encode(
				[
					'status' 	=> FALSE,
					'message' 	=> 'Nama Klub ' . $nama_klub . ' tersebut sudah tersedia.',
				]
			);
		}
	}

	private function _validate()
	{
		$nama_klub	= $this->input->post('nama_klub');
		$kota_klub	= $this->input->post('kota_klub');
		$error	= [
			'status' 	=> TRUE,
			'message'	=> [],
			'input'		=> []
		];

		if ($nama_klub == '') {
			$error['status']	= FALSE;
			$error['message'][]	= 'Nama Klub wajib diisi!';
			$error['input'][]	= 'nama_klub';
		}

		if ($kota_klub == '') {
			$error['status']	= FALSE;
			$error['message'][]	= 'Kota Klub wajib diisi!';
			$error['input'][]	= 'kota_klub';
		}

		if ($error['status'] == FALSE) {
			echo json_encode($error);
			exit();
		}
	}
}
