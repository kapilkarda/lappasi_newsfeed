<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {

#------------------------------------
# Construct funcion
#------------------------------------
    public function __construct() {
        parent::__construct();
    }

#------------------------------------
# Get searching  Date
#------------------------------------
    public function get_search_data($keyword,$limit=NULL,$start=NULL) {
        return $r = $this->db->select("news_mst.*,user_info.id,user_info.name,user_info.photo")
        ->from("news_mst")
        ->join('user_info','user_info.id=news_mst.post_by')
        ->or_like('title',$keyword) 
        ->where('news_mst.publish_date <=',date("Y-m-d"))
        ->limit($limit,$start)
        ->get()
        ->result();
    }


    public function get_search_data_row($keyword){

        return $row = $this->db->select("news_mst.*,user_info.id,user_info.name,user_info.photo")
        ->from("news_mst")
        ->join('user_info', 'user_info.id=news_mst.post_by')
        ->or_like("title", $keyword)
        ->where('news_mst.publish_date <=',date("Y-m-d"))
        ->get()
        ->num_rows();
    }


}
