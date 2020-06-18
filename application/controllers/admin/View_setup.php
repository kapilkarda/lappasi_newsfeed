<?php defined('BASEPATH') or exit('No direct script access allowed');

class View_setup extends CI_Controller {

#----------------------------------------
# constructor function
#----------------------------------------    
    public function __construct() {
        parent::__construct();
        #----------------------------------------
        $this->load->library('session');
        $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('admin/Sign_out');
        }
        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4)) {
         redirect('admin/Sign_out');
        }
        #----------------------------------------

        $this->load->model("admin/Category_model", 'cm');
        $this->load->model("admin/View_setting_model", 'vsm');
        $this->load->model("Write_setting_model", 'sm');
        $this->load->helper('form');
    }
#----------------------------------------
# home_view_settings
#---------------------------------------- 
    public function home_view_settings() {
        $data['categories'] = $this->vsm->get_all_categories();
        $data['home_page_settings'] = json_decode($this->vsm->get_previous_settings('settings', 4));       
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/home_page_settings');
        $this->load->view('admin/footer');
    }


#----------------------------------------
# home_view_settings
#----------------------------------------
    public function save_home_page_settings() {
        $data['position_no'] = $this->input->post('position_no');
        $data['category_id'] = $this->input->post('category_name');
        $data['max_news'] = $this->input->post('max_news');

        if ($data['position_no'] == '' || $data['category_id'] == '' || $data['max_news'] == '') {
            $sdata['exception'] = "Please enter missing fields.";
        }

        if (isset($sdata['exception'])) {
            $this->session->set_userdata($sdata);
            redirect('admin/View_setup/home_view_settings');
        } else {

            $hpData['id'] = 4;
            $hpData['event'] = 'home_page_cat_style';

            $cat_info = $this->cm->get_category_info($data['category_id']);
            
            $position_wise_data = array();
            $position_wise_data[$data['position_no']] = array(
                'slug' => $cat_info->slug,
                'max_news' => $data['max_news'],
                'cat_name' => $cat_info->category_name,
                'category_id' => $data['category_id'],
                'status' => 0,
            );

            //JSON FORMAT 
            $JSON_DATA = json_encode($position_wise_data);
            $hpData['details'] = $JSON_DATA;
            // check settings exist
            $settings_count = $this->vsm->check_settings_exist('settings', 4);
            if ($settings_count == 0) {
                $this->vsm->save_settings('settings', $hpData, 4);
                $sdata['message'] = display('setting_message');
            } else {
                $previous_data = json_decode('[' . $this->vsm->get_previous_settings('settings', 4) . ']');
                
                if (count($previous_data) != 0) {
                    if (property_exists($previous_data[0], $data['position_no'])) {
                        $sdata['exception'] = "Category already exist in position - <b>" . $data['position_no'] . "</b>";
                    } else {

                        function objectToArray($object) {
                            if (!is_object($object) && !is_array($object))
                            return $object;
                            return array_map('objectToArray', (array) $object);
                        }

                        $new_data = objectToArray($previous_data[0]);
                        $new_data[$data['position_no']] = array(
                            'slug' => $cat_info->slug,
                            'cat_name' => $cat_info->category_name,
                            'max_news' => $data['max_news'],
                            'category_id' => $data['category_id'],
                            'status' => 0,
                        );

                        $JSON_DATA = json_encode($new_data);
                        $hpData['details'] = $JSON_DATA;
                        $this->vsm->update_table_by_data('settings', $hpData, 4);
                        $sdata['message'] = display('setting_message');
                    }
                }else {
                    $this->vsm->update_table_by_data('settings', $hpData, 4);
                    $sdata['message'] = display('setting_message');
                }
            }
            $this->session->set_userdata($sdata);        
            redirect('admin/View_setup/home_view_settings');
        }
    }

