<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddKamar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin') || $this->session->userdata('type')!="admin") { 
            redirect('controller_login');
        }
		
		$this->load->database();
		$this->load->model('model_manufacturer');
		$this->load->model('model_car_model');
	}


	public function index()
	{
		$data['kamartipe'] = $this->model_manufacturer->getAllManufacturers();
		$data['tersediakamar'] = $this->model_car_model->getAllModels();
		// $this->load->view('admin/car_model', $data);
		$this->parser->parse('admin/view_car_model', $data);
	}

	public function addmodel()
	{	
		if(! $this->input->post('buttonSubmit')) {
			redirect(base_url('admin/addkamar'));
		}

		else {
			$model_name = $this->input->post('model_name');
			$manufacturer_id = $this->input->post('manufacturer_id');

			$this->model_car_model->insertmodel($model_name, $manufacturer_id);
			$this->session->set_flashdata('message','Kamar Created Successfully.');
			redirect(base_url('admin/addkamar'));
		}
	}

	public function deleteModel($cid)
	{	
        $this->model_car_model->deleteModel($cid);
        $this->session->set_flashdata('message','Kamar Deleted Successfully.');
        redirect(base_url('admin/addkamar'));
	}
}