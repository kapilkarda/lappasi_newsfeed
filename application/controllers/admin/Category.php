<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller {

#----------------------------------
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
        
        $this->load->model("admin/Category_model", 'cm');
        $this->load->helper('form');
        $this->load->helper('file');
    }

public function save_category_img_status($category_id=NULL) {
        $data = $this->db->select('img_status')->from('categories')->where('category_id',$category_id)->get()->row();
        $status = ($data->img_status==1?'0':'1');
        $this->db->set('img_status', $status);
        $this->db->where('category_id', $category_id);
        $this->db->update('categories');        
}

#----------------------------------
      # Add new category
      # @param none
      # desc - To adding new category
#-----------------------------------
    public function add_category() {
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/view_add_category');
        $this->load->view('admin/footer');
    }
#------------------------------------
#   To view list of categories
#------------------------------------
    public function list_of_categories() {
        $data['all_categories'] = $this->cm->all_categories();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/view_all_categories');
        $this->load->view('admin/footer');
    }
#------------------------------------
#   add_sub_categories
#------------------------------------
    public function add_sub_categories() {
        $data['all_categories'] = $this->cm->all_categories();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/view_sub_categori_from');
        $this->load->view('admin/footer');
    }

#------------------------------------
#   save_category
#------------------------------------
    public function save_category() {

    if($_FILES['cate_pic']['name']){
        $config=array();
        $config['upload_path'] ='uploads/category_img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('cate_pic')) {
            $error =  $this->upload->display_errors();
            $this->session->set_flashdata('execption',$error);
            redirect('admin/Category/add_category');
        }
        else
        {
         $data1 = $this->upload->data();
         $data['category_imgae'] = $config['upload_path'].$data1['file_name'];
        #------------resize image------------#
          $this->load->library('image_lib');
          $config['image_library'] = 'gd2';
          $config['source_image'] = $config['upload_path'].$data1['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width']     = 1350;
          $config['height']   = 350;

          $this->image_lib->clear();
          $this->image_lib->initialize($config);
          $this->image_lib->resize();
          #-------------resize image----------#
        }
    }else{
        $data['category_imgae'] = '';
    }
        
        $data['category_name'] = trim($this->input->post('cat_name'));
        $data['slug'] = trim($this->input->post('slug'));
        // check that category is  empty or not
        if ($data['slug'] == '' or empty($data['slug'])) {
            $space_exist = preg_match('/\s/', $data['category_name']);
            if ($space_exist > 0) {
                $data['slug'] = str_replace(' ', '-', $data['category_name']);
            }
        } else {
            // Checking that slug is formatted or not
            $space_exist = preg_match('/\s/', $data['slug']);
            if ($space_exist > 0) {
                $data['slug'] = str_replace(' ', '-', $data['slug']);
            }
        }
        if ($this->input->post('menu')) {
            $data['menu'] = 1;
        } else {
            $data['menu'] = 0;
        }

        // making query to check category is exist or not
        $check_cata_exist = $this->cm->check_category_existance($data);
        // if it is exist already
        if ($check_cata_exist == true) {
            $this->session->set_flashdata('execption','Category already exist.');
        }
        elseif ($data['category_name'] == '') {
            $sdata['exception'] = "Please enter Category Name.";
        } else {
            //print_r($data); exit;
            $this->cm->save_category_name($data);
            $sdata['message'] = "Category Saved Successfully.";
        }
        $this->session->set_userdata($sdata);
        redirect('admin/Category/add_category');
    }


