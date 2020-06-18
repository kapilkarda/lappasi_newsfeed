<?php defined('BASEPATH') or exit('No direct script access allowed');

class Comments_manage extends CI_Controller {

#-------------------------------------    
    public function __construct() {

        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2) AND ($user_type!=1)) {
         redirect('admin/Sign_out');
        }
        
        $this->load->helper('form');
        $this->load->library('pagination');

    }



#------------------------------------
#      view breaking news list
#------------------------------------ 
    public function index() {


        $total_rows = $this->db->select('*')->from('comments_info')->get()->num_rows();
        $limit = 15;
        $config["base_url"] = base_url("admin/Comments_manage/index");
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $limit;
        // integrate bootstrap pagination
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);

        $data["links"] = $this->pagination->create_links();
        
        $start = $this->uri->segment(4);
        $data['comments'] = $this->db->select('comments_info.*,user_info.name,user_info.photo,user_info.email')
        ->from('comments_info')
        ->join('user_info','user_info.id=comments_info.com_user_id')
        ->limit($limit,$start)
        ->order_by('comments_info.com_id','DESC')
        ->get()->result();



        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/Comment_list',$data);
        $this->load->view('admin/footer');
    }

    public function get_com_by_id($id){
            $data = $this->db->select('*')
            ->from('comments_info')
            ->where('com_id',$id)
            ->get()
            ->row();
            echo json_encode($data);
    }

    public function delete_comments($com_id=NULL){
        $this->db->where('com_id',$com_id)->delete('comments_info');
        $this->session->set_flashdata('message','Delete Comment Successfully!');
        redirect('admin/Comments_manage/index');
    }

    public function varifid($com_id=NULL){
        $this->db->set('com_status',1)->where('com_id',$com_id)->update('comments_info');
        $this->session->set_flashdata('message','Update Successfully!');
        redirect('admin/Comments_manage/index');
    }
     public function un_varifid($com_id=NULL){
        $this->db->set('com_status',0)->where('com_id',$com_id)->update('comments_info');
        $this->session->set_flashdata('message','Update Successfully!');
        redirect('admin/Comments_manage/index');
    }


}