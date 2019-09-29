<?php

    class Login extends CI_Controller{
        public function __construct(){
            parent::__construct();	
            $this->load->helper('url');	
            $this->load->library('Theme');
            $this->load->library('session');
            $this->load->model('Login_m');
            // echo json_encode($this->session->userData);
            if($this->session->userdata('isLogin') == 1){
                header('Location: '. base_url());
            }else {
                return 1;
            }
        }

        public function index(){
            if($this->input->post()){
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $db = $this->Login_m->findOneByUsername($username);
                if($db){
                    // echo json_encode($db->password);
                    if(password_verify($password, $db->password)){
                        $userData = array(
                            "username" => $db->username,
                            "email" => $db->email,
                            "isLogin" => 1,
                            "lastLogin" => round(microtime(true) * 1000)
                        );
                        $this->session->set_userdata($userData);
                        header('Location: '. base_url());
                    }
                } else {
                    //add flash data 
                    $this->session->set_flashdata('wrong','Username or Password is incorrect'); 
                    header('Location: '. base_url(). 'login');
                }

            } else {
                if(!$this->session->userData){
                    $this->load->view('login');
                } else {
                    header('Location: '. base_url());
                }
            }
        }
    }


?>