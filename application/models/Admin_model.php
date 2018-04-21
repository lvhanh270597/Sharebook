<?php
	class Admin_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}		

	    public function add_item($data){			
			$this->db->insert('admin', $data);			
		}

		public function is_a_admin($username, $password){
			$query = $this->db->get_where('admin', 
				array(
					'username' => $username,
					'password' => $password,
				)
			);
			return $query->num_rows() == 1;
		}

		public function exist($username){
			$query = $this->db->get_where('admin', 
				array(
					'username' => $username
				)
			);
	        return ($query->num_rows() == 1);	        
		}		

		public function get_a_admin($username){
			$query = $this->db->get_where('admin', 
				array(
					'username' => $username
				)
			);
	        return $query->result_array()[0];
		}
	}
?>
