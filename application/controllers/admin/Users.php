<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        $user_type = $this->session->userdata('user_type'); 
        
        if(($user_type != 3) AND ($user_type != 4)) {
       
          redirect('admin/Sign_out');
        }

        $this->load->model("admin/User_model", 'um');
        $this->load->helper('form');
    }

#-----------------------------------
#
#----------------------------------- 
    public function registration() {
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/new_registration');
        $this->load->view('admin/footer');
    }


#-----------------------------------
#   save new user    
#-----------------------------------
    public function create_new_usr() {

        
        $user_data['name']      = $this->input->post("name");
        $user_data['email']     = $this->input->post("email");
        $user_data['password']  = md5($this->input->post("password"));
        $user_data['mobile']    = $this->input->post("mobile");
        $photo                  = $_FILES['photo']['name'];
        $user_data['user_type'] =  $this->input->post("type");
        $user_data['status']    = 1;

        //check user exist
        $check_status = $this->um->checkUserExist($user_data); 

        if ($check_status) {
            $this->session->set_flashdata('exception', "User already exist.");
        } else {

            if ($user_data['name'] == '' || $user_data['email'] == '' || $user_data['password'] == '') {
                $this->session->set_flashdata('exception', "Please enter required information.");
            } else {
                $key = md5(microtime() . rand());
                // upload image
                if ($_FILES['photo']['name'] != '') {
                    $user_data['photo'] = 'uploads/user/' . $key . '.png';
                    copy($_FILES['photo']['tmp_name'], $user_data['photo']);
                }
                $this->um->saveUserInfo('user_info', $user_data);
                $this->session->set_flashdata('message', display('user_reagistration_message'));
            }
        }
        redirect('admin/Users/registration');
    }


#-------------------------------------
#     last 20 access user list
#-------------------------------------    
    public function last_20_access() {
        $data['last_access'] = $this->um->getLast20Access();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/last_access');
        $this->load->view('admin/footer');
    }

#-------------------------------------
#   clear all access data with logout
#-------------------------------------
    public function clearLog() {
        $this->um->clearLogData();
        $this->session->set_flashdata("message", 'Log Cleared Successfully.');
        redirect('admin/Users/last_20_access');
    }

#-----------------------------------
    public function repoter_list() {

        $data['query'] = $this->db->Select("*")
        ->from('user_info')
        ->where('user_type!=',3)
        ->where('user_type!=',5)
        ->get()
        ->result_array();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/view_repoter_list');
        $this->load->view('admin/footer');
    }

#-----------------------------------
    public function repoter_delete() {
        $id = $this->uri->segment(4);
        $this->db->delete('user_info', array('id' => $id));
        redirect("admin/Users/repoter_list");
    }

#-------------------------------------
    public function repoter_status_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);
        redirect("admin/Users/repoter_list");
    }

#-----------------------------------
    public function repoter_type_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 3) ? 1 : 3;
        $data_arr = array('user_type' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);
        redirect("admin/Users/repoter_list");
    }
#----------------------------------
    public function repoter_post_approval_status(){
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('post_ap_status' => $status);
        $this->db->where('id', $id);
        $this->db->update('user_info', $data_arr);
        redirect("admin/Users/repoter_list");
    }    


    public function repoter_edit($reporter_id) {
        $data['user_info'] = $this->um->GetUserInfoByID($reporter_id);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/view_repoter_edit');
        $this->load->view('admin/footer');
    }


    public function update_reporter_info($id = 0) {
        if (isset($id)) {
            
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['mobile'] = $this->input->post('mobile');
            $data['user_type'] = $this->input->post('type');

            if (trim($this->input->post('password')) != '') {
                $data['password'] = md5($this->input->post('password'));
            }

            $this->um->UpdateReporterInfoById($id, $data);
            $this->session->set_flashdata('message', display('update_message'));
        }
        redirect('admin/Users/repoter_list');
    }





}