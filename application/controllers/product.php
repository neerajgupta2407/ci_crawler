<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */