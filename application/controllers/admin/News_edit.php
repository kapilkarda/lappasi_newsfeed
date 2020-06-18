<?php defined('BASEPATH') or exit('No direct script access allowed');

class News_edit extends CI_Controller {

    protected $user_type;

#------------------------------------
    # constructor function
#-----------------------------------    
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
        $this->load->model("admin/Category_model", 'category_model');
    }

#----------------------------------
    # New edit view
#---------------------------------    
    public function index($news_id=NULL) {
        $data['row'] = $this->db->select("news_mst.*,user_info.id,user_info.name")
        ->from('news_mst')
        ->join('user_info','user_info.id=news_mst.post_by')
        ->where('news_mst.news_id',$news_id)
        ->get()
        ->row_array();
        $data['seo_info'] = $this->db->select('*')->from('post_seo_onpage')->where('news_id',$news_id)->get()->row_array();
        $data['categories'] = $this->category_model->all_categories();
        
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/view_edit');
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

#--------------------------------------------
# To update news according to News ID
#--------------------------------------------
    public function update() {

        if ((trim($this->input->post('meta_keyword'))) != '' || (trim($this->input->post('meta_description'))) != '') {
            $post_meta['meta_keyword'] = trim($this->input->post('meta_keyword'));
            $post_meta['meta_description'] = trim($this->input->post('meta_description'));
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
                   $id = $this->input->post('news_id');
                   redirect('admin/News_edit/index/'.$id);
                } else {
                    $image = explode('/', $file_location[0]);
                    $image = end($image);
                }

               

            } else{
                $this->session->set_flashdata('exception','This File Not allowed!');
                $id = $this->input->post('news_id');
                redirect('admin/News_edit/index/'.$id);
            }
            
        } else if ($this->input->post('lib_file_selected') != '') {
            $image = $this->input->post('lib_file_selected');
        } else {
            $image = $this->input->post('image_old');
        }
        
        // news data
        $data = array(

            'news_id'           => $this->input->post('news_id'),
            'home_page'         => $this->input->post('home_page'),
            'other_page'        => $this->input->post('other_page'),
            'other_position'    => $this->input->post('other_position'),
            'picture_name'      => $this->input->post('picture_name'),
            'image'             => $image,
            'videos'            => $this->input->post('videos'),
            'stitle'            => $this->input->post('short_head'),
            'title'             => $this->input->post('head_line'),
            'reporter'          => $this->input->post('reporter'),
            'news'              => $this->input->post('details_news'),
            'reference'         => $this->input->post('reference'),
            'ref_date'          => $this->input->post('ref_date'),
            'post_date'         => $this->input->post('ref_date'),
            'publish_date'      => ($this->input->post('publish_date')?$this->input->post('publish_date'):$this->input->post('ref_date')),
            'pp'                => $this->input->post('pp'),
            'pp'                => $this->input->post('post_by'),
            'update_boy'        => $this->session->userdata('id')
            
        );

        $update_position = $this->npost->update_category($data);
        
        $result = $this->npost->update_news($data);
        
        // update meta information
        if (isset($post_meta)) {
            $news_id = $this->input->post('news_id');
            //check meta data exist
            $check_status = $this->npost->check_meta_exist($news_id);
            if ($check_status) {
                $this->npost->update_meta_on_page_seo('post_seo_onpage', $post_meta, $news_id);
            } else {
                $post_meta['news_id'] = $news_id;
                $this->npost->save_meta_on_page_seo('post_seo_onpage', $post_meta);
            }
        }
        $this->session->set_flashdata('message', $result);
        redirect("admin/News_list");
    }

#-----------------------------------------
    public function publishd($news_id) {
        $this->db->set('status', 0);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_mst');

        $this->db->set('status', 1);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_position');
        
        if ($this->session->userdata['user_type'] == 1) {
            redirect("admin/News_list/user_interface");
        } else {
            redirect("admin/News_list");
        }
    }

#----------------------------------------
    public function unpublishd($news_id) {
        $this->db->set('status', 1);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_mst');
        $this->db->set('status', 0);
        $this->db->where('news_id', $news_id);
        $this->db->update('news_position');

        if ($this->session->userdata['user_type'] == 1) {
            redirect("admin/News_list/user_interface");
        } else {
            redirect("admin/News_list");
        }
    }

#------------------------------------------
     # To view user interface
#-------------------------------------------
    function user_news_edit($news_id=NULL) {
        $data['row'] = $this->db->select("news_mst.*,user_info.id,user_info.name")
        ->from('news_mst')
        ->join('user_info','user_info.id=news_mst.post_by')
        ->where('news_mst.news_id',$news_id)
        ->get()
        ->row_array();
        $data['categories'] = $this->category_model->all_categories();
        
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/user_edit_view');
        $this->load->view('admin/footer');
    }
#------------------------------------------
#------------------------------------------

    public function update_user_news() {
           if ((trim($this->input->post('meta_keyword'))) != '' || (trim($this->input->post('meta_description'))) != '') {
            $post_meta['meta_keyword'] = trim($this->input->post('meta_keyword'));
            $post_meta['meta_description'] = trim($this->input->post('meta_description'));
        }

        if ($_FILES['file_select_machin']['name']) {
            $sizes = array(140 => 100, 600 => 400);
            $file_location = $this->npost->do_upload($_FILES['file_select_machin'], $sizes);
            $image = explode('/', $file_location[0]);
            $image = end($image);
        } else if ($this->input->post('lib_file_selected') != '') {
            $image = $this->input->post('lib_file_selected');
        } else {
            $image = $this->input->post('image_old');
        }
        // news data
        $data = array(
            'news_id' => $this->input->post('news_id'),
            'other_page' => $this->input->post('other_page'),
            'picture_name' => $this->input->post('picture_name'),
            'image' => $image,
            'videos' => $this->get_youtube_id_from_url($this->input->post('videos')),
            'stitle' => $this->input->post('short_head'),
            'title' => $this->input->post('head_line'),
            'reporter' => $this->input->post('reporter'),
            'news' => $this->input->post('details_news'),
            'reference' => $this->input->post('reference'),
            'ref_date' => $this->input->post('ref_date'),
            'post_date' => $this->input->post('ref_date'),
            'publish_date'      => ($this->input->post('publish_date')?$this->input->post('publish_date'):$this->input->post('ref_date')),
            'pp' => $this->input->post('pp'),
            'update_boy' => $this->session->userdata('id')
        );


        $update_position = $this->npost->update_category($data);
        $result = $this->npost->update_news($data);
        // update meta information
        if (isset($post_meta)) {
            $news_id = $this->input->post('news_id');
            //check meta data exist
            $check_status = $this->npost->check_meta_exist($news_id);
            if ($check_status) {
                $this->npost->update_meta_on_page_seo('post_seo_onpage', $post_meta, $news_id);
            } else {
                $post_meta['news_id'] = $news_id;
                $this->npost->save_meta_on_page_seo('post_seo_onpage', $post_meta);
            }
        }

        $this->session->set_flashdata('message', $result);
        redirect("admin/News_list/user_interface");
    }

}

