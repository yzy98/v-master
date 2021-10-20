<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Video_model extends CI_Model{

    //Insert video
    public function insert_video($new_video)
    {
        $this->db->insert('videos', $new_video);
    }

    // Get videos under certain category
    public function get_category_videos($category)
    {
        $this->db->where('category', $category);
        $query = $this->db->get('videos');
        return $query;
    }

    public function get_user_videos($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('videos');
        return $query;
    }

    // Get video info by its id
    public function get_video_by_id($v_id)
    {
        $this->db->where('v_id', $v_id);
        $query = $this->db->get('videos');
        $row = $query->row();
        return $row;
    }

    // public function get_videos_by_ids($arr)
    // {
    //     if (count($arr) != 0) {
           
    //         $this->db->where_in('v_id', $arr);
    //         $query = $this->db->get('videos');
    //         return $query;
    //     }
    // }


}
?>
