<?php

    class Pengembalian_m extends CI_Model{

        public function datatable_pengembalian(){
            $this->datatables->select("n.*, c.nama");
            $this->datatables->from('nota n');
            $this->datatables->join('customer c', "c.id = n.id_customers");
            $this->datatables->where('n.status = "lunas"');
            $this->datatables->where('n.status_barang = "terpinjam"');
            return $this->datatables->generate();
        }

        public function getNota($id){
            $this->db->select('n.*, c.nama, c.id, b.id_barang, b.nama_barang, b.kelengkapan');
            $this->db->from('nota n ');
            $this->db->join('customer c', 'c.id = n.id_customers');
            $this->db->join('barang b', 'b.id_nota = n.id_nota');
            $this->db->where('n.id_nota', $id);
            return $this->db->get()->result();   
        }

        public function ambilData($id){
            $this->db->select('b.id_barang, b.nama_barang, GROUP_CONCAT(k.kelengkapan) AS kelengkapan, GROUP_CONCAT(k.id) AS id, n.id_customers, n.id_nota');
            $this->db->from('barang b');
            $this->db->join('kelengkapan k', "k.id_barang = b.id_barang");
            $this->db->join('nota n', 'n.id_nota = b.id_nota');
            $this->db->where('b.id_nota', $id);
            $this->db->where('k.status_pinjam = 0');
            $this->db->group_by('b.id_barang');
            return $this->db->get()->result();
        }

        public function pengembalianFull($data){
            foreach ($data as $item) {
                $barang = array(
                    "id_barang" => $item->id_barang,
                    "id_customer" => $item->id,
                    "id_nota" => $item->id_nota,
                    "kelengkapan" => $item->kelengkapan,
                    "tanggal_pengembalian" => round(microtime(true) * 1000)
                );
                $this->db->insert('pengembalian', $barang);
            }
            $this->db->set('status_barang', "kembali");
            $this->db->where("id_nota", $data[0]->id_nota);
            return $this->db->update('nota');
        }

        public function getTotalKelengkapan($id){
            $this->db->select('COUNT(*)');
            $this->db->from('kelengkapan');
            $this->db->where_in('id_barang', $id);
            return $this->db->get()->row();
        }

        public function getTotalKelengkapanKembali($id){
            $this->db->select('COUNT(*)');
            $this->db->from('kelengkapan');
            $this->db->where_in('id_barang', $id);
            $this->db->where('status_pinjam = 1');
            return $this->db->get()->row();
        }

        public function getIdNota($id){
            // $this->db->select("*");
            // $this->db->from('kelengkapan k');
            // $this->db->join('barang b', 'b.id_barang = k.id_barang');
            // $this->db->join('nota n', 'n.id_nota = b.id_nota');
            // $this->db->where('k.id', $id);
            // $this->db->get
            return $this->db->query("
                SELECT * FROM
                kelengkapan k
                JOIN barang b ON b.id_barang = k.id_barang
                JOIN nota n ON n.id_nota = b.id_nota
                WHERE k.id = $id
            ")->row();
        }

        public function pengembalianSebagian($data, $id_barang, $id_customer, $id_nota){
            $idBarang = 0;
            if(is_array($data)){
                for($i = 0; $i < sizeof($data); $i++){
                    $this->db->set('status_pinjam', 1);
                    $this->db->where('id', $data[$i]);
                    $this->db->update('kelengkapan');

                    $this->db->select('kelengkapan');
                    $this->db->from('kelengkapan');
                    $this->db->where('id', $data[$i]);
                    $item = $this->db->get()->row();
                    $nota = $this->getIdNota($data[$i]);
                    $barang = array(
                        "id_barang" => $nota->id_barang,
                        "id_customer" => $nota->id_customers,
                        "id_nota" => $nota->id_nota,
                        "kelengkapan" => $item->kelengkapan,
                        "tanggal_pengembalian" => round(microtime(true) * 1000)
                    );
                    $this->db->insert('pengembalian', $barang);
                }
            } else {
                $this->db->set('status_pinjam', 1);
                $this->db->where('id', $data);
                $this->db->update('kelengkapan');

                $this->db->select('k.kelengkapan');
                $this->db->from('kelengkapan k');
                $this->db->where('id', $data);
                $item = $this->db->get()->row();
                $nota = $this->getIdNota($data);
                // echo json_encode($data);
                $barang = array(
                    "id_barang" => $nota->id_barang,
                    "id_customer" => $nota->id_customers,
                    "id_nota" => $nota->id_nota,
                    "kelengkapan" => $item->kelengkapan,
                    "tanggal_pengembalian" => round(microtime(true) * 1000)
                );
                // $total = $this->getTotalKelengkapan($nota->id_barang);
                // $kembali = $this->getTotalKelengkapanKembali($nota->id_barang);

                // if($total == $kembali){
                //     $this->db->set('status_barang', "kembali");
                //     $this->db->where("id_nota", $nota->id_nota);
                //     $this->db->update('nota');
                // }
                // echo json_encode($data);
                // $barang = array(
                //     "id_barang" => $id_barang,
                //     "id_customer" => $id_customer,
                //     "id_nota" => $id_nota,
                //     "kelengkapan" => $item->kelengkapan,
                //     "tanggal_pengembalian" => round(microtime(true) * 1000)
                // );
                $this->db->insert('pengembalian', $barang);
            }
            $nota = $this->getIdNota($data);
            $total = $this->getTotalKelengkapan($id_barang);
            $kembali = $this->getTotalKelengkapanKembali($id_barang);

            if($total == $kembali){
                $this->db->set('tanggal_kembali', round(microtime(true) * 1000));
                $this->db->set('status_barang', "kembali");
                $this->db->where("id_nota", $nota->id_nota);
                $this->db->update('nota');
            }
            return true;
        }
    }

?>