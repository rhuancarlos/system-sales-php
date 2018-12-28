<?PHP
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

    function __construct(){
            parent::__construct();

    }


    public function get_usuario_login($matricula, $senha){

    	$query = $this->db->query
    		("SELECT
    		 * 
    		FROM 
                ss_usuarios
    		WHERE
                MATRICULA = '$matricula'
            AND
                SENHA = '$senha' ");

	    	if ($query->num_rows() == 1)
            {
	    		return true;
	    	}
            else
            {
	    		return false;
	    	}

    	}

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