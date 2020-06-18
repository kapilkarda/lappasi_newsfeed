<?php defined('BASEPATH') or exit('No direct script access allowed');

class Positioning extends CI_Controller {

#------------------------------------    
#     Constructor function
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
        $data = array();
        $this->load->model("admin/Category_model", 'category_model');
        $this->load->model("admin/Positioning_model", 'pm');
        $this->load->helper('form');
    }

#----------------------------------------
# To view position according to Category
#----------------------------------------    

    public function index() {
        if ($this->input->post('category')) {
            $category = $this->input->post('category');
        } elseif ($this->uri->segment(4)) {
            $category = $this->uri->segment(4);
        } else {
            $category = 'home';
        }

        $data['selected_category'] = $category;
        $data['categories'] = $this->category_model->all_categories();
        $data['newses'] = $this->pm->get_newses_with_position($category);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/veiw_positioning');
        $this->load->view('admin/footer');
    }
#-----------------------------
#   To update positioning
#-----------------------------
    public function update_positioning() {
        $positions = $this->input->post('position');
        if (isset($positions) && is_array($positions)) {
            foreach ($positions as $key => $value) {
                $positions_with_news_ID['id'] = $key;
                $positions_with_news_ID['position'] = $value;
            }
            $this->pm->update_positions_by_id($positions);
            $this->session->set_flashdata('message', display('update_message'));
            redirect('admin/Positioning/index/' . $this->input->post('category'), 'refresh');
        }
    }
#---------------------------------------
#     Delete position by ID
#---------------------------------------    
    public function delete_positionbyid($id) {
        $this->pm->delete_single_position($id);
        $this->session->set_flashdata('message', display('delete_message'));
        redirect('admin/Positioning/');
    }

}

