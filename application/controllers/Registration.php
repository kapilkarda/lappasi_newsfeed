<?php defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller {

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

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_registration');
        $this->load->view('themes/' . $default_theme . '/footer');
    
    }


public function redirect(){
   
   $user_type = $this->session->userdata('user_type');
    if ($user_type == 1) {
        redirect("admin/News_post/user_interface");
    } else if ($user_type == 2) {
        redirect("admin/News_post/user_interface");
    } else if ($user_type == 3) {
        redirect("admin/News_post");
    } else {
         redirect('registration');
    }
         
}    

#-----------------------
    # pssword genaretor
#----------------------
    function randstrGen()
    {
        $result = "";
            $chars = "0123456789";
            $charArray = str_split($chars);
            for($i = 0; $i < 5; $i++) {
                    $randItem = array_rand($charArray);
                    $result .="".$charArray[$randItem];
            }
            return $result;
    }

#------------------------------------
#   facebook login and registration
#------------------------------------    
    public function facebook_login()
    {
  

        $data['user'] = array();

        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id, name, email, about, age_range, birthday, cover, education, gender, hometown, languages, relationship_status, religion, photos, picture');
            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
        }     

        $check_status = $this->db->select('*')->from('user_info')->where('email',$user['email'])->get()->row();  

        if($check_status){

            $session_data = array(

                'id' => $check_status->id,
                'name' => $check_status->name,
                'pen_name' => $check_status->pen_name,
                'user_type' => $check_status->user_type,
                'email' => $check_status->email,
                'session_id' => session_id(),
                'logged_in' => TRUE

            );

            $this->session->set_userdata($session_data);
            if ($check_status->user_type == 1) {
                redirect("admin/News_post/user_interface");
            } else if ($check_status->user_type == 2) {
                redirect("admin/News_post/user_interface");
            } else if ($check_status->user_type == 3) {
                redirect("admin/News_post");
            } else if ($check_status->user_type == 4) {
                redirect("admin/News_post");
            }else {
                redirect(base_url());
            }

        } else {

            $password = $this->randstrGen();

            $user_data = array(
                'name'      =>$user['name'],
                'pen_name'  =>$user['name'],
                'email'     =>$user['email'],
                'password'  =>md5($password),
                'status'    =>1,
                'user_type' =>5
            );
            $this->db->insert('user_info',$user_data);

            #-------------------------------
            #   email send to user email
            #-------------------------------
            $send_data = array(
                 'to'       => $user['email'], 
                 'subject'  => 'Registration',
                 'message'  => 'You successfully Registration '.$user['name'].',  Your email is '.$user['email'].' and Password is '.$password,
            );
            $send_email = $this->cm->send($send_data);
            #-------------------------------


            #----------------------------
            $sdata = $this->db->select('*')->from('user_info')->where('email',$user['email'])->get()->row();  
          
            $session_data = array(
                'id'            => $sdata->id,
                'name'          => $sdata->name,
                'pen_name'      => $sdata->pen_name,
                'user_type'     => $sdata->user_type,
                'email'         => $sdata->email,
                'session_id'    => session_id(),
                'logged_in'     => TRUE
            );

            $this->session->set_userdata($session_data);
            #------------------------------
            $data = array(
                'name' => $user['name'],
                'email'=>$user['email'],
                'password'=>$password
            ); 
                         
        }
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
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();


        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_fb_registration');
        $this->load->view('themes/' . $default_theme . '/footer'); 
    }

