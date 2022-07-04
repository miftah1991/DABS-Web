<?php
Class New_m  extends CI_Model {
    
   
    
    function GetNews($nid){
            $q = $this->db->query("SELECT * FROM tbl_news where nid=$nid");
            return $q->result();   
            
        }
    function GetAll(){
        $q = $this->db->query("SELECT n.*,l.language FROM tbl_news n, tbl_lng l where n.language_id=l.language_id order by n                                                            .nid desc");
        return $q->result();
    }
    function GetAllArticles(){
        $q = $this->db->query("SELECT n.*,l.language FROM tbl_articles n, tbl_lng l where n.language_id=l.language_id order by n                                                            .nid desc");
        return $q->result();
    }
    function AddNews($inputArray){
        $this->db->insert('tbl_news',$inputArray);
    }
    function AddArticle($inputArray){
        $this->db->insert('tbl_Articles',$inputArray);
    }
    function UpdateNews($nid,$inputArray){
        $this->db->where('nid', $nid);
            $this->db->update('tbl_news', $inputArray);
    }
    function DeleteNews($nid){
        $this->db->where('nid',$nid);
            $this->db->delete('tbl_news');
    }
    
}

?>