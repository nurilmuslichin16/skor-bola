<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('klub_model');
	}

	public function index()
	{
		$data['list_klub']	= $this->klub_model->klasemen()->result_array();
		$data['content'] 	= 'klasemen';

		$this->load->view('template', $data);
	}
}
