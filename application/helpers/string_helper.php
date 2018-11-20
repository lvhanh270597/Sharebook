<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('vn_to_str'))
{
	function vn_to_str ($str){
 
		$unicode = array(
		 
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
		 
		'd'=>'đ',
		 
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		 
		'i'=>'í|ì|ỉ|ĩ|ị',
		 
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		 
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		 
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		 
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 
		'D'=>'Đ',
		 
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		 
		);
		 
		foreach($unicode as $nonUnicode=>$uni){
		 
			$str = preg_replace("/($uni)/i", $nonUnicode, $str);
		 
		}
		$str = str_replace(' ','',$str);
		 
		return $str;
		 
		}
}
if ( ! function_exists('getLongestCommonSubstring'))
{		
    function getLongestCommonSubstring($first, $second)
	{	    
		$first = vn_to_str($first);
		$second = vn_to_str($second);				
	    $table = array();
	    $largestFound = 0;
	    $firstLength = strlen($first);
	    $secondLength = strlen($second);

	    for ($i = 0; $i < $firstLength; $i++) {
	    	if (!isset($table[$i])) {
                $table[$i] = array();
            }
	        for ($j = 0; $j < $secondLength; $j++) {	        	
	            if ($first[$i] === $second[$j]) {	                
	            	if ($i > 0 && $j > 0 && isset($table[$i-1][$j-1])) {
	                    $table[$i][$j] = $table[$i-1][$j-1] + 1;
	                }
	                else {
	                    $table[$i][$j] = 1;
	                }
	                if ($table[$i][$j] > $largestFound) {
	                    $largestFound = $table[$i][$j];	                    
	                }
	            }
	            else{
	            	$table[$i][$j] = 0;
	            	if ($i > 0 && isset($table[$i - 1][$j])){
	            		$table[$i][$j] = $table[$i - 1][$j];
	            	}
	            	if ($j > 0 && isset($table[$i][$j - 1])){
	            		if ($table[$i][$j] < $table[$i][$j - 1]){
	            			$table[$i][$j] = $table[$i][$j - 1];
	            		}	            		
	            	}
	            }
	        }
	    }
	    return $largestFound;	    
	}
}

if ( ! function_exists('sort_condition'))
{		
    function sort_condition($data, $index, $str)
	{	    	
		$L = array();
		foreach ($data as $key => $value) {									
			$L[$key] = getLongestCommonSubstring($value[$index], $str);
			echo $L[$key];
		}
		
		$len = count($L);
		for ($i=0; $i < $len - 1; $i++) { 
			for ($j=$i+1; $j < $len; $j++) { 
				if ($L[$i] < $L[$j]){
					$temp = $L[$i];
					$L[$i] = $L[$j];
					$L[$j] = $temp;

					$temp = $data[$i];
					$data[$i] = $data[$j];
					$data[$j] = $temp;					
				}
			}
		}

		return $data;
	}
}

if ( ! function_exists('randString'))
{		
    function randString($len = 10)
    {
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen( $chars );
		$str = "";
		for( $i = 0; $i < $len; $i++ ) {
		  $str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
    }   
}


if ( ! function_exists('validString'))
{		
    function validString($str)
    {
    	if (!isset($str)) return false;
    	return strlen($str) >= 1;    	
    }   
}

if (!function_exists('get_substr')){
	function get_substr($str){
		$num = 0;
		$res = '';
		foreach (explode(' ', $str) as $s){
			$res .= $s.' ';
			$num += strlen($s);
			if ($num > 50) break;
		}
		return $res;
	}
}

