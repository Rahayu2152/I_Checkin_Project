<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_vehicle extends CI_Model {
	
	public function getAllVehicle()
	{
		$result = $this->db->get('checkindata');
		return $result->result_array();
	}
	
	public function getAllCheckout()
	{
		$result2 = $this->db->get('checkoutdata');
		return $result2->result_array();
	}
	

	public function insertcheckin($nama,$alamat,$jeniskamar,$nomorkamar,$notelp,$tanggalcheckin)
	{
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'jeniskamar' => $jeniskamar,
			'nomorkamar' => $nomorkamar,
			'notelp' => $notelp,
			'tanggalcheckin' => $tanggalcheckin
        );

		$this->db->insert('checkindata', $data); 
	}
	
	public function insertcheckout($nama,$alamat,$jeniskamar,$nomorkamar,$notelp,$tanggalcheckin,$tanggalcheckout)
	{
		$datacheckout = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'jeniskamar' => $jeniskamar,
			'nomorkamar' => $nomorkamar,
			'notelp' => $notelp,
			'tanggalcheckin' => $tanggalcheckin,
			'tanggalcheckout' => $tanggalcheckout
        );
		
		$datakamar = array(
               'nomorkamar' 	=> $nomorkamar,
               'jeniskamar' 	=> $jeniskamar
        );

		$this->db->insert('tersediakamar', $datakamar); 
		$this->db->insert('checkoutdata', $datacheckout); 
		
	}
	
		public function deletecheckoutt($model_id)
	{

		$this->db->where('id', $model_id);
		$this->db->delete('checkoutdata'); 

	}
}