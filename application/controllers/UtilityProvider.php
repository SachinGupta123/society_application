<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilityProvider extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
			
		}
        $this->load->model('Utility_service_provider_model');
        $this->load->helper(['url', 'language']);
        $this->load->model('User_model');
        $this->load->model('Ion_auth_model');
        $this->load->library(['ion_auth', 'form_validation']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

	public function view_utility_provider() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		// $this->load->view('utility_provider/view_utility_provider', $data);

		$data['utility_service_providers'] = $this->Utility_service_provider_model->get_all_utility_service_providers();
        
        $data['_view'] = 'utility_service_provider/index';
        $this->load->view('utility_provider/view_utility_provider',$data);
	}
	
	public function add_utility_provider() {
		$data = array(
			'title' => "Utility Service Provider"
		);

		$this->form_validation->set_rules('utility_business_name','Business Name','required');
		$this->form_validation->set_rules('utility_address','Address','required');
		$this->form_validation->set_rules('utility_license_number','License No','required');
		$this->form_validation->set_rules('utility_phone_number','Phone No','required');
		$this->form_validation->set_rules('utility_owner_name','Owner Name','required');
		
		if($this->form_validation->run())     
        {
            // echo "<pre>";print_r($params);die;
            $params = array(
				'business_name' => $this->input->post('utility_business_name'),
				'address' => $this->input->post('utility_address'),
				'license_no' => $this->input->post('utility_license_number'),
				'owner_name' => $this->input->post('utility_owner_name'),
				'email_id' => $this->input->post('utility_email'),
				'service_tax_unit' => $this->input->post('utility_service_tax_unit'),
				'provider_type' => $this->input->post('utility_provider_type'),
				'phone_no' => $this->input->post('utility_phone_number'),
				// 'created_at' => $this->input->post('created_at'),
				// 'updated_at' => $this->input->post('updated_at'),
            );
            $utility_service_provider_id = $this->Utility_service_provider_model->add_utility_service_provider($params);

            // $params = array(
            // 	'email' => $this->input->post('utility_email'),
            //     'username' => $this->input->post('utility_email'),
            //     'phone' => $this->input->post('utility_phone_number'),
            //     'password' => md5('msociety123'),
            //     'created_on' => date("Y-m-d H:i:s"),
            // );
            $tables = $this->config->item('tables', 'ion_auth');
			$identity_column = $this->config->item('identity', 'ion_auth');
			$this->data['identity_column'] = $identity_column;
            $email = strtolower($this->input->post('utility_email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = 'msociety123';

			$additional_data = [
				'first_name' => $this->input->post('utility_owner_name'),
				'last_name' => $this->input->post('utility_business_name'),
				'company' => $this->input->post('utility_business_name'),
				'phone' => $this->input->post('utility_phone_number'),
			];
			$group = array('9');
			$user_id = $this->ion_auth->register($identity, $password, $email, $additional_data,$group);
            // $user_id = $this->User_model->add_user($params);

            redirect('utility_service_provider');
        }
        else
        {            
            $data['_view'] = 'utility_service_provider/add';
            $this->load->view('utility_provider/add_utility_provider',$data);
        }
	}

	public function edit_utility_provider($id = '') {

		if($id == ''){
			$id = $this->input->post('utility_provider_id');
		}

		$data = array(
			'title' => "Utility Service Provider"
		);
		// $this->load->view('utility_provider/edit_utility_provider', $data);

		$data['utility_service_provider'] = $this->Utility_service_provider_model->get_utility_service_provider($id);
        
        if(isset($data['utility_service_provider']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('utility_business_name','Business Name','required');
			$this->form_validation->set_rules('utility_address','Address','required');
			$this->form_validation->set_rules('utility_license_number','License No','required');
			$this->form_validation->set_rules('utility_phone_number','Phone No','required');
			$this->form_validation->set_rules('utility_owner_name','Owner Name','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
				'business_name' => $this->input->post('utility_business_name'),
				'address' => $this->input->post('utility_address'),
				'license_no' => $this->input->post('utility_license_number'),
				'owner_name' => $this->input->post('utility_owner_name'),
				'email_id' => $this->input->post('utility_email'),
				'service_tax_unit' => $this->input->post('utility_service_tax_unit'),
				'provider_type' => $this->input->post('utility_provider_type'),
				'phone_no' => $this->input->post('utility_phone_number'),
                );

                $this->Utility_service_provider_model->update_utility_service_provider($id,$params);            
                redirect('utility_service_provider');
            }
            else
            {
                $data['_view'] = 'utility_service_provider/edit';
                $this->load->view('utility_provider/edit_utility_provider',$data);
            }
        }
        else
            show_error('The utility_service_provider you are trying to edit does not exist.');
	}

	function remove($id)
    {
        $utility_provider = $this->Utility_service_provider_model->get_utility_service_provider($id);

        // check if the user exists before trying to delete it
        if(isset($utility_provider['id']))
        {
            $this->Utility_service_provider_model->delete_utility_service_provider($id);
            redirect('utility_service_provider');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }

	public function details_utility_provider($id) {
		$data = array(
			'title' => "Utility Service Provider"
		);

		$usp = $this->Utility_service_provider_model->get_utility_provider_details($id);
		foreach($usp as $rows){
			$data['usp'] = $rows;
		}
		$this->load->view('utility_provider/details_utility_provider', $data);
	}

	public function view_utility_plans() {
		$data = array(
			'title' => "Utility Service Provider"
		);

		$this->load->view('utility_provider/utility_provider_actions/view_utility_plans', $data);
	}

	public function add_utility_plans() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/utility_provider_actions/add_utility_plans', $data);
	}

	public function edit_utility_plans() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/utility_provider_actions/edit_utility_plans', $data);
	}

	public function view_utility_billing_head() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/utility_provider_actions/view_utility_billing_head', $data);
	}

	public function add_utility_billing_head() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/utility_provider_actions/add_utility_billing_head', $data);
	}

	public function edit_utility_billing_head() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/utility_provider_actions/edit_utility_billing_head', $data);
	}

	public function assign_plans() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/utility_provider_actions/assign_plans', $data);
	}

	public function add_member() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/members/add_member', $data);
	}

	public function manage_member() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/members/manage_members', $data);
	}

	public function edit_member() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/members/edit_member', $data);
	}

	public function view_single_member() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/members/view_single_member', $data);
	}

	public function view_monthly_bills() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/bills/view_monthly_bills', $data);
	}

	public function view_reports() {
		$data = array(
			'title' => "Utility Service Provider"
		);
		$this->load->view('utility_provider/reports/view_reports', $data);
	}
	
}
?>