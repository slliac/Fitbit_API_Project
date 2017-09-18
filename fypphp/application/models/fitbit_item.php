<?php

class fitbit_item extends CI_Model {

  function __construct()
  {
    /* Call the Model constructor */
    parent::__construct();
  }

    function get_item($access_token, $user_id ,$profile) {
        $this->db->select("name");
        $this->db->from('user');

        $this->db->like('id', $user_id);

        $this->db->limit(10);
        $this->db->order_by("name", 'desc');
        $query = $this->db->get();
        if(sizeOf($query->result()) == 0)
        {
          //do registration
          return $profile;
        }
        else
        {
            //return user_id in db
        }
    }

}
