<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Rent_model extends CI_Model
	{
		public function __construct(){
			parent::__construct();
			$this->load->database();			
		}		

		public function add_item($data){
			$this->db->insert('rent', $data);		
		}

		public function get_id(){
	    	$data = $this->db->get_where('rent');
	    	if ($data->num_rows() == 0) return 1;
	    	$data = $data->result_array();
	    	$max = 1;
	    	foreach ($data as $key => $value) {
	    		if ($max < $value['rentid']){
	    			$max = $value['rentid'];
	    		}
	    	}
	    	return $max + 1;
	    }

		public function get_item_with_user($username){
			$query = $this->db->get_where('rent',
				array(
					'renter' => $username,					
				)
			);
			return $query->result_array();
		}

		public function get_item($borrowid){
			$query = $this->db->get_where('rent',
				array(
					'rentid' => $borrowid					
				)
			);
			return $query->result_array()[0];	
		}

		public function set_index_value_with_id($rentid, $index, $value){
			$query = $this->get_item($rentid);
	    	$query[$index] = $value;
	    	$this->db->where('rentid', $rentid)->update('rentid', $query);
		}

		public function del_item($rentid){
			$this->db->delete('rent', array("rentid" => $borrowid));
		}
		public function del_item_from_book($bookid){
			$this->db->delete('rent', array("bookid" => $bookid));	
		}
		public function del_item_from_user($user){
			$this->db->delete('rent', array("renter" => $user));	
		}
	}

?>