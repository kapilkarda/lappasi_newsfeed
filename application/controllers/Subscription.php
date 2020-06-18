<?php defined('BASEPATH') or exit('No direct script access allowed');

class Subscription extends CI_Controller {

#---------------------------------------    
# construction function
#---------------------------------------    
    public function __construct() {
        parent::__construct();
        // Load library and url helper
        $this->load->library('facebook');
        $this->load->helper('url');
        // loading model
        $this->load->model('Ads','ads');
        $this->load->model("Settings",'settings');
        $this->load->model('home_model', 'hm');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
    }

#-----------------------------------
    public function index(){
#-------------------------------------
# website setting data     
 
  
        $data['home_page_positions'] = $this->wsm->home_category_position();
        $data['website_logo'] = $this->wsm->website_logo();
        $data['footer_logo'] = $this->wsm->footer_logo();
        $data['website_favicon'] = $this->wsm->website_favicon();
        $data['website_footer'] = $this->wsm->website_footer();
        $data['website_title'] = $this->wsm->website_title();
        $data['website_timezone'] = $this->wsm->website_timezone();
        $data['default_theme'] = $this->wsm->theme_data();
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];

#--------------------------------------
        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        $data['social_link'] = $this->settings->get_previous_settings('settings', 111);
        $data['ads'] = $this->ads->SelectAds();
        $data['contact_page_setup'] = $this->settings->get_previous_settings('settings', 113);
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        $data['login_url'] = $this->googleplus->loginURL();
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();
        $data['cata'] = $this->cata->all_cata();


        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_subscription');
        $this->load->view('themes/' . $default_theme . '/footer');

    }

#------------------------------
# 
#------------------------------

    public function save() {
        
        $this->form_validation->set_rules('name', 'Name ', 'required');
        $this->form_validation->set_rules('email', 'Email ', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone ', 'trim|required');
        $this->form_validation->set_rules('news_number', 'Numbr of news ', 'trim|required');
        
      // $recaptcha = $this->db->select('*')->from('social_auth')->where('id',3)->where('status',1)->get()->row();  
        
      //   if($recaptcha!=NULL){
      //   $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'trim|required');
      //   }
     
        if ($this->form_validation->run() == FALSE) { 
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
        $data['lan'] = $this->wsm->lan_data();
        $default_theme = $data['default_theme'];

#--------------------------------------
        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        $data['social_link'] = $this->settings->get_previous_settings('settings', 111);
        $data['ads'] = $this->ads->SelectAds();
        $data['contact_page_setup'] = $this->settings->get_previous_settings('settings', 113);
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        $data['login_url'] = $this->googleplus->loginURL();
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();
        $data['cata'] = $this->cata->all_cata();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_subscription');
        $this->load->view('themes/' . $default_theme . '/footer');


        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $category = $this->input->post('category');
            $frequency = $this->input->post('frequency');
            $news_number = $this->input->post('news_number');                       

                $check_status = $this->db->select('*')->from('subscription')->where('phone',$phone)->where('email',$email)->get()->row();        
                if ($check_status) {
                    $this->session->set_flashdata('exception', "You already Subscription.");
                } else{
                    $user_data = array(
                        'name'      =>$name,
                        'email'     =>$email,
                        'phone'  =>$phone,
                        'category'  =>json_encode($category),
                        'frequency'  =>$frequency,
                        'number_of_news'  =>$news_number
                    );   
                    $this->db->insert('subscription',$user_data);
                    $this->session->set_flashdata('message', "Subscription successfully.");
                }
            redirect('Subscription/index');    
         }
    }


    public function unsubscription($id){
        $this->db->where('md5(subs_id)',$id)->delete('subscription');
        redirect(base_url());  
    }

}
