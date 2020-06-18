<?php defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Controller {

#-------------------------------------    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4)) {
         redirect('admin/Sign_out');
        }
        
        $this->load->helper('form');
        $this->load->library('pagination');
    }
#------------------------------------
#      view breaking news list
#------------------------------------ 
    public function breaking_news() {
        $total_rows = $this->db->select('*')->from('breaking_news')->get()->num_rows();

        // pagination settings
        $limit = 15;
        $config["base_url"] = base_url("admin/Common/breaking_news");
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
        $data['query'] = $this->db->select('*')
        ->from('breaking_news')
        ->limit($limit,$start)
        ->limit($limit, $start)
        ->order_by('id','DESC')
        ->get()
        ->result_array();


        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/view_breaking_news',$data);
        $this->load->view('admin/footer');
    }

#------------------------------------
#      save breaking news
#------------------------------------
    public function breaking_save() {
        $json_data['news_title'] = $this->input->post('breaking_news');
        $json_data['url'] = '';
        $json_encode = json_encode($json_data);
        $time_stamp = time() + (6 * 60 * 60); 
        $data = array(
            'id' => NULL,
            'title' => $json_encode,
            'time_stamp' => $time_stamp,
            'status' => 1
        );
        $this->db->insert('breaking_news', $data);
        $this->session->set_flashdata('message', display('breaking_add_msg'));
        redirect("admin/Common/breaking_news");
    }

#------------------------------------
#      Edit Breaking news
#------------------------------------/
    public function breaking_edit() {

        $json_data['news_title'] = $this->input->post('breaking_news');
        $json_data['url'] = '';
        $json_encode = json_encode($json_data);
        $time_stamp = time() + (6 * 60 * 60); // 6 hours; 60 mins; 60secs
        $id = $this->input->post('id');
        $data_arr = array(
            'title' => $json_encode,
            'time_stamp' => $time_stamp
        );
        $this->db->where('id', $id);
        $this->db->update('breaking_news', $data_arr);
        // writing breaking news
        $this->session->set_flashdata('message', array('msg' => display('update_message')));
        redirect("admin/Common/breaking_news");
    }

#----------------------------------------
     # To update breaking news status
#----------------------------------------    
    public function breaking_status_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('breaking_news', $data_arr);
        // writing breaking news
        redirect("admin/Common/breaking_news");
    }

#-----------------------------------------
#      To delete breaking news
#-----------------------------------------    
    public function breaking_delete() {
        $id = $this->uri->segment(4);
        $this->db->delete('breaking_news', array('id' => $id));
        redirect("admin/Common/breaking_news");
    }
#----------------------------------------
#   delete breaking new with selected
#----------------------------------------    
    public function breaking_delete_selected() {
        $id = $this->input->post("news_id");
        if (count($id) > 0) {
            for ($i = 0; $i <= count($id); $i++) {
                $this->db->where('id', $id[$i]);
                $this->db->delete('breaking_news');
            }
        }
        redirect("admin/Common/breaking_news");
    }



}