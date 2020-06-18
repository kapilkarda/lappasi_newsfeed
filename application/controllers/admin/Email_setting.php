<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email_setting extends CI_Controller {

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
        $data['email_config'] = $this->db->select('*')->from('email_config')->where('id',1)->get()->row();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/email/view_configeration',$data);
        $this->load->view('admin/footer');        
    }

#------------------------------------

#------------------------------------
    public function save() {
        $data = Array
            (
                'smtp_protocol' => $this->input->post('protocol'),
                'smtp_host' => $this->input->post('host'),
                'smtp_port' => $this->input->post('port'),
                'smtp_username' => $this->input->post('username'),
                'smtp_password' => $this->input->post('password'),
                'smtp_mailtype' => $this->input->post('mailtype'),
                'smtp_charset' => $this->input->post('charset'),
                'status' => ($this->input->post('status')?'1':0)
                
            );

            $id = $this->input->post('id');

            $this->db->where('id',$id)->update('email_config',$data);

            $this->session->set_flashdata('message', 'update successfully!');
            redirect('admin/Email_setting/index');
    }

}

