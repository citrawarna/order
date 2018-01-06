<?php 
defined('BASEPATH') or exit('No direct script access allowed!');

class Admin_model extends CI_Model 
{
	public function get($id){
		return $this->db->where('id_order', $id)->get('order')->row_array();
	}

	public function update($id, $order){
		return $this->db->where('id_order', $id)->update('order', $order);
	}

	public function post_delete($post = array()){
		$total_array = count($post);
		if($total_array != 0){
			$this->db->where_in('id_order', $post['check']);
			$this->db->delete('order');
		}
	}

	public function get_proses($post){
		$query = $this->db->join('order', 'order.id_order = konfirmasi.id_order', 'RIGHT')
						->where_in('order.id_order', $post['check'])
						->get('konfirmasi');

		return $query;
	}

	// public function proses_data($result = array()){
	// 	$total_array = count($result);

	// 	if($total_array != 0) {
	// 		$this->db->insert_batch('konfirmasi', $result, 'id_order');
	// 	}
	// }
}

 ?>