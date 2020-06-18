<?php defined('BASEPATH') or exit('No direct script access allowed');

class Seo extends CI_Controller {

#------------------------------------
# construction function
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

        $this->load->model('admin/Seo_model', 'sm');
        $this->load->model('admin/View_setting_model', 'vsm');
        $this->load->helper('form');
    }
#-------------------------------------
# To add Google Analytics Code
    public function google_analytics() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 5);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/seo/view_google_analytics_settings', $data);
        $this->load->view('admin/footer');
    }
#---------------------------------------
# to update Google Analytics Code
    public function update_google_analytics_code() {
        $SEO_data ['id'] = 5;
        $SEO_data ['event'] = 'analytics_code';
        $SEO_data ['details'] = trim($this->input->post("code",FALSE));
        $check_settings_exist = $this->vsm->Check_settings_exist('settings', 5);

        if ($check_settings_exist == 0) {
            $this->sm->save_settings('settings', $SEO_data);
        } else {
            $this->sm->update_settings('settings', $SEO_data, 5);
        }
        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Seo/google_analytics');
    }

#---------------------------------
# To add comments
#---------------------------------    
    public function comments() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 7);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/seo/view_comments_settings', $data);
        $this->load->view('admin/footer');
    }

#--------------------------------
# To update comments code
#-------------------------------- 

    public function update_comments_code() {
        $SEO_data ['id'] = 7;
        $SEO_data ['event'] = 'comments_code';
        $SEO_data ['details'] = trim($this->input->post("code"));
        $check_settings_exist = $this->vsm->Check_settings_exist('settings', 7);
        if ($check_settings_exist == 0) {
            $this->sm->save_settings('settings', $SEO_data);
        } else {
            $this->sm->update_settings('settings', $SEO_data, 7);
        }
        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Seo/comments');
    }

#-------------------------------
#    To add robot Code
#-------------------------------
    public function robot() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 9);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/seo/view_robot_settings', $data);
        $this->load->view('admin/footer');
    }
#------------------------------
#      To update robot Code
#------------------------------    
    public function update_robot_code() {
        $SEO_data ['id'] = 9;
        $SEO_data ['event'] = 'robot_code';
        $SEO_data ['details'] = trim($this->input->post("code"));

        $check_settings_exist = $this->vsm->Check_settings_exist('settings', 9);
        if ($check_settings_exist == 0) {
            $this->sm->save_settings('settings', $SEO_data);
        } else {
            $this->sm->update_settings('settings', $SEO_data, 9);
        }
        $file_name = 'robot.txt';
        $a = rtrim(base_url(), 'admin/') . '/' . $file_name;

        $file = fopen('http://localhost/robot.txt', "w");
        fwrite($file, $SEO_data ['details']);
        fclose($file);

        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Seo/robot');
    }
#-----------------------------------
#    To add alexa code
#-----------------------------------    
    public function alexa() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 11);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/seo/view_alexa_settings', $data);
        $this->load->view('admin/footer');
    }

#----------------------------------
#    To update alexa code
#----------------------------------    
    public function update_alexa_code() {
        $SEO_data ['id'] = 11;
        $SEO_data ['event'] = 'alexa_code';
        $SEO_data ['details'] = trim($this->input->post("code",FALSE));
        $check_settings_exist = $this->vsm->Check_settings_exist('settings', 11);
        if ($check_settings_exist == 0) {
            $this->sm->save_settings('settings', $SEO_data);
        } else {
            $this->sm->update_settings('settings', $SEO_data, 11);
        }
        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Seo/alexa');
    }
#--------------------------------
#    To save social sites
#--------------------------------
    public function social_sites() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 6);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/seo/view_social_site_settings', $data);
        $this->load->view('admin/footer');
    }
#---------------------------------
#    To update social site settings
#---------------------------------
    public function update_social_site_settings() {
        unset($_POST['save']);
        $SEO_data ['id'] = 6;
        $SEO_data ['event'] = 'social_sites';
        $SEO_data ['details'] = json_encode($_POST);
        $check_settings_exist = $this->vsm->Check_settings_exist('settings', 6);
        if ($check_settings_exist == 0) {
            $this->sm->save_settings('settings', $SEO_data);
        } else {
            $this->sm->update_settings('settings', $SEO_data, 6);
        }
        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Seo/social_sites');
    }

#----------------------------------
#   social link vies setup    
#----------------------------------

    public function social_link() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 111);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/seo/view_social_site_link', $data);
        $this->load->view('admin/footer');
    }

#------------------------------------
#    social_link_save
#------------------------------------ 
    public function social_link_save() {
        unset($_POST['save']);
        $S_data ['id'] = 111;
        $S_data ['event'] = 'social_link';
        $S_data ['details'] = json_encode($_POST);
        $check_settings_exist = $this->vsm->Check_settings_exist('settings', 111);

        if ($check_settings_exist == 0) {
            $this->sm->save_social_lik('settings', $S_data);
        } else {
            $this->sm->update_social_lik('settings', $S_data, 111);
        }
        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Seo/social_link');
    }

#------------------------------------
#    To add sitemap of a website
#------------------------------------ 
    public function sitemap() {

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 8);
        $this->load->view('admin/seo/view_sitemap_settings', $data);
        $this->load->view('admin/footer');
    }
#------------------------------------
#    To update sitemap code
#------------------------------------   
    public function updatSitemapCode() {
        $SEO_data ['id'] = 8;
        $SEO_data ['event'] = 'sitemap_code';
        $SEO_data ['details'] = trim($this->input->post('code'));
        $check_settings_exist = $this->vsm->Check_settings_exist('settings', 8);
        if ($check_settings_exist == 0) {
            $this->sm->save_settings('settings', $SEO_data);
        } else {
            $this->sm->update_settings('settings', $SEO_data, 8);
        }
        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Seo/sitemap');
    }
#------------------------------------
#    To add fixed keywork for webstied
#------------------------------------    

    public function fixed_keyword() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 10);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/seo/view_fixed_keyword_settings', $data);
        $this->load->view('admin/footer');
    }
#------------------------------------
#    To update Fixed Keyword
#------------------------------------    

    public function updat_fixed_keyword_code() {
        $check_settings_exist = $this->vsm->Check_settings_exist('settings', 10);
        $SEO_data ['id'] = 10;
        $SEO_data ['event'] = 'fixed_keyword';
        $SEO_data ['details'] = trim($this->input->post('code'));
        if ($check_settings_exist == 0) {
            $this->sm->save_settings('settings', $SEO_data);
        } else {
            $this->sm->update_settings('settings', $SEO_data, 10);
        }
        $this->session->set_flashdata('message', display('update_message'));
        redirect('admin/Seo/fixed_keyword');
    }

}
