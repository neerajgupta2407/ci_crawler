<?php

/**
 * Site_tag_array contains the html tags corresponding to that site.
 *
 * Different tags can be: 
 * price,name,image,color,discount....so on
 *
 * Working:
 * tradus
 * flipkart
 * snapdeal
 * infibeam
 * shopclues
 * hs18
 */

$config = array();

$config['snap'] = array(

		'name' => 'h1[itemprop=name]',
		//'title' => '',
		'price' => 'span[id=selling-price-id]',
		//'discount' => '',
		
			);


$config['hs18'] = array(

		'name' => 'span[itemprop=name]',
		//'title' => '',
		'price' => array( 'tag_name' => 'span[itemprop=price]',"attr" =>"content","type" => "inner","filter" => array("strip_tag","filter_price_to_int")),
		//'discount' => '',
		//'freeshipping' => 'h2[id=freeShipMsg]',
		//'available' => 'span[id=stock-status]',
		//'outofstock' => 'span[id=stock-status]',
	
			);

$config['trads'] = array(

		'name' => 'h1[itemprop=name]',
		//'title' => 'sdfsdfsd[sdfsdfs=sfdfsd]',
		//'price' => 'span[itemprop=lowPrice]',
		'price' => array( 'tag_name' => 'span[itemprop=lowPrice]',"attr" =>"content","type" => "inner","filter" => array("filter_price_to_int")),
		/*
		
		'discount' => '',
		'freeshipping' => 'h2[id=freeShipMsg]',
		'available' => 'span[id=stock-status]',
		'outofstock' => 'span[id=stock-status]',
		*/
			);



$config['flip'] = array(

		'name' => 'h1[itemprop=name]',
		'price' => array( 'tag_name' => 'meta[itemprop=price]',"attr" =>"content","type" => "attr"),
	
			);


$config['shopcl'] = array(

		'name' => 'h1[itemprop=name]',
		//'title' => '',
		//there is hiearchy of prices.Eg: 
		//1st price tag: span[id^=sec_list_price]
		//2nd price: span[id=sec_discounted_price]
		//3rd price : deal price: span[class=lst_price_tit_nl prc_third_app]
		//EG:<span class="price"><span class="lst_price_tit_nl prc_third_app">Deal Price:</span>Rs.16,594</span>
		//'price' => 'span[id^=sec_discounted_price]',
		'price' => array( 'tag_name' => 'span[id^=sec_discounted_price]',"attr" =>"content","type" => "inner","filter" => array("strip_tag","filter_price_to_int")),
		//'discount' => '',
		//'freeshipping' => 'h2[id=freeShipMsg]',
		//available' => 'span[id=stock-status]',
		//'outofstock' => 'span[id=stock-status]',
	
			);



$config['idtmshp'] = array(

		'name' => array( 'tag_name' => 'meta[property=og:title]',"attr" =>"content","type" => "attr"),
		'price' => array( 'tag_name' => 'span[itemprop=price]',"attr" =>"content","type" => "inner" ,"filter" => array("filter_price_to_int")),
	);

$config['infi'] = array(

		'name' => 'h1[itemprop=name]',
		//'title' => '',
		'price' => array( 'tag_name' => 'meta[itemprop=price]',"attr" =>"content","type" => "attr"),
		
		/*
		
		'discount' => '',
		'freeshipping' => 'h2[id=freeShipMsg]',
		'available' => 'span[id=stock-status]',
		'outofstock' => 'span[id=stock-status]',
		*/
			);

?>