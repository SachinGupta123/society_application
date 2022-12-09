<?php

include_once (dirname(__FILE__). "/Main.php");

class MembersController extends CI_Controller
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
        $soc = $this->Society_model->get_society_details($data['member']->society_id);
        $data['society'] = $soc[0];
        if(!empty($data)):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function service_providers()
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
        $data['society'] = $soc[0];
        $data['service_providers'] = $this->Service_provider_model->get_all_service_providers($soc[0]->id);
        // $payment = $pay;
        if(!empty($data['service_providers'])):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function get_sp_details()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $service_provider_id = $params['service_provider_id'];
        $service_provider['service_provider'] = $this->Service_provider_model->get_service_provider($service_provider_id);
        if(!empty($service_provider)):
           echo json_encode($service_provider);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function details()
    {
        $total_payment = 0;
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user($user_id);
        // $arrear = $this->Member_model->get_member_current_arrears($mem['id']);
        $arrear = $this->Member_model->get_member_current_balance($mem['id']);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $data['member'] = $mem;
        $soc = $this->Society_model->get_society_details($mem['society_id']);
        $data['society'] = $soc[0];
        $data['outstanding'] = -$arrear;
        $payments = $this->Payment_model->get_all_payment_list_by_member_id($mem['id']);
        foreach ($payments as $pay)
        {
            $total_payment = $total_payment + $pay['credit'];
        }
        // print_r($total_payment);die;
        // $data['payments'] = $payments;
        $data['payments'] = $total_payment;
        $data['total_payment'] = $total_payment;
        if(!empty($data)):
           echo json_encode($data);
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
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $total_payment = 0;
        $payments = $this->Payment_model->get_payment_history_by_member_id($member->id);
        // print_r($payments);
        if(!empty($payments) && $payments != NULL):
            foreach($payments as $pay):
                $total_payment = $total_payment + $pay['debit'];
            endforeach;
            $data['payments'] = $payments;
            $data['total_payment'] = $total_payment;
            echo json_encode($data);
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

    public function bill_generation()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $calculated_amount = 0.0;
        $total_amount = 0.0;
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $member = $mem[0];
        $b_heads = $this->Billing_head_model->get_bill_heads_by_member_society($member->society_id);
        $data['billing_head'] = $b_heads;
        foreach ($b_heads as $head)
        {
            // $data['head'] = $head;
            if($head['is_unit_value']):
                $calculated_amount = $head['amount'] * $member->flat_area;
                $total_amount += $calculated_amount;
            else:
                $calculated_amount = $head['amount'];
                $total_amount += $calculated_amount;
            endif;
            $data['total_amount'] = $total_amount;
        }
        if(!empty($b_heads)):
            echo json_encode($data);
            return;
        else:
            echo json_encode("No Record Found!");
            return;
        endif;
    }

    public function society_member_details()
    {
        $total_payment = 0;
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $member_id = $params['member_id'];
        $mem = $this->Member_model->get_member($member_id);
        $arrear = $this->Member_model->get_member_current_arrears($mem['id']);
        // print_r($arrear);die;
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        // print_r($mem);
        $member = $mem;
        // $soc = $this->Society_model->get_society_details($member['society_id']);
        // $data['society'] = $soc[0];
        $payments = $this->Payment_model->get_all_payment_list_by_member_id($member['id']);
        foreach ($payments as $pay)
        {
            $total_payment = $total_payment + $pay['credit'];
        }
        // $data['payments'] = $payments;
        $data['member'] = $member;
        $data['outstanding'] = $arrear;
        $data['payments'] = $payments;
        $data['total_payment'] = $total_payment;
        if(!empty($data)):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function bill_logs()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        $bal = $this->Member_model->get_member_current_balance($mem[0]->id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $data['member_balance'] = $bal;
        $data['bill_logs'] = $this->Bill_detail_model->get_member_bill_logs($mem[0]->id);
        if(!empty($data)):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function bill_details()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $bill_id = $params['bill_id'];
        $bill = $this->Bill_detail_model->get_bill_detail($bill_id);
        $mem = $this->Member_model->get_members_by_id($bill['member_id']);
        $member = $mem[0];
        $bal = $this->Member_model->get_member_current_balance($member['id']);
        if(empty($member)):
            echo "Bill Does not Exists!";
            return;
        endif;
        $b_d = date('Y-m-d H:i:s', strtotime($bill['bill_date']));
        $last = strtotime ( '-1 month' , strtotime ( $bill['bill_date'] ) ) ;
        $last_month = date('Y-m-d H:i:s', $last);
        $credit_notes = $this->Payment_model->get_credit_note_bill($member['id'], $last_month, $b_d);
        $data['bill'] = $bill;
        $data['bill']['details'] = unserialize($bill['details']);
        if(!empty($credit_notes)):
            $data['credit_notes'] = $credit_notes;
        else:
            $data['credit_notes'] = false;
        endif;
        $debit_notes = $this->Payment_model->get_debit_note_bill($member['id'], $last_month, $b_d);
        if(!empty($debit_notes)):
            $data['debit_notes'] = $debit_notes;
        else:
            $data['debit_notes'] = false;
        endif;
        $data['member_balance'] = $bal;
        $data['member_previous_balance'] = $this->Member_model->get_member_previous_balance($member['id']);
        if(!empty($data)):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function bill_logs_current()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        $member = $mem[0];
        $bal = $this->Member_model->get_member_current_balance($mem[0]->id);
        if(empty($member)):
            echo "Bill Does not Exists!";
            return;
        endif;
        $bill_details = $this->Bill_detail_model->get_last_bill_details_member($mem[0]->id);
        $data['bill_details'] = $bill_details[0];
        $data['bill_details']['details'] = unserialize($bill_details[0]['details']);
        $data['credit_notes'] = $this->Payment_model->get_credit_notes_member($mem[0]->id);
        $data['debit_notes'] = $this->Payment_model->get_debit_notes_member($mem[0]->id);
        $data['member_balance'] = $bal;
        $data['member_previous_balance'] = $this->Member_model->get_member_previous_balance($mem[0]->id);
        if(!empty($data)):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function bill_logs_unpaid()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $user_id = $params['user_id'];
        $mem = $this->Member_model->get_member_by_user_id($user_id);
        $bal = $this->Member_model->get_member_current_balance($mem[0]->id);
        if(empty($mem)):
            echo "Member Does not Exists!";
            return;
        endif;
        $unpaid_bills = $this->Bill_detail_model->get_all_bill_unpaid_by_member($mem[0]->id);
        $bill_details = $this->Bill_detail_model->get_all_bill_by_member($mem[0]->id);
        $data['unpaid_bills'] = $unpaid_bills;
        // print_r($data['unpaid_bills']);die;
        foreach ($data['unpaid_bills'] as $index => $rows) {
            $data['unpaid_bills'][$index]['details'] = unserialize($unpaid_bills[$index]['details']);
        }
        $data['credit_notes'] = $this->Payment_model->get_credit_notes_member($mem[0]->id);
        $data['debit_notes'] = $this->Payment_model->get_debit_notes_member($mem[0]->id);
        $data['member_balance'] = $bal;
        $data['member_previous_balance'] = $this->Member_model->get_member_previous_balance($mem[0]->id);
        if(!empty($data)):
           echo json_encode($data);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
    }

    public function generatePaypage()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);
        $bill_id = $params['bill_id'];
        $bill = $this->Bill_detail_model->get_bill_detail($bill_id);
        $mem = $this->Member_model->get_members_by_id($bill['member_id']);
        $member = $mem[0];
        if(empty($member)):
            echo "Bill Does not Exists!";
            return;
        endif;
        $soc = $this->Society_model->get_society_details($member['society_id']);
        $society = $soc[0];
        // echo json_encode(array("paypage"=>array("bill_id"=>$bill_id)));

        // return;
        $invo_path = 'https://merchants.paynet.co.in/apipaynet/generate_payment_page';

        $post = array(
            'merchant_email'=>$society->email,
            'secret_key'=>$society->secret_key,
            'currency' => 'INR',
            'country' => 'IND',
            'discount'=>0,
            'amount' => $bill['total_due'],
            'quantity'=>1,
            'unit_price'=>$bill['total_due'],
            'reference_no'=>$bill_id,
            'title'=>$member['name'],
            'site_url'=>'https://msociety.paynet.co.in',
            'products_per_title'=>'Monthly Rental',
            'email'=>$member['email_id'],
            'return_url'=>'http://msociety.paynet.co.in/bill_detail/collect_response',
            'm_first_name'=>$society->name,
            'm_last_name'=>$society->name,
            'm_phone_number'=>$society->phone_number,
            'phone_number'=>$member['phone'],
            'billing_address'=>$society->address,
            'city'=>'Vasai',
            'state'=>'Maharashtra',
            'postal_code'=>'401201',
            'ip_customer'=>'0.0.0.0',
            'ip_merchant'=>'0.0.0.0',
            'address_shipping'=>$society->address,
            'city_shipping'=>'Vasai',
            'state_shipping'=>'Maharashtra',
            'postal_code_shipping'=>'401201',
            'country_shipping'=>'Ind',
            'other_charges'=>0,
            'refno'=>$bill_id,
            'msg_lang'=>"english",
            'cms_with_version'=>'1',
        );

        $inv_data = json_encode($post);

        //var_dump($post);

        $curl = curl_init($invo_path);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($curl, CURLOPT_CAINFO,APPPATH.'cert\ssl.cer');
        // curl_setopt($curl, CURLOPT_CAPATH,APPPATH.'cert\ssl.pem');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $info = curl_getinfo($curl);


        $resp = json_decode($response);
        // var_dump($response);

        // print_r($resp);die;

        $result = $resp->result;
        $resp_code = $resp->response_code;
        $url1['pay_url'] = $resp->payment_url;
        $p_id = $resp->p_id;
        $bill['bill_payment_id'] = $p_id;

        $this->Bill_detail_model->update_bill_detail($bill_id, $bill);

        // $this->Bill_detail_model->update_bill_detail($bill_id, $url1);
        if(!empty($resp)):
           echo json_encode($url1);
            return;
        else:
            echo json_encode("No Rocord Found!");
            return;
        endif;
        // echo json_encode($resp);
        return;
    }

    public function get_member_list()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        // echo json_encode(file_get_contents("php://input")) ;return;exit;die; 
        $request = json_decode(file_get_contents("php://input"),true);

        $user_id = $request['user']['user_id'];
        $user = $this->User_model->get_user($user_id);

        $society_id = $user['society_id'];
        $members = $this->Member_model->get_all_members($society_id);

         echo json_encode($members);return;
    }

    public function get_member()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        // echo json_encode(file_get_contents("php://input")) ;return;exit;die; 
        $request = json_decode(file_get_contents("php://input"),true);

        $member_id = $request['user']['member_id'];
        
        $member = $this->Member_model->get_member($member_id);
        $user = $this->User_model->get_user($member['user_id']);
        // $society_id = $user['society_id'];
        // $members = $this->Member_model->get_all_members($society_id);

         echo json_encode($user);return;
    }

    public function get_member_info()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        // echo json_encode(file_get_contents("php://input")) ;return;exit;die; 
        $request = json_decode(file_get_contents("php://input"),true);

        $user_id = $request['user']['user_id'];
        $user = $this->User_model->get_user($user_id);
        $member = $this->Member_model->get_member_by_user($user_id);
        // echo json_encode($member);return;
        $society_id = $member['society_id'];
        $society = $this->Society_model->get_society($society_id);
        $members = array(
            'entity_name' => $member['name'],
            'entity_unit' => $member['wing'].'/'.$member['flat_no'],
            'add_1' => $society['name'],
            'add_2' => $society['address'],
        );
         echo json_encode($members);return;
    }
}
?>