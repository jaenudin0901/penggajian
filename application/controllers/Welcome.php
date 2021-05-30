<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		$data['judul'] = "Form login";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('form_login');
	}
}
