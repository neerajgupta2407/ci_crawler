<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('utility');
		
		$url ='http://www.snapdeal.com/product/red-riding-brown-sky-blue/457016';
		$array = array();
		$array[] = 'h1[itemprop=name]';
		$array[] = 'span[id=selling-price-id]';
		$array[] = 'h1[itemprop=name]';


		//$output=$this->crawler->get_title();
				//var_dump($output);
		//$output=$this->crawler->get_keywords();
		
		//var_dump($output);
		//$output=$this->crawler->get_text();
		
		$arr = $this->utility->get_all_tags($url , $array);
		
		var_dump($arr);
		//$arr2=$this->crawler->get_tag('span[id=selling-price-id]');
		
		//var_dump($arr2);//var_dump($output);
		
		
		//$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */