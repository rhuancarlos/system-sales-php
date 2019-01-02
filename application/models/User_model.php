<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{


    var $table          = "ss_usuarios"; 
    var $select_column  = "ID";  
    var $order_column   = "DESC";  

    public function get_users()  
      {

        $query = $this->db->get($this->table); 
        return $query->result();

      }


    public function get_user_start()
    {  
            return $this->db
                ->limit($length, $start)
                ->get($this->table);
    } 

 
    public function get_total_membros()
    {
        $query = $this->db->select("COUNT(*) as num")->get($this->table);
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }

    public function check_user_exist($matricula){
        $query = $this->db->query("SELECT count(*) AS NUM FROM $this->table WHERE MATRICULA = ". $matricula ." ");
        $result = $query->row();

        if ($result->NUM >= 1){
            return true;
        }
    }

    public function user_add (){

       $data = array(
            'NOME'          => $this->input->post('user_nome'),
            'MATRICULA'     => $this->input->post('user_matricula'),
            'SENHA'         => password_hash($this->input->post('user_senha'), PASSWORD_DEFAULT),
            'CREATED'       => date('Y-m-d H:m:s'),
            'STATUS'        => '0',
            'USER_CREATED'  => $this->session->userdata('nome')
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

    public function get_user_for_update(){
    
    $codigo_user = $this->input->post('codigo_user');
    $query = $this->db->query("Select * from ". $this->table ." where ID = ". $codigo_user ." ");
    return $query->result();

    }

    public function action_EditUser(){
        $user_cod       = $this->input->post('user_cod');
        $user_nome      = $this->input->post('user_nome');
        $user_matricula = $this->input->post('user_matricula');
        $user_status    = $this->input->post('user_status');
        $user_senha     = $this->input->post('user_senha');

        $this->db->set('NOME', $user_nome);
        $this->db->set('MATRICULA', $user_matricula);
        $this->db->set('STATUS', $user_status);
        $this->db->set('SENHA', password_hash($user_senha, PASSWORD_DEFAULT));
        $this->db->where('ID', $user_cod);
        $this->db->update($this->table);
        return $this->db->affected_rows();

    }




}