#----------------------------------------
# update_home_page_settings
#----------------------------------------
    public function update_home_page_settings() {
     
        $position_no = $this->input->post('position_no');
        $category_id = $this->input->post('category_id');
        $max_news = $this->input->post('max_news');
        $status = $this->input->post('status');
        $hpData['id'] = 4;
        $hpData['event'] = 'home_page_cat_style';

        foreach ($position_no as $key => $value) {
            $cat_info = $this->cm->get_category_info($category_id[$value]);
            if (!isset($status[$value])) {
                $new_status = 0;
            } else {
                $new_status = $status[$value];
            }
            $new_data[$value] = array(
                'cat_name' => $cat_info->category_name,
                'slug' => $cat_info->slug,
                'max_news' => $max_news[$value],
                'category_id' => $category_id[$value],
                'status' => $new_status,
            );
        }

        $JSON_data = json_encode($new_data);
        $hpData['details'] = $JSON_data;
        $this->vsm->update_table_by_data('settings', $hpData, 4);
        $sdata['message'] = display('setting_message');
        $this->session->set_userdata($sdata);                
        redirect('admin/View_setup/home_view_settings', 'refresh');
    }

#----------------------------------------
# contact_page_setup
#----------------------------------------
    public function contact_page_setup(){
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 113);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/contact_page_setup', $data);
        $this->load->view('admin/footer');
    }

#----------------------------------------
# save_contact_page
#----------------------------------------
    public function save_contact_page() {
        unset($_POST['save']);
        $S_data ['id'] = 113;
        $S_data ['event'] = 'contact_page_setup';
        $S_data ['details'] = json_encode($_POST);

        $check_settings_exist = $this->vsm->check_settings_exist('settings', 113);

        if ($check_settings_exist == 0) {
            $this->vsm->save_contact_page('settings', $S_data);
        } else {
            $this->vsm->update_contact_page('settings', $S_data, 113);
        }
        $this->session->set_flashdata('message', display('update_message'));
       redirect('admin/View_setup/contact_page_setup');
    }
#----------------------------------------
# view_language_settings
#----------------------------------------
    public function view_language_settings() {
        $lan = $this->sm->lan_data();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/language_settings',$lan);
        $this->load->view('admin/footer');
    }

#----------------------------------------
# update_language_settings
#----------------------------------------
    public function update_language_settings() {
        if (isset($_POST['updateLanguageSettings'])) {
            //to send DB
            $JSON_data = json_encode($_POST['l']);
            $ldata['id'] = 3;
            $ldata['event'] = 'lang_settings';
            $ldata['details'] = $JSON_data;
            $check_settings_exist = $this->vsm->check_settings_exist('settings', 3);

            if ($check_settings_exist > 0) {
                $this->vsm->update_table_by_data('settings', $ldata, 3);
            } else {
                $this->vsm->save_settings('settings', $ldata,3);
            }
        }
        $this->session->set_flashdata('message',display('update_message'));
        redirect('admin/View_setup/view_language_settings');
    }
#----------------------------------------
# website_title
#----------------------------------------
    public function website_title() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 12);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/website_title');
        $this->load->view('admin/footer');
    }

#----------------------------------------
# save_website_title
#----------------------------------------

    public function save_website_title() {
        $error = array();
        $data['website_title'] = @$this->input->post("website_title");
        $JSON_data = json_encode($data);
        $settings_data['id'] = 12;
        $settings_data['event'] = 'website_title';
        $settings_data['details'] = $JSON_data;

        if ($data['website_title'] == '') {
            $exception = "Please give website title.";
        }
        // checking that error is exist or not
        if (@$exception) {
            $sdata['exception'] = $exception;
        } else {
            $num_rows = $this->vsm->check_settings_exist('settings', 12);
            if ($num_rows == 0) {
                // insert into DB
                $this->vsm->save_settings('settings', $settings_data);
                $sdata['message'] = display('setting_message');
            } else {
                $this->vsm->update_table_by_data('settings', $settings_data, 12);
                $sdata['message'] = display('update_message');
            }
        }

        $this->session->set_flashdata($sdata);
        redirect('admin/View_setup/website_title');
    }



    public function website_footer() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 13);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/website_footer');
        $this->load->view('admin/footer');
    }

