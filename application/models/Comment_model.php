<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Comment_model extends CI_Model{

    // Get all comments by v_id
    public function get_all_comments($v_id) 
    {
        $this->db->where('v_id', $v_id);
        $comments = $this->db->get('comments')->result();
        return $comments;
    }

    // Post comment
    public function post_comment($comment)
    {
        $this->db->insert('comments', $comment);
    }

}
?>
