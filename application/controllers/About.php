<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class About extends CI_Controller
	{		
		public function __construct(){
			parent::__construct();			
		}
	 
		public function index()
		{					
			$front_end = array();
			$front_end['title'] = 'Contact';
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}

			$user = null;
			if ($this->session->userdata('logged')){
				$user = $this->session->userdata('username');
				$user = $this->user->get_user($user);	
			}			
					
			$data = array();
			$data['front_end'] = $front_end;
			$data['user'] = $user;
			
			$data['books'] = $this->book->get_all_books();

			display('introduce', $data);
		}
	}

?>
