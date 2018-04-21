<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('display'))
{		
    function display($viewFile, $data)
    {
    	$ci =& get_instance();    	
    	$type_user = $data['front_end']['header'];
    	if ($type_user == 'member'){
    		$ci->load->view('header_member', $data);
    	}
    	else if ($type_user == 'admin'){
    		$ci->load->view('header_admin', $data);	
    	}
    	else{
    		$ci->load->view('header_guest', $data);	
    	}   

    	$ci->load->view($viewFile, $data);
    	
    	$ci->load->view('footer_view', $data);  
    }   
}