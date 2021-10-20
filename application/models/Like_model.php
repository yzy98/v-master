<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Like_model extends CI_Model{
    
    // Insert like info into DB
    public function addLike($row)
    {
        $this->db->insert('likes', $row);
        $v_id = $row['v_id'];

        $this->db->query("UPDATE `videos` SET `likes` = `likes` + 1 WHERE `v_id` = $v_id");

    }

}