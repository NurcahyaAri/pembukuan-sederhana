<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('Theme');
		$this->load->library('session');
        $this->load->model('Laporan_m');
        $this->load->library('pdf');
		// $this->load->library('Auth');
		// echo json_encode($this->session->userdata('isLogin'));
		if($this->session->userdata('isLogin') == 1){
			return ;
		}else {
			header('Location: '. base_url() .'login');
		}
    }

    private function formatLaporan($data, $pendapatan, $tipe){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SALON ANNA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'REKAPAN ' . $tipe,0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(20,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'Nama Peminjam',1,0,'C');
        $pdf->Cell(20,6,'Terbayar',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Pinjam',1,0,'C');
        $pdf->Cell(25,6,'Tanggal Kembali',1,0,'C');
        // $pdf->Cell(45,6,'Barang',1,0,'auto');
        // $pdf->Cell(45,6,'Kelengkapan',1,0,'auto');
        $pdf->Cell(27,6,'Status Pinjam',1,0,'C');
        $pdf->Cell(27,6,'Status Barang',1,1,'C');
        $pdf->SetFont('Arial','',10,'C');

        foreach ($data as $row){
            $pdf->Cell(30,6,$row->nama,1,0,'C');
            $pdf->Cell(20,6,$row->terbayar,1,0,'C');
            $pdf->Cell(25,6,$row->tanggal_sewa,1,0,'C'); 
            $pdf->Cell(25,6,$row->tanggal_kembali,1,0,'C');  
            $pdf->Cell(27,6,$row->status,1,0,'C');
            $pdf->Cell(27,6,$row->status_barang,1,1,'C');
        }
        $pdf->Cell(127,6,'Total Pendapatan',1,0,'C');
        // $pdf->Cell(192,6,'Total Pendapatan',1,0,'C');
        $pdf->Cell(27,6,$pendapatan[0]->pendapatan,1,1,'C');
        $pdf->Cell(127,6,'Total Peminjaman',1,0,'C');
        // $pdf->Cell(192,6,'Total Peminjaman',1,0,'C');
        $pdf->Cell(27,6,$pendapatan[0]->peminjam,1,1,'C');
        return $pdf->Output();
    }
    
    public function harian(){
        $tahunan = $this->Laporan_m->getLaporanHarian();
        $pendapatan = $this->Laporan_m->getPendapatanHarian();
        // echo json_encode($pendapatan);
        $this->formatLaporan($tahunan, $pendapatan, "HARIAN");
    }

    public function Bulanan(){
        $tahunan = $this->Laporan_m->getLaporanBulanan();
        $pendapatan = $this->Laporan_m->getPendapatanBulanan();
        $this->formatLaporan($tahunan, $pendapatan, "BULANAN");
    }

    public function Tahunan(){
       $tahunan = $this->Laporan_m->getLaporanTahunan();
       $pendapatan = $this->Laporan_m->getPendapatanTahunan();
       $this->formatLaporan($tahunan, $pendapatan, "TAHUNAN");
    }

    public function Mingguan(){
        $mingguan = $this->Laporan_m->getLaporanMingguan();
        $pendapatan = $this->Laporan_m->getPendapatanMingguan();
        $this->formatLaporan($mingguan, $pendapatan, "MINGGUAN");
    }


}