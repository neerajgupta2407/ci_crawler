<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_util extends CI_Model
{
	function __construct()
	{

	}

	function array_null_filter($param = array())
	{
		if(!is_array($param))
		{
			return false;
		}

		$new_array = array();
		foreach($param as $key => $val)
		{
			if(strlen($val)>0)
			{
				$new_array[$key] = $val;
			}


		}

		return $new_array;

	}

}