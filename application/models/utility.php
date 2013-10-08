<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility extends CI_Models
{
	/**
	*	This function gets the url and the array of parameters to be searched from the 
	*	returns the url page and returns the value of the corresponding params
	*
	**/

	function __construct()
	{
		parent::__construct();
		$this->load->model('my_db');
	}

	
	function get_all_tags($url , $param = array())
	{
		$this->load->library('crawler');
		$this->crawler->set_url($url);

		if(!is_array($param))
		{
			return false;
		}
		else
		{
			echo 'in else';

		}
		

		$return_array = array();
		var_dump($param);
		foreach ($param as $key => $value)
		{
			echo '<br>in foreach'.$value;
			# code...
			var_dump($param);
			$return_array[$value] = $this->crawler->get_tag( $value );
		}

		return $return_array;


	}


}




