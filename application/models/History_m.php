<?php

    class History_m extends CI_Model{
        public function saveHistory($data){
            $nota = array(
                "tanggal_kadaluarsa" => $data->tanggal_kadaluarsa,
                "tanggal_sewa" => $data->tanggal_sewa,
                "id_customers" => $data->id_customers,
                "harga_sewa" => $data->harga_sewa,
                "terbayar" => $data->terbayar,
                "type" => "meminjam",
                "status" => $data->status,
                "status_barang" => $data->status_barang
            );

            $this->db->insert('history', $nota);
            $insert_id = $this->db->insert_id();
            
            return $insert_id;
        }

        public function datatable(){
            $this->datatables->select("n.*, c.nama");
            $this->datatables->from('nota n');
            $this->datatables->join('customer c', "c.id = n.id_customers");
            
            return $this->datatables->generate();
        }
    }

?>