<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Admin extends CI_Controller
	{
		public function __construct(){
			parent::__construct();			
			if (!$this->session->userdata('logged')){
				redirect('login');
			}
			if (!$this->session->userdata('admin')){
				redirect('home');
			}
		}

		public function index(){
			$front_end = array();
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['title'] = 'Management';
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}

			$data = array();
			$data['front_end'] = $front_end;
			$user = $this->session->userdata('username');
			$user = $this->user->get_user($user);
			$data['user'] = $user;

			$books = $this->book->get_all_books();
			$users = $this->user->get_all_users();
			$data['books'] = $books;
			$data['users'] = $users;

			display('management_view', $data);
		}

		public function view_user($phone){
			$front_end = array();
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['title'] = 'Profile';
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}
		
			$user = $this->user->get_user_from_phone($phone);
			if (!$user){
				$user = $this->user->get_user($phone);				
			}

			if (!$user){
				echo "Not exist!";
				return ;
			}

			$username = $user['username'];
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
			$data['user_temp'] = $user;
			$user = $this->session->userdata('username');
			$user = $this->user->get_user($user);
			$data['user'] = $user;
			$data['borrow'] = $item_b;
			$data['rent'] = $item_r;
			$data['req_rent'] = $item_rr;
			$data['req_borrow'] = $item_rb;			
			display('view_user', $data);			
		}

		public function view_book($bookid){
			$front_end = array();			
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}			
			
			$ok = false;
			if ($this->book->exist($bookid, true)){
				$product = $this->book->get_item($bookid);
				$front_end['title'] = $product['name'];
				$ok = true;
				$data = array();
				$data['front_end'] = $front_end;
				$data['product'] = $product;
			}
			if ($this->book->exist($bookid, false)){
				$product = $this->book->get_item($bookid);
				$front_end['title'] = $product['name'];
				$ok = true;
				$data = array();
				$data['front_end'] = $front_end;
				$data['product'] = $product;
			}			
			$user = $this->session->userdata('username');
			$user = $this->user->get_user($user);
			$data['user'] = $user;
			
			if ($ok) display('view_book', $data);
			else $this->load->view("notfound");		
		}		

		public function queue(){
			$front_end = array();
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['title'] = 'Queue';
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}

			$rent = $this->req_rent->get_all();
			$borr = $this->req_borrow->get_all();

			$data = array();
			$data['front_end'] = $front_end;	
			$data['rent'] = $rent;
			$data['borrow'] = $borr;

			$user = $this->session->userdata('username');
			$data['user'] = $this->user->get_user($user);

			display('queue_view', $data);
		}

		public function accept($user, $req_id){
			if ($this->req_rent->exist($req_id)){
				// insert into rent table
				$item = $this->req_rent->get_item($req_id);
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$sql = array(
					'rentid' 	=> $this->rent->get_id(),
					'renter' 	=> $user,
					'bookid'	=> $item['bookid'],
					'start'		=> date('Y-m-d H:i:s'),					
				);
				$this->rent->add_item($sql);
				// delete from req_rent
				$this->req_rent->del_item($req_id);
				// update book, set on public
				$this->book->set_index_value_with_bookid($item['bookid'], 'public', true);	
			}
			else{				
				// insert into borrow table
				$item = $this->req_borrow->get_item($req_id);				
				$selectedTime = date('Y-m-d H:i:s');
				$endTime = strtotime("+".($item['weeks'] * 7)." days", strtotime($selectedTime));
				
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				$sql = array(
					'borrowid' 	=> $this->borrow->get_id(),
					'borrower' 	=> $user,
					'bookid'	=> $item['bookid'],
					'start'		=> $selectedTime,
					'end'		=> date('Y-m-d h:i:s', $endTime),
					'returned'	=> false,
				);
				$this->borrow->add_item($sql);
				// delete from req_borrow
				$this->req_borrow->del_item($req_id);
				// lock book, 				
				//	status = dang ban,
				//	willbefree = nend time;	
				
				$this->book->set_index_value_with_bookid($item['bookid'], 'status', 'Busy');
				$this->book->set_index_value_with_bookid($item['bookid'], 'willbefree', date('Y-m-d h:i:s', $endTime));

				// add money to user account for rent
				// whose of this book
				$bookid = $item['bookid'];
				$provider = $this->book->get_item($bookid)['provider'];
				$renter = $this->user->get_user($provider);
				$money = $renter['money'] + $item['weeks'] * 2;
				$this->user->set_index_value_with_userid($provider, 'money', $money);
			}
			redirect('admin/queue');
		}

		public function deny($req_id){			
			if ($this->req_rent->exist($req_id)){					
				$item = $this->req_rent->get_item($req_id);
				// delete request
				$this->req_rent->del_item($req_id);				
				// delete images in books				
				$this_book = $this->book->get_item($item['bookid']);
				shell_exec('rm -vrf books/'.$this_book['bookid'].$this_book['typef']);
				shell_exec('rm -vrf books/'.$this_book['bookid'].'_home'.$this_book['typef']);
				shell_exec('rm -vrf books/'.$this_book['bookid'].'_detail'.$this_book['typef']);		
				// delete book
				$this->book->del_item($item['bookid']);
			}
			else{				
				$item = $this->req_borrow->get_item($req_id);
				// set status of the book is Available
				$this->book->set_index_value_with_bookid($item['bookid'], 'status', 'Available');
				// delete request
				$this->req_borrow->del_item($req_id);	
			}
			redirect('admin/queue');
		}	

		public function delete_user($user){
			$this_user = $this->user->get_user($user);
			shell_exec('rm -vrf users/'.$this_user['username'].$this_user['typef']);	
			shell_exec('rm -vrf users/'.$this_user['username'].'_home'.$this_user['typef']);
			shell_exec('rm -vrf users/'.$this_user['username'].'_detail'.$this_user['typef']);	

			$this->req_rent->del_item_from_user($user);
			$this->req_borrow->del_item_from_user($user);
			$this->rent->del_item_from_user($user);
			$this->borrow->del_item_from_user($user);
			$this->book->del_item_from_user($user);			
			$this->user->del_item($user);
			redirect('admin');
		}

		public function delete_book($bookid){
			$this_book = $this->book->get_item($bookid);
			shell_exec('rm -vrf books/'.$this_book['bookid'].$this_book['typef']);
			shell_exec('rm -vrf books/'.$this_book['bookid'].'_home'.$this_book['typef']);
			shell_exec('rm -vrf books/'.$this_book['bookid'].'_detail'.$this_book['typef']);
			
			$this->borrow->del_item_from_book($bookid);
			$this->rent->del_item_from_book($bookid);			
			$this->req_borrow->del_item_from_book($bookid);
			$this->book->del_item($bookid);
			redirect('admin');
		}

		public function set_zero_money($user){			
			$this->user->set_index_value_with_userid($user, 'money', 0);
			redirect('admin');
		}

		public function return_book($bookid){
			$item = $this->borrow->get_item_from_book($bookid);
			if (!$item){
				redirect('admin/view_book/'.$bookid);
			}			
			$this->borrow->del_item($item['borrowid']);
			$this->book->set_index_value_with_bookid($bookid, 'status', 'Available');
			redirect('admin/view_book/'.$bookid);
		}

		public function play(){
			$item = $this->input->post('btn');
			if ($item){
				if ($this->book->exist($item)){
					redirect('admin/return_book/'.$item);				
				}
			}
		}
	}

?>