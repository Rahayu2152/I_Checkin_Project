<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_manufacturer extends CI_Model {

	public function insertManufacturer($jeniskamar)
	{
		$data = array(
			'jeniskamar' => $jeniskamar
        );

		$this->db->insert('kamartipe', $data);
	}

	
	/*
	* Get All Manufacturers
	*/
	
	public function getAllManufacturers()
	{
		$result = $this->db->get('kamartipe');
		return $result->result_array();
	}
	
	public function deleteManufacturer($manufacturer_id)
	{
		$this->db->where('jeniskamar', $manufacturer_id);
		$this->db->delete('kamartipe');

	}
	

}