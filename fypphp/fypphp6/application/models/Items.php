<?php

class Items extends CI_Model {

    function get_live_items($search_data) {

        $this->db->select("name,gender");
        $this->db->from('user');
        $this->db->group_start();
        $this->db->like('name', $search_data);
        $this->db->or_like('gender', $search_data);
        $this->db->group_end();
        $this->db->limit(10);
        $this->db->order_by("name", 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    function get_live_items2($search_data) {

        $this->db->select("familyName");
        $this->db->from('family');
        $this->db->group_start();
        $this->db->group_end();
        $this->db->limit(10);
        $this->db->order_by("familyName", 'desc');
        $query = $this->db->get();
        return $query->result();
    }
	
	
	
	
}
