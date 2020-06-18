<?php defined('BASEPATH') or exit('No direct script access allowed');

class Photo_list extends CI_Controller {
    // constructor function
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
        $this->load->model('admin/Common_function', 'cm');
        $this->load->library('pagination');
    }

#-----------------------------------------
    public function index($search=NULL) {
        $keyword = $this->input->get('search',true);
        $header = $this->cm->meta_key();
        
        // pagination settings
        $total_rows = $this->db->select('*')->from('photo_library')->like("picture_name",$keyword)->get()->num_rows();
        $limit = 15;
        $config["base_url"] = base_url("admin/Photo_list/index");
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
        $header["links"] = $this->pagination->create_links();

        $start = $this->uri->segment(4);
        $header['query'] = $this->db->select("*")
        ->from("photo_library")
        ->like("picture_name",$keyword)
        ->limit($limit,$start)
        ->order_by('id','DESC')
        ->get()
        ->result_array();

        $this->load->view('admin/header', $header);
        $this->load->view('admin/menu');
        $this->load->view('admin/view_photo_list');
        $this->load->view('admin/footer');
    }

}
