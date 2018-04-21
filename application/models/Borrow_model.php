<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Borrow_model extends CI_Model
	{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function add_item($data){
			$this->db->insert('borrow', $data);		
		}

		public function get_id(){
	    	$data = $this->db->get_where('borrow');
	    	if ($data->num_rows() == 0) return 1;
	    	$data = $data->result_array();
	    	$max = 1;
	    	foreach ($data as $key => $value) {
	    		if ($max < $value['borrowid']){
	    			$max = $value['borrowid'];
	    		}
	    	}
	    	return $max + 1;
	    }

	    public function get_item_from_book($bookid){
	    	$query = $this->db->get_where('borrow',
				array(					
					'bookid' => $bookid,
				)
			);
			if ($query->num_rows() == 0) return null;
			return $query->result_array()[0];
	    }

		public function get_item_with_user($username, $returned = false){
			$query = $this->db->get_where('borrow',
				array(
					'borrower' => $username,
					'returned' => $returned,
				)
			);
			return $query->result_array();
		}

		public function get_item($borrowid){
			$query = $this->db->get_where('borrow',
				array(
					'borrowid' => $borrowid					
				)
			);
			return $query->result_array()[0];	
		}

		public function count_user($user){
			$query = $this->db->get_where('borrow',
				array(
					'borrower' => $user					
				)
			);
			return $query->num_rows();	
		}

		public function set_index_value_with_id($borrowid, $index, $value){
			$query = $this->get_item($borrowid);
	    	$query[$index] = $value;
	    	$this->db->where('borrowid', $borrowid)->update('borrowid', $query);
		}

		public function del_item($borrowid){
			$this->db->delete('borrow', array("borrowid" => $borrowid));
		}

		public function del_item_from_book($bookid){
			$this->db->delete('borrow', array("bookid" => $bookid));	
		}

		public function del_item_from_user($user){
			$this->db->delete('borrow', array("borrower" => $user));	
		}
	}

?>