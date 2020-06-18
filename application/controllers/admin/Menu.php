<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller {


#----------------------------
#   constructor function                            
#---------------------------- 
public function __construct() {
    parent::__construct();
    $this->load->library('session');
    $session_id = $this->session->userdata('session_id'); 
    if($session_id == NULL ) {
     redirect('admin/Sign_out');
    }
    $user_type = $this->session->userdata('user_type'); 
        
    $user_type = $this->session->userdata('user_type'); 

    if(($user_type!=3) AND ($user_type!=4)) {
     redirect('admin/Sign_out');
    }
    
    $this->load->helper('form');
    $this->load->model('admin/Page_model', 'page');
    $this->load->model("admin/Category_model", 'cm');
}

#----------------------------
#  Menu list
#----------------------------    
public function index() {

    $data['menu'] = $this->db->select('*')->from('menu')->get()->result();

    $this->load->view('admin/header',$data);
    $this->load->view('admin/menu');
    $this->load->view('admin/menu/view_menu_list');
    $this->load->view('admin/footer');
}

#---------------------------------
# update menu status for menu tbl
#---------------------------------
public function Udate_status(){
    $id = $this->uri->segment(4);
    $status = ($this->uri->segment(5) == 1) ? 0 : 1;
    $this->db->set('status',$status)->where('menu_id', $id)->update('menu');
    $this->session->set_flashdata('message', display('update_message'));
    redirect("admin/Menu");
}

#----------------------------
#  save menu
#----------------------------    
public function Save_menu() {
    $data = array(
        'menu_name' => $this->input->post('menu_name'),
        'menu_position' => $this->input->post('position')
        ); 
    $this->db->insert('menu',$data);
    echo json_encode(array("status" => TRUE));
}

#----------------------------
#  edit menu data get ajax
#---------------------------- 
public function Edit_data($id){
    $data = $this->db->select('*')
    ->from('menu')
    ->where('menu_id',$id)
    ->get()
    ->row();
    echo json_encode($data);
}

#----------------------------
#  Menu_update data  ajax
#----------------------------
public function Menu_update(){
    $id = $this->input->post('id');
     $data = array(
        'menu_name' => $this->input->post('menu_name'),
        'menu_position' => $this->input->post('position')
        ); 
   $this->db->where('menu_id',$id)->update('menu',$data);
    echo json_encode(array("status" => TRUE));
}


#----------------------------
# delete menu
#----------------------------    
public function Delete_menu($id) {
    $this->db->where('menu_id', $id);
    $this->db->delete('menu');
    echo json_encode(array("status" => TRUE));
}


#-------------------------------------------
#   Setup menu content data view
#-------------------------------------------
// ===================================================
public function Setup_menu_content($menu_id=NULL){

    $data['menu_content'] = $this->db->select("*")
    ->from('menu_content')
    ->where('menu_id',$menu_id)
    ->order_by('menu_position','ASC')
    ->get()
    ->result(); 
    
    $data['link_info'] = $this->db->select("*")
    ->from('links')
    ->get()
    ->result();

    $data['categories'] = $this->cm->all_categories();
    $data['page'] = $this->page->all_page();
    $data['menu_id'] = $menu_id;

    $this->load->view('admin/header',$data);
    $this->load->view('admin/menu');
    $this->load->view('admin/menu/view_setup_menu_content');
    $this->load->view('admin/footer');
}

#-----------------------------------------------
#   save menu content data for menu content tbl
#-----------------------------------------------

public function Save_content_menu(){
    
    $content_id = $this->input->post('content_id');
    $menu_id = $this->input->post('menu_id');
    if($content_id[0]==NULL){
        $this->session->set_flashdata('message', "Please select anyone");
        redirect("admin/Menu/Setup_menu_content/".$menu_id);
    } else{
        for($i=0; $i<count($content_id); $i++) {

            $cat_info = $this->cm->get_category_info($content_id[$i]);
            $data = array(
                'content_type' => $this->input->post('content_type'),
                'content_id' => $cat_info->category_id,
                'slug' => $cat_info->slug,
                'menu_lavel' => $cat_info->category_name,
                'menu_id' => $this->input->post('menu_id')
            );
            $this->db->insert('menu_content',$data);
        }
        
        $this->session->set_flashdata('message', display('menu_save_msg'));
        redirect("admin/Menu/Setup_menu_content/".$menu_id);
    }
}

#-----------------------------------------------
#   save menu content data for menu content tbl
#-----------------------------------------------
public function Save_page_content_menu(){
    $content_id = $this->input->post('content_id');
    $menu_id = $this->input->post('menu_id');
    if($content_id[0]==NULL){
        $this->session->set_flashdata('message', "Please select anyone");
        redirect("admin/Menu/Setup_menu_content/".$menu_id);
    } else{
        for($i=0; $i<count($content_id); $i++) {

            $page_info = $this->page->page_by_id($content_id[$i]);
            $data = array(
                'content_type' => $this->input->post('content_type'),
                'content_id' => $page_info->page_id,
                'slug' => $page_info->page_slug,
                'menu_lavel' => $page_info->title,
                'menu_id' => $this->input->post('menu_id')
            );
            $this->db->insert('menu_content',$data);
        }
        
        $this->session->set_flashdata('message', display('menu_save_msg'));
        redirect("admin/Menu/Setup_menu_content/".$menu_id);
    }
}

#-----------------------------------------------
#   delete menu content data for menu content tbl
#-----------------------------------------------
public function Delete_content_menu($id){
    $this->db->where('menu_content_id', $id);
    $this->db->delete('menu_content');
    echo json_encode(array("status" => TRUE));
}


#-----------------------------------------------
#   get menu content data for ajax 
#-----------------------------------------------
public function Content_menu_data($id){
     $data = $this->db->select("*")
    ->from('menu_content')
    ->where('menu_content_id',$id)
    ->get()
    ->row(); 
    echo json_encode($data);
}

#-----------------------------------------------
#   Content_menu_update
#-----------------------------------------------
public function Content_menu_update(){
    $id = $this->input->post('id');
    $data = array(
        'menu_lavel' => $this->input->post('lavel'),
        'menu_position' => $this->input->post('position'),
        'link_url' => $this->addhttp($this->input->post('link')),
        'parents_id' => $this->input->post('parent_id'),
        ); 
   $this->db->where('menu_content_id',$id)->update('menu_content',$data);
   echo json_encode(array("status" => TRUE));

}

#----------------------------------
#      To add http dynamically
#----------------------------------
function addhttp($url) {
    if($url!=NULL){
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }else{
        return $url;
    }
}

#-----------------------------------------------
#   Save_link
#---------------------------------------------
public function Save_link(){
    $linkdata = array(
        'link_level' => $this->input->post('lavel'),
        'link_url' => $this->addhttp($this->input->post('link')),
        );
    $this->db->insert('links',$linkdata);
    $content_id = $this->db->insert_id(); 

    $data = array(
        'menu_lavel' => $this->input->post('lavel'),
        'content_type' => 'links',
        'content_id' => $content_id,
        'menu_position' => $this->input->post('position'),
        'menu_id' => $this->input->post('menu_id'),
        'link_url' => $this->addhttp($this->input->post('link')),
        ); 
   $this->db->insert('menu_content',$data);
    echo json_encode(array("status" => TRUE));
}

#-----------------------------------------------
#   Add_link_with_content
#---------------------------------------------
public function Add_link_with_content(){
    $content_id = $this->input->post('content_id');
    $menu_id = $this->input->post('menu_id');

    if($content_id[0]==NULL){
        $this->session->set_flashdata('message', "Please select anyone");
        redirect("admin/Menu/Setup_menu_content/".$menu_id);
    } else{
        for($i=0; $i<count($content_id); $i++) {

            $linkdata = $this->db->select("*")
                ->from('links')
                ->where('link_id',$content_id[$i])
                ->get()
                ->row();
               // print_r($linkdata); exit;

            $data = array(
                'content_type' => 'links',
                'link_url' => $linkdata->link_url,
                'menu_lavel' => $linkdata->link_level,
                'menu_id' => $this->input->post('menu_id')
            );
            $this->db->insert('menu_content',$data);
        }
        $this->session->set_flashdata('message', display('menu_save_msg'));
        redirect("admin/Menu/Setup_menu_content/".$menu_id);
    }
}

#---------------------------------------
#   update menu content position
#---------------------------------------

public function Update_content_position(){
    $id = $this->input->post('id');
    $position = $this->input->post('position');
    for($i = 0; $i<count($position); $i++){
        $ds = array('menu_position' => $position[$i],);

       $this->db->where('menu_content_id',$id[$i])
       ->update('menu_content',$ds);
    }
   echo json_encode(array("status" => TRUE));
}


public function DragDrop_update(){

        $ids = $this->input->post('id');
        $i=1;
        foreach ($ids as  $value) {
            $this->db->set('menu_position',$i)
            ->where('menu_content_id',$value)
            ->update('menu_content');
             $i++;
        }
        $this->sitemap_xml();
        echo json_encode(array("status" => TRUE));
 
}


#-------------------------------
# create rss.xml
    function sitemap_xml(){

        @$info = $this->db->select('*')->from("menu_content")->get()->result();

        $xml ="<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml.="<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
        $xml.="
                <url>
                    <loc>" . base_url()."</loc>
                    <changefreq> always </changefreq>
                    <priority>1.0</priority>    
                </url>\n";
                
        foreach ($info as $key => $row) {
            
            if($row->slug!=''){
            $xml.="
                <url>
                    <loc>" . base_url().@$row->slug . "</loc>
                    <changefreq> always </changefreq>
                    <priority>1.0</priority>    
                </url>\n";
            }   
        }

        $xml.="</urlset>\n";
        $file = fopen("sitemap.xml","w");
        fwrite($file,$xml);
        fclose($file);
    }  


}
