<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EnrollmentRequests extends CI_Controller
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
            $this->load->model('Society_enrollment_request_model');
    }

	public function view_enrolment_requests() {
		$data = array(
			'title' => "Enrollment Requests"
		);
		$data['enrolment_requests'] = $this->Society_enrollment_request_model->get_all_society_enrollment_requests();
       
		$this->load->view('enrolment_requests/view_enrolment_requests', $data);
	}

	public function enrolment_details() {
		$data = array(
			'title' => "Enrollment Requests"
		);
		$this->load->view('enrolment_requests/enrolment_details', $data);
	}
	
}
?>