<?php defined('BASEPATH') or exit('No direct script access allowed');
class Theme extends CI_Controller {

#---------------------------------------
#   construc function
#----------------------------------------    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4)) {
         redirect('admin/Sign_out');
        }

        $this->load->model("admin/View_setting_model", 'vsm');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
    }

    public function index() {
        $theme_dir = 'application/views/themes/';
        $dir_folders = scandir($theme_dir);
        $themes = array();
        foreach ($dir_folders as $key => $value) {
            if ($value === '.' or $value === '..')
                continue;
            $themes[] = $value;
        }
        $data['themes'] = $themes; 
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/theme/view_available_theme');
        $this->load->view('admin/footer');
    }


#------------------------------------
     # To upload new theme
#------------------------------------
    public function upload_new_theme() {
        
        $filename = $_FILES["new_theme"]["name"];
        $source = $_FILES["new_theme"]["tmp_name"];
        $type = $_FILES["new_theme"]["type"];
        $target_dir = 'application/views/themes';
        $theme_name = trim($this->input->post('theme_name'));
        // naming for theme
        if ($theme_name !== '') {
            $space_exist = preg_match('/\s/', $theme_name);
            if ($space_exist > 0) {
                $dir = str_replace(' ', '-', $theme_name);
                $target_dir = 'application/views/themes/';
            } else {
                $dir = $theme_name;
                $target_dir = 'application/views/themes/';
            }
        }
   
        ini_set('memory_limit', '800M');
        ini_set('upload_max_filesize', '800M');  
        ini_set('post_max_size', '800M');  
        ini_set('max_input_time', 3600);  
        ini_set('max_execution_time', 3600);

        $config=array();
        $config['upload_path'] ='./application/views/themes/';
        $config['allowed_types'] = '*';
        $config['max_size']      = 480000;
        $config['overwrite']     = FALSE;
        $config['encrypt_name']     = FALSE; 

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('new_theme')) {
            $sdata['exception'] = "Theme dos not upload!";
           redirect('admin/Theme');  
        }else {

           $data = array('upload_data' => $this->upload->data());
            $name = explode(".", $filename);
            $zip = new ZipArchive();
            $x = $zip->open($source);
            if ($x === true) {
                $zip->extractTo($target_dir . '/'.$dir.'/'); // place in the directory with same name
                $zip->close();
             @unlink($target_dir . '/'.$filename);

                $sdata['message'] = "Theme uploaded successfully.";
            } else {
                $sdata['exception'] = "There was a problem with the upload. Please try again.";
            }
            $this->session->set_userdata($sdata);
           redirect('admin/Theme');  
        }    
                                     
    }


    public function active_theme($theme_name = '') {

        $data['default_theme'] = $theme_name;
        $JSON_data = json_encode($data);
        $settings_data['id'] = 16;
        $settings_data['event'] = 'default_theme';
        $settings_data['details'] = $JSON_data;

        $num_rows = $this->vsm->check_settings_exist('settings', 16);
        
        if ($num_rows == 0) {
            // insert into DB
            $this->vsm->save_settings('settings', $settings_data);
        } else {
            // update previous settings
            $this->vsm->update_table_by_data('settings', $settings_data, 16);
        }
        $this->session->set_userdata("message", "Theme activated successfully.");
        redirect('admin/Theme/');
    }



}
