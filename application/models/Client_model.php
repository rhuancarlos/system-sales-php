<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model{


    var $table          = "ss_clientes"; 
    var $select_column  = "ID";  
    var $order_column   = "DESC";  

    public function get_clients()  
      {

        $query = $this->db->get($this->table); 
        return $query->result();

      }


    public function get_clients_start()
    {  
            return $this->db
                ->limit($length, $start)
                ->get($this->table);
    } 

 
    public function get_total_clientes()
    {
        $query = $this->db->select("COUNT(*) as num")->get($this->table);
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }

    public function check_client_exist($nome, $cpf){
        $query = $this->db->query("SELECT count(*) AS NUM FROM $this->table WHERE NOME = '". $nome ."' AND CPF = '". $cpf ."' ");
        $result = $query->row();

        if ($result->NUM >= 1){
            return true;
        }
    }

    public function client_add (){

       $data = array(
                'NOME'     => $this->input->post('client_nome'), 
                'CPF'      => $this->input->post('client_cpf'),
                'RG'       => $this->input->post('client_rg'),
                'ENDERECO' => $this->input->post('client_endereco'),
                'NUMERO'   => $this->input->post('client_numero'),
                'ESTADO'   => $this->input->post('client_uf'),
                'CIDADE'   => $this->input->post('client_cidade'),
                'CONTATO'  => $this->input->post('client_contato'),
                'RENDA'    => $this->input->post('client_renda'),
                'CREATED'       => date('Y-m-d H:m:s'),
                'STATUS'        => '0',
                'USUARIOS_ID'   => $this->session->userdata('codigo')
            );

        $query = $this->db->insert($this->table, $data);
        return $query;
        
    }

    public function delete_user()
    {
        $codUser    =   $this->input->post('user_cod');

        $this->db->where('ID', $codUser);
        $query = $this->db->delete($this->table);
        return $query;

    }

    public function get_client_for_update(){
    
    $codigo_cliente = $this->input->post('codigo_cliente');
    $query = $this->db->query("Select * from ". $this->table ." where ID = ". $codigo_cliente ." ");
    return $query->result();

    }

    public function action_EditClient(){
        $user_cod       = $this->input->post('client_cod');
        $user_nome      = $this->input->post('client_nome');
        $user_cpf       = $this->input->post('client_cpf');
        $user_rg        = $this->input->post('client_rg');
        $user_endereco  = $this->input->post('client_endereco');
        $user_numero    = $this->input->post('client_numero');
        $user_uf        = $this->input->post('client_uf');
        $user_cidade    = $this->input->post('client_cidade');
        $user_contato   = $this->input->post('client_contato');
        $user_renda     = $this->input->post('client_renda');
        $user_status    = $this->input->post('client_status');


        $this->db->set('NOME', $user_nome);
        $this->db->set('CPF', $user_cpf);
        $this->db->set('RG', $user_rg);
        $this->db->set('ENDERECO', $user_endereco);
        $this->db->set('NUMERO', $user_numero);
        $this->db->set('ESTADO', $user_uf);
        $this->db->set('CIDADE', $user_cidade);
        $this->db->set('CONTATO', $user_contato);
        $this->db->set('RENDA', $user_renda);
        $this->db->set('STATUS', $user_status);
        $this->db->where('ID', $user_cod);
        $this->db->update($this->table);
        return $this->db->affected_rows();

    }




}