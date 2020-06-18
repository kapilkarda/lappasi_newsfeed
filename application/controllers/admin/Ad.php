<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        $user_type = $this->session->userdata('user_type'); 
        
        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4)) {
         redirect('admin/Sign_out');
        }

        $sdata = array();
        $this->load->model('admin/Ad_s','ad_s');
        $this->load->helper('form');
    }
    
    
#---------------------------------
#    add a new ad
#---------------------------------    
    public function index() {
        $data['active'] = 1;
        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/ad/view_new_ad');
        $this->load->view('admin/footer');
    }

#----------------------------------
#      To add http dynamically
#----------------------------------
    function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }

#---------------------------------------
#     to save new add
#---------------------------------------    
    public function save() {

        $data['page'] = trim(@$this->input->post('page'));
        @$data['ad_position'] = trim(@$this->input->post('ad_position'));
        $ad_type = trim(@$this->input->post('ad_type'));

        if ($ad_type == 1) {
            $data['embed_code'] = trim($this->input->post('embed_code',FALSE));
        } elseif ($ad_type == 2) {
            // if ad type is image
            $ad_image = $_FILES['ad_image']['name'];
            $image = explode(".",$ad_image);
            $extent = end($image);

            if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){
                $ad_img_url = $this->addhttp(trim(@$this->input->post('ad_url')));            
                if ($ad_image != '' && $ad_img_url != '') {
                    $key = md5(microtime() . rand());
                    copy($_FILES['ad_image']['tmp_name'], 'uploads/Advertizement/' . $key . '.png');
                    $data['embed_code'] = '<a href="' . $ad_img_url . '"><img width="100%" src="' . base_url() . 'uploads/Advertizement/' . $key . '.png" alt=""></a>';
                } else {
                    $this->session->set_flashdata('exception', display('url_requerd'));
                }
            } else{
                $this->session->set_flashdata('exception','This File Not allowed!');
                redirect('admin/Ad');
            }
        }
        
       $count = $this->db->select("*")
       ->from('ad_s')
       ->where('ad_position',@$data['ad_position'])
       ->get()
       ->num_rows();
        
        if ($data['page'] == '' || $data['ad_position'] == '' || $data['embed_code'] == '') {
            $sdata['exception'] = 'Please enter ad inforamation.';
        } elseif ($count > 0) {
            $sdata['exception'] = display('ad_exist_msg');
        } else {
            $this->ad_s->save_ad_info($data);
            $sdata['message'] = display('ad_save_message');
        }
        $this->session->set_flashdata($sdata);
        redirect('admin/Ad');

    }

#-------------------------------------------
#      viewing all ads
#------------------------------------------
    public function view_ads() {

        $data['ads'] = $this->ad_s->get_all_ads();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/ad/view_ad_update');
        $this->load->view('admin/footer');
    }

#---------------------------------------------
#      viewing individual ad to update
#---------------------------------------------
    public function edit_view($ad_id) {
        $data['ads'] = $this->ad_s->get_ad_by_id($ad_id);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/ad/edit_view');
        $this->load->view('admin/footer');
    }

#---------------------------------------
# To delete individual ad
#---------------------------------------    
    public function delete($ad_id) {
        $query = $this->db->query("DELETE FROM ad_s WHERE id='$ad_id'");
        if ($query) {
            $sdata['message'] = display('delete_message');
        } else {
            $sdata['exception'] = "Error, Please try again.";
        }
        $this->session->set_userdata($sdata);
        redirect('admin/Ad/view_ads');
    }
#----------------------------------------
#      To update individual ad by AD ID
#-----------------------------------------    
    function update($ad_id) {

        $ad_id = $this->input->post('id');
        $data['page'] = trim(@$this->input->post('page'));
        $data['ad_position'] = trim(@$this->input->post('ad_position'));
        $data['embed_code'] = trim(@$this->input->post('embed_code',FALSE));

//print_r($data); exit;
        if ($data['page'] == '' || $data['ad_position'] == '' || $data['embed_code'] == '') {
            $this->session->set_flashdata('message',' <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">&times;</button>
                        Please enter ad inforamation
                    </div>');
           
        } else {
            $this->ad_s->update($ad_id, $data);
            $this->session->set_flashdata('message',' <div class="alert alert-success">
                        <button class="close" data-dismiss="alert">&times;</button>
                        '.display('update_message').'
                    </div>');
        }
        redirect('admin/Ad/view_ads');
    }



    public function update_lg_status($id, $status){
         $new_status = ($status==1?0:1);
         $this->db->set('large_status',$new_status)->where('id',$id)->update('ad_s');
         redirect('admin/Ad/view_ads');
    }

    public function update_sm_status($id, $status){
         $new_status = ($status==1?0:1);
         $this->db->set('mobile_status',$new_status)->where('id',$id)->update('ad_s');
         redirect('admin/Ad/view_ads');
    }


}

