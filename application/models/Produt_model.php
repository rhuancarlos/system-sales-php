<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');

class Produt_model extends CI_Model{


    var $table          = "ss_produtos"; 
    var $select_column  = "ID";  
    var $order_column   = "DESC";  

    public function get_produts()  
      {

        $query = $this->db->get($this->table); 
        return $query->result();

      }


    public function get_produts_start()
    {  
            return $this->db
                ->limit($length, $start)
                ->get($this->table);
    } 

 
    public function get_total_produtos()
    {
        $query = $this->db->select("COUNT(*) as num")->get($this->table);
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }

    public function check_produt_exist($produts_descricao_c, $produts_cod_barras){
        $query = $this->db->query("SELECT count(*) AS NUM FROM $this->table WHERE DESCRICAO_C = '". $produts_descricao_c ."' OR COD_BARRAS = '". $produts_cod_barras ."' ");
        $result = $query->row();

        if ($result->NUM >= 1){
            return true;
        }
    }

    public function produt_add (){

       $data = array(
                'DESCRICAO_C'   => $this->input->post('produts_descricao_c'), 
                'DESCRICAO_P'   => $this->input->post('produts_descricao_p'),
                'QTD'           => $this->input->post('produts_qtd'),
                'PRECO_AVISTA'  => $this->input->post('produts_prc_avista'),
                'PRECO_APRAZO'  => $this->input->post('produts_prc_aprazo'),
                'COD_BARRAS'    => $this->input->post('produts_cod_barras'),
                'CREATED'       => date('Y-m-d H:m:s'),
                'STATUS'        => '0',
                'USUARIOS_ID'   => $this->session->userdata('codigo')
            );

        $query = $this->db->insert($this->table, $data);
        return $query;
        
    }

    public function delete_produt()
    {
        $codUser    =   $this->input->post('produt_cod');

        $this->db->where('ID', $codProdut);
        $query = $this->db->delete($this->table);
        return $query;

    }

    public function get_produt_for_update()
    {
    
    $codigo_produto = $this->input->post('codigo_produto');
    $query = $this->db->query("Select * from ". $this->table ." where ID = ". $codigo_produto ." ");
    return $query->result();
    }

    public function action_EditProdut(){
        $produt_cod         = $this->input->post('produt_cod');
        $produt_descricao_c = $this->input->post('produt_descricao_c');
        $produt_descricao_p = $this->input->post('produt_descricao_p');
        $produt_qtd         = $this->input->post('produt_qtd');
        $produt_prc_avista  = $this->input->post('produt_prc_avista');
        $produt_prc_aprazo  = $this->input->post('produt_prc_aprazo');
        $produt_cod_barras  = $this->input->post('produt_cod_barras');
        $produt_status      = ($produt_qtd > 0) ? 0:1;

        $this->db->set('DESCRICAO_C', $produt_descricao_c);
        $this->db->set('DESCRICAO_P', $produt_descricao_p);
        $this->db->set('QTD', $produt_qtd);
        $this->db->set('PRECO_AVISTA', $produt_prc_avista);
        $this->db->set('PRECO_APRAZO', $produt_prc_aprazo);
        $this->db->set('COD_BARRAS', $produt_cod_barras);
        $this->db->set('STATUS', $produt_status);
        $this->db->where('ID', $produt_cod);
        $this->db->update($this->table);
        return $this->db->affected_rows();

    }




}