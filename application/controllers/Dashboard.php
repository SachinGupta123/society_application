<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct() {
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
		$this->load->model('User_model');
		$this->load->model('Member_model');
		$this->load->model('Society_model');
		$this->load->model('Service_provider_model');
	}

	public function index(){
		$this->dashboard_msoc();
	}

	public function dashboard_msoc() {
		$data = array(
			'title' => "Dashboard"
		);
		$data['users'] = $this->User_model->get_all_user();
		$data['societies'] = $this->Society_model->get_all_societie();
		$data['members'] = $this->Member_model->get_members_count();
		$data['service_providers'] = $this->Service_provider_model->get_service_providers_count();
		$this->load->view('dashboard/dashboard_msoc', $data);
	}
	
}
?>