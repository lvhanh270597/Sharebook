<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rent extends CI_Controller
{

	public function __construct(){
		parent::__construct();			
		if (!$this->session->userdata('logged')){
			redirect('login');
		}		
	}
	
	public function index(){	

		$front_end = array();
		$front_end['admin'] = $this->session->userdata('admin');
		$front_end['title'] = 'Rent';
		$front_end['header'] = 'guest';
		if ($this->session->userdata('logged')){
			$front_end['header'] = 'member';
		}		
        
		$data = array();		
		$user = $this->session->userdata('username');
		$user = $this->user->get_user($user);
		$data['user'] = $user;
		$data['front_end'] = $front_end;	
		display('rent', $data);
	}

	public function process(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');					
		$user = $this->session->userdata('username');		
        $config['upload_path']          = './books/';        
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 1024;
		$error = array();
        $bookid = $this->book->get_id();
		if ($this->input->post('btn')){						
			// upload ảnh 
			$config['file_name'] = $bookid;
			$this->load->library('upload', $config);                
        	$this->upload->initialize($config);			

			if ( ! $this->upload->do_upload('inp-file'))
            {
                $error = array('error' => $this->upload->display_errors());                 
            }		
            else{            	
            	$sql = array(
					'bookid' 		=> $bookid,
					'provider' 		=> $user,
					'name' 			=> $this->input->post('name'),
					'kind' 			=> $this->input->post('kind'),
					'summary' 		=> $this->input->post('summary'),
					'typef'			=> $this->upload->data()['file_ext'],
					'public'    	=> false,
					'author'		=> $this->input->post('author'),
					'status'		=> 'Available',
					'value'			=> (int)$this->input->post('value'),
					'willbefree'	=> date('Y-m-d H:i:s'),					
				);							
				$this->book->add_item($sql);
				// resize image 700 x 450 to 
				shell_exec('convert books/'.$bookid.$sql['typef'].' -resize 700x450! books/'.$bookid.'_home'.$sql['typef']);
				shell_exec('convert books/'.$bookid.$sql['typef'].' -resize 700x500! books/'.$bookid.'_detail'.$sql['typef']);
				
				$sql = array(
					'req_id' 	=> $this->req_rent->get_id(),
					'req_er'	=> $user,
					'bookid'	=> $bookid,
					'start'		=> date('Y-m-d H:i:s'),
				);				
				$this->req_rent->add_item($sql);

				redirect('home');	
            }            
		}		
	}
}

?>
