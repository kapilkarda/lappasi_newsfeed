<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pulling extends CI_Controller {

    public function __construct() {
        parent::__construct();
        #----------------------------------------
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2)) {
         redirect('admin/Sign_out');
        }
        #----------------------------------------
        $this->load->helper('form');
        $this->load->model('admin/Common_function', 'photo');
    }

#-------------------------------------
#      To view pulling
#-------------------------------------    
    public function index() {
        $data['query'] = $this->db->select('*')->from('pulling')->order_by('id','DESC')->get()->result_array();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/view_pulling',$data);
        $this->load->view('admin/footer');
    }

#-------------------------------------
#      To save pulling question
#-------------------------------------
    public function save() {
        $pulling = trim($this->input->post('pulling'));
        if ($pulling) {
            $time_stamp = time() + (6 * 60 * 60); // 6 hours; 60 mins; 60secs
            $data = array(
                'id' => NULL,
                'question' => $pulling,
                'yes' => 0,
                'no' => 0,
                'on_comment' => 0,
                'time_stamp' => $time_stamp,
                'status' => 1
            );
            $this->db->insert('pulling', $data);
            $this->session->set_flashdata('message','Post Success');
        }
        redirect("admin/Pulling");
    }
#-----------------------------------
#      To edit pulling question
#-----------------------------------
    public function edit() {
        $time_stamp = time() + (6 * 60 * 60); // 6 hours; 60 mins; 60secs
        $id = $this->input->post('id');
        $data_arr = array(
            'question' => $this->input->post('pulling'),
            'time_stamp' => $time_stamp
        );
        $this->db->where('id', $id);
        $this->db->update('pulling', $data_arr);
        $this->session->set_flashdata('message',display('update_message'));
        redirect("admin/Pulling");
    }
#------------------------------------------
#     to edit pulling question status
#------------------------------------------    
    public function status_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('pulling', $data_arr);
         $this->session->set_flashdata('message',display('update_message'));
        redirect("admin/Pulling");
    }
#-----------------------------------------------
#     to delete individual pulling question
#----------------------------------------------    	
    public function delete() {
        $id = $this->uri->segment(4);
        $this->db->delete('pulling', array('id' => $id));
         $this->session->set_flashdata('message',display('delete_message'));
        redirect("admin/Pulling");
    }

}

