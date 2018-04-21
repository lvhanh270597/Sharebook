<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User extends CI_Controller
	{
		public function __construct(){
			parent::__construct();			
			if (!$this->session->userdata('logged')){
				redirect('login');
			}			
		}

		public function index(){
			$front_end = array();
			$front_end['title'] = 'Users';
			$front_end['header'] = 'guest';
			$front_end['admin'] = $this->session->userdata('admin');
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}

			$user = null;
			if ($this->session->userdata('logged')){
				$user = $this->session->userdata('username');
				$user = $this->user->get_user($user);	
			}			
			
			$users = $this->user->get_all_users();			
						
			$data = array();
			$data['front_end'] = $front_end;
			$data['user'] = $user;
			$data['users'] = $users;			

			display('users', $data);
		}
		
	}

?>