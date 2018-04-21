<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Book_model extends CI_Model
	{
		
		public function __construct()
	    {
	        parent::__construct();
	        $this->load->database();
	    }
	    
	    public function search_book($query_name){
	    	$data = $this->db->get_where('book');
	    	$data = $data->result_array();
	    	return sort_condition($data, 'name', $query_name);
	    }	    

	    public function get_id(){
	    	$data = $this->db->get_where('book');
	    	if ($data->num_rows() == 0) return 1;
	    	$data = $data->result_array();
	    	$max = 1;
	    	foreach ($data as $key => $value) {
	    		if ($max < $value['bookid']){
	    			$max = $value['bookid'];
	    		}
	    	}
	    	return $max + 1;
	    }

	    public function get_all_books($public = true)
	    {	    		    	
	        $data = $this->db->get_where('book', array('public' => $public));	        
	        return $data->result_array();
	    }

	    public function get_all_books_from_kind($kind, $public = true)
	    {	    		    	
	        $data = $this->db->get_where('book', 
	        	array(
	        		'public' 	=> $public,
	        		'kind'		=> $kind,
	        	)
	        );	        
	        return $data->result_array();
	    }

	    public function get_all_books_with_a_kind($kind, $public = true){
	    	$data = $this->db->get_where('book', 	    		
	    		array(
	    			'public'	=> $public,
	    			'kind' 		=> $kind
	    		)
	    	);
	        return $data->result_array();
	    }

	    public function get_all_books_with_name($name, $public = true){
	    	$data = $this->db->get_where('book', 	    		
	    		array(
	    			'public'	=> $public,
	    			'kind' 		=> $kind
	    		)
	    	);
	        $data = $data->result_array();
	        return sort_condition($data, 'name', $name);
	    }	    

	    public function add_item($data){
	    	$this->db->insert('book', $data);
	    }
	    
	    public function get_item($bookid){	    	
	    	$query = $this->db->get_where('book', array('bookid' => $bookid));	    	
	    	return $query->result_array()[0];
	    }

	    public function exist($bookid, $public = true){
	    	$query = $this->db->get_where('book', 
	    		array(
	    			'bookid' => $bookid,
	    			'public' => $public,
	    		)
	    	);
	    	return ($query->num_rows() != 0);
	    }

	    public function set_index_value_with_bookid($bookid, $index, $value){
	    	$query = $this->get_item($bookid);
	    	$query[$index] = $value;
	    	$this->db->where('bookid', $bookid)->update('book', $query);
	    }
	    
	    public function del_item($bookid){
	    	$this->db->delete('book', array("bookid" => $bookid));
	    }

	    public function del_item_from_user($user){
	    	$this->db->delete('book', array("provider" => $user));	
	    }	    

	}
?>
