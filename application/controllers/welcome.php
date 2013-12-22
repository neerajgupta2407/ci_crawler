<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_Set('display_errors','1');

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
		
		echo PHP_SAPI;
		//var_dump( $this->input->is_cli_request());

		$url ='http://www.snapdeal.com/product/red-riding-brown-sky-blue/457016';
		$url='http://www.flipkart.com/sandisk-memory-card-microsdhc-8gb/p/itmczcthv3hpnhhe';
		$array = array();
		$array[] = 'h1[itemprop=name]';
		$array[] = 'span[id=fk-mprod-list-id]';
		$array[] = 'span[class=pprice]';
		$array[] = 'meta[itemprop=price]';
		//$array[] = 'h1[itemprop=name]';


		//$output=$this->crawler->get_title();
				//var_dump($output);
		//$output=$this->crawler->get_keywords();
		
		//var_dump($output);
		//$output=$this->crawler->get_text();
		
		$arr = $this->utility->get_all_tags($url , $array);
		
		var_dump($arr);
		echo '<br>';

		//$arr1 = $this->utility->get_all_outer_tags($url , $array);
		var_dump($arr1);
		//$arr2=$this->crawler->get_tag('span[id=selling-price-id]');
		
		//var_dump($arr2);//var_dump($output);
		
		
		//$this->load->view('welcome_message');
	}


	public function test1()
	{
		//$this->output->enable_profiler(TRUE);

		$arr = array();
		$arr['site'] = 'flip';
		$arr['url'] = 'http://www.flipkart.com/sandisk-cruzer-blade-8-gb-pen-drive/p/itmcwpajdrfymwag';
		

		$arr['site'] = 'trads';
		$arr['url'] = 'http://www.tradus.com/women-s-black-silver-belt/p/CACMKD839GPFVJFY?sellerid=404674071';


		$arr['site'] = 'shopcl';
		$arr['url'] = 'http://www.shopclues.com/samsung-galaxy-grand-gt-i9082-white-en-2-3-4-5-6.html?ref=tm_vsims_5';
		$arr['url'] = 'http://www.shopclues.com/samsung-galaxy-grand-gt-i9082-white.html';

		$arr['site'] ='idtmshp';
		$arr['url'] = 'http://shopping.indiatimes.com/mobiles/lava/lava-iris-506q-grey-/25009/p_B2160987?SEARCH_STRING=lava';
		$arr['url'] = 'http://shopping.indiatimes.com/mobiles/samsung/samsung-galaxy-grand-duos-i9082-white-with-2-flip-covers/25014/p_B2096179';


		$this->load->model('utility');


		$return = array();
		//echo $arr['url'];
		$crawler_obj = $this->utility->get_dom_object($arr['url']);

		$tags_arr = $this->config->item($arr['site']);
		//var_dump($tags_arr);

		foreach( $tags_arr as $key => $val)
		{
			//echo "<br>in foreach ";
			//ar_dump($val);
			if(!is_array($val))
			{
				
				$return[$key] = $this->utility->get_tag_value($crawler_obj,$val);

			}
			else if($val['type'] == 'attr')
			{
				$outer_tag = $this->utility->get_outer_tag_value($crawler_obj,$val['tag_name']);

				$return[$key] =  $this->utility->get_outer_text_attribute_value($val['attr'],$outer_tag);

			}

		}


		echo json_encode($return);

		//echo json_encode($this->config->item('hs1'));


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */