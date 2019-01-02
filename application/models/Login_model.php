<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

    function __construct(){
            parent::__construct();

    }


    public function get_usuario_login($matricula)
    {
    	$query = $this->db->query
    		("SELECT * FROM ss_usuarios WHERE MATRICULA = '$matricula'");

	    	if ($query->num_rows() == 1)
            {   
                return $query->row();
            }
            else
            { return false; }
	}

    // public function get_password_verify($senha)
    // {
    //     $query = $this->db->query
    //         ("SELECT SENHA FROM ss_usuarios WHERE SENHA = '$senha' LIMIT 1");

    //         if ($query->num_rows() == 1)
    //         {  $row = $query->row();
    //             return $row->SENHA; 
    //         }
    //         else
    //         { return NULL; }
    // }

    public function get_info_usuario_after_login($matricula){

        $query = $this->db->query("SELECT*  FROM  ss_usuarios WHERE MATRICULA = '$matricula'");

            if ($query->num_rows() == 1)
            {
                return $query->row();
            }
            else
            {
                return false;
            }

        }


}