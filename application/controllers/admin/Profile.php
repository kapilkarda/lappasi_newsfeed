<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        $this->load->model('admin/Common_function', 'model');
        $this->load->helper('form');
    }

    public function index() {
        $post_by = $this->session->userdata('id');
        $query = $this->db->query("SELECT * FROM user_info WHERE id='$post_by'");
        $header['user_info'] = $query->row_array();

        $this->load->view('admin/header',$header);
        $this->load->view('admin/menu');
        $this->load->view('admin/profile_view');
        $this->load->view('admin/footer');
    }

    #user_info_update;
    public function update_user_info() {
        $post_by = $this->session->userdata('id');
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $_POST);
        redirect('admin/Profile');
    }

    #-----------------
    public function change_password(){
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/password_change_view');
        $this->load->view('admin/footer');
    }

    #------------------------
    public function save_change(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/password_change_view');
        $this->load->view('admin/footer');
        }else{
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');
            if($new_password==$confirm_password){
                $password =  md5($new_password);
                $id = $this->session->userdata('id');
                $this->db->set('password',$password)->where('id',$id)->update('user_info');
                $this->session->set_flashdata('message','
                     <div class="alert alert-success">
                <button class="close" data-dismiss="alert">&times;</button>
            Password Change successfully</div>');
                redirect('admin/Profile/change_password');
            }else{
                $this->session->set_flashdata('message','
                     <div class="alert alert-danger">
                <button class="close" data-dismiss="alert">&times;</button>
            Confirm Password Does not match</div>');
                redirect('admin/Profile/change_password');
            }
        }
    }

}
