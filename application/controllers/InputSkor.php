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

	public function multiple()
	{
		$data['klub']		= $this->klub_model->listKlub()->result_array();
		$data['content'] 	= 'input-skor-multiple';

		$this->load->view('template', $data);
	}
}
