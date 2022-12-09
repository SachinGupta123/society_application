<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityLogs extends CI_Controller
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
    }

	public function view_activity_logs() {
		$data = array(
			'title' => "Activity Logs"
		);
		$this->load->view('activity_log/view_activity_logs', $data);
	}
	
}
?>