<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('Client_model', 'm_client');
	}

	public function index(){
		
		if ($this->session->userdata('status_session') == 1):
				redirect('Clientes');
		else:
				redirect('Login/Autentica');//$this->load->view('page-login');
		endif;
	}

	public function viewlistClient(){

		$data['metatitle'] 		= 	'Dashboard - System Sales';
		$data['getcontroller'] 	= 	$this->router->fetch_class();
		$data['getmethod'] 		= 	$this->router->fetch_method();
		$this->load->view('View_body_clientes', $data);
	}

	public function getClients()
	{

		// Datatables Variables
		$draw 	= intval($this->input->get("draw"));
		$start 	= intval($this->input->get("start"));
		$length	= intval($this->input->get("length"));

		$clientes = $this->m_client->get_clients();

		$data = array();

          foreach($clientes as $r) {
                $status  = $r->STATUS == '1' ? '<span class="status--process">Adimplente</span>' : '<span class="status--denied">Inadimplente</span>';
                $data_r = array();

                $data_r[] = $r->ID;
                $data_r[] = $r->NOME . '<Br><small><b>Endereço: </b>' . $r->ENDERECO . '</small>';
                $data_r[] = $r->CONTATO;
                $data_r[] = $r->ESTADO . ' / ' . $r->CIDADE;
                $data_r[] = $status;
                $data_r[] = '<div class="table-data-feature">
                                    <button class="item iconEditClient" value="'. $r->ID .'" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
	                            <div class="table-data-feature">
									<button class="item iconDeleteClient" value="'. $r->ID .'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
									    <i class="zmdi zmdi-delete"></i>
									</button>
	                            </div>
                            </div>' ;
                $data[] = $data_r;
          }

            $total_clientes = $this->m_client->get_total_clientes($start, $length);
            $output = array(
               "draw" 				=> $draw,
                 "recordsTotal" 	=> $total_clientes,
                 "recordsFiltered" 	=> $total_clientes,
                 "data" 			=> $data
            );
          echo json_encode($output);
          exit();
	}

	public function addClient(){

			$nome 	= $this->input->post('client_nome');
			$cpf	= $this->input->post('client_cpf');

	        $checkClient = $this->m_client->check_client_exist($nome, $cpf);
	        if ($checkClient){
	            return false;
	        }else{

				$data=$this->m_client->client_add();
				echo json_encode($data);
			}
	}


	public function deleteUser(){
		$data=$this->m_client->delete_user();
		echo json_encode($data);
		
	}

	public function getDataClientForedit(){
		$data=$this->m_client->get_client_for_update();
		echo json_encode($data);
	}

	public function actionEditRecordClient(){
		$data=$this->m_client->action_EditClient();
		echo json_encode($data);
	}







}