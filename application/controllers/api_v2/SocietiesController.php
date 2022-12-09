<?php

include_once (dirname(__FILE__). "/Main.php");

class SocietiesController extends CI_Controller
{
	// function __construct()
    // {
    //     parent::__construct();
    //     // if($this->session->userdata('login') != true):
    //     //     $this->session->unset_userdata('data');
    //     //     $this->session->unset_userdata('login');
    //     //     echo json_encode('You are thrown out');
    //     //     exit;
    //     // endif;
    //     header('Content-type:application/json');
    //     header('Access-Control-Allow-Origin:*');
    //     header('Access-Control-Allow-Methods:*');
    //     header('Access-Control-Allow-Headers:*');
    //     header('Access-Control-Allow-Credentials:true');
    //     header('Access-Control-Max-Age:1728000');
    //     // $this->load->model('transaction');
    //     // $this->config->load("config");
    //     $this->config->set_item('csrf_protection', TRUE);
    //     $this->load->model('User_model');
    //     $this->load->model('Member_model');
    //     $this->load->model('Society_model');
    //     $this->load->model('Payment_model');
    //     $this->load->model('Billing_head_model');
    //     $this->load->model('Bank_model');
    //     $this->load->model('Bill_detail_model');
    //     $this->load->model('Service_provider_model');
    //     $this->load->model('Expense_model');
	// 	// use Restserver\Libraries\REST_Controller;
    //     // $this->load->model('Bank_transaction_model');
    // }

    // public function index()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $societies['societies'] = $this->Society_model->get_all_societies();
    //     if(!empty($societies)):
    //        echo json_encode($societies);
    //         return;
    //     else:
    //         echo json_encode("No Rocord Found!");
    //         return;
    //     endif;
    // }

    // public function societyDetails()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $society_id = $params['society_id'];
    //     $soc = $this->Society_model->get_society_details($society_id);
    //     $society['society'] = $soc[0];
    //     if(!empty($society)):
    //        echo json_encode($society);
    //         return;
    //     else:
    //         echo json_encode("No Rocord Found!");
    //         return;
    //     endif;
    //     // echo $society_id;
    // }

    // public function societyMembersList()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     // $society_id = $params['society_id'];
    //     $members['members'] = $this->Member_model->get_member_by_user_id($user_id);
    //     if(!empty($members)):
    //        echo json_encode($members);
    //         return;
    //     else:
    //         echo json_encode("No Rocord Found!");
    //         return;
    //     endif;
    // }

    // public function societyMembers()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $society_id = $params['society_id'];
    //     $members['members'] = $this->Member_model->get_all_members_by_society($society_id);
    //     if(!empty($members)):
    //        echo json_encode($members);
    //         return;
    //     else:
    //         echo json_encode("No Rocord Found!");
    //         return;
    //     endif;
    // }

    // public function billingHeads()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $society_id = $params['society_id'];
    //     $billing_heads['billing_heads'] = $this->Billing_head_model->get_bill_heads_for_society($society_id);
    //     if(!empty($billing_heads)):
    //        echo json_encode($billing_heads);
    //         return;
    //     else:
    //         echo json_encode("No Rocord Found!");
    //         return;
    //     endif;
    // }

    // public function serviceProviders()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $society_id = $params['society_id'];
    //     $service_providers['service_providers'] = $this->Service_provider_model->get_all_service_providers_for_society($society_id);
    //     if(!empty($service_providers)):
    //        echo json_encode($service_providers);
    //         return;
    //     else:
    //         echo json_encode("No Rocord Found!");
    //         return;
    //     endif;
    // }

    // public function expenses()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $society_id = $params['society_id'];
    //     $expenses['expenses'] = $this->Expense_model->get_all_expense($society_id);
    //     if(!empty($expenses)):
    //        echo json_encode($expenses);
    //         return;
    //     else:
    //         echo json_encode("No Rocord Found!");
    //         return;
    //     endif;
    // }

