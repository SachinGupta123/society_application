<?php

include_once (dirname(__FILE__). "/Main.php");

class SocietiesController extends CI_Controller
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
        $this->load->model('Payment_model');
        $this->load->model('Billing_head_model');
        $this->load->model('Bank_model');
        $this->load->model('Bill_detail_model');
        $this->load->model('Service_provider_model');
        $this->load->model('Expense_model');
		// use Restserver\Libraries\REST_Controller;
        // $this->load->model('Bank_transaction_model');
    }

    public function index()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $societies['societies'] = $this->Society_model->get_all_societies();
        if(!empty($societies)):
           echo json_encode($societies);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function societyDetails()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $society_id = $params['society_id'];
        $soc = $this->Society_model->get_society_details($society_id);
        $society['society'] = $soc[0];
        if(!empty($society)):
           echo json_encode($society);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
        // echo $society_id;
    }

    public function societyMembers()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $society_id = $params['society_id'];
        $members['members'] = $this->Member_model->get_all_members_by_society($society_id);
        if(!empty($members)):
           echo json_encode($members);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function billingHeads()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $society_id = $params['society_id'];
        $billing_heads['billing_heads'] = $this->Billing_head_model->get_bill_heads_for_society($society_id);
        if(!empty($billing_heads)):
           echo json_encode($billing_heads);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function serviceProviders()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $society_id = $params['society_id'];
        $service_providers['service_providers'] = $this->Service_provider_model->get_all_service_providers_for_society($society_id);
        if(!empty($service_providers)):
           echo json_encode($service_providers);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function expenses()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $society_id = $params['society_id'];
        $expenses['expenses'] = $this->Expense_model->get_all_expense($society_id);
        if(!empty($expenses)):
           echo json_encode($expenses);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function expense_details()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $service_provider_id = $params['service_provider_id'];
        $expense_details['expense_details'] = $this->Expense_model->get_all_expense_by_spid($service_provider_id);
        if(!empty($expense_details)):
           echo json_encode($expense_details);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }
}
?>