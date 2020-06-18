<?php defined('BASEPATH') or exit('No direct script access allowed');

class Error_controller extends CI_Controller {
    // construction function
    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('Ads','ads');
        $this->load->model("Settings","settings");
        $this->load->model("Archive_model","archive_model");
        $this->load->model("Home_model", "hm");
        $this->load->model('Pb_function', 'pb');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
    }

    public function error_404_not_found() {
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

        //editorial gategory news get
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        //most readet news
        $data['mr'] = $this->cm->most_read_dbse();
        //breaking news
        $data['bn'] = $this->cm->breaking_news();
        //latest news
        $data['ln'] = $this->cm->latest_news();
        //pulling
        $data['pull'] = $this->cm->pulling();
        //Getting SEO Properties
        $data['seo']['analytics_code'] = $this->settings->get_previous_settings('settings', 5);
        $data['seo']['alexa_code'] = $this->settings->get_previous_settings('settings', 11);
        $data['seo']['social_sites'] = $this->settings->get_previous_settings('settings', 6);
        $data['seo']['fixed_keyword'] = $this->settings->get_previous_settings('settings', 10);
        $data['social_link'] = $this->settings->get_previous_settings('settings', 111);
        //Page view settings
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();
        $data['ads'] = $this->ads->SelectAds();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/404error');
        $this->load->view('themes/' . $default_theme . '/footer');
    }

}