#-----------------------------------
#      To update Website Footer
#----------------------------------
    public function save_website_footer() {

        $error = array();
        $data['website_footer'] = @$this->input->post("website_footer");
        $data['copy_right'] = @$this->input->post("copy_right",FALSE);
        $JSON_data = json_encode($data);
        $settings_data['id'] = 13;
        $settings_data['event'] = 'website_footer';
        $settings_data['details'] = $JSON_data;
        if ($data['website_footer'] == '') {
            $exception = "Please give website footer.";
        }
        // checking that error is exist or not
        if (@$exception) {
            $sdata['exception'] = $exception;
        } else {
            $num_rows = $this->vsm->check_settings_exist('settings', 13);
            if ($num_rows == 0) {
                // insert into DB
                $this->vsm->save_settings('settings', $settings_data);
                $sdata['message'] = display('setting_message');
            } else {
                $this->vsm->update_table_by_data('settings', $settings_data, 13);
                $sdata['message'] = display('update_message');
            }
        }
        $this->session->set_flashdata($sdata);
        redirect('admin/View_setup/website_footer');
    }

    /**
     * View to save website logo
     */
    public function website_logo() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 14);
        $data['previous_footer_logo'] = $this->vsm->get_previous_settings('settings', 112);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/website_logo');
        $this->load->view('admin/footer');
    }

    /**
     * To savce website Logo
     */
    public function save_website_logo() {
        $dist = 'uploads/images';
        $logo = $_FILES['website_logo'];

        $pst_imge = $_FILES['website_logo']['name'];
        $image_chk = explode(".",$pst_imge);
        $extent = end($image_chk);

        if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){
            if (isset($logo['name']) && $logo['size']) {
                list($img_name, $mime_type) = explode('.', $logo['name']);
                copy($logo['tmp_name'], $dist . '/' . 'logo.' . $mime_type);
                $data['website_logo'] = $dist . '/' . 'logo.' . $mime_type;
            }
        } else{
            $this->session->set_flashdata('exception','This File Not allowed!');
            redirect('admin/View_setup/website_logo');
        }


        if (isset($data)) {
            $JSON_data = json_encode($data);
            $settings_data['id'] = 14;
            $settings_data['event'] = 'website_logo';
            $settings_data['details'] = $JSON_data;
            // checking that error is exist or not
            if (@$exception) {
                $sdata['exception'] = $exception;
            } else {
                $num_rows = $this->vsm->check_settings_exist('settings', 14);

                if ($num_rows == 0) {
                    // insert into DB
                    $this->vsm->save_settings('settings', $settings_data);
                    $sdata['message'] = display('setting_message');
                } else {
                    $this->vsm->update_table_by_data('settings', $settings_data, 14);
                    $sdata['message'] = display('update_message');
                }
            }
            $this->session->set_flashdata($sdata);
        }
        redirect('admin/View_setup/website_logo');
    }

    /**
     * To save footer Logo
     */
    public function save_footer_logo() {

       $dist = 'uploads/images';
       $logo = $_FILES['footer_logo'];

       $pst_imge = $_FILES['footer_logo']['name'];

        $image_chk = explode(".",$pst_imge);
        $extent = end($image_chk);

        if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){
           if (isset($logo['name']) && $logo['size']) {
                list($img_name, $mime_type) = explode('.', $logo['name']);
                copy($logo['tmp_name'], $dist . '/' . 'footer_logo.' . $mime_type);
                $data['footer_logo'] = $dist . '/' . 'footer_logo.' . $mime_type;
            }
        } else{
            $this->session->set_flashdata('exception','This File Not allowed!');
            redirect('admin/View_setup/website_logo');
        }



        if (isset($data)) {
            $JSON_data = json_encode($data);
            $settings_data['id'] = 112;
            $settings_data['event'] = 'footer_logo';
            $settings_data['details'] = $JSON_data;
            // checking that error is exist or not
            if (@$exception) {
                $sdata['exception'] = $exception;
            } else {
                $num_rows = $this->vsm->check_settings_exist('settings', 112);

                if ($num_rows == 0) {
                    // insert into DB
                    $this->vsm->save_settings('settings', $settings_data);
                    $sdata['message'] = display('setting_message');
                } else {
                    $this->vsm->update_table_by_data('settings', $settings_data, 112);
                    $sdata['message'] = display('update_message');
                }
            }
            $this->session->set_flashdata($sdata);
        }
        redirect('admin/View_setup/website_logo');
    }

    /**
     * View to change website favicon
     */
    public function website_favicon() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 15);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/website_favicon');
        $this->load->view('admin/footer');
    }

    /**
     * To update Website Favicon
     */
    public function save_website_favico() {

       $dist = 'uploads/images';
       $favicon = $_FILES['website_favicon'];

        $pst_imge = $_FILES['website_favicon']['name'];

        $image_chk = explode(".",$pst_imge);
        $extent = end($image_chk);

        if($extent=="jpg" || $extent=="png" || $extent=="jpeg" || $extent=="gif"){
            if (isset($favicon['name']) && $favicon['size']) {
                list($img_name, $mime_type) = explode('.', $favicon['name']);
                copy($favicon['tmp_name'], $dist . '/' . 'favicon.' . $mime_type);
                $data['website_favicon'] = $dist . '/' . 'favicon.' . $mime_type;
            }
        } else{
            $this->session->set_flashdata('exception','This File Not allowed!');
            redirect('admin/View_setup/website_favicon');
        }


        if (isset($data)) {
            $JSON_data = json_encode($data);
            $settings_data['id'] = 15;
            $settings_data['event'] = 'website_favicon';
            $settings_data['details'] = $JSON_data;
            // checking that error is exist or not
            if (@$exception) {
                $sdata['exception'] = $exception;
            } else {

                $num_rows = $this->vsm->check_settings_exist('settings', 15);

                if ($num_rows == 0) {
                    // insert into DB
                    $this->vsm->save_settings('settings', $settings_data);
                    $sdata['message'] = display('setting_message');
                } else {
                    $this->vsm->update_table_by_data('settings', $settings_data, 15);
                    $sdata['message'] = display('update_message');
                }
            }
            $this->session->set_flashdata($sdata);
        }
        redirect('admin/View_setup/website_favicon');
    }

    /**
     * View to change website Timezone
     */
    public function website_timezone() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 17);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/website_timezone');
        $this->load->view('admin/footer');
    }

    /**
     * To save website Timezone
     */
    public function save_timezone() {
        $error = array();
        $data['website_timezone'] = @$this->input->post("website_timezone");
        $JSON_data = json_encode($data);
        $settings_data['id'] = 17;
        $settings_data['event'] = 'website_timezone';
        $settings_data['details'] = $JSON_data;

        if ($data['website_timezone'] == '') {
            $exception = "Please Select Website Timezone.";
        }
        // checking that error is exist or not
        if (@$exception) {
            $sdata['exception'] = $exception;
        } else {

            $num_rows = $this->vsm->check_settings_exist('settings', 17);

            if ($num_rows == 0) {

                // insert into DB
                $this->vsm->save_settings('settings', $settings_data);
                $sdata['message'] = "Timezone Saved Successfully.";
            } else {
                $this->vsm->update_table_by_data('settings', $settings_data, 17);
                $sdata['message'] = display('update_message');
            }
        }
        $this->session->set_flashdata($sdata);
        redirect('admin/View_setup/website_timezone');
    }


