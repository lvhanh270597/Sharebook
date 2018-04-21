<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Login extends CI_Controller {
  
    function __construct(){
        parent::__construct();    
        if ($this->session->userdata('logged')) 
            redirect('home');
    }    
    public function index()
    {               
        $error = '';
        if ($this->input->post('btn')){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->user->valid_user($username, $password)){
                $newdata = array(
                    'username' => $username,                    
                    'logged' => true,
                    'admin' => $this->admin->is_a_admin($username, $password),
                );
                $this->session->sess_expiration = '300';
                $this->session->set_userdata($newdata);
                redirect('home');
            }
            else{
                $error = array();
                if (!$this->user->exist($username)){
                    $error['username'] = "Username does not exist";
                }
                else{
                    $error['password'] = "Password was wrong";
                }
            }
        }

        $front_end = array();
        $front_end['title'] = 'Login';
        $front_end['header'] = 'guest';
        if ($this->session->userdata('logged')){
            $front_end['header'] = 'member';
        }


        $data = array();
        $data['front_end'] = $front_end;
        $data['error'] = $error;
        $this->load->view('login_view', $data);   
    }    
}

?>