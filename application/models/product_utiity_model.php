<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_utility_model extends CI_Model
{
	public function get_all_site_prouct_by_id($p_id)
	{

		$where_sql = " product_id = $p_id";

		$data = $this->my_db->mysql_fetch_all('site_product',$where_sql);
		return $data;

	}
}



?>