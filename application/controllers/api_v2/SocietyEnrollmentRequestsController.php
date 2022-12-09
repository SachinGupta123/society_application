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
        $this->load->model('Bank_transaction_model');
    }

    public function create()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        // parse_str($url['query'], $params);
        // $user_id = $params['user_id'];
        // echo $user_id;

        $data = $this->input->post();
		// echo json_encode($data);die;return;
		if(empty($data['name']) || empty($data['email']) || empty($data['society_name']))
		{
			$resp = array(
                'response_code'=>'1003',
                'message'=>'Data is missing please check!!',
            );
            echo json_encode($resp);
            return;
		}
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
        $params['role'] = $data["role"];
        $params['no_of_units'] = $data["units"];

        if($this->db->insert('society_enrollment_requests', $params)):
            $dat['success'] = true;
            $dat['message'] = 'Enrollment Request Sent Successfully';
            echo json_encode($dat);
            return;
        else:
            $resp = array(
                'response_code'=>'1002',
                'message'=>'There is some Error',
            );
            echo json_encode($resp);
            return;
        endif;
    }

    public function add_society()
    {
		// echo json_encode($_POST);return;
		if($_POST)     
        {
            $channel_partner_user_id = $this->input->post('channel_partner_user_id');
        	$post['how_you_know'] = 'ManageMod';
        	$post['web_url'] = 'msociety.paynet.co.in';
        	$post['web_desc'] = 'msociety';
        	$post['email'] = $this->input->post('society_email');
        	$post['f_name'] = $this->input->post('society_name');
        	$post['store_name'] = $this->input->post('society_name');
        	$post['password'] = 'PaySociety@123';
        	$post['country_code'] = '0091';
        	$post['from_api'] = 'true';
        	$post['phone_number'] = $this->input->post('phone_number');

        	$reg_path = 'https://develop.paynet.co.in/user/authenticate_registeration/';

        	// $reg_data = json_encode($post);

			$curl = curl_init($reg_path);

			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			$info = curl_getinfo($curl);
           	$resp = json_decode($response,true);

        	if(empty($resp['secret_key']) || $resp['secret_key'] == NULL):
        		$message['text'] = "Unable to Create API Key, Please check your input!!";
        		$message['status'] = "Fail";
        		echo json_encode($message);
            else:
	            $params = array(
					'name' => $this->input->post('society_name'),
					'phone_number' => $this->input->post('phone_number'),
					'email' => $resp['email'],
					'secret_key' => $resp['secret_key'],
					'address' => $this->input->post('society_address'),
					'registration_no' => $this->input->post('society_reg_no'),
					'gstin' => $this->input->post('gstin'),
					'is_gst' => $this->input->post('is_gst'),
					'opening_balance' => $this->input->post('society_opening_bal'),
					'no_of_flats' => $this->input->post('no_of_flats'),
					'auto_create_bill' => $this->input->post('auto_bill'),
					'bill_day' => $this->input->post('bill_day'),
					'due_day' => $this->input->post('due_day'),
					'interest_type' => $this->input->post('interest_type'),
					'interest_span' => $this->input->post('interest_span'),
					'interest_rate' => $this->input->post('interest_rate'),
					'noc_charge' => $this->input->post('noc_charge'),
					'noc_unit_value' => $this->input->post('noc_unit_value'),
					// 'image_file_name' => $this->input->post('image_file_name'),
					'created_at' => date('Y-m-d H:i:s'),
					// 'image_updated_at' => $this->input->post('image_updated_at'),
					'full_mode' => $this->input->post('full'),
					'bill_payments' => $this->input->post('bill_payment'),
					'accounting' => $this->input->post('accounting'),
					'gatekeeper' => $this->input->post('gatekeeper'),
					'vms' => $this->input->post('vms'),
	            );
	            // if($this->input->post('full')):
	            // 	$params['full_mode'] = $this->input->post('full');
	            // elseif($this->input->post('bill_payment')):
	            // 	$params['bill_payments'] = $this->input->post('bill_payment');
	            // elseif($this->input->post('accounting')):
	            // 	$params['accounting'] = $this->input->post('accounting');
	            // elseif($this->input->post('gatekeeper')):
	            // 	$params['gatekeeper'] = $this->input->post('gatekeeper');
	            // elseif($this->input->post('vms')):
	            // 	$params['vms'] = $this->input->post('vms');
	            // endif;
	            //$data['image_file_name'] = $this->input->post('image_file_name', TRUE);
				// $data['pic_desc'] = $this->input->post('pic_desc', TRUE);
	 
				//file upload code 
				//set file upload settings 
				// $config['upload_path']          = APPPATH. '../assets/uploads/';
				// $config['allowed_types']        = 'gif|jpg|png|pdf';
				// $config['max_size']             = 1000000;
				// $config['max_hieght']             = 150;
				// $config['max_width']             = 150;

				// var_dump($config);
	 
				// $this->load->library('upload', $config);

				// $this->upload->initialize($config);
	 
				// if(!$this->upload->do_upload('image'))
				// 	{
				// 		$error = array('error' => $this->upload->display_errors());
				// 		$this->load->view('societies/add_society', $error);
				// 		var_dump($error);
				// 		// die("Tere Lag Gaye");
				// 	}
				// else
				// 	{
					// $this->upload->do_upload('image');
				//file is uploaded successfully
				//now get the file uploaded data 
				// $upload_data = $this->upload->data();
 
				//get the uploaded file name
				// $params['image_file_name'] = $upload_data['file_name'];
 
				//store pic data to the db
				// $this->pic_model->store_pic_data($params);
            
            	if($society_id = $this->Society_model->add_society($params)):
            		$op_bal = $this->input->post('society_opening_bal');
            		$society_id = $society_id;
            		$bt = array(
            			'society_id' => $society_id,
            			'credit' => $op_bal,
            			'narration' => 'opening_balance',
            			'is_cash' => 1,
            			'balance' => $op_bal,
            			'date' => date('Y-m-d H:i:s'),
            		);
            		$this->Bank_transaction_model->add_bank_transaction($bt);

            		if($this->session->userdata('role') == 'channel_partner')
            		{
	            		$par = array(
		                    'user_id' => $channel_partner_user_id,
		                    'role_id' => 5,
		                    'society_id' => $society_id,
		                    'created_at' => date('Y-m-d H:i:s'),
		                );

		        		$society_access_id = $this->Society_access_model->add_society_access($par);
            		}
            		
	            	$message['text'] = "Society Added successfully!!";
                    $message['status'] = "Success";
                    $message['data'] = array(
                        'society_id'=>$society_id,
                    );
                    echo json_encode($message);
                else:
                    $message['status'] = "Fail";
	        		$message['text'] = "Please Check Your Input!!";
	        		echo json_encode($message);
	            endif;
		    endif;
        }
        else
        {            
            $resp = array(
                'response_code'=>'1001',
                'message'=>'Unable to add society!!',
            );
            echo json_encode($resp);
            return;
        }
	}
}
?>