    // public function expense_details()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $service_provider_id = $params['service_provider_id'];
    //     $expense_details['expense_details'] = $this->Expense_model->get_all_expense_by_spid($service_provider_id);
    //     if(!empty($expense_details)):
    //        echo json_encode($expense_details);
    //         return;
    //     else:
    //         echo json_encode("No Rocord Found!");
    //         return;
    //     endif;
    // }

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
        $this->load->model('Role_model');
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
            $resp = array(
                'response_code'=>'1002',
                'message'=>'No Record Found',
                'societies'=>'',
            );
            echo json_encode($resp);
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
            $resp = array(
                'response_code'=>'1002',
                'message'=>'No Record Found',
                'society'=>'',
            );
            echo json_encode($resp);
            return;
        endif;
        // echo $society_id;
    }

    // public function societyMembersList()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     // $society_id = $params['society_id'];
    //     $members['members'] = $this->Member_model->get_member_by_user_id($user_id);
    //     if(!empty($members)):
    //        echo json_encode($members);
    //         return;
    //     else:
    //         $resp = array(
    //             'response_code'=>'1002',
    //             'message'=>'No Record Found',
    //             'members'=>'',
    //         );
    //         echo json_encode($resp);
    //         return;
    //     endif;
    // }

    public function societyMembersList()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $member_id = $params['member_id'];
        $members['members'] = $this->Member_model->get_member_by_user_id($user_id,$member_id);
        if(!empty($members)):
           echo json_encode($members);
            return;
        else:
            echo json_encode("No Record Found!");
            return;
        endif;
    }

    public function societyMembers()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $society_id = $params['society_id'];
        $members['members'] = $member = $this->Member_model->get_all_members_by_society($society_id);
        foreach($member as $key => $mem)
        {
            $total_payment = 0;
            $arrear = $this->Member_model->get_member_current_arrears($mem['id']);
            // print_r($mem);
            $member = $mem;
            
            $payments = $this->Payment_model->get_all_payment_list_by_member_id($member['id']);
            foreach ($payments as $pay)
            {
                $total_payment = $total_payment + $pay['credit'];
            }
            // $data['payments'] = $payments;
            $members['members'][$key]['outstanding'] = $arrear;
            $members['members'][$key]['payments'] = !empty($payments)? $payments: "";
            $members['members'][$key]['total_payment'] = $total_payment;
            // $data['outstanding'] = $arrear;
            // $data['payments'] = $payments;
            // $data['total_payment'] = $total_payment;
        }
        if(!empty($members)):
           echo json_encode($members);
            return;
        else:
            $resp = array(
                'response_code'=>'1002',
                'message'=>'No Record Found',
                'members'=>'',
            );
            echo json_encode($resp);
            return;
        endif;
    }

    // public function societyMembers()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $society_id = $params['society_id'];
    //     $members['members'] = $this->Member_model->get_all_members_by_society($society_id);
    //     if(!empty($members)):
    //        echo json_encode($members);
    //         return;
    //     else:
    //         echo json_encode("No Record Found!");
    //         return;
    //     endif;
    // }

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
            $resp = array(
                'response_code'=>'1002',
                'message'=>'No Record Found',
                'billing_heads'=>'',
            );
            echo json_encode($resp);
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
            $resp = array(
                'response_code'=>'1002',
                'message'=>'No Record Found',
                'service_providers'=>'',
            );
            echo json_encode($resp);
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
            $resp = array(
                'response_code'=>'1002',
                'message'=>'No Record Found',
                'expenses'=>'',
            );
            echo json_encode($resp);
            return;
        endif;
    }

    // public function expenses1()
    // {
    //     $url = parse_url($_SERVER['REQUEST_URI']);
    //     parse_str($url['query'], $params);
    //     $user_id = $params['user_id'];
    //     $society_id = $params['society_id'];
    //     $expenses['expenses'] = $expense = $this->Expense_model->get_all_expense($society_id);

    //     foreach ($expense as $key => $item) {
    //         $exp['exp'][][date('M y',strtotime($item['date']))][] = $item;
    //      }
    //      ksort($exp);

    //     if(!empty($exp)):
    //        echo json_encode($exp);
    //         return;
    //     else:
    //         $resp = array(
    //             'response_code'=>'1002',
    //             'message'=>'No Record Found',
    //             'expenses'=>'',
    //         );
    //         echo json_encode($resp);
    //         return;
    //     endif;
    // }

    public function expenses1()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $society_id = $params['society_id'];
        $to = $params['to'];
        $from = $params['from'];
        if($to == '' && $from == '')
        {
            $to = date('Y-m-d');
            $from = date('Y-m-d',strtotime('-30 days',strtotime($to)));
        }
        
        $expenses['expenses'] = $expense = $this->Expense_model->get_all_expense1($society_id,$to,$from);

        // foreach ($expense as $key => $item) {
        //     $exp['exp'][][date('M y',strtotime($item['date']))][] = $item;
        //  }
        //  ksort($exp);

        if(!empty($expenses)):
           echo json_encode($expenses);
            return;
        else:
            $resp = array(
                'response_code'=>'1002',
                'message'=>'No Record Found',
                'expenses'=>'',
            );
            echo json_encode($resp);
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
            $resp = array(
                'response_code'=>'1002',
                'message'=>'No Record Found',
                'expense_details'=>'',
            );
            echo json_encode($resp);
            return;
        endif;
    }

    public function societies_details_by_user_id()
    {
        $data = array();
        $user_id = $this->input->post('user_id');
        if($user_id == ""){
            echo json_encode(array('responseCode' => 1002, 'message' => 'Error! User id cannot be blank!!!',));
        }
        else
        {
            $societies = $this->Society_access_model->get_all_society_accesses_by_user_id($user_id);
            $data['societies'] = $societies;
            foreach($societies as $key => $value)
            {
                $society_details = $this->Society_model->get_society_details($value['society_id']);
                $data['societies'][$key]['society_details'] = $society_details;
                // $role_details = $this->Role_model->get_role($value['role_id']);
                // $data['societies'][$key]['role_details'] = $role_details;
            }
            if(!empty($data)):
                echo json_encode($data);
                return;
            else:
                $resp = array(
                    'response_code'=>'1002',
                    'message'=>'No Record Found',
                    'societies'=>'',
                );
                echo json_encode($resp);
                return;
            endif;
        }
    }

    public function flats_details_by_userID_societyID()
    {
        $data = array();
        $user_id = $this->input->post('user_id');
        $society_id = $this->input->post('society_id');
        if($user_id == "" || $society_id == ""){
            echo json_encode(array('responseCode' => 1002, 'message' => 'Error! User or Society cannot be blank!!!',));
        }
        else
        {
            $data['flats'] = $this->Member_model->get_all_members_by_userid_by_societyid($user_id,$society_id);
            if(!empty($data)):
                echo json_encode($data);
                return;
            else:
                $resp = array(
                    'response_code'=>'1002',
                    'message'=>'No Record Found',
                    'flats'=>'',
                );
                echo json_encode($resp);
                return;
            endif;
        }
    }   

    public function in_details_flat_by_userID_societyID()
    {
        $user_id = $this->input->post('user_id');
        $society_id = $this->input->post('society_id');
        $member_id = $this->input->post('member_id');
        if($user_id == "" || $society_id == "" || $member_id == ""){
            echo json_encode(array('responseCode' => 1002, 'message' => 'Error! User, Society and Member cannot be blank!!!',));
        }
        else
        {
            $flat_details['member_details'] = $this->Member_model->get_single_flat_details($member_id);
            $flat_details['member_arrears'] = $this->Member_model->members_arrears_by_memberid($member_id);
            $flat_details['member_interest'] = $this->Member_model->members_interest_by_memberid($member_id);
            $flat_details['society_member_balance'] = $this->Member_model->get_current_balance($member_id);
            $flat_details['payment_logs'] = $this->Member_model->society_member_bill_payment_logs_by_memberid($member_id);
            $flat_details['payment_transaction_logs'] = $this->Member_model->society_member_bill_payment_transaction_log_by_memberid($member_id);
            $flat_details['bill_details'] = $bill_detalis =  $this->Member_model->bill_details_by_memberid($member_id);
            foreach ($bill_detalis as $key => $bills)
            {
                $flat_details['bill_details'][$key]['details'] = unserialize($bills['details']);
                $bill_details = unserialize($bills['details']);
                foreach($bill_details as $k => $v)
                {
                    $newKey = str_replace(' ', '_', $k);
                    $newBillDetails[$newKey] = $v;
                }
                $flat_details['bill_details'][$key]['details'] = $newBillDetails;
            }
            $flat_details['payments'] = $this->Member_model->payments_by_memberid($member_id);

            $societies = $this->Society_access_model->get_all_society_accesses_user($user_id);
            $data['societies'] = $societies;
            foreach($societies as $key => $value)
            {
                $role_details = $this->Role_model->get_role($value['role_id']);
                $flat_details['role_details'] = $role_details;
            }
            if(!empty($flat_details)):
                echo json_encode($flat_details);
                return;
            else:
                $resp = array(
                    'response_code'=>'1002',
                    'message'=>'No Record Found',
                    'member_details'=>'',
                    'member_arrears'=>'',
                    'member_interest'=>'',
                    'society_member_balance'=>'',
                    'payment_logs'=>'',
                    'payment_transaction_logs'=>'',
                    'bill_details'=>'',
                    'payments'=>'',
                );
                echo json_encode($resp);
                return;
            endif;
        }
    }
}
?>