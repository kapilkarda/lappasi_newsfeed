<?php defined('BASEPATH') or exit('No direct script access allowed');

class News_list extends CI_Controller {

    protected $user_type;
#------------------------------------    
# constructor function
#------------------------------------    
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
        $this->load->library('pagination');
        $this->load->model("admin/View_setting_model", 'vsm');
    }


#-----------------------------------
#
#-----------------------------------    
    public function index() {

        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2)) {
         redirect('admin/Sign_out');
        }

        $data['time_zone'] = json_decode($this->vsm->get_previous_settings('settings', 17));

        $time_stamp = time();   
        $post_date = date('Y-m-d', $time_stamp);
        @$name = $this->input->get('r_name');
        @$page_name = $this->input->get('page_name');
        @$news_id = $this->input->get('news_id');

        $formdate = $this->input->get('formdate',true);
        $todate = $this->input->get('todate',true);

        if($news_id != NULL){
            @$where = "news_mst.news_id='" . $news_id . "'";
        }
        elseif($formdate != NULL AND $todate != NULL){
              @$f = date('Y-m-d',strtotime($formdate));
              @$t = date('Y-m-d',strtotime($todate));
              @$where="news_mst.post_date BETWEEN '$f' AND '$t'";  
       }
        elseif($name!=NULL){
            @$where = "news_mst.post_date='" . $post_date . "'";
            @$where .= "AND news_mst.post_by='" . $name . "'";
        }elseif($page_name!=NULL) {
           @$where = "news_mst.post_date='" . $post_date . "'";
           @$where.=" AND news_mst.page='" . $page_name . "'";
        }
        else{
            @$where = "news_mst.is_latest='1'";
        }
        $limit = 20;
        // pagination settings
        $total_rows = $this->db->select('*')->from('news_mst')->where($where)->get()->num_rows();
        
        $config["base_url"] = base_url("admin/News_list/index/");
        $config['suffix'] = '?'.http_build_query($_GET, '', "&");
        $config['first_url'] = $config['base_url'].$config['suffix'];

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
        @$start = $this->uri->segment(4);

        $data['pp'] = $this->db->select('news_mst.*,user_info.name')
        ->from('news_mst')
        ->join('user_info','user_info.id=news_mst.post_by')
        ->where($where)
        ->limit($limit,$start)
        ->order_by('news_mst.id','DESC')
        ->get()
        ->result_array(); 

        // $query = $this->db->query("SELECT news_mst.*, user_info.name FROM news_mst  JOIN  user_info ON user_info.id = news_mst.post_by WHERE $where ORDER BY news_mst.id DESC LIMIT 25");  
        $data['cat'] = $this->db->select("*")->from('categories')->order_by('position','ASC')->get()->result();
        $data['reporter'] = $this->db->select()->from('user_info')->get()->result();
        // $data['pp']= $query->result_array();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/view_news_list',$data);
        $this->load->view('admin/footer');
    }


#-----------------------------------
    // viewing User Interface
    function user_interface() {
        $post_by =$this->session->userdata('id');
        $time_stamp = time();   
        $post_date = date('Y-m-d', $time_stamp);
        $page_name = $this->input->post('page_name');
        $news_id = $this->input->post('news_id');
        $formdate = $this->input->post('formdate');
        $todate = $this->input->post('todate');
        
        if($news_id !=NULL){
            @$where = "news_mst.news_id='" . $news_id . "'";
            @$where.=" AND news_mst.post_by='" . $post_by . "'";
        }
        elseif($formdate != NULL AND $todate != NULL){
              @$f = date('Y-m-d',strtotime($formdate));
              @$t = date('Y-m-d',strtotime($todate));
              @$where="news_mst.post_date BETWEEN '$f' AND '$t'";  
              @$where.=" AND news_mst.post_by='" . $post_by . "'";  
       }
        elseif ($page_name !=NULL) {
            @$where = "news_mst.post_date='" . $post_date . "'";
            @$where.=" AND news_mst.page='" . $page_name . "'";
            @$where.=" AND news_mst.post_by='" . $post_by . "'";
        }
        else{
            @$where ="news_mst.post_by='" . $post_by . "'";
        }

        // pagination settings
        $total_rows = $this->db->select('*')
        ->from('news_mst')
        ->where($where)
        ->get()
        ->num_rows();
        
        $limit = 20;
        $config["base_url"] = base_url("admin/News_list/user_interface");
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
        $start = $this->uri->segment(3);
        $data['time_zone'] = json_decode($this->vsm->get_previous_settings('settings', 17));
        // $query = $this->db->query("SELECT news_mst.*, 'user_info.name' FROM news_mst  JOIN  user_info ON user_info.id = news_mst.post_by WHERE $where  ORDER BY news_mst.id DESC LIMIT '13' ");    
        $data['pp'] = $this->db->select('news_mst.*,user_info.name')
        ->from('news_mst')
        ->join('user_info','user_info.id=news_mst.post_by')
        ->where($where)
        ->limit(20)
        ->order_by('news_mst.id','DESC')
        ->get()
        ->result_array(); 

        $data['cat'] = $this->db->select("*")->from('categories')->order_by('position','ASC')->get()->result();
        $data['reporter'] = $this->db->select()->from('user_info')->get()->result();
        // $data['pp']= $query->result_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/user_news_list_view');
        $this->load->view('admin/footer');
    }



}
