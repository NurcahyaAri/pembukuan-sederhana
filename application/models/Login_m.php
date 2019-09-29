<?php

    class Login_m extends CI_Model{
        public function __construct() {
            parent::__construct(); 
            $this->load->database();
        }
        public function findOneByUsername($username){
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('username = ', $username);
            return $this->db->get()->row();
        }
    }

?>