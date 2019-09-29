<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->library('Theme');
		$this->load->library('session');
		$this->load->model('History_m');
		// $this->load->library('Auth');
		// echo json_encode($this->session->userdata('isLogin'));
		if($this->session->userdata('isLogin') == 1){
			return ;
		}else {
			header('Location: '. base_url() .'login');
		}
	}
	public function index(){
		$data = array(
			"page_title" => "History"
		);
		$this->theme->view('history_v');
	}

	public function json(){
		$json = $this->History_m->datatable();
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
}
