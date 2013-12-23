<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_Set('display_errors','1');
class Product extends CI_Controller
 {

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
	public function index($id)
	{
		//echo  'id is '.$id;
		$param=array('p_id' => $id);
		$this->load->model('product_model','',FALSE,$param);
		
		
		$data=$this->product_model->fetch_data();
		
		var_dump($data);
		
		//$this->load->view('welcome_message');
	}

	public function insert()
	{

		# code...
		$param['category_id'] = '2';
		$param['name'] = 'test';

		
		$this->load->model('product_model','',FALSE,$param);
		$data=$this->product_model->insert();
		var_dump($data);


	}

	public function update()
	{

		# code...
		$param['p_id'] = '9';
		$param['description'] = 'test desc';

		
		$this->load->model('product_model','',FALSE,$param);
		$data=$this->product_model->update();
		var_dump($data);


	}

	public function info($p_id)
	{
		$param['p_id'] = $p_id;
			
		$this->load->model('product_model','',FALSE,$param);
		$data=$this->product_model->fetch_data();
		//var_dump($data);


		$this->load->model('product_utility_model');

		$site_product = $this->product_utility_model->get_all_site_prouct_by_id($p_id);

		$response = $this->crawled_from_url_arr($site_product);


		echo json_encode($response);
	}




	public function  crawled_from_url_arr($param = array())
	{
		//this fnction recieves the input as site name and url and returns the field from config
		
		$response = array();

		foreach ($param as $key => $value)
		{
			$site = $value['site'];
			$url = $value['url'];

			$response[$site] = $this-> crawled_from_url($site, $url);
		}


		return ($response);

	}

	public function  crawled_from_url($site, $url)
	{
	

		$this->load->model('utility');


		$return = array();
		$return['site'] = $site;
		$return['url'] = $url;
		//echo $arr['url'];
		$crawler_obj = $this->utility->get_dom_object($url);

		$tags_arr = $this->config->item($site);
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

				$text =  $this->utility->get_outer_text_attribute_value($val['attr'],$outer_tag);

				if( is_array($val['filter']))
				{
					foreach($val['filter'] as $filter)
					{
						
						$text =  $this->utility->$filter($text);

					}
					
				}	
				
				$return[$key] = $text ;	
				
			}
			else if($val['type'] == 'inner')
			{
				
				$price = $this->utility->get_tag_value($crawler_obj,$val['tag_name']);
				
				if( is_array($val['filter']))
				{
					foreach($val['filter'] as $filter)
					{
						
						$price =  $this->utility->$filter($price);

					}
					
				}	
				
				$return[$key] = $price ;	
			}


		}

		return $return;


	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */