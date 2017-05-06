<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_car_model extends CI_Model {
	
	public function getAllModels()
	{
		$result = $this->db->get('tersediakamar');
		return $result->result_array();
	}
	
	public function insertmodel($model_name, $manufacturer_id)
	{
		$data = array(
               'nomorkamar' 				=> $model_name,
               'jeniskamar' 	=> $manufacturer_id
        );

		$this->db->insert('tersediakamar', $data); 
	}

	public function deleteModel($model_id)
	{

		$this->db->where('nomorkamar', $model_id);
		$this->db->delete('tersediakamar'); 

	}
}