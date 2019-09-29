<?php

    class Peminjaman_m extends CI_Model{

        public function __construct(){
            parent::__construct();
        }

        public function datatable(){
            $this->datatables->select("n.*, c.nama");
            $this->datatables->from('nota n');
            $this->datatables->join('customer c', "c.id = n.id_customers");
            $this->datatables->where('n.status_barang <>', "kembali");
            return $this->datatables->generate();
        }

        public function deleteCustomer($id){
            $this->db->where("id_nota", $id);
            $nota = $this->db->get('nota')->row();
            $this->db->where('id', $nota->id_nota);
            return $this->db->delete('customer');
        }

        public function deleteBarang($id){
            $this->db->where('id_nota', $id);
            return $this->db->delete('barang');
        }

        public function deleteNota($id){
            $this->db->where('id_nota', $id);
            return $this->db->delete('nota');
        }

        public function changeStatus($id){
            $this->db->select('harga_sewa');
            $this->db->from('nota');
            $this->db->where("id_nota", $id);
            $nota = $this->db->get()->row();

            $this->db->where("id_nota", $id);
            $data = array(
                "status" => "lunas",
                "terbayar" => $nota->harga_sewa
            );
            return $this->db->update('nota', $data);
        }

        public function save($data){
            if($data['id']){
                $this->deleteCustomer($data['id']);
                $this->deleteBarang($data['id']);
            }
            $status = "lunas";
            $statusBarang = "terpinjam";
            $terbayar = $data['hargaPinjaman'];
            if(!empty($data['isDp'])){
                $status = "belum_lunas";
                $terbayar = $data['dpTerbayar'];
                $statusBarang = "terpinjam";
            }

            $customer = array(
                "nama" => $data['namaPeminjam'],
                "nomer_handphone" => $data['noHP'],
                "alamat" => ""
            );

            $this->db->insert('customer', $customer);
            $customer_id = $this->db->insert_id();
            $nota = array(
                "tanggal_kadaluarsa" => strtotime($data['data_end']) * 1000,
                "tanggal_sewa" => strtotime($data['data_start']) * 1000,
                "id_customers" => $customer_id,
                "harga_sewa" => $data['hargaPinjaman'],
                "terbayar" => $terbayar,
                "status" => $status,
                "status_barang" => $statusBarang
            );

            $this->db->insert('nota', $nota);
            $insert_id = $this->db->insert_id();

            if(is_array($data['barang'])){
                $i = 0;
                foreach($data['barang'] as $b){
                    $barang = array(
                        "id_nota" => $insert_id,
                        "nama_barang" => $b['nama'],
                        "kelengkapan" => $data['kelengkapanBarang'][$i],
                        "jumlah_barang" => $b['qty'],
                        "harga_sewa" => $b['harga']
                    );
                    $i++;
                    $this->db->insert('barang', $barang);
                    $id_barang = $this->db->insert_id();
                    foreach($b['kelengkapan'] as $k){
                        $kelengkapan = array(
                            "id_barang" => $id_barang,
                            "kelengkapan" => $k,
                            "status_pinjam" => 0
                        );
                        $this->db->insert('kelengkapan', $kelengkapan);
                    }
                }
            }

            
            return $insert_id;
            
        }


        public function getById($id){
            $this->db->select("n.*, c.nama, c.nomer_handphone, b.*");
            $this->db->from('nota n');
            $this->db->join('customer c', "c.id = n.id_customers");
            $this->db->join('barang b ', "b.id_nota = n.id_nota");
            $this->db->where("n.id_nota = $id");
            return $this->db->get()->result();
        }

        public function getSumLoan(){
            $this->db->select('count(*) as allLoan');
            return $this->db->get("nota")->row();
        }
    }

?>