<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CheckinCheckout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin')) { 
            redirect('login');
        }
		
		$this->load->model('model_vehicle');
        $this->load->model('model_manufacturer');
        $this->load->model('model_car_model');
	}

	public function index()
	{
		$data['kamartipe'] = $this->model_manufacturer->getAllManufacturers();
		$data['tersediakamar'] = $this->model_car_model->getAllModels();
		$data['checkindata'] = $this->model_vehicle->getAllVehicle();
		$data['checkoutdata'] = $this->model_vehicle->getAllCheckout();
		// $this->load->view('admin/car_model', $data);
		$this->parser->parse('admin/view_vehicle', $data);
	}
	
	public function addcheckin()
	{	
		if(! $this->input->post('buttonSubmit')) {
			redirect(base_url('admin/checkincheckout'));
		}

		else {
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$jeniskamar = $this->input->post('jeniskamar');
			$nomorkamar = $this->input->post('nomorkamar');
			$notelp = $this->input->post('notelp');
			$tanggalcheckin = $this->input->post('tanggalcheckin');
		

			$this->model_vehicle->insertcheckin($nama,$alamat,$jeniskamar,$nomorkamar,$notelp,$tanggalcheckin);
			$this->session->set_flashdata('message','Checkin Successfully.');
			
			$this->db->where('nomorkamar',$nomorkamar);
			$this->db->delete('tersediakamar');
			
			redirect(base_url('admin/checkincheckout'));	
		}
	}
	
		public function buttoncheckout()
	{
		
		if(! $this->input->post('buttonCheckout')) {
			redirect(base_url('admin/checkincheckout/datacheckout'));
		}

		else {
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$jeniskamar = $this->input->post('jeniskamar');
			$nomorkamar = $this->input->post('nomorkamar');
			$notelp = $this->input->post('notelp');
			$tanggalcheckin = $this->input->post('tanggalcheckin');
			$tanggalcheckout = $this->input->post('tanggalcheckout');
		

			$this->model_vehicle->insertcheckout($nama,$alamat,$jeniskamar,$nomorkamar,$notelp,$tanggalcheckin,$tanggalcheckout);
			$this->session->set_flashdata('message','Checkout Successfully.');
			
			$this->db->where('nomorkamar',$nomorkamar);
			$this->db->delete('checkindata');
			
			redirect(base_url('admin/checkincheckout'));
	
		}
	}
	
	    public function datacheckout()
    {   
		$data['checkoutdata'] = $this->model_vehicle->getAllCheckout();
		$this->parser->parse('admin/view_sold', $data);
       // $this->load->view('admin/view_sold'$daa);     
    }
	
		public function deletecheckout($cid)
	{	
        $this->model_vehicle->deletecheckoutt($cid);
        $this->session->set_flashdata('message','Checkout Successfully Deleted.');
        redirect(base_url('admin/checkincheckout/datacheckout'));
	}
