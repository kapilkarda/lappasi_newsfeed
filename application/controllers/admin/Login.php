<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

#------------------------------------
#  login page view
#------------------------------------    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Write_setting_model','com');
        $this->load->model('auth/Auth_model','auth');
        $this->load->library('form_validation');
    }


#------------------------------------
     # To view Login Page
#------------------------------------
    public function index() {
        $data['website_logo'] = $this->com->website_logo();
        $data['footer_logo'] = $this->com->footer_logo();
        $data['website_title'] = $this->com->website_title();
        $data['website_footer'] = $this->com->website_footer();
        $results = $this->db->select('*')->from("settings")->where('id', 15)->get()->row();
        $data['favicon'] = json_decode($results->details);
        $this->load->view('admin/view_login',$data);
        
    }
#------------------------------------
#
#------------------------------------     
    public function check_user() {

        $data = array(
            'email' => ($this->input->post('email',TRUE)),
            'password' => ($this->input->post('password',TRUE))
        );

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $sdata['exception'] =  display('log_error_msg');
            $this->session->set_userdata($sdata);
            redirect('admin/Login');
        } else {

        $data = $this->auth->user_login($data);


          if($data){

                $session_data = array(
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'pen_name' => $data['pen_name'],
                    'user_type' => $data['user_type'],
                    'email' => $data['email'],
                    'session_id' => session_id(),
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($session_data);

                if ($data['user_type'] == 1) {
                
                    redirect("admin/Comments_manage/index");
                
                } else if ($data['user_type'] == 2) {
                
                    redirect("admin/News_post/user_interface");
                
                } else if ($data['user_type'] == 3) {
               
                    redirect("admin/News_post");

                } else if ($data['user_type'] == 4) {
               
                    redirect("admin/News_post");

                } else {

                    redirect('admin/Login');

                }

            } else {

                $sdata['exception'] = display('log_error_msg');
                $this->session->set_userdata($sdata);
                redirect('admin/Login');

            }
            

        }
    }


}

