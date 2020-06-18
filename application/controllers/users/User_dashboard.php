<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        $this->load->helper('form'); 
        if($session_id == NULL ) {
         redirect('Registration/index');
        }
    }
       
#---------------------------------
#    add a new ad
#---------------------------------    
    public function user_profile() {
        $id = $this->session->userdata('id');
        $data['user_info'] = $this->db->select('*')->from('user_info')->where('id',$id)->get()->row_array();        
        $this->load->view('users/header',$data);
        $this->load->view('users/menu');
        $this->load->view('users/profile_view');
        $this->load->view('users/footer');
    }


}

