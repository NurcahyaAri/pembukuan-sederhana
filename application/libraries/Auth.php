<?php

    class Auth{
        public function __construct(){
            
            $this->ci = &get_instance();
            // $this->ci->load->library('session');
            if($this->ci->session->userdata('isLogin') != 1){
                return ;
            }else {
                header('Location: '. base_url() .'login');
            }
        }

    }
    

?>