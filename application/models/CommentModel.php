<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommentModel extends CI_Model {

	public function getCommentByPost($post_id)
	{
		return $this->db->where('post_id',$post_id)->get('comment')->result();
	}	

}

/* End of file CommentModel.php */
/* Location: ./application/models/CommentModel.php */