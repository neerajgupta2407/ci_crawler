<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_db extends CI_Model
{
	function __construct(){
		
		
		parent::__construct();
	}
	
	function db_insert($table,$data)
	{
		$this->db->insert($table,$data);
		return $this->db->insert_id();
		
	}
	function insert_batch($table,$data)
	{
		$this->db->insert_batch($table,$data);
		return $this->db->insert_id();
		
	}
	
	function mysql_fetch_all($table,$where=array(),$limit='',$offset='')
	{
		//var_dump($where);
		$this->db->select('*');
		$this->db->from($table);
		if(count($where)>0){$this->db->where($where);}
		
		if($limit!='' && $offset!='')
		{
			$this->db->limit($limit,$offset);
		}
		else if ($limit!=''){
			$this->db->limit($limit);
		}
		
		
		$query = $this->db->get();
		return $query->result_array();
		
	}
	function mysql_fetch_sql($sql)
	{
		
		$query = $this->db->query($sql);
		
		
		return $query->result_array();
		
	}
	function mysql_fetch_fields($fields,$table,$where='',$limit='',$offset='')
	{
		$this->db->select($fields);
		$this->db->from($table);
		//if(count($join)>0){ $this->get_join($join);}
		if(count($where)>0){$this->db->where($where);}
		
		if($limit!='' && $offset!='')
		{
			$this->db->limit($limit,$offset);
		}
		else if ($limit!=''){
			$this->db->limit($limit);
		}
		
		
		$query = $this->db->get();
		return $query->result_array();
		
	}

	function get_join($join)
	{
		if($join[2]=='')
		{
			return $this->db->join($join[0],$join[1]);
		}
		else
		{
			return $this->db->join($join[0],$join[1],$join[2]);
		}
		
	}
	
	function update($table,$data,$where)
	{
		$this->db->where($where);
		if($this->db->update($table,$data))
		return 1;
		else
		return 0;
		
	}
	function update_batch($table,$data,$where)
	{
		
		if($this->db->update_batch($table,$data,$where))
		return 1;
		else
		return 0;
		
	}
}
