<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function index()
	{

		if ($this->session->userdata('status_session') == 1):
			$data['metatitle'] 	= 'Dashboard - System Sales';
			$this->load->view('Dashboard', $data);
		else:
			redirect('Login/Autentica');
		endif;
	}
}