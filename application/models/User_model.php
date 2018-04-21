<?php
	class User_model extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function add_item($data){			
			$this->db->insert('user', $data);			
		}
		
	    public function valid_user($username, $password)
	    {		    		    
	        $query = $this->db->get_where('user', 
	        	array(
	        		'username' => $username, 
	        		'password' => $password
	        	)
	        );
	        return ($query->num_rows() == 1);
	    }	   

		public function exist($username){
			$query = $this->db->get_where('user', 
				array(
					'username' => $username
				)
			);
	        return ($query->num_rows() == 1);
		}

		public function get_user_from_phone($phone){
			$query = $this->db->get_where('user', 
				array(
					'phone' => $phone
				)
			);
			if ($query->num_rows() == 0) return null;
	        return $query->result_array()[0];
		}

		public function get_all_users(){
			$data = $this->db->get('user');
	    	return $data->result_array();
		}

		public function get_user($username){
			$query = $this->db->get_where('user', 
				array(
					'username' => $username
				)
			);
	        return $query->result_array()[0];
		}

		public function set_index_value_with_userid($username, $index, $value){
			$query = $this->get_user($username);
	    	$query[$index] = $value;
	    	$this->db->where('username', $username)->update('user', $query);
		}

		public function del_item($username){
	    	$this->db->delete('user', array("username" => $username));
	    }
	}
?>
