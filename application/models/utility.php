<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility extends CI_Model
{
	/**
	*	This function gets the url and the array of parameters to be searched from the 
	*	returns the url page and returns the value of the corresponding params
	*
	**/

	public $object_crawler;

	function __construct()
	{
		parent::__construct();
		$this->load->model('my_db');
	}

	
	function set_dom_object($url)
	{
		$this->load->library('crawler');
		
		$this->crawler->set_url($url);

		$this->object_crawler = $this->crawler;

		return $this->crawler;
	}

	/**
	 * [get_dom_object description]
	 * This function returns the object of class SIMPLE_HTML_DOM corresponding to the url provided.
	 * input: @url
	 * output: object
	 * @param  [type] $url [description]
	 * @return [type]      [description]
	 */
	public function get_dom_object($url)
	{
		return $this->set_dom_object($url);

		//return $this->object_crawler;
	}


	public function get_all_tag_arr($obj , $param = array())
	{

		//$obj = $this->get_dom_object($url);
		if(!is_array($param))
		{
			return false;
		}
				

		$return_array = array();
		//var_dump($param);
		foreach ($param as $key => $value)
		{
		
			$return_array[$value] = $obj->get_tag( $value );
		}

		//var_dump($obj->get_all_attribute());
		return $return_array;


	}

	public function get_all_outer_tag_arr($obj , $param = array())
	{
		
		$obj = $this->get_dom_object($url);
		if(!is_array($param))
		{
			return false;
		}
		
		$return_array = array();
		
		foreach ($param as $key => $value)
		{
			$return_array[$value] = $obj->get_outer_tag( $value );
		}
		
		return $return_array;

	}

	public function get_outer_tag_value($obj , $value )
	{
		if(!is_object($obj))
		{
			return false;
		}
	
		return  $obj->get_outer_tag( $value );
	
	}

	public function get_tag_value($obj , $value)
	{
		//echo "<br>tag is ".$value;
		//var_dump($value);
		if(!is_object($obj))
		{
			return false;
		}
	
		return  $obj->get_tag( $value );

	}


	/*
	*	Its get array of attribite name and  the whole string of tag('string 'which was returned by $dom->get_outertext())
	*	output associative array of attribite name => val
	*
	*		 input(array('itemprop','content'),'<meta itemprop="price" content="345">'');
	* 		output array(2) { ["itemprop"]=> string(5) "price" ["content"]=> string(3) "345" }
	*/
	public function get_outer_text_attribute_value_arr($attr = array(),$tag)
	{
		$response = array();

		foreach ($attr  as $value) {
			# code...

				$len=  strpos($tag,$value);

				$arr = explode($value,$tag);
				//var_dump($arr);


				$ss = substr($arr[1],2);

				$substr = substr($arr[1],2,strpos($ss, '"'));

				$response[$value] = $substr;

			}

		return $response;
		
	}

	public function get_outer_text_attribute_value($attr , $tag)
	{
		/*
		echo $attr;
		print_r($tag);
		echo '<br>';
		*/
		$len=  strpos($tag,$attr);

		$arr = explode($attr,$tag);
		//var_dump($arr);
		$arr[1] = str_replace('"','',$arr[1]);
		$arr[1] = str_replace(',','',$arr[1]);
		$arr[1] = str_replace('/','',$arr[1]);
		//var_dump($arr);
		$ss = substr($arr[1],1);

		$substr = substr($arr[1],1,strpos($ss, '>'));

		return $substr;

	
		
	}

	public function filter_price_to_int($text)
	{
		//$text = strip_tags($text);
		$pattern = '/&([#0-9A-Za-z]+);/';
		$text =  preg_replace($pattern, '', $text);
			//preg_replace('/((&#[0-9]+;)+)/', '',$text);
		$text =  preg_replace('([^0-9\.]+)', '',$text);

		if(!strpos($text, '.'))
		{
			return $text;

			
		}
		else
		{
			
			return substr($text,0,strpos($text, '.'));

		}
		

	}

	 public function strip_tag($tag)
	 {
	 	return strip_tags($tag);
	 }

}




