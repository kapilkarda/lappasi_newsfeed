<?php defined('BASEPATH') or exit('No direct script access allowed');

class Print_article extends CI_Controller {

    public function print_page() {
    	$this->load->model('Write_setting_model', 'wsm');
        $this->load->model('Article_model', 'article_model');
        $data = $this->article_model->article_select($this->uri->segment(3));
        #---------------------
        # website setting data        
        $data['home_page_positions'] = $this->wsm->home_category_position();
        $data['website_logo'] = $this->wsm->website_logo();
        $data['footer_logo'] = $this->wsm->footer_logo();
        $data['website_favicon'] = $this->wsm->website_favicon();
        $data['website_footer'] = $this->wsm->website_footer();
        
        $data['website_title'] = $this->wsm->website_title();
        $data['website_timezone'] = $this->wsm->website_timezone();
        $data['default_theme'] = $this->wsm->theme_data();
        $default_theme = $data['default_theme'];
        #----------------------            
        $this->load->view('themes/' . $default_theme . '/print_view', $data);
    }

}
