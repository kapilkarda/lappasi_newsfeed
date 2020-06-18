<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_controller extends CI_Controller {


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


/***************************************
 * To veiw all home page Data
 ***************************************/

    public function index() {

        $data = $this->hm->home_data();
        #---------------------
        # website setting data        
        $data['home_page_positions'] = $this->wsm->home_category_position();
        $data['website_logo'] = $this->wsm->website_logo();
        $data['footer_logo'] = $this->wsm->footer_logo();
        $data['website_favicon'] = $this->wsm->website_favicon();
        $data['website_footer'] = $this->wsm->website_footer();
        $data['website_title'] = $this->wsm->website_title();
        $data['website_timezone'] = $this->wsm->website_timezone();
        $data['lan'] = $this->wsm->lan_data();
        $data['default_theme'] = $this->wsm->theme_data();

        $default_theme = $data['default_theme'];
        #----------------------
        $data['ln'] = $this->cm->latest_news();
        $data['bn'] = $this->cm->breaking_news();
        $data['mr'] = $this->cm->most_read_dbse();
        $data['pull'] = $this->cm->pulling();
        // Getting Seo Properties
        $data['seo']['analytics_code'] = $this->settings->get_previous_settings('settings', 5);
        $data['seo']['alexa_code'] = $this->settings->get_previous_settings('settings', 11);
        $data['seo']['social_sites'] = $this->settings->get_previous_settings('settings', 6);
        $data['seo']['fixed_keyword'] = $this->settings->get_previous_settings('settings', 10);
        $data['social_link'] = $this->settings->get_previous_settings('settings', 111);
        // getting ads
        $data['ads'] = $this->ads->SelectAds();
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();

        $this->load->view('themes/' . $default_theme . '/header', $data);
        $this->load->view('themes/' . $default_theme . '/breaking', $data);
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/home_view');
        $this->load->view('themes/' . $default_theme . '/footer');

        $this->output->cache(30); 
       
    }

/* ************************************************
*  Saving Polling Data
* ************************************************ */

    public function save($question_id=NULL,$vote=NULL) {
        $id = $question_id;
        $fill = $vote;
        if ($this->session->userdata('pulled') != 1) {
            $query = $this->db->query("SELECT $fill as vote FROM pulling WHERE id=$id");
            $row = $query->row_array();
            $data_arr = array(
                $fill => $row['vote'] + 1
            );
            $this->db->where('id', $id);
            $this->db->update('pulling', $data_arr);
            $session_data = array(
                'pulled' => 1
            );
            $this->session->set_userdata($session_data);
            echo 1; exit;
        } else {
            echo 0; exit;
        }
    }

/********************************************
     * Viewing Result Of vote
*********************************************/
    function result() {
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
        $BN = $this->cm->breaking_news();
        $LN = $this->cm->latest_news();
        $MR = $this->cm->most_read_dbse();
        $data['Editor'] = $this->hm->home_data('Editor-Choice');
        $this->load->view('themes/' . $default_theme . '/header', $data);
        $data['ads'] = $this->ads->SelectAds();
        $data['social_link'] = $this->settings->get_previous_settings('settings', 111);
        $data['main_menu'] = $this->settings->main_menu();
        $data['menus'] = $this->settings->menu_position_3();
        $data['footer_menu'] = $this->settings->footer_menu();
        
        $this->load->view('themes/' . $default_theme . '/header',$data);
        $this->load->view('themes/' . $default_theme . '/breaking', array('bn' => $BN, 'ln' => $LN, 'mr' => $MR));
        $this->load->view('themes/' . $default_theme . '/menu');
        $this->load->view('themes/' . $default_theme . '/voting_result');
        $this->load->view('themes/' . $default_theme . '/footer');
    }


}

