<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility extends CI_Model
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

	
	function get_dom_object($url)
	{
		$this->load->library('crawler');
		$this->crawler->set_url($url);


			//returning the object of class 'crawler'
		return $this->crawler;

	}




	function get_all_tags($url , $param = array())
	{
		/*
		$this->load->library('crawler');
		$this->crawler->set_url($url);
		*/
		//$obj os object of class crawler
		$obj = $this->get_dom_object($url);
		if(!is_array($param))
		{
			return false;
		}
		else
		{
			//echo 'in else';

		}
		

		$return_array = array();
		//var_dump($param);
		foreach ($param as $key => $value)
		{
			//echo '<br>in foreach'.$value;
			# code...
		//	var_dump($param);
			//$return_array[$value] = $this->crawler->get_tag( $value );
			$return_array[$value] = $obj->get_tag( $value );
		}

		var_dump($obj->get_all_attribute());

		return $return_array;


	}

	function get_all_outer_tags($url , $param = array())
	{
		/*
		$this->load->library('crawler');
		$this->crawler->set_url($url);
		*/
		//$obj os object of class crawler
		$obj = $this->get_dom_object($url);
		if(!is_array($param))
		{
			return false;
		}
		else
		{
			//echo 'in else';

		}
		

		$return_array = array();
		//var_dump($param);
		foreach ($param as $key => $value)
		{
			//echo '<br>in foreach'.$value;
			# code...
		//	var_dump($param);
			//$return_array[$value] = $this->crawler->get_tag( $value );
			$return_array[$value] = $obj->get_outer_tag( $value );
		}
		
		var_dump($obj->get_all_attribute());

		return $return_array;


	}


	/*
	*	Its get array of attribite name and  the whole string of tag('string 'which was returned by $dom->get_outertext())
	*	output associative array of attribite name => val
	*
	*		 input(array('itemprop','content'),'<meta itemprop="price" content="345">'');
	* 		output array(2) { ["itemprop"]=> string(5) "price" ["content"]=> string(3) "345" }
	*/
	function get_outer_text_attribute_value($attr = array(),$tag)
	{
		$response = array();

		foreach ($attr  as $value) {
			# code...

				$len=  strpos($tag,$value);

				$arr = explode($value,$tag;
				//var_dump($arr);


				$ss = substr($arr[1],2);

				$substr = substr($arr[1],2,strpos($ss, '"'));

				$response[$value] = $substr;

			}

		return $response;


		
	}

}




