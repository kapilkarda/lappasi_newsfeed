<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_profile extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('Registration/index');
        }
        $this->load->model('admin/Common_function', 'model');
        $this->load->helper('form');
    }



    public function index() {
        $id = $this->session->userdata('id');
        $data['user_info'] = $this->db->select('*')->from('user_info')->where('id',$id)->get()->row_array();        
        $this->load->view('users/header',$data);
        $this->load->view('users/menu');
        $this->load->view('users/profile_view');
        $this->load->view('users/footer');
    }



#-----------------------------------------
    # To update user photo
#-----------------------------------------    
    public function user_photo() {

            if (@$_FILES['user_photo']['name']) {
                $config['upload_path']   = './uploads/user/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['overwrite']     = false;
                $config['max_size']      = 1024;
                $config['remove_spaces'] = true;
                $config['max_filename']   = 10;
                $config['file_ext_tolower'] = true;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('user_photo'))
                {
                   $error = $this->upload->display_errors();
                   $this->session->set_flashdata('exception',$error);
                   redirect("users/User_profile");
                } else {
                
                 $data = $this->upload->data();
                 $image = $config['upload_path'].$data['file_name'];

                }

                } else {
                    $image = $this->input->post('user_pic',TRUE);
                }

            $post_by = $this->session->userdata('id');
            $data_arr = array(
                'photo' => $image
            );
            $this->db->where('id', $post_by);
            $this->db->update('user_info', $data_arr);
        
        redirect("users/User_profile");
    }


    #user_info_update;
    public function update_user_info() {
        $post_by = $this->session->userdata('id');
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $_POST);
        redirect('users/User_profile');
    }

    #-----------------
    public function change_password(){
        $this->load->view('users/header');
        $this->load->view('users/menu');
        $this->load->view('users/password_change_view');
        $this->load->view('users/footer');
    }

    #------------------------
    public function save_change(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
        $this->load->view('users/header');
        $this->load->view('users/menu');
        $this->load->view('users/password_change_view');
        $this->load->view('users/footer');
        }else{
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');
            
            if($new_password==$confirm_password){

                $password =  md5($new_password);

                $id = $this->session->userdata('id');

                $this->db->set('password',$password)->where('id',$id)->update('user_info');
                
                $this->session->set_flashdata('message','<div class="alert alert-success">Password Change successfully</div>');
                
                redirect('users/User_profile/change_password');
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger">Confirm Password Does not match</div>');
                redirect('users/User_profile/change_password');
            }
        }
    }

public function log_out(){
    $post_by = $this->session->userdata('id');
        $time_stmp = date("Y-m-d h:i:s");
        $data_arr = array(
            'logout_time' => $time_stmp
        );
    $this->db->where('id', $post_by);
    $this->db->update('user_info', $data_arr);
    $this->session->sess_destroy();
    redirect(base_url());
}


}

