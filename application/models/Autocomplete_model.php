<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Autocomplete_model extends CI_Model{
    function fetch_data($query)
    {
        $this->db->distinct();
        $this->db->select("title");
        $this->db->from('videos');
        $this->db->like('title', $query);
        $this->db->group_by('videos.title');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>