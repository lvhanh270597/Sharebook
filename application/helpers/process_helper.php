<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('holding_the_item'))
{
	function holding_the_item($req_id)
	{	
		$oldldpath = getenv('LD_LIBRARY_PATH');
		putenv("LD_LIBRARY_PATH=");
		echo shell_exec(															
			'php '.escapeshellarg(FCPATH.'index.php')." requestprocess run ".$req_id." >/dev/null 2>/dev/null &"
		);
		putenv("LD_LIBRARY_PATH=$oldldpath");						
	}
}

?>