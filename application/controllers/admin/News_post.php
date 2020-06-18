<?php defined('BASEPATH') or exit('No direct script access allowed');

class News_post extends CI_Controller {
#----------------------------
#   constructor function                            
#---------------------------- 
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
    $this->load->model('admin/Common_function', 'npost');

}

#----------------------------
# To add new post
#----------------------------    
public function index() {

    $data['cat'] = $this->db->select("*")->from('categories')->order_by('position','ASC')->get()->result();  
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('admin/view_post',$data);
    $this->load->view('admin/footer');

}


public function get_youtube_id_from_url($url) 
{
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $url, $match)) {
    return $match['1']; 
    }else{
        return $video='';
    }
}

#------------------------------------
#   save post
#------------------------------------    
    public function post() {


        // on page SEO
        $post_keyword = trim($this->input->post('meta_keyword'));
        $post_description = trim($this->input->post('meta_description'));

        if ($post_keyword != '' || $post_keyword != '') {

            $post_meta['meta_keyword'] = $post_keyword;
            $post_meta['meta_description'] = $post_description;
        
        }

        if ($_FILES['file_select_machin']['name']) {

            $pst_imge = $_FILES['file_select_machin']['name'];
            $image_chk = explode(".",$pst_imge);
            $extent = end($image_chk);

            if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){
                $sizes = array(200 => 135, 600 => 400);
                $file_location = $this->npost->do_upload($_FILES['file_select_machin'], $sizes);
                if(@$file_location['msg']!=NULL){
                    $this->session->set_flashdata('exception', $file_location['msg']);
                    redirect('admin/News_post');
                } else {
                    $image = explode('/', $file_location[0]);
                    $image = end($image);
                }
                
            } else{
                $this->session->set_flashdata('exception','This File Not allowed!');
                redirect('admin/News_post');
            }
            
        } 
        else {
            $image = $this->input->post('lib_file_selected');
        }

    if($this->session->userdata('user_type')==2){

        $d = $this->db->select('post_ap_status,id')->from('user_info')->where('id',$this->session->userdata('id'))->get()->row(); 
        
        if($d->post_ap_status !=0){
            $post_ap_status = 1;
        }else{
            $post_ap_status = 0;
        }
    } else{
         $post_ap_status = $this->input->post('status_confirmed');
    }

        $data = array(
            'home_page' => $this->input->post('home_page'),
            'other_page' => $this->input->post('other_page'),
            'other_position' => $this->input->post('other_position'),
            'image' => $image,
            'picture_name' => $this->input->post('picture_name'),
            'videos' => $this->get_youtube_id_from_url($this->input->post('videos')),
            'stitle' => $this->input->post('short_head'),
            'title' => $this->input->post('head_line'),
            'reporter' => $this->input->post('reporter'),
            'news' => $this->input->post('details_news'),
            'confirm_dynamic_static' => $this->input->post('confirm_dynamic_static'),
            'latest_confirmed' => $this->input->post('latest_confirmed'),
            'breaking_confirmed' => $this->input->post('breaking_confirmed'),
            'send_to_temp' => $this->input->post('send_to_temp'),
            'reference' => $this->input->post('reference'),
            'ref_date' => $this->input->post('ref_date'),
            'publish_date'      => ($this->input->post('publish_date')!=NULL?$this->input->post('publish_date'):$this->input->post('ref_date')),
            'post_by' => $this->session->userdata('id'),
            'status1' =>  $post_ap_status
        );



        $result = $this->npost->pbnews_post($data);
        if (isset($post_meta)) {
            $post_meta['news_id'] = $result['news_id'];
            $this->npost->save_meta_on_page_seo('post_seo_onpage', $post_meta);
        }
        $this->session->set_flashdata('message', display('news_post_msg'));
        redirect("admin/News_post");
    }

#----------------------------------------------
#   My window to select  images form library
#----------------------------------------------
    public function my_window() {
        $this->load->view('admin/header');
        $this->load->view('admin/includes/image_search');
        $this->load->view('admin/footer');
    }

#------------------------------------------
#      viewing user interface
#------------------------------------------    
    function user_interface() {
        
        $data['cat'] = $this->db->select("*")->from('categories')->order_by('position','ASC')->get()->result();  
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/view_post',$data);
        $this->load->view('admin/footer');
    }
 

}
