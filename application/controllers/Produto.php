<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('Produt_model', 'm_produt');
	}

	public function index(){
		
		if ($this->session->userdata('status_session') == 1):
				redirect('Produtos');
		else:
				redirect('Login/Autentica');//$this->load->view('page-login');
		endif;
	}

	public function viewlistProdut(){

		$data['metatitle'] 		= 	'Dashboard - System Sales';
		$data['getcontroller'] 	= 	$this->router->fetch_class();
		$data['getmethod'] 		= 	$this->router->fetch_method();
		$this->load->view('View_body_produtos', $data);
	}

	public function getProduts()
	{

		// Datatables Variables
		$draw 	= intval($this->input->get("draw"));
		$start 	= intval($this->input->get("start"));
		$length	= intval($this->input->get("length"));

		$produtos = $this->m_produt->get_produts();

		$data = array();

          foreach($produtos as $r) {
                $status  = $r->QTD != 0 ? '<span class="status--process">Disponivel</span>' : '<span class="status--denied">Indisponivel</span>';
                $data_r = array();

                $data_r[] = $r->ID;
                $data_r[] = $r->DESCRICAO_C . '<Br><small><b>Resumida: </b>' . $r->DESCRICAO_P . '</small>';
                $data_r[] = $r->QTD;
                $data_r[] = 'R$ ' . $r->PRECO_AVISTA;
                $data_r[] = 'R$ ' . $r->PRECO_APRAZO;
                $data_r[] = $r->COD_BARRAS;
                $data_r[] = $status;
                $data_r[] = '<div class="table-data-feature">
                                    <button class="item iconEditProdut" value="'. $r->ID .'" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
	                            <div class="table-data-feature">
									<button class="item iconDeleteProdut" value="'. $r->ID .'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
									    <i class="zmdi zmdi-delete"></i>
									</button>
	                            </div>
                            </div>' ;
                $data[] = $data_r;
          }

            $total_produtos = $this->m_produt->get_total_produtos($start, $length);
            $output = array(
               "draw" 				=> $draw,
                 "recordsTotal" 	=> $total_produtos,
                 "recordsFiltered" 	=> $total_produtos,
                 "data" 			=> $data
            );
          echo json_encode($output);
          exit();
	}

	public function addProdut(){

			$produts_descricao_c 	= $this->input->post('produts_descricao_c');
			$produts_cod_barras		= $this->input->post('produts_cod_barras');

	        $checkProdut = $this->m_produt->check_produt_exist($produts_descricao_c, $produts_cod_barras);
	        if ($checkProdut){
	            return false;
	        }else{

				$data=$this->m_produt->produt_add();
				echo json_encode($data);
			}
	}


	public function deleteUser(){
		$data=$this->m_produt->delete_user();
		echo json_encode($data);
		
	}

	public function getDataProdutForEdit(){
		$data=$this->m_produt->get_produt_for_update();
		echo json_encode($data);
	}

	public function actionEditRecordProdut(){
		$data=$this->m_produt->action_EditProdut();
		echo json_encode($data);
	}







}