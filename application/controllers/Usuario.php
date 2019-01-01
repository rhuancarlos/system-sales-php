<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('User_model', 'm_user');
	}

	public function index(){
		
		if ($this->session->userdata('status_session') == 1):
				redirect('Usuarios');
		else:
				redirect('Login/Autentica');//$this->load->view('page-login');
		endif;
	}

	public function getUsers(){

		// $Users = $this->m_user->get_users();
		#$data = $this->m_user->get_users();		
		#echo json_encode($data);
		#$data['listagem']		=	$Users = $this->m_user->get_users();


        #$list = $this->customers->get_datatables();
		$get_database = $this->m_user->get_user__start_length();
        $data = array();
        foreach ($get_database as $datauser) {
            $list 	= array();
            $list[] = '<label class="au-checkbox">
            				<input type="checkbox">
							<span class="au-checkmark"></span>
						</label>';
            $list[] = $datauser->ID;
            $list[] = $datauser->NOME;
            $list[] = $datauser->MATRICULA;
            $list[] = $datauser->STATUS;
            $list[] = '<div class="table-data-feature">
                        <span data-toggle="modal" data-target="#modalEditar">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                        </span>
                        <div class="table-data-feature">
                            <span data-toggle="modal" data-target="#modalDelet">
                                <button class="item" id="itemDelet" value="'. $datauser->ID . '" data-toggle="tooltip" data-placement="top" title="Remover">
                                </button>
                            </span>
                        </div>
                    </div>';
            $data[]	= $list;
        }
 
        $output = array(
                        "draw" 				=> intval(isset($_POST["draw"])),
                        "recordsTotal" 		=> $this->m_user->get_users_total(),
                        "recordsFiltered" 	=> $this->m_user->get_users_filter(),
                        "data" 				=> $data,
                );
        //output to json format
        echo json_encode($output);
		$data['metatitle'] 		= 	'Dashboard - System Sales';
		$data['getcontroller'] 	= 	$this->router->fetch_class();
		$data['getmethod'] 		= 	$this->router->fetch_method();
		$this->load->view('View_body_usuarios', $data);
	}

	public function addUser(){
		$data=$this->m_user->user_add();
		echo json_encode($data);
	}

	public function updateUser(){

	}

	public function deleteUser(){
		
	}







}