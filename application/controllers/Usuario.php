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

	public function viewlistUser(){

		$data['metatitle'] 		= 	'Dashboard - System Sales';
		$data['getcontroller'] 	= 	$this->router->fetch_class();
		$data['getmethod'] 		= 	$this->router->fetch_method();
		$this->load->view('View_body_usuarios', $data);
	}

	public function getUsers()
	{

		// Datatables Variables
		$draw 	= intval($this->input->get("draw"));
		$start 	= intval($this->input->get("start"));
		$length 	= intval($this->input->get("length"));

		$usuarios = $this->m_user->get_users();

		$data = array();

          foreach($usuarios as $r) {
                $status  = $r->STATUS == '1' ? '<span class="status--process">Ativado</span>' : '<span class="status--denied">Desativado</span>';
                $data_r = array();

                $data_r[] = $r->ID;
                $data_r[] = $r->NOME;
                $data_r[] = $r->MATRICULA;
                $data_r[] = $status;
                $data_r[] = '<div class="table-data-feature">
                                    <button class="item iconEdit" value="'. $r->ID .'" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
	                            <div class="table-data-feature">
									<button class="item iconDelete" value="'. $r->ID .'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
									    <i class="zmdi zmdi-delete"></i>
									</button>
	                            </div>
                            </div>' ;
                $data[] = $data_r;
          }

            $total_usuarios = $this->m_user->get_total_membros($start, $length);
            $output = array(
               "draw" 				=> $draw,
                 "recordsTotal" 	=> $total_usuarios,
                 "recordsFiltered" 	=> $total_usuarios,
                 "data" 			=> $data
            );
          echo json_encode($output);
          exit();
	}

	public function addUser(){

	        $checkUser = $this->m_user->check_user_exist($this->input->post('user_matricula'));
	        if ($checkUser){
	    
	            return false;
	            var_dump($checkUser);
	    
	        }else{

				$data=$this->m_user->user_add();
				echo json_encode($data);
			}
	}


	public function deleteUser(){
		$data=$this->m_user->delete_user();
		echo json_encode($data);
		
	}

	public function getDataUserForedit(){
		$data=$this->m_user->get_user_for_update();
		echo json_encode($data);
	}

	public function actionEditRecordUser(){
		$data=$this->m_user->action_EditUser();
		echo json_encode($data);
	}







}