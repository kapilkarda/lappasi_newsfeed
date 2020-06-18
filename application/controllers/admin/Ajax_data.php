<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_data extends CI_Controller {

    // constructor function
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    /**
     * Index function to view ajax loaded information
     */
    public function index() {

        $id = $this->input->post('image_name');
        $query = $this->db->select()->from('photo_library')->like('picture_name',$id)->get()->result_array();

        foreach ($query as $row) {
                echo '<img src="'.site_url().'uploads/thumb/'.$row['actual_image_name'].'" height="100" width="100" onclick="sendValue('."'".$row['actual_image_name']."'".')" title="'.$row['picture_name'].'" />';
        }
    }



    /**
     * To update user info
     */
    public function user_info_update() {
        $post_by = $this->session->userdata('id');
        $fill = $this->input->post('fill_name');
        $value = $this->input->post('value');

        $data_arr = array($fill => $value);
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $data_arr);
    }

//user_info_update;

    public function UpdateUserInfo() {
        $post_by = $this->session->userdata('id');
        $this->db->where('id', $post_by);
        $rv = $this->db->update('user_info', $_POST);
        redirect('admin/profile');
    }

}

/* End of file ajax_data.php */
/* Location: application/controllers/admin/ajax_data.php */