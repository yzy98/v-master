<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Wish_model extends CI_Model{

    // Get wishlist
    public function getVideoIds($u_id)
    {
        $this->db->where('u_id', $u_id);
        $query = $this->db->get('wishlist');
        $count = $query->num_rows();
        $ans = array();
        $v_ids = array();
        $w_ids = array();

        for ($i=0; $i < $count; $i++) { 
            $v_ids[$i] = $query->row($i)->v_id;
        }

        for ($i=0; $i < $count; $i++) { 
            $w_ids[$i] = $query->row($i)->w_id;
        }
        $answer[0] = $v_ids;
        $answer[1] = $w_ids;
        return $answer;
    }

    // Get wish buy w_id
    public function getWish($w_id)
    {
        $this->db->where('w_id', $w_id);
        $query = $this->db->get('wishlist');
        $row = $query->row();
        return $row;
    }

    // Insert wish row
    public function addWish($row)
    {
        $this->db->insert('wishlist', $row);
    }

    // Delete wish row
    public function delWish($w_id)
    {
        $this->db->where('w_id', $w_id);
        $this->db->delete('wishlist');
    }
 }