#----------------------------------------
#       google registration and login
#----------------------------------------    

    public function googl_login(){
     
        // Check if user is logged in
        if ($this->googleplus->getAuthenticate())
        {
            $data = $this->googleplus->getUserInfo();
        }

        $check_status = $this->db->select('*')->from('user_info')->where('email',$data['email'])->get()->row();  

        if($check_status){
            $session_data = array(
                'id' => $check_status->id,
                'name' => $check_status->name,
                'pen_name' => $check_status->pen_name,
                'user_type' => $check_status->user_type,
                'email' => $check_status->email,
                'session_id' => session_id(),
                'logged_in' => TRUE
            );


            $this->session->set_userdata($session_data);
            if ($check_status->user_type == 1) {
                redirect("admin/News_post/user_interface");
            } else if ($check_status->user_type == 2) {
                redirect("admin/News_post/user_interface");
            } else if ($check_status->user_type == 3) {
                redirect("admin/News_post");
            } else if ($check_status->user_type == 4) {
                redirect("admin/News_post");
            }else {
                redirect(base_url());
            }

        }else{
            $password = $this->randstrGen(); 
            $register_data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'pen_name' => $data['given_name'],
                'user_type' => 5,
                'status'    =>1,
                'password' => md5($password)
            );
            
            $this->db->insert('user_info',$register_data);
            #-------------------------------
            #   email send to user email
            #-------------------------------
            $send_data = array(
                 'to'       =>  $data['email'],  
                 'subject'  => 'Registration',
                 'message'  => 'You successfully Registration '.$data['name'].',  Your email is '.$data['email'].' and Password is '.$password,
            );
            $send_email = $this->cm->send($send_data);
            #-------------------------------

            @$sdata = $this->db->select('*')->from('user_info')->where('email',$data['email'])->get()->row();
          
            $session_data = array(
                'id'            => $sdata->id,
                'name'          => $sdata->name,
                'pen_name'      => $sdata->pen_name,
                'user_type'     => $sdata->user_type,
                'email'         => $sdata->email,
                'session_id'    => session_id(),
                'logged_in'     => TRUE
            );

            $this->session->set_userdata($session_data);

             $data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'pen_name' => $data['given_name'],
                'user_type' => 5,
                'status'    =>1,
                'password' => $password
            );
             
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
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_fb_registration');
        $this->load->view('themes/' . $default_theme . '/footer');
       } 
   
    }


#------------------------------
# ContactUs
#-------------------------------
    public function registration() {
        
        $this->form_validation->set_rules('name', 'Name ', 'required');
        $this->form_validation->set_rules('email', 'Email ', 'trim|required');
        $this->form_validation->set_rules('password', 'Password ', 'trim|required');
       
        if ($this->form_validation->run() == FALSE) { 
#---------------------
# website setting data   

        $data['home_page_positions']    = $this->wsm->home_category_position();
        $data['website_logo']           = $this->wsm->website_logo();
        $data['footer_logo']            = $this->wsm->footer_logo();
        $data['website_favicon']        = $this->wsm->website_favicon();
        $data['website_footer']         = $this->wsm->website_footer();
        $data['website_title']          = $this->wsm->website_title();
        $data['website_timezone']       = $this->wsm->website_timezone();
        $data['default_theme']          = $this->wsm->theme_data();
        $data['lan']                    = $this->wsm->lan_data();
        $default_theme                  = $data['default_theme'];
#--------------------------
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

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view("themes/" . $default_theme . "/breaking");
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/view_registration');
        $this->load->view('themes/' . $default_theme . '/footer');            
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

                $check_status = $this->db->select('*')->from('user_info')->where('email',$email)->get()->row();        
                if ($check_status) {
                    $this->session->set_flashdata('exception', "You already registerd.");
                } else{

                    $user_data = array(
                        'name'      =>$name,
                        'email'     =>$email,
                        'password'  =>$password,
                        'user_type' =>5,
                        'status'    =>1,
                    );

                    $this->db->insert('user_info',$user_data);
                    $this->session->set_flashdata('message', "Registration successfully.");
                }

                #-------------------------------
                #   email send to user email
                #-------------------------------
                $send_data = array(
                     'to'       => $email, 
                     'subject'  => 'Registration',
                     'message'  => '<p>Hi! '.$name.'</p> <p> Your Registration is Successfully <p> <p> Your Login email : '.$email.'</p><p> Your Password : '.$password.'</p>',
                );
                $send_email = $this->cm->send($send_data);
                #-------------------------------
            redirect('registration');    
         }
    }





}
