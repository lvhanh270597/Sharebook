<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Profile extends CI_Controller
	{
		public function __construct(){
			parent::__construct();		
			if (!$this->session->userdata('logged')){
				redirect('login');
			}	
		}
		public function index(){
			$front_end = array();
			$front_end['title'] = 'Home';
			$front_end['header'] = 'guest';
			$front_end['admin'] = $this->session->userdata('admin');
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}

			$username = $this->session->userdata('username');
			$user = $this->user->get_user($username);

			$borrow = $this->borrow->get_item_with_user($username);
			$item_b = array();
			foreach ($borrow as $key => $value) {
				array_push($item_b, $this->book->get_item($value['bookid']));
			}
			$rent = $this->rent->get_item_with_user($username);
			$item_r = array();
			foreach ($rent as $key => $value) {
				array_push($item_r, $this->book->get_item($value['bookid']));
			}
			$req_rent = $this->req_rent->get_item_with_user($username);
			$item_rr = array();
			foreach ($req_rent as $key => $value) {
				array_push($item_rr, $this->book->get_item($value['bookid']));
			}
			$req_borrow = $this->req_borrow->get_item_with_user($username);
			$item_rb = array();
			foreach ($req_borrow as $key => $value) {
				array_push($item_rb, $this->book->get_item($value['bookid']));
			}

			$data = array();
			$data['front_end'] = $front_end;
			$data['user'] = $user;			
			$data['borrow'] = $item_b;
			$data['rent'] = $item_r;
			$data['req_rent'] = $item_rr;
			$data['req_borrow'] = $item_rb;
			display('profile_view', $data);
		}
		public function view($username){
			if (!$this->user->exist($username)){
				redirect('notfound');
			}

			if ($this->session->userdata('username') == $username){
				redirect('profile');
			}

			$front_end = array();
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['title'] = 'Home';
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}			

			$user = $this->user->get_user($username);

			$data = array();
			$data['front_end'] = $front_end;
			$data['user_temp'] = $user;
			$user = $this->session->userdata('username');
			$data['user'] = $this->user->get_user($user);


			display('profile_view_another', $data);
		}
		
	}

?>