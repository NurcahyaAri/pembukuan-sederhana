<?php

    class Laporan_m extends CI_Model{
        public function getLaporanHarian(){
            return $this->db->query("
                SELECT 
                    c.nama,
                    n.terbayar,
                    DATE_FORMAT(FROM_UNIXTIME(n.tanggal_sewa / 1000), '%d-%m-%Y') as tanggal_sewa,
                    CASE
                    	WHEN n.tanggal_kembali = 0 THEN '-'
                        ELSE DATE_FORMAT(FROM_UNIXTIME(n.tanggal_kembali / 1000), '%d-%m-%Y')
                    END tanggal_kembali,
                    GROUP_CONCAT(b.nama_barang) as nama_barang,
                    GROUP_CONCAT(b.kelengkapan) as kelengkapan,
                    n.status,
                    n.status_barang,
                    SUM(n.terbayar) as pendapatan,
                    COUNT(*) as peminjam
                FROM 
                nota n 
                JOIN barang b ON b.id_nota = n.id_nota
                JOIN customer c ON c.id = n.id_customers
                WHERE DATE_FORMAT(NOW(), '%d-%m-%Y') = DATE_FORMAT(FROM_UNIXTIME(tanggal_sewa / 1000), '%d-%m-%Y')
                GROUP BY n.id_nota
            ")->result();
        }

        public function getPendapatanHarian(){
            return $this->db->query("
                SELECT 
                    SUM(n.terbayar) as pendapatan,
                    COUNT(n.id_nota) as peminjam
                FROM 
                nota n 
                WHERE DATE_FORMAT(NOW(), '%d-%m-%Y') = DATE_FORMAT(FROM_UNIXTIME(tanggal_sewa / 1000), '%d-%m-%Y')
            ")->result();
        }

        public function getLaporanBulanan(){
            return $this->db->query("
                SELECT 
                    c.nama,
                    n.terbayar,
                    DATE_FORMAT(FROM_UNIXTIME(n.tanggal_sewa / 1000), '%d-%m-%Y') as tanggal_sewa,
                    CASE
                    	WHEN n.tanggal_kembali = 0 THEN '-'
                        ELSE DATE_FORMAT(FROM_UNIXTIME(n.tanggal_kembali / 1000), '%d-%m-%Y')
                    END tanggal_kembali,
                    GROUP_CONCAT(b.nama_barang) as nama_barang,
                    GROUP_CONCAT(b.kelengkapan) as kelengkapan,
                    n.status,
                    n.status_barang,
                    SUM(n.terbayar) as pendapatan,
                    COUNT(*) as peminjam
                FROM 
                nota n 
                JOIN barang b ON b.id_nota = n.id_nota
                JOIN customer c ON c.id = n.id_customers
                WHERE DATE_FORMAT(FROM_UNIXTIME(tanggal_sewa / 1000), '%m') = DATE_FORMAT(NOW(), '%m')
                GROUP BY n.id_nota
            ")->result();
        }

        public function getPendapatanBulanan(){
            return $this->db->query("
                SELECT 
                    SUM(n.terbayar) as pendapatan,
                    COUNT(n.id_nota) as peminjam
                FROM 
                nota n 
                WHERE DATE_FORMAT(FROM_UNIXTIME(tanggal_sewa / 1000), '%m') = DATE_FORMAT(NOW(), '%m')
            ")->result();
        }

        public function getLaporanTahunan(){
            return $this->db->query("
                SELECT 
                    c.nama,
                    n.terbayar,
                    DATE_FORMAT(FROM_UNIXTIME(n.tanggal_sewa / 1000), '%d-%m-%Y') as tanggal_sewa,
                    CASE
                    	WHEN n.tanggal_kembali = 0 THEN '-'
                        ELSE DATE_FORMAT(FROM_UNIXTIME(n.tanggal_kembali / 1000), '%d-%m-%Y')
                    END tanggal_kembali,
                    GROUP_CONCAT(b.nama_barang) as nama_barang,
                    GROUP_CONCAT(b.kelengkapan) as kelengkapan,
                    n.status,
                    n.status_barang,
                    SUM(n.terbayar) as pendapatan,
                    COUNT(*) as peminjam
                FROM 
                nota n 
                 JOIN barang b ON b.id_nota = n.id_nota
                 JOIN customer c ON c.id = n.id_customers
                LEFT JOIN pengembalian p ON p.id_nota = n.id_nota
                WHERE DATE_FORMAT(FROM_UNIXTIME(tanggal_sewa / 1000), '%Y') = DATE_FORMAT(NOW(), '%Y')
                GROUP BY n.id_nota
            ")->result();
        }

        public function getPendapatanTahunan(){
            return $this->db->query("
                SELECT 
                    SUM(n.terbayar) as pendapatan,
                    COUNT(n.id_nota) as peminjam
                FROM 
                nota n 
                WHERE DATE_FORMAT(FROM_UNIXTIME(tanggal_sewa / 1000), '%Y') = DATE_FORMAT(NOW(), '%Y')
            ")->result();
        }

        public function getLaporanMingguan(){
            return $this->db->query("
                SELECT 
                    c.nama,
                    n.terbayar,
                    DATE_FORMAT(FROM_UNIXTIME(n.tanggal_sewa / 1000), '%d-%m-%Y') as tanggal_sewa,
                    CASE
                    	WHEN n.tanggal_kembali = 0 THEN '-'
                        ELSE DATE_FORMAT(FROM_UNIXTIME(n.tanggal_kembali / 1000), '%d-%m-%Y')
                    END tanggal_kembali,
                    GROUP_CONCAT(b.nama_barang) as nama_barang,
                    GROUP_CONCAT(b.kelengkapan) as kelengkapan,
                    n.status,
                    n.status_barang,
                    SUM(n.terbayar) as pendapatan,
                    COUNT(*) as peminjam
                FROM 
                nota n 
                JOIN barang b ON b.id_nota = n.id_nota
                JOIN customer c ON c.id = n.id_customers
                WHERE WEEK(DATE_FORMAT(FROM_UNIXTIME(tanggal_sewa / 1000), '%Y-%m-%d')) = WEEK(DATE_FORMAT(NOW(), '%Y-%m-%d'))
                GROUP BY n.id_nota
            ")->result();
            
        }

        public function getPendapatanMingguan(){
            return $this->db->query("
                SELECT 
                    SUM(n.terbayar) as pendapatan,
                    COUNT(n.id_nota) as peminjam
                FROM 
                nota n 
                WHERE WEEK(DATE_FORMAT(FROM_UNIXTIME(tanggal_sewa / 1000), '%Y-%m-%d')) = WEEK(DATE_FORMAT(NOW(), '%Y-%m-%d'))
            ")->result();
        }
    }

?>