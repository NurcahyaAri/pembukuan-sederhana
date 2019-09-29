<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

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
		$this->load->model('History_m');
		$this->load->model('Nota_m');
		if($this->session->userdata('isLogin') == 1){
			return ;
		}else {
			header('Location: '. base_url() .'login');
		}
	}
	public function index(){
		$data = array(
			"page_title" => "Peminjaman"
		);
		$this->theme->view('peminjaman_v');
	}

	public function json(){
		$json = $this->Peminjaman_m->datatable();
		$json_decode = json_decode($json);

		//remake json data
		$draw_json = array(
			'draw' => $json_decode->draw,
			'recordsTotal' => $json_decode->recordsTotal,
			'recordsFiltered' => $json_decode->recordsFiltered,
			'data' => $json_decode->data
		);

		//output
		
		echo json_encode($draw_json);
	}

	public function save(){
		// echo json_encode($this->input->post());
		$barang = array();
		$i = 0;
		foreach ($this->input->post('namaBarang') as $b) {
			$barang[$i] = array(
				"nama" => $b,
				"harga" => $this->input->post('hargaBarang')[$i],
				"qty" => $this->input->post('jumlahBarang')[$i],
				"kelengkapan" => explode(",", $this->input->post("kelengkapanBarang")[$i])
			);
			
			$i++;
		}
		$_POST['barang'] = $barang;
		// echo json_encode($this->input->post());
		$save = $this->Peminjaman_m->save($this->input->post());
		
		if($save){
			$data = $this->Nota_m->getNotaById($save);
			$this->History_m->saveHistory($data);
			echo json_encode(array(
				"status" => "success",
				"msg" => "Data tersimpan"
			));
		} else {
			echo json_encode(array(
				"status" => "failed",
				"msg" => "Data gagal tersimpan"
			));
		}
	}

	public function invoice($id){
		
		$data['barang'] = $this->Peminjaman_m->getById($id);
		// echo json_encode($data);
		
		$this->load->view('invoice', $data);
	}

	public function setStatusLunas(){
		$id = $this->input->post('id');
		$this->Peminjaman_m->changeStatus($id);
		echo json_encode(array(
			"status" => "success",
			"msg" => "Data terupdate"
		));
	}

	public function delete(){
		$id = $this->input->post('id');
		$this->Peminjaman_m->deleteBarang($id);
		$this->Peminjaman_m->deleteCustomer($id);
		$this->Peminjaman_m->deleteNota($id);
		echo json_encode(array(
			"status" => "success",
			"msg" => "Data Terhapus"
		));
	}

	public function getDataById(){
		$id = $this->input->post('id');
		
		$data = $this->Peminjaman_m->getById($id);

		echo json_encode($data);
	}
	
}