/**
 *      Prayer time setup view
 */ 
    public function prayer_time_setup() {
        $data['previous_settings'] = $this->vsm->get_previous_settings('settings', 18);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu');
        $this->load->view('admin/settings/prayer_time_set');
        $this->load->view('admin/footer');
    }

    public function save_setprayer_time() {
        $error = array();
        $data['prayer_time'] = @$this->input->post("prayerTime");
        $JSON_data = json_encode($data);
        $settings_data['id'] = 18;
        $settings_data['event'] = 'prayer_time';
        $settings_data['details'] = $JSON_data;
        if ($data['prayer_time'] == '') {
            $exception = "Please enter the prayer time.";
        }
        // checking that error is exist or not
        if (@$exception) {
            $sdata['exception'] = $exception;
        } else {
            $num_rows = $this->vsm->check_settings_exist('settings', 18);

            if ($num_rows == 0) {
                // insert into DB
                $this->vsm->save_settings('settings', $settings_data);
                $sdata['message'] = "Prayer Time Saved Successfully.";
            } else {
                $this->vsm->update_table_by_data('settings', $settings_data, 18);
                $sdata['message'] = "Prayer Time Updated Successfully.";
            }
        }
        $this->session->set_flashdata($sdata);
        redirect('admin/View_setup/prayer_time_setup');
    }


}

