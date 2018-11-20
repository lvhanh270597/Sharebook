<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Borrow extends CI_Controller
	{
		public function __construct(){
			parent::__construct();			
			if (!$this->session->userdata('logged')){
				redirect('login');
			}
		}		
		
		public function choose($bookid, $weeks){	
			$front_end = array();
			$front_end['title'] = 'Borrow';
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}

			$user = $this->session->userdata('username');

			if ($this->req_borrow->count_user($user) >= 1){
				$data = array();
				$data['front_end'] = $front_end;							
				display('too_much_to_borrow', $data);	
				return ;
			}

			if ($this->req_borrow->check_exist_user_book($user, $bookid)){
				$data = array();
				$data['front_end'] = $front_end;							
				display('borrow_view', $data);	
				return ;
			}

			if ($this->req_borrow->check_exist_book($bookid)){
				redirect('book/view/'.$bookid);
			}

			date_default_timezone_set('Asia/Ho_Chi_Minh');				
			// insert into req_borrow
			$user = $this->session->userdata('username');
			$req_id = $this->req_borrow->get_id();
			$data = array(
				'req_id'		=>		$req_id,
				'req_er'		=>		$user,
				'bookid' 		=>		$bookid,
				'start'  		=> 		date('Y-m-d H:i:s'),
				'weeks'			=> 		$weeks,
			);		
			$this->req_borrow->add_item($data);		

			// countdown
			holding_the_item($req_id);
			//

			$data = array();
			$data['front_end'] = $front_end;	
			$data['user'] = $this->user->get_user($user);						
			display('borrow_view', $data);			
		}

		public function play(){									
			if ($this->input->post('btn')){
				$bookid = $this->input->post('btn');	
				$weeks = $this->input->post('num');
				if ($this->book->exist($bookid)){						
					redirect('borrow/choose/'.$bookid.'/'.$weeks);
				}
			}
		}
		
	}

?>