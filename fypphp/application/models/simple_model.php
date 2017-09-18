<?php

class Simple_model extends CI_Model {


  function __construct()
  {
    /* Call the Model constructor */
    parent::__construct();
  }


 function get_all_name()
 {
        return  $this->db->get('test');
 }

  function get_row_count()
  {
    return $this->db->count_all('test');
  }


    public function get_autocomplete($search_data)
        {
                $this->db->select('name');
                $this->db->like('name', $search_data);

                return $this->db->get('user', 10)->result();
        }



}
