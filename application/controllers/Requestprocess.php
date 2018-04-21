<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requestprocess extends CI_Controller {
	
	public function __construct() {
		parent::__construct();        
    }

	public function run($req_id)
	{							
		$item = $this->req_borrow->get_item($req_id);
		if ($item == null) return;

		$req_id = $item['req_id'];
		$bookid = $item['bookid'];
		// set book is Held
		$this->book->set_index_value_with_bookid($bookid, 'status', 'Holding...');
		
		shell_exec('sleep 1800s');

		if ($this->req_borrow->exist($req_id)){
			// set book is ok
			$this->book->set_index_value_with_bookid($bookid, 'status', 'Available');	
		}				
				
		$this->req_borrow->del_item($req_id);					
	}
}
?>