<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Signup extends CI_Controller
	{		
		public function __construct(){
			parent::__construct();					       
            if ($this->session->userdata('logged')){
                redirect('home');
            }       
		}

		function index()
		{			
            $front_end = array();
            $front_end['title'] = 'Register';
            $front_end['header'] = 'guest';
            if ($this->session->userdata('logged')){
                $front_end['header'] = 'member';
            }
						
            $error = array();

        	if ($this->input->post('btn')){             
                $config['upload_path']          = './users/';        
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 1024;      

                $error = array();         

                // check required
        		$username = $this->input->post('username');   
                $password = $this->input->post('password');
                $confword = $this->input->post('conf');
                $first = $this->input->post('first');
                $last = $this->input->post('last');
                $phone = $this->input->post('phone');                
                $ok = (!validString($username)) || (!validString($password)) || 
                (!validString($first)) || (!validString($last)) || 
                (!validString($phone));
                
                if ($ok){
                    $data = array();
                    $data['front_end'] = $front_end;            
                    $error['general'] = 'Hình như bạn nhập thiếu mục nào đó';
                    $data['error'] = $error;
                    display('signup_view', $data);
                    return ;
                }

                if (strlen($password) < 6){
                    $data = array();
                    $data['front_end'] = $front_end;            
                    $error['password'] = 'Mật khẩu ít nhất có 6 kí tự';
                    $data['error'] = $error;
                    display('signup_view', $data);
                    return ;   
                }

        		if (!$this->user->exist($username)){     

                    if ($confword != $password){
                        $error['confirm'] = "Does not match";
                        $data['front_end'] = $front_end;                        
                        $data['error'] = $error;
                        display('signup_view', $data);
                        return ;
                    }

                    $config['file_name'] = $username;
                    $this->load->library('upload', $config);                
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload('inp-file'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        foreach ($error as $key => $value) {
                            echo $value . "<br>";
                        }
                    }           
                    else{

                        $password = $this->input->post('password');

                        $sql = array(
                            'username'          =>      $username,
                            'phone'             =>      $phone,
                            'password'          =>      $password,
                            'firstname'         =>      $first,
                            'lastname'          =>      $last,
                            'email'             =>      $this->input->post('email'),
                            'typef'             =>      $this->upload->data()['file_ext'],
                            'address'           =>      $this->input->post('address'),
                            'money'             =>      0,
                        );
                        $this->user->add_item($sql);
                        shell_exec('convert users/'.$username.$sql['typef'].' -resize 700x450! users/'.$username.'_home'.$sql['typef']);
                        shell_exec('convert users/'.$username.$sql['typef'].' -resize 700x500! users/'.$username.'_detail'.$sql['typef']);
                        redirect('login');
                    }                                                           			
                }
                else{
                    $error['username'] = 'username doest not valid';
                }                
        	}
            $data = array();
            $data['front_end'] = $front_end;                        
            $data['error'] = $error;
            display('signup_view', $data);
		}		
	}

?>
