<?php

include_once (dirname(__FILE__). "/Main.php");

class CommitteeMembers extends CI_Controller
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
        // use Restserver\Libraries\REST_Controller;
        // $this->load->model('Bank_transaction_model');
    }

    public function society_details()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        if(empty($mem)):
            echo "User Does not Exists!";
            return;
        endif;
        $data['member'] = $mem[0];
        $data['society'] = $this->Society_model->get_society($data['member']->society_id);
        // print_r($data['society']);die;
        // $data['society'] = $soc;
        if(!empty($data)):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function members_list()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        if(empty($mem)):
            echo "User Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $soc = $this->Society_model->get_society_details($member->society_id);
        $society = $soc[0];
        $all = $this->Member_model->get_all_members($society->id);
        $all_members['all_members'] = $all;
        if(!empty($all_members)):
           echo json_encode($all_members);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function member_details()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $member_id = $params['member_id'];
        $mem = $this->Member_model->get_members_by_id($member_id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $member['member'] = $mem[0];
        if(!empty($member)):
           echo json_encode($member);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function payment_history()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $member_id = $params['member_id'];
        $mem = $this->Member_model->get_members_by_id($member_id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $total_payment = 0;
        $payment = $this->Payment_model->get_payment_by_member_id($member['id']);
        if(!empty($payment)):
        foreach($payment as $pay):
            $total_payment = $total_payment + $pay['credit'];
        endforeach;
        $data['payments'] = $payment;
        $data['total_payment'] = $total_payment;
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function payment_list()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $member_id = $params['member_id'];
        $mem = $this->Member_model->get_members_by_id($member_id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $pay = $this->Payment_model->get_payment_list_by_member_id($member['id']);
        $payment['payment'] = $pay[0];
        if(!empty($payment)):
            echo json_encode($payment);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function payment_details()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $payment_id = $params['payment_id'];
        $payment['payment'] = $this->Payment_model->get_payment($payment_id);
        if(empty($payment)):
            echo "Payment Details Does not Exists!";
            return;
        endif;
        if(!empty($payment)):
            echo json_encode($payment);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function my_payments_list()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        if(empty($mem)):
            echo "User Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $pay = $this->Payment_model->get_payment_list_by_member_id($member->id);
        // print_r($pay);
        $payments['payments'] = $pay;
        if(!empty($payments)):
           echo json_encode($payments);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function member_payments_list()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $soc = $this->Society_model->get_society_details($member->society_id);
        $society = $soc[0];
        // echo $society->id;die;
        $all_payments = $this->Payment_model->get_payment_list_by_society_id($society->id);
        $total_payment = 0;
        if(!empty($all_payments)):
            foreach($all_payments as $payment):
                $total_payment = $total_payment + $payment['credit'];
            endforeach;
            $all = $this->Member_model->get_all_members($society->id);
            $data['payments'] = $all_payments;
            $data['all_payments'] = $all_payments;
            $data['all_members'] = $all;
            $data['total_payment'] = $total_payment;
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function member_payment_details()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $payment_id = $params['payment_id'];
        $pay = $this->Payment_model->get_payment($payment_id);
        if(empty($pay)):
            echo "Payment Does not Exists!";
            return;
        endif;
        $payment['payment'] = $pay;
        if(!empty($payment)):
           echo json_encode($payment);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function committee_member_billing_heads()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $society_id = $params['society_id'];
        $b_heads = $this->Billing_head_model->get_bill_heads_by_society_id($society_id);
        if(empty($b_heads)):
            echo "Bill Head Does not Exists!";
            return;
        endif;
        $billing_heads['billing_heads'] = $b_heads;
        if(!empty($billing_heads)):
           echo json_encode($billing_heads);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function society_banks()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $soc = $this->Society_model->get_society_details($member->society_id);
        $society = $soc[0];
        $ban = $this->Bank_model->get_all_bank($society->id);
        $banks['banks'] = $ban;
        if(!empty($banks)):
           echo json_encode($banks);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif; 
    }

    public function society_pending_amount()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $soc = $this->Society_model->get_society_details($member->society_id);
        $society = $soc[0];
        $all = $this->Member_model->get_all_members_by_society($society->id);
        // print_r($all);
        $data['all_members'] = $all;
        $bill_details = $this->Society_model->get_all_bill_by_user($society->id);
        $data['unpaid_bills'] = $this->Society_model->get_all_bill_unpaid_by_user($society->id);
        $total_pending = 0;
        // foreach ($all as $member)
        // {
        //     $bal = $this->Member_model->get_member_current_balance($member['id']);
        //     if ($member['member_balance'] < 0):
        //         $total_pending = $total_pending + $bal;
        //     endif;
        // }
        $data['credit_notes'] = $this->Payment_model->get_credit_notes($society->id);
        $data['debit_notes'] = $this->Payment_model->get_debit_notes($society->id);
        $data['total_pending'] = $this->Member_model->get_total_outstanding_society($society->id);
        if(!empty($member)):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }
}
?>