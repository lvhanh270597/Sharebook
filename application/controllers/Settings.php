<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Settings extends CI_Controller
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
			$front_end['title'] = 'Settings';
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}
			$username = $this->session->userdata('username');
			$user = $this->user->get_user($username);

			$data = array();
			$data['front_end'] = $front_end;
			$data['user'] = $user;
			display('settings_view', $data);
		}	

		public function change_password(){
			$front_end = array();
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['title'] = 'Settings';
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}
			$username = $this->session->userdata('username');
			$user = $this->user->get_user($username);

			if ($this->input->post('btn')){
				$old = $this->input->post('oldpass');				
				$new = $this->input->post('newpass');
				$again = $this->input->post('conf');
				if (!validString($old) || !validString($new) || !validString($again)){
					$error = 'Hình như bạn chưa điền đầy đủ thông tin';
					$data = array();
					$data['content'] = $error;
					display('fail', $data);
					return ;
				}
				if ($new != $again){
					$error = "Mật khẩu không khớp";
					$data = array();
					$data['content'] = $error;
					$data['front_end'] = $front_end;
					$data['user'] = $user;
					display('fail', $data);	
					return ;
				}
				else{
					$username = $this->session->userdata('username');
					if (!$this->user->valid_user($username, $old)){
						$error = "Mật khẩu cũ chưa đúng";
						$data = array();
						$data['content'] = $error;
						$data['front_end'] = $front_end;
						$data['user'] = $user;
						display('fail', $data);
						return ;	
					}
					else{
						$this->user->set_index_value_with_userid($username, 'password', $new);
						$success = "Đổi mật khẩu thành công!";						
						$data = array();
						$data['content'] = $success;
						$data['front_end'] = $front_end;
						$data['user'] = $user;
						display('success', $data);		
					}
				}
			}
		}

		public function change_name(){
			$front_end = array();
			$front_end['admin'] = $this->session->userdata('admin');
			$front_end['title'] = 'Settings';
			$front_end['header'] = 'guest';
			if ($this->session->userdata('logged')){
				$front_end['header'] = 'member';
			}
			$username = $this->session->userdata('username');
			$user = $this->user->get_user($username);

			if ($this->input->post('btn2')){
				$first = $this->input->post('first');				
				$last = $this->input->post('last');
				$pass = $this->input->post('password');
								
				$username = $this->session->userdata('username');
				if (!$this->user->valid_user($username, $pass)){
					$error = "Mật khẩu cũ chưa đúng";
					$data = array();
					$data['content'] = $error;
					$data['front_end'] = $front_end;
					$data['user'] = $user;
					display('fail', $data);
					return ;	
				}
				else{
					$this->user->set_index_value_with_userid($username, 'firstname', $first);
					$this->user->set_index_value_with_userid($username, 'lastname', $last);
					$success = "Đổi tên thành công!";
					$data = array();
					$data['content'] = $success;
					$data['front_end'] = $front_end;
					$data['user'] = $user;
					display('success', $data);		
				}				
			}
		}
	}

?>