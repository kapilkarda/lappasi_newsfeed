<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pages_controller extends CI_Controller {

    public $default_theme;
#---------------------------------    
# Construction Function
#---------------------------------    
    public function __construct() {
        parent::__construct();
        // loading model
        $this->load->model('Ads','ads');
        $this->load->model("Settings","settings");
        $this->load->model("Page","page");
        $this->load->model('Pb_function', 'pb');
        $this->load->model('Page_model', 'ps');
        $this->load->model('Home_model', 'hm');
        $this->load->model('Common_model', 'cm');
        $this->load->library('pagination');
        $this->load->model('Write_setting_model', 'wsm');
        $this->load->model('New_page', 'new_page');
    }


#---------------------------------    
# view categroy page
#--------------------------------- 
    public function index() {
        
        // slug Name from URL
        $page_name = $this->uri->segment(1); 
        $page_data = $this->new_page->page_data($page_name);
   

if(@$page_data!=FALSE){

        $data = $page_data;
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
        $data['cat_imgae'] = $this->pb->get_category_image($page_name);

        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];
        #----------------------
         //editorial gategory news get
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        //most readet news
        //breaking news
        $data['bn'] = $this->cm->breaking_news();
        //latest news
        $data['ln'] = $this->cm->latest_news();
        
        //Getting SEO Properties
        $data['seo']['analytics_code'] = $this->settings->get_previous_settings('settings', 5);
        $data['seo']['alexa_code'] = $this->settings->get_previous_settings('settings', 11);
        $data['social_link'] = $this->settings->get_previous_settings('settings', 111);
       //Page view settings
        $data['ads'] = $this->ads->SelectAds();
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/Page');
        $this->load->view('themes/' . $default_theme . '/footer');
        $this->output->cache(30);
}else{
        //pagination configuration        
        $config = $this->get_pagination_config($page_name);
        //pagination initialization
        $this->pagination->initialize($config);
        //getting catagory page data
        $data = $this->ps->page_data($page_name);

        if ($data == false) {
            redirect('error_404_not_found');
        }

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
        $data['cat_imgae'] = $this->pb->get_category_image($page_name);
        $data['lan'] = $this->wsm->lan_data();
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
        $data['ads'] = $this->ads->SelectAds();
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/page_view');
        $this->load->view('themes/' . $default_theme . '/footer');
        $this->output->cache(30);
    }
    }



#---------------------------------    
#   get pagination configaretion
#--------------------------------- 
    public function get_pagination_config($category_slug) {

        $config['total_rows'] = $this->ps->count_total_news_by_category($category_slug);
        $config['per_page'] = 8;
        $config['base_url'] = base_url() .$category_slug . '/page';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = ' </li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
    }

#---------------------------------    
#   pagination page
#--------------------------------- 
    public function page() {
        $category_slug = $this->uri->segment(1);
        $category_name = $this->page->get_category_name_by_slug($category_slug);
        $config = $this->get_pagination_config($category_slug);
        $this->pagination->initialize($config);
        $m_data = $this->page->get_news_page_wise($category_slug, $config['per_page'], $this->uri->segment(3));
      
        $m_data['mr'] = $this->cm->most_read_dbse();
        //breaking news
        $m_data['bn'] = $this->cm->breaking_news();
        //latest news
        $m_data['ln'] = $this->cm->latest_news();
        //pulling
        $m_data['pull'] = $this->cm->pulling();
        #---------------------
        # website setting data        
        $m_data['home_page_positions'] = $this->wsm->home_category_position();
        $m_data['website_logo'] = $this->wsm->website_logo();
        $m_data['footer_logo'] = $this->wsm->footer_logo();
        $m_data['website_favicon'] = $this->wsm->website_favicon();
        $m_data['website_footer'] = $this->wsm->website_footer();
        $m_data['website_title'] = $this->wsm->website_title();
        $m_data['website_timezone'] = $this->wsm->website_timezone();
        $m_data['default_theme'] = $this->wsm->theme_data();
        $m_data['lan'] = $this->wsm->lan_data();
        $m_data['cat_imgae'] = $this->pb->get_category_image($category_slug);
        $default_theme = $m_data['default_theme'];

        #----------------------
        $m_data['Editor'] = $this->hm->home_data('Editor-Choice');
        $m_data['social_link'] = $this->settings->get_previous_settings('settings', 111);
        $m_data['ads'] = $this->ads->SelectAds();
       $m_data['main_menu'] = $this->settings->main_menu();
        $m_data['menus'] = $this->settings->menu_position_3();
        $m_data['footer_menu'] = $this->settings->footer_menu();
       
        $this->load->view('themes/' . $default_theme . '/header', $m_data);
        $this->load->view('themes/' . $default_theme . '/breaking');
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/page_view',$m_data);
        $this->load->view('themes/' . $default_theme . '/footer');
        $this->output->cache(10);

    }


}
