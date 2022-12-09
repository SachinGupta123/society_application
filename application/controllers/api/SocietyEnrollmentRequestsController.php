<?php

include_once (dirname(__FILE__). "/Main.php");

class SocietyEnrollmentRequestsController extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        // if($this->session->userdata('login') != true):
        //     $this->session->unset_userdata('data');
        //     $this->session->unset_userdata('login');
        //     echo json_encode('You are thrown out');
        //     exit;
        // endif;
        header('Content-type:application/json');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods:*');
        header('Access-Control-Allow-Headers:*');
        header('Access-Control-Allow-Credentials:true');
        header('Access-Control-Max-Age:1728000');
        // $this->load->model('transaction');
        // $this->config->load("config");
        $this->config->set_item('csrf_protection', TRUE);
        $this->load->model('User_model');
        $this->load->model('Member_model');
        $this->load->model('Society_model');
        // $this->load->model('Payment_model');
        // $this->load->model('Billing_head_model');
        // $this->load->model('Bank_model');
        // $this->load->model('Bill_detail_model');
		// use Restserver\Libraries\REST_Controller;
        // $this->load->model('Bank_transaction_model');
    }

    public function create()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        // parse_str($url['query'], $params);
        // $user_id = $params['user_id'];
        // echo $user_id;

        $data = $this->input->post();
        // echo json_encode($data);die;
        $success = false;
        $message = "";
        // s = SocietyEnrollmentRequest.new
        $params['name'] = $data["name"];
        $params['email'] = $data["email"];
        $params['phone'] = $data["phone"];
        $params['society_name'] = $data["society_name"];
        $params['society_address'] = $data["society_address"];
        $params['city'] = $data["city"];
        $params['state'] = $data["state"];
        $params['country'] = $data["country"];
        $params['pincode'] = $data["pincode"];
        $params['reference'] = $data["reference"];
        $params['span'] = $data["span"];
        $params['no_of_units'] = $data["units"];

        if($this->db->insert('society_enrollment_requests', $params)):
            $dat['success'] = true;
            $dat['message'] = 'Enrollment Request Sent Successfully';
            echo json_encode($dat);
            return;
        else:
            echo json_encode('There is some Error');
            return;
        endif;
    }
}
?>