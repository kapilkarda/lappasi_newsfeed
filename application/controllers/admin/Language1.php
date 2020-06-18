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
        $data['languages']    = $this->languages();
        $data['phrases']      = $this->phrases();

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

                if ($result!=NULL) return $result;
 

        } else {
            return false; 
        }
    }

    public function addLanguage()
    { 
        $language = preg_replace('/[^a-zA-Z0-9_]/', '', $this->input->post('language',true));
        $language = strtolower($language);

        if ($language!=NULL) {
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
        $data['language'] = $language;
        $data['phrases']  = $this->phrases();


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

                        if ($value!=NULL) {
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
 
    public function phrases()
    {
        if ($this->db->table_exists($this->table)) {

            if ($this->db->field_exists($this->phrase, $this->table)) {

                return $this->db->order_by($this->phrase,'asc')
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

        if ($language!=NULL) {

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



 