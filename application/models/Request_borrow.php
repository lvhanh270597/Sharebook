<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Request_borrow extends CI_Model
	{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function add_item($data){			
			$this->db->insert('req_borrow', $data);			
		}

		public function get_first_item(){
			$query = $this->db->get_where('req_borrow');
			if ($query->num_rows() == 0) return null;
			return $query->result_array()[0];
		}

		public function get_id(){
	    	$data = $this->db->get_where('req_borrow');
	    	if ($data->num_rows() == 0) return 1;
	    	$data = $data->result_array();
	    	$max = 1;
	    	foreach ($data as $key => $value) {
	    		if ($max < $value['req_id']){
	    			$max = $value['req_id'];
	    		}
	    	}
	    	return $max + 1;
	    }

		public function get_all(){
			$query = $this->db->get_where('req_borrow');
			return $query->result_array();
		}

		public function get_item_with_user($username){
			$query = $this->db->get_where('req_borrow', 
				array(
					'req_er' => $username,
				)
			);
			return $query->result_array();
		}

		public function get_item($req_id){
			$query = $this->db->get_where('req_borrow', 
				array(
					'req_id' => $req_id,
				)
			);
			return $query->result_array()[0];
		}

		public function count_user($user){
			$query = $this->db->get_where('req_borrow',
				array(
					'req_er' => $user					
				)
			);
			return $query->num_rows();	
		}

		public function exist($req_id){
	    	$query = $this->db->get_where('req_borrow', 
	    		array(
	    			'req_id' => $req_id,
	    		)
	    	);
	    	return ($query->num_rows() != 0);
	    }

		public function check_exist_user_book($user, $bookid){
			$query = $this->db->get_where('req_borrow', 
	    		array(
	    			'req_er' => $user,
	    			'bookid' => $bookid,
	    		)
	    	);
	    	return ($query->num_rows() != 0);	
		}

		public function check_exist_book($bookid){
			$query = $this->db->get_where('req_borrow', 
	    		array(	    		
	    			'bookid' => $bookid,
	    		)
	    	);
	    	return ($query->num_rows() != 0);
		}

		public function del_item($req_id){
			$this->db->delete('req_borrow', array("req_id" => $req_id));
		}
		public function del_item_from_book($bookid){
			$this->db->delete('req_borrow', array("bookid" => $bookid));	
		}
		public function del_item_from_user($user){
			$this->db->delete('req_borrow', array("req_er" => $user));
		}
	}

?>