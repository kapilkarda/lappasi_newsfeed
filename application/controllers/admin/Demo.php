<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

#------------------------------------
#  login page view
#------------------------------------    
    public function __construct() {
        parent::__construct();
        #----------------------------------------
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4)) {
         redirect('admin/Sign_out');
        }
        #----------------------------------------
        $this->load->helper('form');
        $this->load->model('Write_setting_model','com');
        $this->load->model('auth/Auth_model','auth');
        $this->load->library('form_validation');
    }

#------------------------------------

#------------------------------------
    public function index() {
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/demo_delete');
        $this->load->view('admin/footer');        
    }

#------------------------------------

#------------------------------------
    public function delet_demo() {
        $this->db->where('news_id<=',102)->delete('news_mst');
        $this->db->where('news_id<=',102)->delete('news_position');
        $this->session->set_flashdata('message',display('delete_message'));
        redirect('admin/Demo');
    }

}

