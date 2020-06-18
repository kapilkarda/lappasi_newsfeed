<?php defined('BASEPATH') or exit('No direct script access allowed');

class Social_auth_setting extends CI_Controller{
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

        $this->load->helper('form', 'url');
    }

    public function index(){

        $data['social_auth'] = $this->db->select('*')->from('social_auth')->get()->result();
    	$this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/view_social_auth_setting');
        $this->load->view('admin/footer');
    }


    public function update(){
        $id = $this->input->post('id');
        $app_id = $this->input->post('app_id');
        $app_secret = $this->input->post('app_secret');
        $api_key = $this->input->post('api_key');

        foreach($id as $key => $auth_id){
            $data = array(
                'app_id'  => $app_id[$key],
                'app_secret'  => $app_secret[$key],
                'api_key'  => $api_key[$key],
            );
        $this->db->where('id',$auth_id)->update('social_auth',$data);
        }

        $this->session->set_flashdata('message',display('update_message'));
        redirect('admin/Social_auth_setting');
    }

    public function update_status($id,$status){
        $new_status = ($status==1?'0':'1');
        $this->db->set('status',$new_status)->where('id',$id)->update('social_auth');
        redirect('admin/Social_auth_setting');
    }


}