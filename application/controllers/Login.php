<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model("Login_model", "m_login");
	}

	public function index()
	{

		if ($this->session->userdata('status_session') == 1):
				redirect('Home');
		else:
				redirect('Login/Autentica');//$this->load->view('page-login');
		endif;
	}



	public function verificalogin ()
	{

		$this->form_validation->set_rules('matricula', 'Matricula', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('senha', 'Senha', 'trim|required|max_length[10]');

		$data['mengagem'] 	= 'Matricula ou Senha inválida Invalida';
		$data['metatitle'] 	= 'System Sales';
		$this->load->view('page-login', $data);


		if($this->form_validation->run() == FALSE):
			if(validation_errors()):
					$this->index;
			endif;
		else:
			$matricula 	= $this->input->post('matricula');
			$senha 		= $this->input->post('senha');
			$login 		= $this->m_login->get_usuario_login($matricula, $senha);
			if ($login == TRUE){
				
				$login 		= $this->m_login->get_info_usuario_after_login($matricula);
				$this->session->set_userdata('status_session', TRUE);
				$this->session->set_userdata('nome', $login->NOME);
				$this->session->set_userdata('usuario', $login->USUARIO);
				$this->session->set_userdata('matricula', $login->MATRICULA);
				redirect('Home');

			}else{

				$this->load->view('page-login', $data);
			}

		endif;

	}

	public function logout(){
		$this->session->unset_userdata('status_session');
		$this->session->unset_userdata('nome');
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('matricula');
		redirect('Login', 'refresh');
	}

}
