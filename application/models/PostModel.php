<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostModel extends CI_Model {

	Public function getList($category=Null)
	{
		if(!isset($category)){
			return $this->db->get('post')->result();
		}else{
			return $this->db->where('category',$category)->get('post')->result();
		}
	}

	Public function getCategory()
	{
		return $this->db->get('category')->result();
	}

	public function savePost($data)
	{
		$this->db->insert('post', $data);
	}

	public function saveCategory($data)
	{
		$this->db->insert('category', $data);
	}

	public function getPostByID($id)
	{
		return $this->db->where('post_id', $id)->get('post')->row();
	}

	public function destroyPost($data)
	{
		$this->db->where($data)->delete('post');
	}

	public function updatePost($data,$where)
	{
		$this->db->where($where)->update('post',$data);
	}
}
