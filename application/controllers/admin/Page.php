<?php defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller {

#----------------------------
#   constructor function                            
#---------------------------- 
public function __construct() {
    parent::__construct();

    $this->load->library('session');
    $session_id = $this->session->userdata('session_id'); 

    if($session_id == NULL ) {
     redirect('admin/Sign_out');
    }

    $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2)) {
         redirect('admin/Sign_out');
        }

    $this->load->helper('form');
    $this->load->model('admin/Page_model', 'page');
}


#----------------------------
#  Pages list
#----------------------------    
public function Pages() {
    $data['page_info'] = $this->page->page_list();
    $this->load->view('admin/header',$data);
    $this->load->view('admin/menu');
    $this->load->view('admin/view_page_list');
    $this->load->view('admin/footer');
}


#----------------------------
#  Create New Page
#---------------------------- 
public function Create_new_page() {
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('admin/view_create_new_page');
    $this->load->view('admin/footer');
}

#----------------------------
#  Get youtube id for url
#---------------------------- 
public function get_youtube_id_from_url($url) {
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $url, $match)) {
    return $match['1']; 
    }else{
        return $url;
    }
}

#------------------------------------
#   Save Page
#------------------------------------    
public function Save_page() {

      // get picture data
    if (@$_FILES['image']['name']){
        $config['upload_path']   = './uploads/page_img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('image')){
          $this->session->set_flashdata('exception','This File Not allowed!');
          redirect("admin/Page/Create_new_page");
      } else {
        $data = $this->upload->data();
        $image = $config['upload_path'].$data['file_name'];
      }
    } else {
      $image = "";
    }


    // Checking that slug is formatted or not
    if($this->input->post('slug')!=NULL){
        $page_slug = $this->input->post('slug');
    }else{
        $title =  explode(' ',$this->input->post('title'));
        $page_slug = @$title[0].' '.@$title[1];
    }

    $space_exist = preg_match('/\s/', $page_slug);
    if ($space_exist > 0) {
        $slug = str_replace(' ', '-', $page_slug);
    }
    else{
        $slug = $page_slug;
    }
    $data = array(
        'title' => $this->input->post('title'),
        'page_slug' => $slug,
        'description' => $this->input->post('description'),
        'image_id' => $image,
        'video_url' => $this->get_youtube_id_from_url($this->input->post('videos')),
        'publishar_id' => $this->session->userdata('id'),
        'seo_keyword' => trim($this->input->post('meta_keyword')),
        'seo_description' => trim($this->input->post('meta_description')),
        'publish_date' => date("Y-m-d h:m:s")
    );

    $this->db->insert('pages',$data);
    $this->session->set_flashdata('message', display('page_add_msg'));
    redirect("admin/Page/Create_new_page");
}


public function Edit_page($id) {
    $data['page'] = $this->page->page_by_id($id);
    $this->load->view('admin/header',$data);
    $this->load->view('admin/menu');
    $this->load->view('admin/view_edit_page');
    $this->load->view('admin/footer');
}

public function Update_page() {

$id = $this->input->post('id');

    if (@$_FILES['image']['name']!=NULL){
        $config['upload_path']   = './uploads/page_img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('image')){
          $this->session->set_flashdata('exception','This File Not allowed!');
          redirect("admin/Page/Edit_page/".$id);
      } else {
        $data = $this->upload->data();
        $image = $config['upload_path'].$data['file_name'];
      }
    } else {
      $image = $this->input->post('pic');
    }

    $page_slug = $this->input->post('page_slug');
    $space_exist = preg_match('/\s/', $page_slug);
    if ($space_exist > 0) {
        $slug = str_replace(' ', '-', $page_slug);
    }else{
        $slug = $this->input->post('page_slug');
    }
   
    $data = array(
        'title' => $this->input->post('title'),
        'page_slug' => $slug,
        'description' => $this->input->post('description'),
        'image_id' => $image,
        'video_url' => $this->get_youtube_id_from_url($this->input->post('videos')),
        'publishar_id' => $this->session->userdata('id'),
        'seo_keyword' => trim($this->input->post('meta_keyword')),
        'seo_description' => trim($this->input->post('meta_description')),
        'publish_date' => date("Y-m-d h:m:s")
    );

// print_r($data); exit;
    
    
    $this->db->where('page_id',$id)->update('pages',$data);

    $this->session->set_flashdata('message', display('update_message'));
    redirect("admin/Page/Pages");
}

public function Delete_page($id){
    $this->db->where('page_id',$id)->delete('pages');
    $this->session->set_flashdata('message', display('delete_message'));
    redirect("admin/Page/Pages");
}



public function unpublishd($id){
    $this->db->set('status',0)->where('page_id',$id)->update('pages');
    $this->session->set_flashdata('message', "Unpublish successfully.");
    redirect("admin/Page/Pages");
}

public function publishd($id){
    $this->db->set('status',1)->where('page_id',$id)->update('pages');
    $this->session->set_flashdata('message', "Publish successfully.");
    redirect("admin/Page/Pages");
}


}