/**
	public function sell()
	{
        if ($this->input->server('REQUEST_METHOD') == 'POST'){	
            $cid = $this->input->post('vehicle_id');
            $cdata['cid'] = $cid;
            if(!$this->input->post('buttonSubmits'))
    		{
    			$data['message'] = '';
                //$data['vRow'] = $this->model_vehicle->get($cid);
                $this->load->view('admin/view_sell', $cdata);
    		}
            else{
                $this->form_validation->set_rules('cf_name', 'First Name', 'required');
                $this->form_validation->set_rules('cl_name', 'Last Name', 'required');
                $this->form_validation->set_rules('c_email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('c_mobile', 'Mobile', 'required|trim');
                $this->form_validation->set_rules('s_price', 'Selling Price', 'required|numeric|greater_than[1]');
                $this->form_validation->set_rules('w_end', 'Warranty End date', 'required');
				$this->form_validation->set_rules('v_id', 'Vehicle Id', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    $data['vRow'] = $this->model_vehicle->get($cid);
                    $this->load->view('admin/view_sell', $data);
                }
                else {
                    $v_id = $this->input->post('v_id');
                    $cf_name = $this->input->post('cf_name');
                    $cl_name = $this->input->post('cl_name');
                    $c_email = $this->input->post('c_email');
                    $s_price = $this->input->post('s_price');
                    $c_mobile = $this->input->post('c_mobile');
                    $w_start = $this->input->post('w_start');
                    $w_end = $this->input->post('w_end');
                    $payment_type = $this->input->post('payment_type');
                    $c_pass = "1234";

                    $this->model_vehicle->sell($v_id,$cf_name,$cl_name,$c_email,$s_price,$c_mobile,$w_start,$w_end,$payment_type,$c_pass);
                    redirect(base_url('admin/vehicles'));
                }
            }
        }
        else {
            redirect(base_url('admin/vehicles'));
        }
	}

	public function add()
	{	
		if($this->input->post('buttonSubmit')) {
			$data['message'] = '';
		
				$this->form_validation->set_rules('manufacturer_id', 'Manufacturer', 'required');
				$this->form_validation->set_rules('model_id', 'Model', 'required');
				$this->form_validation->set_rules('category', 'Category ', 'required');
				$this->form_validation->set_rules('b_price', 'Buying Price ', 'required');
				$this->form_validation->set_rules('mileage', 'Mileage', 'required');
				$this->form_validation->set_rules('add_date', 'Adding Date', 'required');
				$this->form_validation->set_rules('registration_year', 'Registration Year Date', 'required');
				$this->form_validation->set_rules('insurance_id', 'Insurance ID', 'required');
				$this->form_validation->set_rules('gear', 'Gear', 'required');
				$this->form_validation->set_rules('doors', 'Number of Doors', 'required');
				$this->form_validation->set_rules('seats', 'Number of Seats', 'required');
				$this->form_validation->set_rules('tank', 'Tank capacity', 'required');
				$this->form_validation->set_rules('e_no', 'Engine No', 'required');
				$this->form_validation->set_rules('c_no', 'Chasis No', 'required');
				$this->form_validation->set_rules('v_color', 'Color', 'required');		
				
				if($this->form_validation->run() == FALSE)
				{
					//$data['vRow'] = $this->model_vehicle->get($cid);
                    $this->load->view('admin/view_vehicle');
				}
				else{
					
		
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_width']    = '2048';
            $config['max_height']   = '2048';
            $this->load->library('upload', $config);
            
            
            $manufacturer_name = $this->input->post('manufacturer_id');
		    $model_name = $this->input->post('model_id');
            $category = $this->input->post('category');
            $b_price = $this->input->post('b_price');
        
            $mileage = $this->input->post('mileage');
            $add_date = $this->input->post('add_date');
            $status = "available";
            $registration_year = $this->input->post('registration_year');
            $insurance_id = $this->input->post('insurance_id');
            $gear = $this->input->post('gear');
            $doors = $this->input->post('doors');
            $seats = $this->input->post('seats');
            $tank = $this->input->post('tank');
            $e_no = $this->input->post('e_no');
            $c_no = $this->input->post('c_no');
            $u_id = $this->session->userdata('id');
            $v_color = $this->input->post('v_color');
            $featured = $this->input->post('featured');
            
            $this->upload->do_upload('image');
            $data = $this->upload->data('image');
            $image= $data['file_name']; 
			
            $this->model_vehicle->insert($featured,$image,$manufacturer_name,$model_name,$category,$b_price,$mileage,$add_date,$status,$registration_year,$insurance_id,$gear,$doors,$seats,$tank,$e_no,$c_no,$u_id,$v_color);
			$this->session->set_flashdata('message','Vehicle Successfully Created.');
			redirect(base_url('admin/vehicles'));
		
			}
		}
		else{
		redirect(base_url('admin/vehicles'));
		}
	}



	public function DeleteVehicle()
	{
        if ($this->input->server('REQUEST_METHOD') == 'POST'){	
             
            $id = $this->input->post('vehicle_id');
            $this->model_vehicle->delete($id);
			$this->session->set_flashdata('message','Vehicle Successfully Deleted.');
            redirect(base_url('admin/vehicles'));
        }
        else {
            redirect(base_url('admin/vehicles'));
	    }
    }
        
    public function DeleteCustomer()
	{	
        if ($this->input->server('REQUEST_METHOD') == 'POST'){	
            $v_id= $this->input->post('v_id');
            $c_id= $this->input->post('c_id');
               
            $this->model_vehicle->deletecustomer($c_id,$v_id);
			$this->session->set_flashdata('message','Customer Successfully Created.');
            redirect(base_url('admin/vehicles/soldlist'));
        }
        else{
            redirect(base_url('admin/vehicles/soldlist'));
        }
	}

	**/
}

