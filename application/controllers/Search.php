<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Search extends CI_Controller
	{		
		public function __construct(){
			parent::__construct();			
		}
	 
		public function index()
		{		
			$front_end = array();
			$front_end['title'] = 'Search';		
			$front_end['kind'] = 'All';
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
					
			$data = array();			
			$data['user'] = $user;
			$data['books'] = $this->book->get_all_books();
			if ($this->input->get('btn')){
				$query = $this->input->get('content');
				if (strlen($query) == 0) {
					redirect('home');
				}
				$data['books'] = $this->book->search_book($query);
				$front_end['kind'] = $query;			
			}						
			$data['front_end'] = $front_end;
			display('search', $data);
		}

		public function view($kind){
			$map = array(
				1 => 'Phát triển bản thân', 
				2 => 'Học tập'
			);
			$kind = $map[$kind];
			$front_end = array();
			$front_end['title'] = 'Home';
			$front_end['header'] = 'guest';
			$front_end['kind'] = $kind;
			$front_end['admin'] = $this->session->userdata('admin');
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
			
			$data['books'] = $this->book->get_all_books_from_kind($kind);

			display('home', $data);
		}
	}

?>
