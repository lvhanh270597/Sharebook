<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Logout extends CI_Controller
	{		
		public function __construct(){
			parent::__construct();					       
            if (!$this->session->userdata('logged')){
                redirect('home');
            }       
		}

		function index()
		{			
            $this->session->sess_destroy();
            redirect('home');          
		}		
	}

?>
