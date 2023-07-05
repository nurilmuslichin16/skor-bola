<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputSkor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('klub_model');
		$this->load->model('match_model');
	}

	public function index()
	{
		$data['klub']		= $this->klub_model->listKlub()->result_array();
		$data['content'] 	= 'input-skor';

		$this->load->view('template', $data);
	}

	public function insert()
	{
		$this->_validate();

		$klub_home	= $this->input->post('nama_klub_home');
		$score_home	= $this->input->post('score_home');
		$klub_away	= $this->input->post('nama_klub_away');
		$score_away	= $this->input->post('score_away');

		$cek_match	= $this->match_model->cekMatch($klub_home, $klub_away)->num_rows();
		if ($cek_match <= 0) {
			$data = [
				'klub_home' 	=> $klub_home,
				'score_home'	=> $score_home,
				'klub_away'		=> $klub_away,
				'score_away'	=> $score_away
			];

			if ($this->match_model->insert($data)) {
				if ($score_home == $score_away) {
					$old_home	= $this->klub_model->cekKlub($klub_home)->row_array();
					$old_away	= $this->klub_model->cekKlub($klub_away)->row_array();

					$new_home	= [
						'ma'	=> $old_home['ma'] + 1,
						's'		=> $old_home['s'] + 1,
						'gm'	=> $old_home['gm'] + $score_home,
						'gk'	=> $old_home['gk'] + $score_away,
						'point'	=> $old_home['point'] + 1
					];

					$new_away	= [
						'ma'	=> $old_away['ma'] + 1,
						's'		=> $old_away['s'] + 1,
						'gm'	=> $old_away['gm'] + $score_away,
						'gk'	=> $old_away['gk'] + $score_home,
						'point'	=> $old_away['point'] + 1
					];

					$this->klub_model->update($klub_home, $new_home);
					$this->klub_model->update($klub_away, $new_away);
				} else if ($score_home > $score_away) {
					$old_home	= $this->klub_model->cekKlub($klub_home)->row_array();
					$old_away	= $this->klub_model->cekKlub($klub_away)->row_array();

					$new_home	= [
						'ma'	=> $old_home['ma'] + 1,
						'me'	=> $old_home['me'] + 1,
						'gm'	=> $old_home['gm'] + $score_home,
						'gk'	=> $old_home['gk'] + $score_away,
						'point'	=> $old_home['point'] + 3
					];

					$new_away	= [
						'ma'	=> $old_away['ma'] + 1,
						'k'		=> $old_away['k'] + 1,
						'gm'	=> $old_away['gm'] + $score_away,
						'gk'	=> $old_away['gk'] + $score_home,
						'point'	=> $old_away['point'] + 0
					];

					$this->klub_model->update($klub_home, $new_home);
					$this->klub_model->update($klub_away, $new_away);
				} else {
					$old_home	= $this->klub_model->cekKlub($klub_home)->row_array();
					$old_away	= $this->klub_model->cekKlub($klub_away)->row_array();

					$new_home	= [
						'ma'	=> $old_home['ma'] + 1,
						'k'		=> $old_home['k'] + 1,
						'gm'	=> $old_home['gm'] + $score_home,
						'gk'	=> $old_home['gk'] + $score_away,
						'point'	=> $old_home['point'] + 0
					];

					$new_away	= [
						'ma'	=> $old_away['ma'] + 1,
						'me'	=> $old_away['me'] + 1,
						'gm'	=> $old_away['gm'] + $score_away,
						'gk'	=> $old_away['gk'] + $score_home,
						'point'	=> $old_away['point'] + 3
					];

					$this->klub_model->update($klub_home, $new_home);
					$this->klub_model->update($klub_away, $new_away);
				}

				echo json_encode(
					[
						'status' 	=> TRUE,
						'message' 	=> 'Pertandingan ' . $klub_home . ' vs ' . $klub_away . ' berhasil disimpan.',
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
					'message' 	=> 'Pertandingan ' . $klub_home . ' vs ' . $klub_away . ' tersebut sudah tersedia.',
				]
			);
		}
	}

	public function multiple()
	{
		$data['klub']		= $this->klub_model->listKlub()->result_array();
		$data['content'] 	= 'input-skor-multiple';

		$this->load->view('template', $data);
	}

	public function insert_multiple()
	{
		$this->_validate_multiple();

		$klub_home	= $this->input->post('nama_klub_home');
		$score_home	= $this->input->post('score_home');
		$klub_away	= $this->input->post('nama_klub_away');
		$score_away	= $this->input->post('score_away');

		$success	= 0;
		$error		= 0;
		$double		= 0;
		$message	= [];

		for ($i = 0; $i < count($klub_home); $i++) {
			$cek_match	= $this->match_model->cekMatch($klub_home[$i], $klub_away[$i])->num_rows();
			if ($cek_match <= 0) {
				$data = [
					'klub_home' 	=> $klub_home[$i],
					'score_home'	=> $score_home[$i],
					'klub_away'		=> $klub_away[$i],
					'score_away'	=> $score_away[$i]
				];

				if ($this->match_model->insert($data)) {
					if ($score_home[$i] == $score_away[$i]) {
						$old_home	= $this->klub_model->cekKlub($klub_home[$i])->row_array();
						$old_away	= $this->klub_model->cekKlub($klub_away[$i])->row_array();

						$new_home	= [
							'ma'	=> $old_home['ma'] + 1,
							's'		=> $old_home['s'] + 1,
							'gm'	=> $old_home['gm'] + $score_home[$i],
							'gk'	=> $old_home['gk'] + $score_away[$i],
							'point'	=> $old_home['point'] + 1
						];

						$new_away	= [
							'ma'	=> $old_away['ma'] + 1,
							's'		=> $old_away['s'] + 1,
							'gm'	=> $old_away['gm'] + $score_away[$i],
							'gk'	=> $old_away['gk'] + $score_home[$i],
							'point'	=> $old_away['point'] + 1
						];

						$this->klub_model->update($klub_home[$i], $new_home);
						$this->klub_model->update($klub_away[$i], $new_away);
					} else if ($score_home[$i] > $score_away[$i]) {
						$old_home	= $this->klub_model->cekKlub($klub_home[$i])->row_array();
						$old_away	= $this->klub_model->cekKlub($klub_away[$i])->row_array();

						$new_home	= [
							'ma'	=> $old_home['ma'] + 1,
							'me'	=> $old_home['me'] + 1,
							'gm'	=> $old_home['gm'] + $score_home[$i],
							'gk'	=> $old_home['gk'] + $score_away[$i],
							'point'	=> $old_home['point'] + 3
						];

						$new_away	= [
							'ma'	=> $old_away['ma'] + 1,
							'k'		=> $old_away['k'] + 1,
							'gm'	=> $old_away['gm'] + $score_away[$i],
							'gk'	=> $old_away['gk'] + $score_home[$i],
							'point'	=> $old_away['point'] + 0
						];

						$this->klub_model->update($klub_home[$i], $new_home);
						$this->klub_model->update($klub_away[$i], $new_away);
					} else {
						$old_home	= $this->klub_model->cekKlub($klub_home[$i])->row_array();
						$old_away	= $this->klub_model->cekKlub($klub_away[$i])->row_array();

						$new_home	= [
							'ma'	=> $old_home['ma'] + 1,
							'k'		=> $old_home['k'] + 1,
							'gm'	=> $old_home['gm'] + $score_home[$i],
							'gk'	=> $old_home['gk'] + $score_away[$i],
							'point'	=> $old_home['point'] + 0
						];

						$new_away	= [
							'ma'	=> $old_away['ma'] + 1,
							'me'	=> $old_away['me'] + 1,
							'gm'	=> $old_away['gm'] + $score_away[$i],
							'gk'	=> $old_away['gk'] + $score_home[$i],
							'point'	=> $old_away['point'] + 3
						];

						$this->klub_model->update($klub_home[$i], $new_home);
						$this->klub_model->update($klub_away[$i], $new_away);
					}

					$success++;
					array_push($message, 'Pertandingan <b>' . $klub_home[$i] . ' vs ' . $klub_away[$i] . '</b> <b style="color: green;">berhasil disimpan</b>.');
				} else {
					$error++;
					array_push($message, '<b style="color: red;">Opps! Gagal menyimpan</b> pertandingan <b>' . $klub_home[$i] . ' vs ' . $klub_away[$i] . '</b>.');
				}
			} else {
				$double++;
				array_push($message, 'Pertandingan <b>' . $klub_home[$i] . ' vs ' . $klub_away[$i] . '</b> tersebut <b style="color: orange;">sudah tersedia</b>.');
			}
		}

		echo json_encode(
			[
				'status' 	=> TRUE,
				'message' 	=> $message,
				'result'	=> $success . ' Sukses, ' . $error . ' Gagal, ' . $double .  ' Sudah Tersedia'
			]
		);
	}

	private function _validate()
	{
		$klub_home	= $this->input->post('nama_klub_home');
		$score_home	= $this->input->post('score_home');
		$klub_away	= $this->input->post('nama_klub_away');
		$score_away	= $this->input->post('score_away');
		$error	= [
			'status' 	=> TRUE,
			'message'	=> [],
			'input'		=> []
		];

		if ($klub_home == '') {
			$error['status']	= FALSE;
			$error['message'][]	= 'Nama Klub Home wajib diisi!';
			$error['input'][]	= 'nama_klub_home';
		}

		if ($klub_away == '') {
			$error['status']	= FALSE;
			$error['message'][]	= 'Nama Klub Away wajib diisi!';
			$error['input'][]	= 'nama_klub_away';
		}

		if ($score_home == '') {
			$error['status']	= FALSE;
			$error['message'][]	= 'Score Home wajib diisi!';
			$error['input'][]	= 'score_home';
		}

		if ($score_away == '') {
			$error['status']	= FALSE;
			$error['message'][]	= 'Score Away wajib diisi!';
			$error['input'][]	= 'score_away';
		}

		if ($error['status'] == FALSE) {
			echo json_encode($error);
			exit();
		}
	}

	private function _validate_multiple()
	{
		$klub_home	= $this->input->post('nama_klub_home');
		$score_home	= $this->input->post('score_home');
		$klub_away	= $this->input->post('nama_klub_away');
		$score_away	= $this->input->post('score_away');
		$error	= [
			'status' 	=> TRUE,
			'message'	=> [],
			'input'		=> []
		];

		for ($i = 0; $i < count($klub_home); $i++) {
			if ($klub_home[$i] == '') {
				$error['status']	= FALSE;
				$error['message'][]	= 'Nama Klub Home wajib diisi!';
				$error['input'][]	= 'nama_klub_home' . $i;
			}

			if ($klub_away[$i] == '') {
				$error['status']	= FALSE;
				$error['message'][]	= 'Nama Klub Away wajib diisi!';
				$error['input'][]	= 'nama_klub_away' . $i;
			}

			if ($score_home[$i] == '') {
				$error['status']	= FALSE;
				$error['message'][]	= 'Score Home wajib diisi!';
				$error['input'][]	= 'score_home' . $i;
			}

			if ($score_away[$i] == '') {
				$error['status']	= FALSE;
				$error['message'][]	= 'Score Away wajib diisi!';
				$error['input'][]	= 'score_away' . $i;
			}
		}

		if ($error['status'] == FALSE) {
			echo json_encode($error);
			exit();
		}
	}
}
