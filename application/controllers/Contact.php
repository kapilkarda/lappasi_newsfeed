<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller {

#---------------------------------------    
# construction function
#---------------------------------------    
    public function __construct() {
        parent::__construct();
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
        $data['footer_menu'] = $this->settings->footer_menu();
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();


        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_contact');
        $this->load->view('themes/' . $default_theme . '/footer');
    
    }

#------------------------------
# ContactUs
#-------------------------------
    public function contacts() {
        
        
        $this->form_validation->set_rules('first_name', 'First name ', 'required');
        $this->form_validation->set_rules('last_name', 'Last name ', 'required');
        $this->form_validation->set_rules('email', 'Email ', 'required');
        $this->form_validation->set_rules('subject', 'Subject ', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        
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
#--------------------------
        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        $data['social_link'] = $this->settings->get_previous_settings('settings', 111);
        $data['ads'] = $this->ads->SelectAds();
        $data['contact_page_setup'] = $this->settings->get_previous_settings('settings', 113);
        $data['footer_menu'] = $this->settings->footer_menu();
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_contact');
        $this->load->view('themes/' . $default_theme . '/footer');            
        } else {

        $contact = $this->settings->get_previous_settings('settings', 113);
        $contact_emmail = json_decode($contact);

                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $email = $this->input->post('email');
                $subject = $this->input->post('subject');
                $messages = $this->input->post('message');
                $this->load->library('email');
                
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                //send email 
                $this->load->library('email', array('mailtype'=>'html'));
                $this->email->from($email,"NewsPaper365");
                $this->email->to(@$contact_emmail->email);
                $this->email->subject($subject);
                $message = "<p>". $messages ."</p>";
                $this->email->message($message);

                if (!$this->email->send()) {
                    //error
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
                    redirect("Contact");
                } else {
                    // mail sent
                    $this->session->set_flashdata('msg', '<div class="alert alert-success "> <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.display('contact_message').' </strong></div>');
                    redirect("Contact");
                }
         }
    }

}
