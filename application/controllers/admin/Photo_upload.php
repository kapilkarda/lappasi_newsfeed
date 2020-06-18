<?php defined('BASEPATH') or exit('No direct script access allowed');

class Photo_upload extends CI_Controller {

#---------------------------------
    # Constructor Function
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

        if(($user_type!=3) AND ($user_type!=4) AND ($user_type!=2) AND ($user_type!=1)) {
         redirect('admin/Sign_out');
        }
        #----------------------------------------
        $this->load->model('admin/Common_function', 'photo');
        $this->load->helper('form');
    }
    
#---------------------------------
    # View to upload photo
    public function index() {
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/view_photo_upload');
        $this->load->view('admin/footer');
    }

#-----------------------------------
    # to upload image
#-----------------------------------   
    public function upload() {
        
        $thime_y = $this->input->post('thime_y');
        $thime_x = $this->input->post('thime_x');
        $img_y = $this->input->post('img_y');
        $img_x = $this->input->post('img_x');
        $sizes = array($thime_x => $thime_y, $img_x => $img_y);
        
        $pst_imge = $_FILES['image']['name'];
        $image_chk = explode(".",$pst_imge);
        $extent = end($image_chk);

        if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){
            $file_location = $this->photo->do_upload($_FILES['image'], $sizes);
            $image = explode('/', $file_location[0]);
        } else{
            $this->session->set_flashdata('exception','This File Not allowed!');
            redirect('admin/Photo_upload');
        }


        

        $data = array(
            'id' => "",
            'actual_image_name' => end($image),
            'picture_name' => $this->input->post('picture_name'),
            'title' => $this->input->post('title'),
            'category' => $this->input->post('category'),
            'time_stamp' => time() + 6 * 60 * 60,
            'status' => 0
        );
        if ($file_location[0] != ''){
            $this->db->insert('photo_library', $data);
        }
        
        $this->session->set_flashdata('message', $file_location);
        redirect("admin/Photo_upload");
    }

#-----------------------------------------
#  Viewing window to select image from image librarys
#-----------------------------------------
    public function MyWindow() {
        $this->db->select('*');
        $this->db->from('photo_library');
        $this->db->where('id', $this->uri->segment(4));
        $query = $this->db->get();
        $row = $query->row_array();
        $this->load->view('admin/header');
        $this->load->view('admin/includes/photo_library_update', $row);
        $this->load->view('admin/footer');
    }

#------------------------------------------
#      To edit individual Photo
#------------------------------------------
    public function edit() {
        $id = $this->input->post('id');
        $data_arr = array(
            'picture_name' => $this->input->post('picture_name'),
            'title' => $this->input->post('title'),
            'category' => $this->input->post('category')
        );
        $this->db->where('id', $id);
        $this->db->update('photo_library', $data_arr);
        $this->load->view('admin/includes/close');
    }
    
#-----------------------------------------
    # To update user photo
#-----------------------------------------    
    public function user_photo() {

            if (@$_FILES['user_photo']['name']) {
               
                $config['upload_path']   = './uploads/user/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['overwrite']     = false;
                $config['max_size']      = 1024;
                $config['remove_spaces'] = true;
                $config['max_filename']   = 10;
                $config['file_ext_tolower'] = true;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('user_photo'))
                {
                   $error = $this->upload->display_errors();
                   $this->session->set_flashdata('exception',$error);
                   redirect("admin/Profile");
                } else {
                
                 $data = $this->upload->data();
                 $image = $config['upload_path'].$data['file_name'];

                }

                } else {
                    $image = $this->input->post('user_pic',TRUE);
                }

            $post_by = $this->session->userdata('id');
            $data_arr = array(
                'photo' => $image
            );
            $this->db->where('id', $post_by);
            $this->db->update('user_info', $data_arr);
        
        redirect("admin/Profile");
    }

#----------------------------------------
    # To edit status of Photo
#----------------------------------------    
    public function status_edit() {
        $id = $this->uri->segment(4);
        $status = ($this->uri->segment(5) == 1) ? 0 : 1;
        $data_arr = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('photo_library', $data_arr);
        redirect("admin/Photo_list");
    }

#----------------------------------------
     #To delete individual Photo
#----------------------------------------
    public function delete() {
        $id = $this->uri->segment(4);
        $this->db->select('actual_image_name');
        $this->db->from('photo_library');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $files = $query->row_array();
        foreach ($files as $file) {
            $this->db->delete('photo_library', array('id' => $id));
            unlink('uploads/' . $file);
            unlink('uploads/thumb/' . $file);
        }
        $this->session->set_flashdata('message', $files);
        redirect("admin/Photo_list");
    }

}
