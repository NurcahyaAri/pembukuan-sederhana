<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->library('Theme');
		$this->load->helper('url');
		// $this->load->library('Auth');
		$this->load->library('session');
		$this->load->model('Peminjaman_m');
		$this->load->model('Pengembalian_m');
		if($this->session->userdata('isLogin') == 1){
			return ;
		}else {
			header('Location: '. base_url() .'login');
		}
	}

	public function index(){
		$data = array(
			"page_title" => "Pengembalian"
		);
		$this->theme->view('pengembalian_v');
	}

	public function json(){
		$json = $this->Pengembalian_m->datatable_pengembalian();
		$json_decode = json_decode($json);
		
		$draw_json = array(
			'draw' => $json_decode->draw,
			'recordsTotal' => $json_decode->recordsTotal,
			'recordsFiltered' => $json_decode->recordsFiltered,
			'data' => $json_decode->data
		);

		//output
		
		echo json_encode($draw_json);
	}

	public function lihatStatusDataBarang(){
		$id = $this->input->post('id');
		$data = $this->Pengembalian_m->ambilData($id);
		// array_pop($data);
		$json = array();
		for($i = 0; $i < sizeof($data); $i++){
			array_push($json, array(
				"id_barang" => $data[$i]->id_barang,
				"id_customer" => $data[$i]->id_customers,
				"id_nota" => $data[$i]->id_nota,
				"nama_barang" => $data[$i]->nama_barang,
				"kelengkapan" => array(
					"kelengkapan" => explode(",", $data[$i]->kelengkapan),
					"id" => explode(",", $data[$i]->id)
				)
			));
			// break;
			// array_shift($data);	
		}
		// $json = array();
		// for($i = 0; $i < sizeof($data); $i++){
		// 	$kelengkapan = array();
		// 	for($j = $i; $j < sizeof($data); $j++){
		// 		if($data[0]->id_barang == $data[$j]->id_barang){
		// 			array_push($kelengkapan, array(
		// 				"kelengkapan" => $data[$j]->kelengkapan,
		// 				"id" => $data[$j]->id
		// 			));
		// 		}
		// 	}
		// 	array_push($json, array(
		// 		"id_barang" => $data[0]->id_barang,
		// 		"id_customer" => $data[0]->id_customers,
		// 		"id_nota" => $data[0]->id_nota,
		// 		"nama_barang" => $data[0]->nama_barang,
		// 		"kelengkapan" => $kelengkapan
		// 	));
		// 	// break;
		// 	// array_shift($data);	
		// }
		
		echo json_encode($json);
	}

	public function simpanSebagian(){
		// echo json_encode($this->input->post());
		$data = $this->input->post();
		$id_nota = $data['id_nota'];
		$id_kelengkapan = $data['kelengkapan'];
		$id_customer = $data['id_customers'];
		$id_barang = $data['id_barang'];

		$d = $this->Pengembalian_m->pengembalianSebagian($id_kelengkapan, $id_barang, $id_customer, $id_nota);
		if($d){
			echo json_encode(array(
				"msg" => "success"
			));
		}
	}

	public function pengembalianFull(){
		$id = $this->input->post('id');
		$data = $this->Pengembalian_m->getNota($id);
		$kembali = $this->Pengembalian_m->pengembalianFull($data);
		if($kembali){
			echo json_encode(array(
				"status" => "success",
				"message" => "Barang berhasil kembali"
			));
		} else {
			echo json_encode(array(
				"status" => "Failde",
				"message" => "An Error occured"
			));
		}
	}
}
