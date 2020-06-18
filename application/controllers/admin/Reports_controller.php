<?php defined('BASEPATH') or exit('No direct script access allowed');

class Reports_controller extends CI_Controller {

#------------------------------------    
# constructor function
#------------------------------------    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
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
    }


#-----------------------------------
#
#-----------------------------------    
    public function index() {
        $time_stamp = time();   
        $post_date = date('Y-m-d', $time_stamp);
        $name = $this->input->post('r_name');
        $page_name = $this->input->post('page_name');
        $news_id = $this->input->post('news_id');

        $formdate = $this->input->post('formdate');
        $todate = $this->input->post('todate');

        if($news_id!=NULL){
            @$where = "news_mst.news_id='" . $news_id . "'";
        }
        elseif($formdate!=NULL && $todate!=NULL){
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
            @$where = " post_date='" . $post_date . "'";
        }

        $query = $this->db->query("SELECT news_mst.*, user_info.name FROM news_mst  JOIN  user_info ON user_info.id = news_mst.post_by WHERE $where  ORDER BY news_mst.id DESC");        
        $data['cat'] = $this->db->select("*")->from('categories')->order_by('position','ASC')->get()->result();
        $data['reporter'] = $this->db->select()->from('user_info')->get()->result();
        $data['pp']= $query->result_array();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/reports_list',$data);
        $this->load->view('admin/footer');


    }






}
