<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    // public function get_users()
    // {

    // 	$query = $this->db->query
    // 		("SELECT * FROM ss_usuarios");
	   //  	if ($query->num_rows()) { return $query->result(); } else { return false; }
    // }

    var $table          = "ss_usuarios";  
    var $select_column  = array("ID", "NOME", "MATRICULA", "SENHA", "CREATED", "STATUS", "USER_CREATED");  
    var $order_column   = array(null, "ID", "NOME", "STATUS", null, null, null);  
    public function get_users()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("NOME", $_POST["search"]["value"]);  
                $this->db->or_like("MATRICULA", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
      }


    public function get_user__start_length(){  
           $this->get_users();  
           if(isset($_POST["length"]) != -1)  
           {  
                $this->db->limit(isset($_POST['length']), isset($_POST['start']));  
           }  
           $query = $this->db->get();  
           return $query->result();  
      } 


    public function get_users_filter()
    {
          $this->get_users();  
           $query = $this->db->get();  
           return $query->num_rows();
    }
 
    public function get_users_total()
    {
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results(); 
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
        $insert = $this->db->insert('ss_usuarios', $data);
        return $insert;        
        
    }


}