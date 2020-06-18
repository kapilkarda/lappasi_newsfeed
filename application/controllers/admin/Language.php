<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

    private $table  = "language";
    private $phrase = "phrase";

    public function __construct()
    {
        parent::__construct();  
        $this->load->database();
        $this->load->dbforge(); 
        $this->load->helper('language');
       $session_id = $this->session->userdata('session_id'); 
        if($session_id == NULL ) {
         redirect('logout');
        }
        $user_type = $this->session->userdata('user_type'); 

        if(($user_type!=3) AND ($user_type!=4)) {
         redirect('admin/Sign_out');
        } 
    } 

    public function index()
    {

        $data['active_lang']    = $this->db->select('*')->from('lg_setting')->get()->row();
        $data['languages']    = $this->languages(); 

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/language/main',$data);
        $this->load->view('admin/footer');
    }

    public function phrase()
    {
        $this->load->library('pagination');
        #------------------#
        $data['title']     = "Phrase List"; 
        #
        #pagination starts
        #
        $config["base_url"]       = base_url('admin/language/phrase/'); 
        $config["total_rows"]     = $this->db->count_all('language'); 
        $config["per_page"]       = 25;
        $config["uri_segment"]    = 4; 
        $config["num_links"]      = 4;  
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open']  = "<ul class='pagination col-xs pull-right m-0'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        $config['cur_tag_open']   = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']  = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open']  = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open']  = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open']  = "<li>";
        $config['last_tagl_close'] = "</li>"; 
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["phrases"] = $this->phrases($config["per_page"], $page); 
        $data["links"] = $this->pagination->create_links(); 
        #
        #pagination ends
        # 
        $data['languages']    = $this->languages();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/language/phrase',$data);
        $this->load->view('admin/footer');
    }
 

    public function languages()
    { 
        if ($this->db->table_exists($this->table)) { 

                $fields = $this->db->field_data($this->table);

                $i = 1;
                foreach ($fields as $field)
                {  
                    if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
                }

                if (!empty($result)) return $result;
 

        } else {
            return false; 
        }
    }


    public function addLanguage()
    { 
        $language = preg_replace('/[^a-zA-Z0-9_]/', '', $this->input->post('language',true));
        $language = strtolower($language);

        if (!empty($language)) {
            if (!$this->db->field_exists($language, $this->table)) {
                $this->dbforge->add_column($this->table, [
                    $language => [
                        'type' => 'TEXT'
                    ]
                ]); 
                $this->session->set_flashdata('message', 'Language added successfully');
                redirect('admin/language');
            } 
        } else {
            $this->session->set_flashdata('exception', 'Please try again');
        }
        redirect('admin/language');
    }


    public function editPhrase($language = null)
    { 

        $this->load->library('pagination');
        #------------------#
        $data['title']     = "Edit Phrase";
        $data['module']    = "dashboard";
        $data['language'] = $language;
        $data['page']      = "language/phrase_edit";
        #
        #pagination starts
        #
        $config["base_url"]       = base_url('admin/language/editPhrase/'. $language); 
        $config["total_rows"]     = $this->db->count_all('language'); 
        $config["per_page"]       = 25;
        $config["uri_segment"]    = 5; 
        $config["num_links"]      = 5;  
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open']  = "<ul class='pagination col-xs pull-right m-0'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        $config['cur_tag_open']   = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']  = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open']  = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open']  = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open']  = "<li>";
        $config['last_tagl_close'] = "</li>"; 
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data["phrases"] = $this->phrases($config["per_page"], $page); 
        $data["links"] = $this->pagination->create_links(); 
        #
        #pagination ends
        #


        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/language/phrase_edit',$data);
        $this->load->view('admin/footer');

    }

    public function addPhrase() {  

        $lang = $this->input->post('phrase'); 

        if (sizeof($lang) > 0) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($this->phrase, $this->table)) {

                    foreach ($lang as $value) {

                        $value = preg_replace('/[^a-zA-Z0-9_]/', '', $value);
                        $value = strtolower($value);

                        if (!empty($value)) {
                            $num_rows = $this->db->get_where($this->table,[$this->phrase => $value])->num_rows();

                            if ($num_rows == 0) { 
                                $this->db->insert($this->table,[$this->phrase => $value]); 
                                $this->session->set_flashdata('message', 'Phrase added successfully');
                            } else {
                                $this->session->set_flashdata('exception', 'Phrase already exists!');
                            }
                        }   
                    }  

                    redirect('admin/language/phrase');
                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('admin/language/phrase');
    }
 
    public function phrases($offset=null, $limit=null)
    {
        if ($this->db->table_exists($this->table)) {

            if ($this->db->field_exists($this->phrase, $this->table)) {

                return $this->db->order_by($this->phrase,'asc')
                    ->limit($offset, $limit)
                    ->get($this->table)
                    ->result();

            }  

        } 

        return false;
    }


    public function addLebel() { 
        $language = $this->input->post('language', true);
        $phrase   = $this->input->post('phrase', true);
        $lang     = $this->input->post('lang', true);

        if (!empty($language)) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($language, $this->table)) {

                    if (sizeof($phrase) > 0)
                    for ($i = 0; $i < sizeof($phrase); $i++) {
                        $this->db->where($this->phrase, $phrase[$i])
                            ->set($language,$lang[$i])
                            ->update($this->table); 

                    }  
                    $this->session->set_flashdata('message', 'Label added successfully!');
                   redirect('admin/language/editPhrase/'.$language);

                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('admin/language/editPhrase/'.$language);
    }
    
    public function switch_lang($lang=NULL)
    { 
        $data = array('language' => strtolower($lang));
        $this->db->update('lg_setting',$data);
        $this->session->set_flashdata('message', $lang .' is active successfully!');
        redirect('admin/language');
    }
}



 