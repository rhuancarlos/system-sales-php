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


    public function user_add (){

       $data = array(
            'NOME'          => $this->input->post('user_nome'),
            'MATRICULA'     => $this->input->post('user_matricula'),
            'SENHA'         => $this->input->post('user_senha'),
            'CREATED'       => date('Y-m-d H:m:s'),
            'STATUS'        => '0',
            'USER_CREATED'  => $this->session->userdata('nome')
        );
        #echo json_encode($data);
        $insert = $this->db->insert($this->table, $data);
        return $insert;        
        
    }

    public function delete_user()
    {
        $codUser    =   $this->input->post('user_cod');

        $this->db->where('ID', $codUser);
        $query = $this->db->delete($this->table);
        return $query;

    }


}