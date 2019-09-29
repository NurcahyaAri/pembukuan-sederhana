<?php

    class Nota_m extends CI_Model{
        public function getNotaById($id){
            $this->db->where('id_nota', $id);
            return $this->db->get('nota')->row();   
        }

        public function makeInvoice($id){
            
        }
    }

?>