<?php

include_once (dirname(__FILE__). "/Main.php");

class Management extends CI_Controller
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
        $this->load->model('Society_enrollment_request_model');
        // $this->load->model('Member_model');
        // $this->load->model('Society_model');
        // $this->load->model('Society_model');
        // $this->load->model('Payment_model');
        // $this->load->model('Billing_head_model');
        // $this->load->model('Bank_model');
        // $this->load->model('Bill_detail_model');
		// use Restserver\Libraries\REST_Controller;
        // $this->load->model('Bank_transaction_model');
    }

    public function total_enrollment()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        
        $total_enrollment = $this->Society_enrollment_request_model->get_total_enrollments();
        if($total_enrollment != '' || $total_enrollment != 0):
            echo json_encode($total_enrollment);
            return;
        else:
            echo json_encode('There is some Error');
            return;
        endif;
    }

    public function today_enrollment()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        
        $today_enrollment = $this->Society_enrollment_request_model->get_today_enrollments();
        if($today_enrollment != '' || $today_enrollment != 0):
            echo json_encode($total_enrollment);
            return;
        else:
            echo json_encode('0');
            return;
        endif;
    }
    
    public function get_enrollment_list()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        
        $list_enrollment = $this->Society_enrollment_request_model->get_all_society_enrollment_requests();
        if(!empty($list_enrollment) || $list_enrollment != ''):
            echo json_encode($list_enrollment);
            return;
        else:
            echo json_encode('0');
            return;
        endif;
    }
}
?>