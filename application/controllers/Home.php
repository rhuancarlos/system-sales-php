<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent:: __construct();
	}

	public function index()
	{

		if ($this->session->userdata('status_session') == 1 & $this->session->userdata('status') == 1):
			$data['metatitle'] 		= 'Dashboard - System Sales';
			$data['getcontroller'] 	= $this->router->fetch_class();
			$data['getmethod'] 		= $this->router->fetch_method();
			$this->load->view('View_body_dashboard', $data);
		else:
			redirect('Login/Autentica');
		endif;
	}
}