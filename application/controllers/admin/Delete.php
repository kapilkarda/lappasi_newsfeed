<?php defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller {

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
        $this->load->helper('form', 'url');
        $this->load->model('admin/User_model', 'um');
    }

#-----------------------------------------
     # To delete single news
#-------------------------------------
    public function singal() {
        $this->load->model('admin/Common_function', 'model');
        $header = $this->model->meta_key();
        $news_id = $this->uri->segment(4);
        $result = $this->model->pb_delete($news_id);
        // redirecting to news list
         $user_type = $this->session->userdata('user_type'); 
        if ($user_type == 3) {
            redirect('admin/News_list');
        } else {
            redirect("admin/News_list/user_interface");
        }
    }


}

