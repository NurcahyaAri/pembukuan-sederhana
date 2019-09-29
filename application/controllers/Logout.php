<?php


class Logout extends CI_Controller{
    public function  __construct(){
        parent::__construct();		
        $this->load->helper('url');
        $this->load->library('session');
        if($this->session->userdata('isLogin') == 1){
            return 1;
        }else {
            header('Location: '. base_url() .'login');
        }
    }
    public function index(){
        $this->session->sess_destroy();
        header('Location: '. base_url() .'login');
    }
}

?>