#------------------------------------
#   save_sub_category
#------------------------------------
    public function save_sub_category() { 
        
    if($_FILES['cate_pic']['name']){    
        $config=array();
        $config['upload_path'] ='uploads/category_img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('cate_pic')) {
            $error =  $this->upload->display_errors();
            $this->session->set_flashdata('exception',$error);
             redirect('admin/Category/add_sub_categories');
        }
        else
        {
         $data1 = $this->upload->data();
         $data['category_imgae'] = $config['upload_path'].$data1['file_name'];
        #------------resize image------------#
          $this->load->library('image_lib');
          $config['image_library'] = 'gd2';
          $config['source_image'] = $config['upload_path'].$data1['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width']     = 1350;
          $config['height']   = 350;

          $this->image_lib->clear();
          $this->image_lib->initialize($config);
          $this->image_lib->resize();
          #-------------resize image----------#
        }
    }else{
        $data['category_imgae'] = '';
    }

        
        $data['category_name'] = trim($this->input->post('sub_menu'));
        $data['slug'] = trim($this->input->post('slug'));
        $data['parents_id'] = trim($this->input->post('m_menu'));
        
        // check that category is  empty or not
        if ($data['slug'] == '' or empty($data['slug'])) {
            $space_exist = preg_match('/\s/', $data['category_name']);
            if ($space_exist > 0) {
                $data['slug'] = str_replace(' ', '-', $data['category_name']);
            }
        } else {
            $space_exist = preg_match('/\s/', $data['slug']);
            if ($space_exist > 0) {
                $data['slug'] = str_replace(' ', '-', $data['slug']);
            }
        }

        // if ($this->input->post('menu_s')) {
        //     $data['menu'] = 1;
        // } else {
        //     $data['menu'] = 0;
        // }
        $check_cata_exist = $this->cm->check_category_existance($data);
        // if it is exist already
        if ($check_cata_exist == true) {
            $sdata['exception'] = display('category_exist_msg');
        }
        // if category name is empty
        elseif ($data['category_name'] == '') {
        $this->session->set_flashdata('exception','Please enter Category Name.');
        } else {
            $this->cm->save_category_name($data);
            $this->session->set_flashdata('message', display('category_save_msg'));
        }
        redirect('admin/Category/add_sub_categories');
    }
#------------------------------------
#   update view
#------------------------------------
    public function update_view($category_id) {
        $data['all_categories'] = $this->cm->all_categories();
        $data['cate_info'] = $this->cm->get_category_Info($category_id);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/view_edit_category');
        $this->load->view('admin/footer');
    }
#-----------------------------------------------
#   update category
#-----------------------------------------------    
    public function update_category($category_id) {

    if ($_FILES['cate_pic']['name']) {
        $config=array();
        $config['upload_path'] ='uploads/category_img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite']     = false;
        $config['max_size']      = 1024;
        $config['remove_spaces'] = true;
        $config['max_filename']   = 10;
        $config['file_ext_tolower'] = true;

        // $this->load->library('upload', $config);
         $this->upload->initialize($config);

        if (!$this->upload->do_upload('cate_pic')) {
            $error =  $this->upload->display_errors();
            $this->session->set_flashdata('exception',$error);
            redirect('admin/Category/update_view/' . $category_id);
        }
        else
        {
         $data1 = $this->upload->data();
         $data['category_imgae'] = $config['upload_path'].$data1['file_name'];
        #------------resize image------------#
          $this->load->library('image_lib');
          $config['image_library'] = 'gd2';
          $config['source_image'] = $config['upload_path'].$data1['file_name'];
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width']     = 1350;
          $config['height']   = 350;

          $this->image_lib->clear();
          $this->image_lib->initialize($config);
          $this->image_lib->resize();
          #-------------resize image----------#
        }
    } else{
       $data['category_imgae'] = $this->input->post('pic'); 
    }

        $data['category_name'] = $this->input->post('category_name');
        $data['slug'] = $this->input->post('slug');
        $data['parents_id'] = $this->input->post('m_menu');


        if ($data['slug'] == '' or empty($data['slug'])) {
            $space_exist = preg_match('/\s/', $data['category_name']);
            if ($space_exist > 0) {
                $data['slug'] = str_replace(' ', '-', $data['category_name']);
            }
        } else {
            $space_exist = preg_match('/\s/', $data['slug']);
            if ($space_exist > 0) {
                $data['slug'] = str_replace(' ', '-', $data['slug']);
            }
        }
        if ($this->input->post('menu')) {
            $data['menu'] = 1;
        } else {
            $data['menu'] = 0;
        }
        if ($data['category_name'] == '') {
            $sdata['exception'] = "Please enter Category Name.";
            $this->session->set_userdata($sdata);
            redirect('admin/Category/update_view/' . $category_id);
        } else {
            //getting category info
            $cat_info = $this->cm->get_category_Info($category_id);
            // Delete the XML file
            $old_file_name = "data/" . $cat_info->slug . '.xml';
            $new_file_name = "data/" . $data['slug'] . '.xml';
            if (file_exists($old_file_name)) {
                rename($old_file_name, $new_file_name);
            }
            $this->cm->update_category($category_id, $data);
        }
        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Category/list_of_categories');
    }

#--------------------------------
#   delete category
#--------------------------------    
    public function delete($category_id) {
        $this->cm->delete_category($category_id);
        $this->session->set_flashdata('message', display('delete_message'));  
        redirect('admin/Category/list_of_categories');
    }
#---------------------------------
#       save category by position
#---------------------------------    
    public function save_category_positions() {
        $this->cm->update_category_positions();
        $this->session->set_flashdata('message', display('delete_message'));  
        redirect("admin/Category/list_of_categories");
    }

}
