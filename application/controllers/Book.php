<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Book extends CI_Controller
	{
		public function __construct(){
			parent::__construct();			
			if (!$this->session->userdata('logged')){
				redirect('login');
			}
		}

		public function view($bookid){
			$front_end = array();			
			$front_end['admin'] = $this->session->userdata('admin');		
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}			
			$user = $this->session->userdata('username');
			$user = $this->user->get_user($user);			
			if ($this->book->exist($bookid, true)){
				$product = $this->book->get_item($bookid);
				$front_end['title'] = $product['name'];
				
				$data = array();
				$data['user'] = $user;
				$data['front_end'] = $front_end;
				$data['product'] = $product;
				display('book_view', $data);				
			}
			else
				$this->load->view("notfound");		
		}		
	}

?>