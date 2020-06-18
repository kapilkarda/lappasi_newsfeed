<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

#***************************
# end function create_table;
    public function user_login($data) {

        $query = $this->db->select('*')
        ->from('user_info')
        ->where('email', trim($data['email']))
        ->where('password', md5($data['password']))
        ->where('status', 1)
        ->get();

        if ($query->num_rows()>0) {
           return $row = $query->row_array(); 
        } 
        
    }

}

?>