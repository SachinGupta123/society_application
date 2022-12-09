<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Societies extends CI_Controller
{

	function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Society_model');
        $this->load->model('CityState_model');
        $this->load->helper(['url', 'language']);
        $this->load->model('Member_model');
        $this->load->model('Payment_model');
        $this->load->model('User_model');
        $this->load->model('Bank_transaction_model');
        $this->load->model('Bank_model');
        $this->load->model('Service_provider_model');
        $this->load->model('Expense_category_model');
        $this->load->model('Bill_detail_model');
        $this->load->model('Society_access_model');
        $this->load->model('Expense_model');
        $this->load->model('Ion_auth_model');
		$this->load->model('Parking_charge_model');		
        $this->load->library(['ion_auth', 'form_validation']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');

		// $this->load->add_package_path(APPPATH . 'third_party/rabbitmq');
		// $this->load->library('Rabbitmq_client');
		// $this->load->remove_package_path(APPPATH . 'third_party/rabbitmq');
    }
	
	public function view_society()
	{
		$da = $this->session->userdata();
		$data = array(
			'title' => "Societies"
		);
		
		if($this->session->userdata('role') == 'operator' || $this->session->userdata('role') == 'channel_partner'|| $this->session->userdata('role') == 'CA'):
			
			$data['total_societies'] = $this->Society_access_model->get_all_society_accesses_by_user($da['user_id']);
			$data['total_society'] = count($data['total_societies']);
			foreach ($data['total_societies'] as $soc) {
				$society_ids[] = $soc['society_id'];
			}
			if(count($data['total_societies']) > 0)
			{

				$data['total_members'] = $this->db->where_in('society_id',$society_ids)->get('members')->num_rows();
			}
			else{
				$data['total_members'] = 0;
			}
			$access_id = array();
			$access = $this->Society_access_model->get_all_society_accesses_by_user($da['user_id']);
			foreach($access as $a){
				$access_id[] = $a['society_id'];
			}
			$society_ids = $access_id;
			
			if($society_ids):
				$data['societies'] = $this->db->where_in('id',$society_ids)->order_by('id', 'desc')->get('societies')->result_array();

				foreach($data['societies'] as $x => $val){
					$member_count=$this->Member_model->get_members_count_society($val["id"]);
					if($member_count>0){
						$data['societies'][$x]["no_of_flats"]=$member_count;
					}
				}
				
			endif;
		elseif($this->ion_auth->is_admin()):
			$data['societies'] = $this->Society_model->get_all_societies();
			foreach($data['societies'] as $x => $val){
				$member_count=$this->Member_model->get_members_count_society($val["id"]);
				if($member_count>0){
					$data['societies'][$x]["no_of_flats"]=$member_count;
				}
			}
			$data['total_society'] = count($data['societies']);
			$data['total_members'] = $this->Member_model->get_members_count();
		endif;
        $data['_view'] = 'society/index';
        $this->load->view('societies/view_society',$data);
	}

	public function user_access_society_list($user_id)
	{
		
		$data = array(
			'title' => "Societies"
		);
		
		$data['total_societies'] = $this->Society_access_model->society_access_list($user_id);		
		$this->load->view('societies/society_list',$data);	
	
	}


	public function add_society() {
		$data = array(
			'title' => "Societies"
		);
		
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('society_name','Name','required');
		$this->form_validation->set_rules('society_address','Address','required');
		$this->form_validation->set_rules('society_reg_no','Registration No','required');
		$this->form_validation->set_rules('society_email','Society Email','trim|required|valid_email');
		
		if($this->form_validation->run())     
        {
			
        	$post['how_you_know'] = $this->input->post('how_you_now');
        	$post['web_url'] = $this->input->post('web_url');
        	$post['web_desc'] = $this->input->post('web_desc');
        	$post['email'] = $this->input->post('society_email');
        	$post['f_name'] = $this->input->post('society_name');
        	$post['store_name'] = $this->input->post('society_name');
        	$post['password'] = $this->input->post('password');
        	$post['country_code'] = $this->input->post('country_code');
        	$post['from_api'] = $this->input->post('from_api');
        	$post['phone_number'] = $this->input->post('phone_number');

        	$reg_path = 'https://merchants.paynet.co.in/user/authenticate_registeration1/';
             
        	$reg_data = json_encode($post);
			if(in_array($_SERVER['HTTP_HOST'], array('msociety.paynet.co.in'))){

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
			}else{
				$resp['email']=$this->input->post('society_email');
				$resp['secret_key']="123";//tempory secret key local
			}	

			
        	if(empty($resp['secret_key']) || $resp['secret_key'] == NULL):
        		$data['_view'] = 'society/add';
        		$message['text'] = "Please Check Your Input!!";
        		$message['status'] = "Fail";
        		$this->session->set_flashdata('message', $message);
            	$this->load->view('societies/add_society',$data);
            else:
				
	            $params = array(
					'name' => $this->input->post('society_name'),
					'phone_number' => $this->input->post('phone_number'),
					'email' => $resp['email'],
					'secret_key' => $resp['secret_key'],
					'address' => $this->input->post('society_address'),
					'city_id' => $this->input->post('city'),
					'state_id' => $this->input->post('state'),
					'area' => $this->input->post('area'),
					'pincode' => $this->input->post('pincode'),
					'registration_no' => $this->input->post('society_reg_no'),
					'gstin' => $this->input->post('gstin'),
					'is_gst' => $this->input->post('is_gst')!=''? $this->input->post('is_gst'):0,
					'opening_balance' => $this->input->post('society_opening_bal'),
					'no_of_flats' => $this->input->post('no_of_flats'),
					'auto_create_bill' => $this->input->post('auto_bill'),
					'bill_day' => $this->input->post('bill_day'),
					'due_day' => $this->input->post('due_day'),
					'interest_type' => $this->input->post('interest_type'),
					'interest_span' => $this->input->post('interest_span'),
					'interest_rate' => $this->input->post('interest_rate')!=''? $this->input->post('interest_rate'):0,
					'noc_charge' => $this->input->post('noc_charge'),
					'noc_unit_value' => $this->input->post('noc_unit_value'),
					'image_file_name' => $this->input->post('image_file_name'),
					'created_at' => date('Y-m-d H:i:s'),
					'image_updated_at' => $this->input->post('image_updated_at'),
					'full_mode' => $this->input->post('full'),
					'bill_payments' => $this->input->post('bill_payment'),
					'accounting' => $this->input->post('accounting'),
					'gatekeeper' => $this->input->post('gatekeeper'),
					'vms' => $this->input->post('vms'),
					'interest_on_bill_frequency' => $this->input->post('on_freq'),
					'interest_bill_frequency' => $this->input->post('bill_int_freq'),
					'fixed_interest'=>$this->input->post("fixed_interest_amount")!=''?$this->input->post('fixed_interest_amount'):0,
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
				$config['upload_path']          = APPPATH. '../assets/uploads/';
				$config['allowed_types']        = 'gif|jpg|png|pdf';
				$config['max_size']             = 1000000;
				// $config['max_hieght']             = 150;
				// $config['max_width']             = 150;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
	 
				// if(!$this->upload->do_upload('image'))
				// 	{
				// 		$error = array('error' => $this->upload->display_errors());
				// 		$this->load->view('societies/add_society', $error);
				// 		var_dump($error);
				// 		// die("Tere Lag Gaye");
				// 	}
				// else
				// 	{
					$this->upload->do_upload('image');
				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();
 
				//get the uploaded file name
				$params['image_file_name'] = $upload_data['file_name'];
 
				//store pic data to the db
				// $this->pic_model->store_pic_data($params);
				// $this->db->trans_start();
				$society_id = $this->Society_model->add_society($params);
				
            	if($society_id!=''):
            		$op_bal = $this->input->post('society_opening_bal');
            		// $society_id = $society_id;
					// if (date('m') > 6) {
					// 	$year = date('Y')."-".(date('Y') +1);
					// }
					// else {
					// 	$year = (date('Y')-1)."-".date('Y');
					// }
					if(date('n')<=3){
						$finacial_start =date('Y', strtotime('-1 years'))."-04-01";
						$finacial_end =date('Y')."-03-31";
					}else{
						$finacial_start =date('Y')."-04-01";
						$finacial_end =(date('Y') +1)."-03-31";
					}

            		$bt = array(
            			'society_id' => $society_id,
            			'credit' => $op_bal,
            			'narration' => 'opening_balance',
            			'is_cash' => 1,
            			'balance' => $op_bal,
            			// 'date' => date('Y-m-d H:i:s'),
						'date'=>$finacial_start." ".date("H:i:s"),
            		);
            		$this->Bank_transaction_model->add_bank_transaction($bt);

            		if($this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA'):            		
	            		$par = array(
		                    'user_id' => $this->session->userdata('user_id'),
		                    // 'role_id' => 16,
		                    'society_id' => $society_id,
		                    'created_at' => date('Y-m-d H:i:s'),
		                );
						if($this->session->userdata('role') == 'CA'){
							$par["role_id"]=16;
						}
						if($this->session->userdata('role') == 'channel_partner'){
							$par["role_id"]=5;
						}

		        		$society_access_id = $this->Society_access_model->add_society_access($par);
            		endif;
					//create account//
					$prefix="ms_".$society_id;
					
					$param=[
						'label' =>str_replace(' ', '',$this->input->post('society_name')),
						//'prefix' => strval($society_id),
						'prefix' => $prefix,
						'name' =>$this->input->post('society_name'),
						'email' => $this->input->post('society_email'),
						'address' => $this->input->post('society_address'),
						'fy_start' => $finacial_start,
						'fy_end' => $finacial_end
					];
					$create_account=$this->ledger->account($society_id,$param);	
					if($create_account!=0){
						$cash_ledger_id=$this->ledger->create_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details",$this->input->post('society_opening_bal'),8,"D");						
						$noc_ledger_id=$this->ledger->create_ledger("NOC Charge","NOC Charge",$society_id,"sc_acc_details",0,18,"C");

						$interest=$this->ledger->create_ledger("Interest","Interest",$society_id,"sc_acc_details",0,18,"C");

						$tax=$this->ledger->create_ledger("Tax","Tax",$society_id,"sc_acc_details",0,11,"C");
						$message['text'] = "Society Added successfully!!";
						$message['status'] = "Success";
					}else{
						$message['text'] = "Society Added successfully but account not created!!";
						$message['status'] = "Fail";
					}				

					// $this->db->trans_complete();
					
					$this->session->set_flashdata('message', $message);					
					redirect('societies');						
					
					// account end
	            else:
					
					// $this->db->trans_rollback();
	            	$data['_view'] = 'society/add';
	        		$message['text'] = "Unable to Save Society!!";
	        		$message['status'] = "Fail";
	        		$this->session->set_flashdata('message', $message);
	            	// $this->load->view('societies/add_society',$data);
					redirect('societies/add_society');
	            endif;
		    endif;
        }
        else
        {
					
			$data['cities'] = $this->CityState_model->get_all_city();
			$data['states'] = $this->CityState_model->get_all_state();
            $data['_view'] = 'society/add';
            $this->load->view('societies/add_society',$data);
        }
	}

	public function edit_society($id = '' )
	{
		if($id == ''){
            $id = $this->input->post('society_id');
        }
        $data = array(
            'title' => "Edit Society"
        );
        // check if the Society exists before trying to edit it
        $data['society'] = $this->Society_model->get_society($id);
		
        if(isset($data['society']['id']))
        {
            $this->load->library('form_validation');
			$this->form_validation->set_rules('society_name','Name','required');
			$this->form_validation->set_rules('society_address','Address','required');
			$this->form_validation->set_rules('society_reg_no','Registration No','required');
		
			if($this->form_validation->run())     
        	{   
				
            	$params = array(
					'name' => $this->input->post('society_name'),
					'address' => $this->input->post('society_address'),
					'city_id' => $this->input->post('city'),
					'state_id' => $this->input->post('state'),
					'area' => $this->input->post('area'),
					'pincode' => $this->input->post('pincode'),
					'registration_no' => $this->input->post('society_reg_no'),
					'gstin' => $this->input->post('gstin'),
					'is_gst' => $this->input->post('is_gst'),
					// 'opening_balance' => $this->input->post('society_opening_bal'),
					'no_of_flats' => $this->input->post('no_of_flats'),
					'auto_create_bill' => $this->input->post('auto_bill'),
					'bill_day' => $this->input->post('bill_day'),
					'due_day' => $this->input->post('due_day'),
					'interest_type' => $this->input->post('interest_type'),
					'interest_span' => $this->input->post('interest_span'),
					'interest_rate' => $this->input->post('interest_rate'),
					'noc_charge' => $this->input->post('noc_charge'),
					'noc_unit_value' => $this->input->post('noc_unit_value'),
					//'image_file_name' => $this->input->post('image'),
					'updated_at' => $this->input->post('updated_at'),
					'image_updated_at' => $this->input->post('image_updated_at'),
					'full_mode' => $this->input->post('full'),
					'bill_payments' => $this->input->post('bill_payment'),
					'accounting' => $this->input->post('accounting'),
					'gatekeeper' => $this->input->post('gatekeeper'),
					'vms' => $this->input->post('vms'),
					'interest_on_bill_frequency' => $this->input->post('on_freq'),
					'interest_bill_frequency' => $this->input->post('bill_int_freq'),
            	);

            	//$data['image_file_name'] = $this->input->post('image_file_name', TRUE);
				// $data['pic_desc'] = $this->input->post('pic_desc', TRUE);
 
				//file upload code 
				//set file upload settings 
				if(isset($_FILES['image'])):
					$config['upload_path']          = APPPATH. '../assets/uploads/';
					$config['allowed_types']        = 'gif|jpg|png|pdf';
					$config['max_size']             = 1000000;

					// var_dump($config);
	 
					$this->load->library('upload', $config);

					$this->upload->initialize($config);
	 
					// if(!$this->upload->do_upload('image'))
					// {
					// 	$error = array('error' => $this->upload->display_errors());
						
					// 	redirect('societies/edit_society/'.$id, $error);
					// }
					// else
					// {
						$this->upload->do_upload('image');
						//file is uploaded successfully
						//now get the file uploaded data 
						$upload_data = $this->upload->data();
						
						//get the uploaded file name
						$params['image_file_name'] = $upload_data['file_name'];		      
	        		// }
        		endif;

        		if($society_id = $this->Society_model->update_society($id,$params)):
					// if(!empty($this->input->post('society_opening_bal'))){
					// 	$cash_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$id,"sc_acc_details",0);						
					// 	$ledger_details=$this->ledger->get_accounting_ledger_group_id($id,$cash_ledger_id);						
					// 	$cash=$this->ledger->accounting_ledger_update($id,$cash_ledger_id,$ledger_details->group_id,$ledger_details->name,"C",$this->input->post('society_opening_bal'));//$id=society_id,0 ie.flat_id , bil_id
					// }					
					
        			$message['text'] = "Society Updated successfully!!";
		        	$message['status'] = "Success";
		        	$this->session->set_flashdata('message', $message);
        			redirect('societies',$data);
        		else:
        			$message['text'] = "Please Check Your Input!!";
				    $message['status'] = "Fail";
				    $this->session->set_flashdata('message', $message);
				    redirect('societies',$data);
				endif;
        	}
        	else
        	{  
				//get cash opening balance -01-03-2021
				$cash_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$id,"sc_acc_details",0);	
				if($cash_ledger_id!=0){
					$ledger_details=$this->ledger->get_accounting_ledger_group_id($id,$cash_ledger_id);
					$data['cash_opening_balance']=$ledger_details;
				}
				$data['cities'] = $this->CityState_model->get_all_city();
				$data['states'] = $this->CityState_model->get_all_state();            
            	$data['_view'] = 'society/edit';
            	$this->load->view('societies/society_actions/edit_society',$data);
        	}
        }
        else
        {
        	$message['text'] = "Please Check Your Input!!";
			$message['status'] = "Fail";
			$this->session->set_flashdata('message', $message);
			redirect('societies',$data);
		}
	}

	public function society_details($id) {
		
		$data = array(
			'title' => "Societies"
		);

		if(!$this->ion_auth->is_admin()){

			$society_access = $this->Society_access_model->check_existing_access($this->session->userdata('user_id'),$this->session->userdata('role_id'),$id);			
			if(empty($society_access))
			{
				show_error('Please contact administrator for access society.');
				exit();
			}			
		}
		

		$society = $this->Society_model->get_society_details($id);
		$data['members'] = $this->Member_model->get_members_society($id);
		$data['banks'] = $this->Bank_model->get_all_bank($id);        
		$all_transaction= $this->Payment_model->get_payment_list_by_society_id($id);
        $cheque_array=[];
		$cash_array=[];
		$online_array=[];
        foreach($all_transaction as $value){
			if($value["paid_by"]=="cash" || $value["paid_by"]=="Cash" )
			 	$cash_array[]=$value;
			else if($value["paid_by"]=="Cheque" || $value["paid_by"]=="cheque"||$value["paid_by"]=="neft" || $value["paid_by"]=="Neft" )
				$cheque_array[]=$value;
			else if($value["paid_by"]=="Online" || $value["paid_by"]=="online")
				$online_array[]=$value;
		}
		$data['online_transaction']=$online_array;
		$data['cash_transaction']=$cash_array;
		$data['cheque_transaction']=$cheque_array;
		$data['expenses'] = $this->Expense_model->get_all_expense($id);
		$data['flat_outstanding']= $this->Society_model->get_all_bill_unpaid_for_report($id);
		
		foreach($society as $rows){
			
			$data['service_providers'] = $this->Service_provider_model->get_service_providers_count_society($rows->id);
			$data['member_count'] = $this->Member_model->get_members_count_society($rows->id);
			if($rows->full_mode == 1):
				$outstanding = $this->Member_model->get_total_outstanding_society($rows->id);
			else:
				$outst = $this->Member_model->get_total_outstanding_bill($rows->id);
				if($outst==0){
					$outstanding = 0;
				}else{
					$outstanding = $outst['total_due'];
				}
				
			endif;
			$revenue = $this->Payment_model->get_total_revenue_by_society_id($rows->id);
			$data['outstanding'] = $outstanding;
			$data['total_revenue'] = $revenue;
			$months = array();
			$income = array();
			$expense = array();
			$income_expense = $this->Society_model->get_income_expense($rows->id);
      		foreach($income_expense as $k=>$v){
        		$months[] = $k;
        		$income[] = $v['income'];
        		$expense[] = $v['expense'];
      		}

      		$data['month'] = $months;
      		$data['income'] = $income;
      		$data['expense'] = $expense;
      
			$data['society'] = $rows;
			$data['bill_months'] = $this->Bill_detail_model->get_bill_month_bill_by_socioety($rows->id);
		}
		
		if($this->ion_auth->is_admin()|| $this->session->userdata('role') == 'operator'){
			$this->load->view('societies/society_details_admin', $data);
			
		}else if(!$this->ion_auth->is_admin() && $this->session->userdata('role') == 'channel_partner' ){			
			$this->load->view('societies/society_details_cp', $data);
			
		}
		else if($this->session->userdata('role') == 'CA'){
			$this->load->view('societies/ca_dashboard', $data);		
		}
		else{
			$this->load->view('societies/society_details', $data);
		}
		
	}
	

	// create 30-12-2021 created by pradeep bhosle 
	public function society_single_payment() {
		$society_id=$this->uri->segment(3);
		$data = array(
			'title' => "Societies"
		);
		$society = $this->Society_model->get_society_details($society_id);
		
		$data['society'] = $society[0];
		$data['members'] = $this->Member_model->get_members_society($society_id);
		$data['banks'] = $this->Bank_model->get_all_bank($society_id);
	
		$this->load->view('societies/society_single_payment', $data);
			
	
		
	}

	// create 31-12-2021 created by pradeep bhosle 
	public function society_bill_generate() {
		$society_id=$this->uri->segment(3);
		$data = array(
			'title' => "Societies"
		);
		$society = $this->Society_model->get_society_details($society_id);
		
		$data['society'] = $society[0];
		$data['members'] = $this->Member_model->get_members_society($society_id);
		$data['banks'] = $this->Bank_model->get_all_bank($society_id);

		$data['bill_month'] = $this->Bill_detail_model->get_bill_month_bill_by_socioety($society_id);

		$this->load->view('societies/society_bill_gen', $data);
			
	
		
	}

	

	public function remove($id)
    {
        $society = $this->Society_model->get_society($id);
        if(isset($society['id']))
        {

			$society_delete=$this->ledger->account_delete($id);
			if($society_delete=="1"){
				$this->Society_model->delete_society($id);			 
				echo "1";
			}else{
				echo "0";
			}
        }
        else
            show_error('The society you are trying to delete does not exist.');
    }

    public function delete_members_by_society($id)
    {
        $society = $this->Society_model->get_society($id);
        // check if the society exists before trying to delete it
        if(isset($society['id']))
        {
            $this->Member_model->delete_members_by_society_id($id);
            redirect('societies/details'.'/'.$id);
        }
        else
            show_error('The Members you are trying to delete does not exist.');
    }

    public function delete_last_bill($id)
    {
      	$society = $this->Society_model->get_society($id);
 		$last_bill = $this->Bill_detail_model->get_last_bill_by_society($id);
		
 		$last_payment = $this->Payment_model->get_payment_by_date_society($last_bill[0]['bill_date'], $id);
 		
        // check if the bill exists before trying to delete it
        if(empty($last_bill))
        {
           
		   $message['status'] = 'Fail';
		   $message['text'] = "There are no bills to delete";
        }
        elseif(!empty($last_payment) || $last_payment != NULL)
        {
        	
			$message['status'] = 'Fail';
			$message['text'] = "These bills cannot be deleted.";
        }
        elseif(!empty($last_bill) || $last_bill != NULL)
        {
            if(!empty($last_payment) || $last_payment != NULL){
				
				$message['status'] = 'Fail';
				$message['text'] = "These bills cannot be deleted.";
			}else{
				
				$ret = $this->Bill_detail_model->delete_latest_bill($id);
			
				$message['status'] = 'Success';
				$message['text'] = "Bills have been deleted ";
			}
			
           
		
        }
		
		$this->session->set_flashdata('message',$message );

    }
	
	public function view_cash_in_hand() {
		$data = array();
		$society_id = $this->uri->segment(3);
		// $data['cash_in_hand'] = $this->Bank_transaction_model->get_transaction_by_society($society_id);
		$data['cash_in_hands'] = $this->Bank_transaction_model->get_all_transaction_by_society($society_id);
		$data['banks'] = $this->Bank_model->get_all_bank($society_id);
		$data['society']= $society = $this->Society_model->get_society($society_id);
		
		$data['title'] = $society['name']." Cash in Hand";

		
		// $data['service_providers'] = $this->Service_provider_model->get_all_service_providers($society_id);
		// $data['expense_categories'] = $this->Expense_category_model->get_all_expense_categories();

		$accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);
		if(!empty($accounting_db_details)){
			//get cash transaction from accounting
			$cash_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details");		
			if($cash_ledger_id!=0){
				// $data['cash_transaction']=$this->ledger->ledger_transaction($society_id,$cash_ledger_id);
				$cash_transaction=$this->ledger->ledger_transaction($society_id,$cash_ledger_id);
				$cash_transaction->opening_balance[0]->date=date("Y")."-04-01";
				
				$cash_transaction->opening_balance[0]->amount=$cash_transaction->opening_balance[0]->op_balance;
				$cash_transaction->opening_balance[0]->dc=$cash_transaction->opening_balance[0]->op_balance_dc;
				// $data['cash_transaction']= (object) array_merge((array) $cash_transaction->opening_balance, (array) $cash_transaction->transaction);

				$ledger_data=array_merge((array) $cash_transaction->opening_balance, (array) $cash_transaction->transaction);

				// usort($ledger_data, function($a, $b) {
				// 	return (abs(strtotime('today') - strtotime($a->date))
				// 		- (abs(strtotime('today') - strtotime($b->date))));
				// });
				
				
				$data['cash_transaction']=$ledger_data;
				
			}
				
			
		}

		$this->load->view('societies/commercials/view_cash_in_hand', $data);
	}

	public function new_cash_transfer()
	{
		$data = array(
			'title' => "Societies"
		);
		$society_id = $this->input->post('society_id');
		$society = $this->Society_model->get_society($society_id);
		$amount = $this->input->post('amount');
		$bank_id = $this->input->post('bank');
		$description = $this->input->post('description');
		$payment_date = $this->input->post('payment_date');	
		
		if(!empty($amount) && !empty($bank_id) && !empty($payment_date) &&!empty($description)){
			$payment_date = date("Y-m-d",strtotime($payment_date));		
			$trans = $this->cash_transfer($society, $amount, $bank_id, $description, $payment_date);

			if($trans == True):
				//checking society accounting details present or not-03-03-2022
				$accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
				if(!empty($accounting_db_details)){
					$bank_ledger_id=$this->ledger->get_ledger("bank","bank",$society_id,"sc_bank_acc_details",$bank_id);
					$cash_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details",0);
					$this->ledger->accounting_double_entry($society_id,3,date('Y-m-d'),$description,$amount,$bank_ledger_id,$cash_ledger_id);

				}
				
				$message['text'] = "Transferred to bank successfully!!";
				  $message['status'] = "Success";
				  $this->session->set_flashdata('message', $message);
				exit(json_encode(array(
					'errorMsg' => 'Amount transferred successfully from cash to bank.'
				)));
			elseif($trans == False):
				$message['text'] = "Please Check Your Input!!";
				  $message['status'] = "Fail";
				  $this->session->set_flashdata('message', $message);
				exit(json_encode(array(
					'errorMsg' => 'Transfer amount is greater than cash balance.Could not transfer the amount..'
				)));
			endif;
		}else{
			
			$message['text'] = "Please Check Your Input!!";
				  $message['status'] = "Fail";
				  $this->session->set_flashdata('message', $message);
				exit(json_encode(array(
					'errorMsg' => 'Transfer amount is greater than cash balance.Could not transfer the amount..'
				)));
		}
	
		
	}

	function cash_transfer($society, $amount, $bank_id, $description, $payment_date)
	{
		$bank_id = $bank_id;
		$society = $society;
		$amount = $amount;
		$description = $description;
		$payment_date = $payment_date;
		$bank = $this->Bank_model->get_bank($bank_id);
		$last_transaction = $this->Bank_transaction_model->get_transaction_by_society($society['id']);
		$last_balance = $last_transaction != NULL ? $last_transaction[0]['balance'] : NULL;
		$last_bank_transaction = $this->Bank_transaction_model->get_transaction_by_bank($bank_id);
		$last_bank_balance = $last_bank_transaction != NULL ? $last_bank_transaction[0]['balance'] : NULL;

		if($amount < $last_balance || $amount == $last_balance):
			$excess = True;
			$params['debit'] = $amount;
			$params['balance'] = $last_balance != Null ? $last_balance - $amount : 0;
			$params['is_cash'] = 1;
			$params['society_id'] = $society['id'];
			$params['bank_id'] = $bank_id;
			$params['narration'] = "Transfer to-". $bank['bank_name']." ".$description;
			$params['date'] = $payment_date;

			if($this->Bank_transaction_model->add_bank_transaction($params)):
				$param['credit'] = $amount;
				$param['balance'] = $last_bank_balance != Null ? $last_bank_balance + $amount : $bank['opening_balance'] + $amount;
				$param['is_cash'] = 0;
				$param['society_id'] = $society['id'];
				$param['bank_id'] = $bank_id;
				$param['narration'] = "Transfer from Cash in Hand";
				$param['date'] = $payment_date;
				if($this->Bank_transaction_model->add_bank_transaction($param)):
					$data['current_balance'] = $last_bank_balance != Null ? $last_bank_balance + $amount : $bank['opening_balance'] + $amount;
					$id = $bank['id'];
					
					$b = $this->Bank_model->update_bank($id, $data);
				endif;
				
			endif;
			return $excess;
		else:
			$excess = False;
			// echo "kaha";
		endif;
	}

	public function new_cash_expense()
	{
		$data = array(
			'title' => "Societies"
		);
		$society_id = $this->input->post('society_id');
		$society = $this->Society_model->get_society($society_id);
		$amount = $this->input->post('amoun');
		$service_provider = $this->input->post('service_provider');
		$expense_categorie = $this->input->post('expense_categorie');
		$description = $this->input->post('descriptio');
		$payment_date = $this->input->post('payment_dat');
		if(empty($service_provider)&&empty($expense_categorie)){
			$message['text'] = "Please Select service provider or expense category!!";
			$message['status'] = "Fail";
			$this->session->set_flashdata('message', $message);
		}else{
			if(!empty($amount)&&!empty($description)&& !empty($payment_date)&&(!empty($service_provider)||!empty($expense_categorie))){
				$cash_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details",0);
				$exp = $this->cash_expense($society, $amount, $service_provider, $expense_categorie, $description, $payment_date);
				if($exp == True):
					//checking society accounting details present or not-03-03-2022
					$accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
					if(!empty($accounting_db_details)){
						// accounting part vendor ledger and double entry 
						if(!empty($this->input->post('service_provider')))
						{
							
							$get_provider=$this->Expense_model->get_provider($service_provider);	
						
							$check_provider_ledger_id=$this->ledger->get_ledger("vendor","vendor",$society_id,"sc_vendor_pay_accounting_details",$service_provider);
	
							if($check_provider_ledger_id==0){
								$ledger_name=$get_provider["name"].'-'.$get_provider['sp_type'];
	
								$new_vendor_ledger=$this->ledger->create_ledger($ledger_name,"vendor",$society_id,"sc_vendor_pay_accounting_details",0,24,"D",$service_provider);
	
								$this->ledger->accounting_double_entry($society_id,2,date('Y-m-d'),$description,$amount,$new_vendor_ledger,$cash_ledger_id);
	
							}else{
								$this->ledger->accounting_double_entry($society_id,2,date('Y-m-d'),$description,$amount,$check_provider_ledger_id,$cash_ledger_id);
							}
						}
						else
						{
							$check_exp_category_ledger_id=$this->ledger->get_ledger($expense_categorie,'expense_category',$society_id,"sc_exp_category_accounting_details",0);
							if($check_exp_category_ledger_id==0){
								$new_exp_category_ledger=$this->ledger->create_ledger($expense_categorie,"expense_category",$society_id,"sc_exp_category_accounting_details",0,21,"D");
								
								$this->ledger->accounting_double_entry($society_id,2,date('Y-m-d'),$description,$amount,$new_exp_category_ledger,$cash_ledger_id );
								
							}else{
								$this->ledger->accounting_double_entry($society_id,2,date('Y-m-d'),$description,$amount,$check_exp_category_ledger_id,$cash_ledger_id );
								
							}
						}			
						//end accounting 
					}
					
					$message['text'] = "Transferred to expense successfully!!";
					$message['status'] = "Success";
					$this->session->set_flashdata('message', $message);
					exit(json_encode(array(
						'successMsg' => 'Expense created successfully.',
					)));
				elseif($exp == False):
					$message['text'] = "Please Check Your Input!!";
					$message['status'] = "Fail";
					$this->session->set_flashdata('message', $message);
					exit(json_encode(array(
						'errorMsg' => 'Expense amount is greater than balance.Could not create the expense.',)));
				endif;
			}else{
				$message['text'] = "Please Check Your Input!!";
				   $message['status'] = "Fail";
				   $this->session->set_flashdata('message', $message);
				exit(json_encode(array(
					'errorMsg' => 'Expense amount is greater than balance.Could not create the expense.',)));
			}
		}
		

		
	}

	function cash_expense($society, $amount, $service_provider, $expense_categorie, $description, $payment_date)
	{
		$society = $society;
		$amount = $amount;
		$service_provider_id = $service_provider;
		$expense_categorie = $expense_categorie;
		$payment_date = $payment_date;
		$description = $description;

		$s_p = $this->Service_provider_model->get_service_provider($service_provider_id);
		$last_transaction = $this->Bank_transaction_model->get_transaction_by_society($society['id']);
		$last_balance = $last_transaction[0]['balance'];
		if($amount < $last_balance):
			$params['amount'] = $amount;
			$params['payee'] = $s_p['name'];
			$params['service_provider_id'] = $service_provider_id;
			$params['expense_category_id'] = $expense_categorie;
			$params['society_id'] = $society['id'];
			$params['description'] = "From cash in hand-". $description;
			$params['date'] = $payment_date;
			$this->db->trans_start();
			if($this->Expense_model->add_expense($params)):
				$param['debit'] = $amount;
				$param['balance'] = $last_balance - $amount;
				$param['is_cash'] = 1;
				$param['society_id'] = $society['id'];
				$param['bank_id'] = $last_transaction[0]['bank_id'];
				$param['narration'] = "Cash expense-". $description;
				$param['date'] = $payment_date;
				$bt = $this->Bank_transaction_model->add_bank_transaction($param);
			endif;
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();				
    			return False;
			}else{
				$this->db->trans_commit();				
    			return True; 
			}			
		else:			
			return False;
		endif;
	}
	

	public function view_transactions() {
		$data = array();
		$bank_id = $this->uri->segment(4);
		$society_id = $this->uri->segment(3);
		$society = $this->Society_model->get_society_details($society_id);
		$bank = $this->Bank_model->get_bank($bank_id);
		$data['opening_balance'] = $bank['opening_balance'];
		$details = $bank['bank_name'].' '.$bank['branch'];
		$data['title'] = $society[0]->name.' '."Bank Transactions ".$details;

		$data['transactions'] = $this->Bank_transaction_model->get_all_bank_transactions($bank_id, $society_id);
		//checking society accounting details present or not-03-03-2022
		$accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);
		if(!empty($accounting_db_details)){
			
			//get bank transaction from accounting
			$bank_ledger_id=$this->ledger->get_ledger("bank","bank",$society_id,"sc_bank_acc_details",$bank_id); 
			
			if($bank_ledger_id!=0){
				$bank_transaction=$this->ledger->ledger_transaction($society_id,$bank_ledger_id);			

				$bank_transaction->opening_balance[0]->date=date("Y")."-04-01";
				
				$bank_transaction->opening_balance[0]->amount=$bank_transaction->opening_balance[0]->op_balance;
				$bank_transaction->opening_balance[0]->dc=$bank_transaction->opening_balance[0]->op_balance_dc;
                $bank_transaction->opening_balance[0]->narration="Opening Balance";
				// $data['cash_transaction']= (object) array_merge((array) $cash_transaction->opening_balance, (array) $cash_transaction->transaction);

				$ledger_data=array_merge((array) $bank_transaction->opening_balance, (array) $bank_transaction->transaction);

				// usort($ledger_data, function($a, $b) {
				// 	return (abs(strtotime('today') - strtotime($a->date))
				// 		- (abs(strtotime('today') - strtotime($b->date))));
				// });				
				
				// $data['bank_transaction']=$ledger_data;
				$data['bank_transaction']=$bank_transaction;
			}
				
		}
		
		$this->load->view('societies/commercials/view_transactions', $data);
	}

	public function send_notification()
	{
		$email = $this->input->post('email');
	    $sms = $this->input->post('sms');
	    $push = $this->input->post('push');
	    $society_id = $this->input->post('society_id');
	    $content = $this->input->post('content');
	    $society = $this->Society_model->get_society_details($society_id);
		$members = $this->Member_model->get_members_society($society_id);
		
		foreach($members as $member)
		{
			if(!empty($email) && $email != NULL):
				if($member['email_id'] != NULL):

		            $email_to = $member['email_id'];
		            $messag = 'Dear Member '.$member['wing'].' '.$member['flat_no'].', '.$content.' '.'Regards '.$society[0]->name;
		            $this->load->library('email');
		            $this->email->set_newline("\r\n");
		            $this->email->from('no-reply@paynet.co.in'); // change it to yours
		            $this->email->to($email_to);// change it to yours
		            $this->email->subject('Society Notification');
		            $this->email->message($messag);
		            if($result = $this->email->send())
		            {
		            	$message['text'] = "Email sent Successfully!!";
				      	$message['status'] = "Success";
				      	$this->session->set_flashdata('message', $message);
		            }
		            else
		            {
			            show_error($this->email->print_debugger());
			            $message['text'] = "Please Check Your Input!!";
						$message['status'] = "Fail";
						$this->session->set_flashdata('message', $message);
		            }
		        endif;
			endif;
			if(!empty($sms)):
	            if(!empty($member['phone']) && $member['phone'] != NULL):
	                // $getInvitationMsg = 'Dear Member '.$member['wing'].' '.$member['flat_no'].', '.$content.' '.'Regards '.$society[0]->name;
					$getInvitationMsg = 'Dear Member '.$member['wing'].' '.$member['flat_no'].', '.$content.' .Regards, '.$society[0]->name.' . Powered by PayNet.';
                    $b_sender = 'PayNet';
                    $msg =  $getInvitationMsg;
                    $m_phone = $member['phone'];
                    
                    $postData = array(
                        'to' => "+91".$m_phone,
                        'body' => $msg,
                        'from' => $b_sender,
						"restrictions" => ["india" =>[
							"templateId"=>1007977560317259344,
							"entityId"=>1001034198501773685
							]
						]
                    );
                    
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://connect.routee.net/sms",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => json_encode($postData),
                        CURLOPT_HTTPHEADER => array(
                            "authorization: Bearer 3b03fb0e-ae81-4f2e-80d4-2e93b446ae30",
                            "content-type: application/json"
                        ),
                    ));
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    $resp = json_decode($response,true);
					
	                $message['text'] = "SMS sent Successfully!!";
				    $message['status'] = "Success";
				    $this->session->set_flashdata('message', $message);
	            else:
			        $message['text'] = "Please Check Your Input!!";
				    $message['status'] = "Fail";
				    $this->session->set_flashdata('message', $message);
	            endif;
        	endif;
		}
	}

	public function bill_register($society_id=0,$bill_month='')
	{		
		if($bill_month==0 || $bill_month==''){
			$message['status'] = "Fail";
			$message['text'] = 'Please select bill month.';
			$this->session->set_flashdata('message', $message);
			redirect("societies/society_bill_generate/".$society_id);
		}else{
			
			$data = array();
			$society = $this->Society_model->get_society_details($society_id);
			$data['bill_heads'] = $this->Billing_head_model->get_bill_heads_by_society($society_id);
			$data['reciept_data'] = $reciept_data = $this->Bill_detail_model->get_register_data($society_id, $bill_month);
			
			$month = date('M-Y',strtotime($reciept_data[0]['bill_month']));
			
			$data['total_opening_balance'] = $this->Bill_detail_model->total_opening_balance($society_id, $bill_month);
			$data['total_interest'] = $this->Bill_detail_model->total_interest($society_id, $bill_month);
			$data['total_bill_amount'] = $this->Bill_detail_model->total_bill_amount($society_id, $bill_month);
			$data['total_due'] = $this->Bill_detail_model->total_due($society_id, $bill_month);
			$data['title'] = $society[0]->name.' '."Bill Register for ".$month;
			// $total_opening_balance = 
			$this->load->view('societies/bills/view_bill_register', $data);
		}

	}

	public function collection_register($society_id=0,$bill_month='')
	{
		if($bill_month==0 || $bill_month==''){
			$message['status'] = "Fail";
			$message['text'] = 'Please select bill month.';
			$this->session->set_flashdata('message', $message);
			redirect("societies/society_bill_generate/".$society_id);
		}else{
			
			$society_id = $this->uri->segment(3);
			$bill_month = $this->uri->segment(4);
		
			$society = $this->Society_model->get_society_details($society_id);
			$data = array(
				'title' => $society[0]->name
			);
			$data['bill_heads'] = $this->Billing_head_model->get_bill_heads_by_society($society_id);
			$data['reciept_data'] = $this->Bill_detail_model->get_register_data($society_id, $bill_month);

			
			
			/*$data['total_opening_balance'] = $this->Bill_detail_model->total_opening_balance($society_id, $bill_month);
			$data['total_interest'] = $this->Bill_detail_model->total_interest($society_id, $bill_month);
			$data['total_bill_amount'] = $this->Bill_detail_model->total_bill_amount($society_id, $bill_month);
			$data['total_due'] = $this->Bill_detail_model->total_due($society_id, $bill_month);*/
			// $total_opening_balance = 
			$this->load->view('societies/bills/view_collection_register', $data);
			//return $abc;

		}
		
	}

	public function exportCollection()
    {
        // get data
        $society_id = $this->uri->segment(3);
        $bill_month = $this->uri->segment(4);
        $society = $this->Society_model->get_society_details($society_id);
		$data['bill_heads'] = $this->Billing_head_model->get_bill_heads_by_society($society_id);
		$reciept_data = $this->Bill_detail_model->get_reciept_data($society_id, $bill_month);
        // file name
        $filename = 'sample_member_'.date('Ymd').'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
 
        // file creation
        $file = fopen('php://output', 'w');
 
        $header = array("bill_no","wing","flat_no","member_name","bill_amount", "principal_arrears", "interest_arrears", "interest", "total_due", "transaction_type", "cheque_no", "cheque_date","bank_name","amount");
        fputcsv($file, $header);
 
        foreach ($reciept_data as $line){
		
            fputcsv($file,array($line['bill_no'],$line['wing'],$line['flat_no'],$line['member_name'],$line['bill_amount'],$line['principal_arrears'],$line['interest_arrears'],$line['interest'],$line['total_due']));
        }
 
        fclose($file);
        exit;
    }

	public function view_reports() {
		$data = array(
			'title' => "Societies"
		);
		$data['society_id'] = $this->uri->segment(3);
		$data['society'] = $this->Society_model->get_society($data['society_id']);
		$this->load->view('societies/reports/view_reports', $data);
	}

	public function bank_reconciliation() {
		
		$society_id = $this->uri->segment(3);
		$society = $this->Society_model->get_society($society_id);
		$data['banks'] = $this->Bank_model->get_all_bank($society_id);
		$data['title'] = $society['name'].' '."Bank";    
        
		$this->load->view('societies/reports/bank_list_report', $data);
		// $data['title'] = $society['name'].' '."Bank Book";
		// $data['transactions'] = $this->Bank_transaction_model->bank_transactions_society($society_id);
		
		// $this->load->view('societies/reports/bank_reconciliation', $data);
	}

	public function bank_report($society_id=0,$bank_id=0) {
		
		$data = array();
		$bank_id = $this->uri->segment(4);
		$society_id = $this->uri->segment(3);
		$society = $this->Society_model->get_society_details($society_id);
		$bank = $this->Bank_model->get_bank($bank_id);		
		$details = $bank['bank_name'].' '.$bank['branch'];
		$data['title'] = $society[0]->name.' '."Bank Transactions ".$details;
		$data['bank_details']=$bank;
		$data['transactions'] = $this->Bank_transaction_model->bank_transactions_society($society_id,$bank_id);
		
		//checking society accounting details present or not-03-03-2022
		$accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);
		if(!empty($accounting_db_details)){
			
			//get bank transaction from accounting
			$bank_ledger_id=$this->ledger->get_ledger("bank","bank",$society_id,"sc_bank_acc_details",$bank_id);
			
			if($bank_ledger_id!=0){
				$bank_transaction=$this->ledger->ledger_transaction($society_id,$bank_ledger_id);
				
				if(!empty($bank_transaction)){
					$bank_transaction->opening_balance[0]->date=date("Y")."-04-01";
				
					$bank_transaction->opening_balance[0]->amount=$bank_transaction->opening_balance[0]->op_balance;
					$bank_transaction->opening_balance[0]->dc=$bank_transaction->opening_balance[0]->op_balance_dc;
					$bank_transaction->opening_balance[0]->narration="Opening Balance";	
					

					$data["bank_transaction"]=$bank_transaction;
				}else{
					$data["bank_transaction"]=$bank_transaction;
				}
				
				
			}
			
			
		}	
			
		$this->load->view('societies/reports/bank_reconciliation', $data);
	}
	
	public function all_member_ledger() {
		
		$society_id = $this->uri->segment(3);
		$society = $this->Society_model->get_society($society_id);
		$members = $this->Member_model->get_members_by_society_led($society_id);
		$data['members'] = $members;
		$data['title'] = $society['name'].' '."Members List";
		$this->load->view('societies/reports/all_member_list', $data);
	}

	public function member_ledger_report() {

		$data = array();
        $member_id = $this->uri->segment(4);
        $society_id = $this->uri->segment(3);
        $society = $this->Society_model->get_society_details($society_id);        
        $member = $this->Member_model->get_single_member($member_id);       
        $flat =' Flat No: '.$member[0]->flat_no.' Wing: '.$member[0]->wing; 
		$data['title'] = $society[0]->name." Member Ledger for ".$flat;
		$data["member_details"]=$member[0];
		$ledger_data  = $this->Member_model->get_all_member_ledger($member_id);
		foreach($ledger_data as $x => $val) {
			$ledger_data[$x]["posted_date"]=trim(date("d-m-Y",strtotime($this->Member_model->get_entity_date($val['entity_id'], $val['narration'], $val['member_id']))));
			
		}
		array_multisort(array_map('strtotime',array_column($ledger_data,'posted_date')),SORT_DESC,$ledger_data);
		$data['ledger_data'] = $ledger_data;
		
        //checking society accounting details present or not-03-03-2022
        $accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
        if(!empty($accounting_db_details)){
            $get_flat_ledger_id=$this->ledger->get_ledger("flat","flat",$society_id,"sc_flat_acc_Details",$member_id);
        
            if($get_flat_ledger_id!=0)
			    $flat_transaction=$this->ledger->ledger_transaction($society_id,$get_flat_ledger_id);
                
				if(!empty($flat_transaction)){
					$flat_transaction->opening_balance[0]->date=date("Y")."-04-01";
				
					$flat_transaction->opening_balance[0]->amount=$flat_transaction->opening_balance[0]->op_balance;
					$flat_transaction->opening_balance[0]->dc=$flat_transaction->opening_balance[0]->op_balance_dc;
					$flat_transaction->opening_balance[0]->narration="Opening Balance";
					// $data['cash_transaction']= (object) array_merge((array) $cash_transaction->opening_balance, (array) $cash_transaction->transaction);

					$ledger_data=array_merge((array) $flat_transaction->opening_balance, (array) $flat_transaction->transaction);

					// usort($ledger_data, function($a, $b) {
					// 	return (abs(strtotime('today') - strtotime($a->date))
					// 		- (abs(strtotime('today') - strtotime($b->date))));
					// });			
					
					$data['flat_transaction']=$ledger_data;
					// $data['flat_transaction']=$flat_transaction;
				}
				

        }
        
		$this->load->view('societies/reports/all_member_ledger', $data);
	}


	public function all_member_ledger_bak() {
		
		$society_id = $this->uri->segment(3);
		$society = $this->Society_model->get_society($society_id);
		$members = $this->Member_model->get_members_by_society_led($society_id);
		$ledger_data = $this->Member_model->get_all_member_ledger($society_id);		
		// foreach($members as $mem){
		// 	$ledger_data[] = $this->Member_model->get_all_member_ledger($mem['id']);
		// }

		foreach($ledger_data as $x => $val) {
			$ledger_data[$x]["posted_date"]=trim(date("d-m-Y",strtotime($this->Member_model->get_entity_date($val['entity_id'], $val['narration'], $val['member_id']))));
			// $ledger_data[] = $this->Member_model->get_all_member_ledger($mem['id']);
		}

		array_multisort(array_map('strtotime',array_column($ledger_data,'posted_date')),SORT_DESC,$ledger_data);
		
		$data['ledger_data'] = $ledger_data;
		$data['title'] = $society['name'].' '."Members Ledger";
		$this->load->view('societies/reports/all_member_ledger', $data);
	}


	public function expenses() {
		$society_id = $this->uri->segment(3);
		$society = $this->Society_model->get_society($society_id);
		$expenses = $this->Expense_model->get_all_expense_report($society_id);
		
        // if(!empty($expenses)):
        //     $service_provider_id = $expenses[0]['payee'];
            // $data['service_provider'] = $this->Service_provider_model->get_service_provider($service_provider_id);
        // endif;
        $data['title'] = $society['name'].' '."Expenses Report";
        $data['expenses'] = $expenses;
		$this->load->view('societies/reports/expenses_report', $data);
	}

	public function cash(){
		
		$data = array();
		$society_id = $this->uri->segment(3);
		// $data['cash_in_hand'] = $this->Bank_transaction_model->get_transaction_by_society($society_id);
		
		$data['cash_in_hands'] = $this->Bank_transaction_model->get_all_transaction_by_society($society_id);
		
		// $data['banks'] = $this->Bank_model->get_all_bank($society_id);
		$data['society']= $society = $this->Society_model->get_society($society_id);
		$data['title'] = $society['name']." Cash Report";
		// $data['service_providers'] = $this->Service_provider_model->get_all_service_providers($society_id);
		// $data['expense_categories'] = $this->Expense_category_model->get_all_expense_categories();

		 //checking society accounting details present or not-03-03-2022
		 $accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
		 if(!empty($accounting_db_details)){

			 $get_cash_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details");
			
			 if($get_cash_ledger_id!=0)
				 $cash_transaction=$this->ledger->ledger_transaction($society_id,$get_cash_ledger_id);
				 
				 $cash_transaction->opening_balance[0]->date=date("Y")."-04-01";
				 
				 $cash_transaction->opening_balance[0]->amount=$cash_transaction->opening_balance[0]->op_balance;
				 $cash_transaction->opening_balance[0]->dc=$cash_transaction->opening_balance[0]->op_balance_dc;
				 $cash_transaction->opening_balance[0]->narration="Opening Balance";
				 // $data['cash_transaction']= (object) array_merge((array) $cash_transaction->opening_balance, (array) $cash_transaction->transaction);
 
				 $ledger_data=array_merge((array) $cash_transaction->opening_balance, (array) $cash_transaction->transaction);
 
				//  usort($ledger_data, function($a, $b) {
				// 	 return (abs(strtotime('today') - strtotime($a->date))
				// 		 - (abs(strtotime('today') - strtotime($b->date))));
				//  });			
				 
				//  $data['cash_transaction']=$ledger_data;
				$data['cash_transaction']=$cash_transaction;
				
				
 
		 }


		$this->load->view('societies/reports/cash_report', $data);
	}

	public function outstanding_report(){
		$society_id = $this->uri->segment(3);
		$data['society']= $society = $this->Society_model->get_society($society_id);
		$data['title'] = $society['name']." Outstanding Report";
		$data['unpaid_bills']= $unpaid_bills = $this->Society_model->get_all_bill_unpaid_for_report($society_id);
		$this->load->view('societies/reports/outstanding_report', $data);
	}

	public function payment_report(){
		$society_id = $this->uri->segment(3);
		$data['society']= $society = $this->Society_model->get_society($society_id);
		$data['title'] = $society['name']." Income/Collection Report";
		$data['all_payments'] = $all_payments = $this->Payment_model->get_payment_list_for_report($society_id);
		$this->load->view('societies/reports/payment_report', $data);
	}

	public function member_balance_report(){
		$society_id = $this->uri->segment(3);
		$data['society']= $society = $this->Society_model->get_society($society_id);
		$data['title'] = $society['name']." Member Balance Report";

		//comment on this line for only show for mobile login memeber balance
		// $members = $this->Member_model->get_members_by_society($society_id);
		$members = $this->Member_model->get_members_society($society_id);
		
		$current_balance=array();
		foreach($members as $mem){			
			$current_balance[] = $this->Member_model->get_member_current_balance_report($mem['id']);//sachhidanand 23-12-2021
		    
		}
		
		$data['current_balance'] = $current_balance;
		
		$this->load->view('societies/reports/member_balance_report', $data);
	}

	public function i_register(){
		$society_id = $this->uri->segment(3);
		$data['society']= $society = $this->Society_model->get_society($society_id);
		$data['title'] = $society['name']." I Register";
		$members = $this->Member_model->get_members_by_society($society_id);
		$data['members'] = $members;
		$this->load->view('societies/reports/i_register', $data);
	}

	public function j_register(){
		$society_id = $this->uri->segment(3);
		$data['society']= $society = $this->Society_model->get_society($society_id);
		$data['title'] = $society['name']." J Register";
		$members = $this->Member_model->get_members_for_j($society_id);
		// print_r($members); exit();
		$data['members'] = $members;
		$this->load->view('societies/reports/j_register', $data);
	}

	// public function income_report(){
	// 	$society_id = $this->uri->segment(3);
	// 	$data['society']= $society = $this->Society_model->get_society($society_id);
	// 	$data['title'] = $society['name']." J Register";
	// 	$bills = $this->Society_model->bill_head($society_id);
	// 	foreach($bills as $bill){
	// 		var_dump($bill);
	// 		$bd['january'] = $bill['January'];
	// 		$bd['february'] = $bill['February'];
	// 	}
	// 	echo"<pre>";print_r($bd);die;
	// 	$data['members'] = $members;
	// 	$this->load->view('societies/reports/j_register', $data);
	// }

	public function share_register(){
		$society_id = $this->uri->segment(3);
		// $data['society']= 
		$society = $this->Society_model->get_society($society_id);
		$data['title'] = $society['name']." Share Certificate Register";
		$members = $this->Member_model->get_members_by_society($society_id);
		$data['members'] = $members;
		$this->load->view('societies/reports/share_register', $data);
	}

	public function investment_register(){
		$society_id = $this->uri->segment(3);
		$data['society']= $society = $this->Society_model->get_society($society_id);
		$data['title'] = $society['name']." Investment Register Format";
		$investment[] = array(
			'date' => '01/01/2019',
			'particulars' => 'FDR',
			'amount' => 'FDR',
			'rate_of_interest' => '9%',
			'period' => '2 Years',
			'bank_name' => 'Bank Name',
		);
		$investment[] = array(
			'date' => '10/02/2018',
			'particulars' => 'FDR',
			'amount' => 'FDR',
			'rate_of_interest' => '9%',
			'period' => '2 Years',
			'bank_name' => 'Bank Name',
		);

		$data['investment'] = $investment;
		$this->load->view('societies/reports/investment_register', $data);
	}

	public function view_monthly_bills() {
		$data = array(
			'title' => "Societies"
		);
		$society_id = $this->uri->segment(3);
		$data['bill_month'] = $this->Bill_detail_model->get_bill_month_bill_by_socioety($society_id);
		$this->load->view('societies/bills/view_monthly_bills', $data);
	}

	public function download_bill()
	{
		$data = array(
			'title' => "mSociety"
		);
		
		$society_id = $this->uri->segment(3);
		$bill_month = $this->uri->segment(4);
		$bill_format = $this->uri->segment(5);
		$society = $this->Society_model->get_society_details($society_id);
		
		$member = $this->Member_model->get_members_by_society($society_id);
		$calculated_amount = 0;
		$total_amount = 0;

		$bank_default=$this->Bank_model->get_default_bank($society_id);

		if(!empty($bank_default)){
			//set last bill month
			if($society[0]->full_mode == 1)
			{
				$reciept_data = $this->Bill_detail_model->get_reciept_data($society_id,$bill_month);			
			}
			else
			{			
				$reciept_data = $this->Bill_detail_model->get_bill_data($society_id, $bill_month);
			}
			
			$parking_details=$this->Parking_charge_model->get_all_parking_charge($society_id);	
			
			//add condition for checking bank default
			if(!empty($reciept_data)){
				$bill_date = $reciept_data[0]['bill_date'];		
				$month = date('m',strtotime($bill_date));
				$year = date('Y',strtotime($bill_date));
				$day = date('d',strtotime($bill_date." -1 day"));
				//create Month
				$current_month = date('Y-m-d',strtotime($year."-".$month."-"."1"));
				$last_month = date('M',strtotime($current_month." -1 month"));
				$last_Month = date('m',strtotime($current_month." -1 month"));
				$last_month_bill =  $this->Bill_detail_model->get_last_month_bill_by_society($society_id,$last_Month);
				if($last_month_bill){
					$last_month_bill_date = $last_month_bill[0]['bill_date'];
					// $payment_date_min = date('Y-m-d', strtotime($last_month_bill_date."+1 day"));
					$payment_date_min=$last_month_bill_date;
					
				}else{
					$payment_date_min = date('Y-m-d', strtotime($bill_date."-30 day"));

				}
			
				$payment_date_max = date('Y-m-d',strtotime($bill_date.' -1 day'));
				$last_month_year = date('M-Y',strtotime($current_month." -1 month"));
				$current_month_year = date('M-Y',strtotime($current_month));
				$due_date = $reciept_data[0]['due_date'];
				$dueDate = date('d M Y',strtotime($due_date));       
				
				
				// foreach($reciept_data as $reciept)
				foreach($reciept_data as $x => $reciept)			
				{
					$data['bill_month'] = date('M-Y',strtotime($bill_date));
					$data['last_month'] = date('M-Y',strtotime($current_month." -1 month"));
					$reciept['last_payment'] = $this->Payment_model->get_payment_reciept($reciept['member_id'], $payment_date_min,$payment_date_max);
					
					$data['last_payment_date'] = date('M-Y',strtotime($current_month." -1 month"));
					// $data['rds'][] = $reciept;
					$rds[] = $reciept;
					//add this condition for parking details display for two or four wheelers-sachhidanand 
					if($reciept["tenant"]==1){
						if($reciept["two_wheelers"]!=0){
							$rds[$x]["Two_wheelers"]=$reciept["two_wheelers"]*$parking_details[0]["tenant_two_wheeler"];
						}else{
							$rds[$x]["Two_wheelers"]=0;
						}
						if($reciept["four_wheelers"]!=0){
							$rds[$x]["Four_wheelers"]=$reciept["four_wheelers"]*$parking_details[0]["tenant_four_wheeler"];
						}else{
							$rds[$x]["Four_wheelers"]=0;
						}			
						
					}else{
						
						if($reciept["two_wheelers"]!=0){
							$rds[$x]["Two_wheelers"]=$reciept["two_wheelers"]*$parking_details[0]["member_two_wheeler"];
						}else{
							$rds[$x]["Two_wheelers"]=0;
						}
						if($reciept["four_wheelers"]!=0){
							$rds[$x]["Four_wheelers"]=$reciept["four_wheelers"]*$parking_details[0]["member_four_wheeler"];
						}else{
							$rds[$x]["Four_wheelers"]=0;
						}					
						
					}				
					$rds[$x]["society_interest_rate"]=$society[0]->interest_rate;
				}

				//add condition for download bill different format
				
				if($bill_format=="1"){
					$this->load->library('Pdf'); // Load library
					$this->pdf->fontpath = 'font/'; // Specify font folder
					// $this->load->library('pdfdom');
					// require_once("application/libraries/tcpdf/tcpdf.php");					
					$this->load->library('Numbertowords');
					
					foreach ($rds as $rd) {
						$dt = unserialize($rd["details"]);
						
						$this->pdf->SetTitle("mSociety");
						$this->pdf->AddPage('P','A4');
						$this->pdf->Rect(5, 5, 200, 287, 'D'); //For A4 
						if($society[0]->image_file_name!='')
							$this->pdf->Image(base_url("assets/uploads/").$society[0]->image_file_name,10,6,30,0,'PNG');   
						
						$this->pdf->SetFont('Times','B',14); 
						          
						$this->pdf->MultiCell(190,2,$rd["societyname"],0,'C');
						$this->pdf->Ln();
							$this->pdf->SetFont('Times','',10);
							$this->pdf->MultiCell(190,2,$rd["registration_no"],0,'C');
						$this->pdf->Ln();
							if($rd["gstin"] != ''):
							$this->pdf->SetFont('Times','',10);
							$this->pdf->MultiCell(190,2,'GSTIN: '.$rd["gstin"],0,'C');
							$this->pdf->Ln();
							endif;
							$this->pdf->SetFont('Times','',10);
							$this->pdf->MultiCell(190,2,$rd["address"],0,'C');
						
						$this->pdf->Ln();
						$this->pdf->Ln();
						$this->pdf->Ln();
							$this->pdf->Cell(20,5,'Bill No : '.$rd["bill_no"],0,'R');
							if($rd['code_used'] != 1)
							{
								$this->pdf->Cell(20,5,'Flat Code : '.$rd["flat_code"],0,'R');
							}
							// $this->pdf->setX('25');
							// $this->pdf->Cell(15,5,$rd["bill_no"],0,'L');
							$this->pdf->setX('155');
							$this->pdf->Cell(30,5,'Wing/Flat No. :'.$rd["wing"].'/'.$rd["flat_no"],0,'R');
							// $this->pdf->Cell(25,5,$rd["wing"].'/'.$rd["flat_no"],0,'L');
							//   $user = $this->Member_model->get_flat_owner($rd["member_id"]);
						
						$this->pdf->Ln();
							//$this->pdf->Cell(30,5, $user ? 'Name: '.$user['first_name'].' '.$user['last_name'] : '',0,'R');
							$this->pdf->Cell(30,5, 'Name: '.ucwords($rd['member_name']),0,'R');
							$this->pdf->setX('155');
							$this->pdf->Cell(30,5,'Due Date : '.$dueDate,0,'R');
							// $this->pdf->setX('25');
							// $this->pdf->Cell(50,5,$rd["member_name"],0,'L');

						$this->pdf->Ln();
							$this->pdf->Cell(30,5,'Bill Period: '.$current_month_year,0,'R');
							// $this->pdf->Cell(50,5,$bill_month ,0,'L');
							$this->pdf->setX('155');
							$this->pdf->Cell(30,5,'Flat Area: '.$rd["flat_area"].' sq. ft.',0,'R');
							// $this->pdf->Cell(50,5,$rd["flat_area"] ,0,'L');
							
							if($society[0]->full_mode == 1)
							{
								
								$this->pdf->setY('45');
								$this->pdf->setX('120');
								$this->pdf->SetFont('Times','B',10);
								$this->pdf->Cell(30,5,'Bank Details',0,'R');
								$this->pdf->Ln();
								$this->pdf->SetFont('Times','',9);
								$this->pdf->setX('120');
								$this->pdf->Cell(30,5,'Name:',0,'R');
								$this->pdf->setX('131');
								$this->pdf->Cell(50,5,$rd["bank_name"] ,0,'L');
								$this->pdf->Ln();
								$this->pdf->setX('120');
								$this->pdf->Cell(30,5,'Branch:',0,'R');
								$this->pdf->setX('133');
								$this->pdf->Cell(50,5,$rd["branch"] ,0,'L');
								$this->pdf->Ln();
								$this->pdf->setX('120');
								$this->pdf->Cell(30,5,'IFSC:',0,'R');
								$this->pdf->setX('130');
								$this->pdf->Cell(50,5,$rd["ifsc"] ,0,'L');
								$this->pdf->Ln();
								$this->pdf->setX('120');
								$this->pdf->Cell(30,5,'A/C:',0,'R');
								$this->pdf->setX('129');
								$this->pdf->Cell(50,5,$rd["ac_no"] ,0,'L');
								$this->pdf->Ln();
							}
							if(!empty($rd['qrCode'])):
								$qrImage = $rd['qrCode'];
								$this->pdf->setY('65');
								$this->pdf->setX('120');
								$this->pdf->Cell(30,5,'Scan QR Code & Pay',0,'R');
								$this->pdf->setX('120');
								$this->pdf->Image($qrImage,120,70,30,30);
								$this->pdf->Ln();
							endif;

							$this->pdf->setY('36');
							$this->pdf->SetWidths(array(10,65,30));
							$this->pdf->Ln();
							$this->pdf->Ln();
							$this->pdf->Row(array('Sr','Particulars','Amount'));
							$this->pdf->SetWidths(array(10,65,30));
							$counter = 1;
							ksort($dt);
							foreach($dt as $d=>$t): 
								if($d !== "sub_total"):
									if($t != "0.00"):
										if($d!="Parking Charges"){
											$this->pdf->Row(array($counter,$d,$t));
											$counter++;
										}
										
										
									endif; 
								endif; 
							endforeach;
							if($rd["Two_wheelers"]>0):
								$this->pdf->Row(array($counter,"Two Wheelers",$rd["Two_wheelers"]));
							endif;
							if($rd["Four_wheelers"]>0):
								$this->pdf->Row(array($counter+1,"Four Wheelers",$rd["Four_wheelers"]));
							endif;
							if($rd["tax_slab"] != 0 || $rd["tax_slab"] != "0" && $rd["is_gst"] != 0):
								$this->pdf->Ln();
								$this->pdf->SetFont('Times','B',10);
								$this->pdf->Cell(30,5,'GST Slab',0,'R');
								$this->pdf->setX('90');
								$this->pdf->Cell(50,5,$rd["tax_slab"] ,0,'L');
							endif;
							if(($rd["tax_amount"] != "0.00" &&  $rd["tax_amount"] != "") && $rd["is_gst"] != 0 ):
								$this->pdf->Ln();
								$this->pdf->SetFont('Times','B',10);
								$this->pdf->Cell(30,5,'GST Payable',0,'R');
								$this->pdf->setX('90');
								$this->pdf->Cell(50,5,$rd["tax_amount"] ,0,'L');
							endif;
							// if($rd["tax_amount"] != "0.00" && $rd["tax_amount"] != "0" && $rd["tax_amount"] != 0 && $rd["tax_amount"] != ""):
							// 	$this->pdf->Ln();
							// 	$this->pdf->SetFont('Times','B',10);
							// 	$this->pdf->Cell(30,5,'GST Payable',0,'R');
							// 	$this->pdf->setX('90');
							// 	$this->pdf->Cell(50,5,$rd["tax_amount"] ,0,'L');
							// endif;
							
						$this->pdf->Ln();
							$this->pdf->SetFont('Times','B',10);
							$this->pdf->Cell(30,5,'Total Amount:',0,'R');
							$this->pdf->setX('90');
							$this->pdf->Cell(50,5,$rd["bill_amount"] ,0,'L');

							// if($rd["principal_arrears"] != 0 || $rd["principal_arrears"] != "0.00" || $rd["principal_arrears"] != "0"):
						$this->pdf->Ln();
							// $this->pdf->Cell(30,5,'Arrears as on '.$last_month,0,'R');

							if ($rd['principal_arrears'] < 0)
							{
								$this->pdf->Cell(30,5,'Advance Balance :',0,'R');
								$this->pdf->setX('90');
								$this->pdf->Cell(55,5, abs($rd["principal_arrears"]) ,0,'L');
							}
							else{
								$this->pdf->Cell(30,5,'Arrears :',0,'R');
								$this->pdf->setX('90');
								$this->pdf->Cell(55,5, $rd["principal_arrears"] ,0,'L');
							}

							
							// endif;

							if($rd["interest_arrears"] != 0 || $rd["interest_arrears"] != "0.00" || $rd["interest_arrears"] != "0"):
							$this->pdf->Ln();
							$this->pdf->Cell(30,5,'Interest Arrears:',0,'R');
							$this->pdf->setX('90');
							$this->pdf->Cell(55,5, $rd["interest_arrears"] ,0,'L');
							endif;

							if($rd["interest"] != 1):
								if($rd["interest"] != 0 || $rd["interest"] != "0.00" || $rd["interest"] != "0"):
								$this->pdf->Ln();
								$this->pdf->Cell(30,5,'Interest :',0,'R');
								$this->pdf->setX('90');
								$this->pdf->Cell(55,5, round($rd["interest"]) ,0,'L');
								endif;
							endif;

							if($rd["late_payment_charges"] != 0 || $rd["late_payment_charges"] != "0.00" || $rd["late_payment_charges"] != "0"):
							$this->pdf->Ln();
							$this->pdf->Cell(30,5,'Late Payment Charges :',0,'R');
							$this->pdf->setX('90');
							$this->pdf->Cell(50,5,$rd["late_payment_charges"] ,0,'L');
							endif;

							$current_balance = $this->Member_model->get_current_balance($rd['member_id']);
							$previous_balance = $this->Member_model->get_member_previous_balance($rd['member_id']);

							//     	$this->pdf->Ln();
									// $this->pdf->Cell(30,5,'Current Balance',0,'R');
									// $this->pdf->setX('90');
							//     	$this->pdf->Cell(50,5,$current_balance['new_balance'] ,0,'L');
							if($rd["principal_arrears"] == 0 || $rd["principal_arrears"] == "0.00" || $rd["principal_arrears"] == "0"):
								if($previous_balance > 0):
									$this->pdf->Ln();
									$this->pdf->Cell(30,5,'Previous Balance :',0,'R');
									$this->pdf->setX('90');
									$this->pdf->Cell(50,5,$previous_balance ,0,'L');
								endif;
							endif;

						$this->pdf->Ln();
							if($rd["total_due"] > 0):
								$this->pdf->Cell(30,5,'Total Payable :',0,'R');
								$this->pdf->setX('90');
								$this->pdf->Cell(50,5,$rd["total_due"] ,0,'L');

								
								
							elseif($rd["total_due"] < 0):
								$this->pdf->Cell(30,5,'Total Advance :',0,'R');
								$this->pdf->setX('90');
								$this->pdf->Cell(50,5,-$rd["total_due"] ,0,'L');
							endif;
							
							if($rd["total_due"] >= 0):
								$this->pdf->Ln();
								$this->pdf->SetFont('Times','B',10);
								$this->pdf->Cell(30,5,'Amount in Words: Indian Rupees',0,'R');
								$this->pdf->Ln();
								// $this->pdf->setX('62');

								$this->pdf->Cell(50,5,$this->numbertowords->convert_number($rd["total_due"]) ,0,'L');								
							endif;


						$this->pdf->Ln();
							$this->pdf->SetFont('Times','',10);
								
							if(!empty($rd["bill_summary"])):
							$this->pdf->SetFont('Times','B',10);
							$this->pdf->Cell(30,5,'Summary',0,'R');
							$this->pdf->Ln();
							$this->pdf->SetFont('Times','',10);
							$this->pdf->WriteHTML($rd["bill_summary"]);
							// $this->pdf->Cell(50,5,$rd["bill_summary"] ,0,'L');
							endif;

						$this->pdf->Ln();
						$this->pdf->Cell(30,5,'Please draw a cheque in favour of ' .$rd["societyname"],0,'R');
						$this->pdf->Ln();
						$this->pdf->Cell(30,5,'Please write your Mobile No. and Flat No behind the Cheque',0,'R');

							// $this->pdf->Ln();
							// $this->pdf->MultiCell(190,5,$rd["societyname"] ,0,'R');

						$this->pdf->Ln();
						$this->pdf->MultiCell(190,5,' ----------------------------------------------------------------------------------------------------------------------------------------------------------------',0,'L');
						$this->pdf->Ln();
						$this->pdf->Cell(30,5,'This is system generated bill and does not require signature.',0,'R');
						$this->pdf->setX('152');
						$this->pdf->Cell(30,5,'Hon. Secretary / Chairman',0,'R');

						$this->pdf->Ln();
						$this->pdf->MultiCell(190,5,' ---------------------------------------------------------------------------------------------------------------------------------------------------------------',0,'L');
						$this->pdf->Ln();
						$this->pdf->setX('85');
						$this->pdf->Cell(30,5,'Reciept for '.$last_month_year,0,'R');
						$this->pdf->Ln();

						$this->pdf->Ln();
						$this->pdf->Cell(30,5,'Payment Date',0,'R');
						$this->pdf->setX('95');
						$this->pdf->Cell(30,5,'Paid By',0,'R');
						$this->pdf->setX('170');
						$this->pdf->Cell(30,5,'Amount',0,'R');
						if(!empty($rd['last_payment'][0]['payment_date']))
						{
							$payment_date = date('d M Y',strtotime($rd['last_payment'][0]['payment_date']));
						}
						else{
							$payment_date = '';
						}
						$this->pdf->Ln();
						$this->pdf->Cell(30,5,$payment_date,0,'R');
						$this->pdf->setX('95');
						$this->pdf->Cell(30,5,!empty($rd['last_payment'][0]['paid_by'])?$rd['last_payment'][0]['paid_by']:'',0,'R');
						$this->pdf->setX('170');
						$this->pdf->Cell(30,5,!empty($rd['last_payment'][0]['credit'])?$rd['last_payment'][0]['credit']:'',0,'R');
						
						$this->pdf->Ln();
						// $this->pdf->Cell(30,5,$user ? 'Name: '.$user['first_name'].' '.$user['last_name'] : '',0,'L');
						$this->pdf->Cell(30,5,'Name: '.$rd['member_name'],0,'L');
						// $this->pdf->setX('60');
						// $this->pdf->Cell(0,5,$rd['societyname'],0,0,'R');

						$this->pdf->Ln();
						$this->pdf->MultiCell(190,5,' -------------------------------------------------------------------------------------------------------------------------------------------------------------',0,'L');
						$this->pdf->Ln();
						$this->pdf->Cell(30,0,'This is system generated reciept and does not require signature.',0,'R');
						$this->pdf->setX('152');
						$this->pdf->Cell(30,0,'Hon. Secretary / Chairman',0,'R');
						
						$this->pdf->Ln();
						$this->pdf->MultiCell(190,5,'',0,'L');	
						// $this->pdf->Image('https://testing.paynet.co.in/msociety/assets/img/MicrosoftTeams-image.png',10,240,30,0,'PNG');		
						// $this->pdf->Image('https://paynet.co.in/wp-content/uploads/2020/06/1-Paynet%20Logo%20wo%20bg-160x37.png',10,240,30,0,'PNG');
						// $this->pdf->Image('https://paynet.co.in/wp-content/uploads/2020/06/1-Paynet%20Logo%20wo%20bg-160x37.png',160,240,30,0,'PNG');
						
						//https://testing.paynet.co.in/msociety/MicrosoftTeams-image.png
					}
					$this->pdf->Output();
					//$this->load->view('societies/bills/pf',$data);
					//$mpdf = new \Mpdf\Mpdf();
					// $html = 
					// $mpdf->WriteHTML($html);
					// $mpdf->Output();
					// $mpdf->Output($society_id.'_'.$bill_month.'_'."bill.pdf",'D'); 
					// $this->load->view('societies/bills/bill_pdf_new',$data);
					// ini_set("pcre.backtrack_limit", "5000000");
					// 		ini_set('max_execution_time', "-1");
					// $this->pdfdom->load_view('societies/bills/bill_pdf_new', $data);
					// $this->pdfdom->render();
					//  	$this->pdfdom->stream($society_id.'_'.$bill_month.'_'."bill.pdf");

				}else if($bill_format=="2"){
					$mpdf = new \Mpdf\Mpdf();
					$mpdf->SetDisplayMode('fullpage');			
					
					foreach($rds as $x => $list) {						
						
						$dt = unserialize($list["details"]);
						$dt=array_merge($dt,array("Two wheelers"=>$list["Two_wheelers"] ,"Four wheelers"=>$list["Four_wheelers"]));
						unset($dt["Parking Charges"]);
						$list["details"]=serialize($dt);
						$data["member_bill_details"]=$list;					
						$html= $this->load->view('bill/bill',$data,true);
						$mpdf->WriteHTML($html);
						$mpdf->AddPage('P','A4');
						
					}
					$blankpage = $mpdf->page + 1;
					$mpdf->DeletePages($blankpage);
				
					$mpdf->Output();
				}
				else if($bill_format=="3"){
					$mpdf = new \Mpdf\Mpdf();
					$i=1;
					foreach($rds as $list){
						$dt = unserialize($list["details"]);
						$dt=array_merge($dt,array("Two wheelers"=>$list["Two_wheelers"] ,"Four wheelers"=>$list["Four_wheelers"]));
						$dt = array_diff($dt, array(0));
						unset($dt["Parking Charges"]);					
						$list["details"]=serialize($dt);
						$data["member_bill_details"]=$list;	
						$html= $this->load->view('bill/bill2',$data,true);
						$mpdf->SetTitle('Society Bill');
						$mpdf->WriteHTML($html);
						// if(($i % 2) == 0 ){
							//&& ((count($dt)+1)>4)
								$mpdf->AddPage('P','A4');
								// "<pagebreak />";
							
													
						// }
						// $i++;
					}	
					$blankpage = $mpdf->page + 1;
					$mpdf->DeletePages($blankpage);
					$mpdf->Output();
				}
				else if($bill_format=="4"){
					$mpdf = new \Mpdf\Mpdf();			
					foreach($rds as $list){
						$dt = unserialize($list["details"]);
						$dt=array_merge($dt,array("Two wheelers"=>$list["Two_wheelers"] ,"Four wheelers"=>$list["Four_wheelers"]));
						unset($dt["Parking Charges"]);						
						$list["details"]=serialize($dt);						
						$data["member_bill_details"]=$list;
						$html = $this->load->view('bill/bill3',$data,true); 			
						$mpdf->SetTitle('mSociety');
						$mpdf->WriteHTML($html);
						
					}			
					
					$blankpage = $mpdf->page + 1;
					$mpdf->DeletePages($blankpage);
					$mpdf->Output();
				}
				else if($bill_format=="5"){
					$mpdf = new \Mpdf\Mpdf();			
					foreach($rds as $list){
						$dt = unserialize($list["details"]);
						
						$dt=array_merge($dt,array("Two wheelers"=>$list["Two_wheelers"] ,"Four wheelers"=>$list["Four_wheelers"]));
						unset($dt["Parking Charges"]);
						
						$list["details"]=serialize($dt);
						$data["member_bill_details"]=$list;
						$html = $this->load->view('bill/bill4',$data,true); 
						$mpdf->WriteHTML($html);
						$mpdf->AddPage('P','A4');
					}	
					$blankpage = $mpdf->page + 1;
					$mpdf->DeletePages($blankpage);
					$mpdf->Output();
				}				
			}else{
				$message['text'] = "Bill details not available!!";
				$message['status'] = "Fail";
				$this->session->set_flashdata('message', $message);			
				redirect('societies/society_bill_generate/'.$society_id, 'refresh');
			}
		}else{
			$message['text'] = "First Select Default bank!!";
			$message['status'] = "Fail";
			$this->session->set_flashdata('message', $message);			
			redirect('societies/society_bill_generate/'.$society_id, 'refresh');
		}
		
		
	}


	public function download_reciept()
	{
		$data = array(
			'title' => "Societies"
		);
		$this->load->library('Pdf'); // Load library
		$this->pdf->fontpath = 'font/'; // Specify font folder
		// $this->load->library('pdfdom');
		// require_once("application/libraries/tcpdf/tcpdf.php");
		$society_id = $this->uri->segment(3);
		$bill_month = $this->uri->segment(4);

		$society = $this->Society_model->get_society_details($society_id);
		$member = $this->Member_model->get_members_by_society($society_id);
		$calculated_amount = 0;
		$total_amount = 0;
		//set last bill month
		$reciept_data = $this->Bill_detail_model->get_reciept_data($society_id, $bill_month);
		$bill_date = $reciept_data[0]['bill_date'];
        $month = date('m',strtotime($bill_date));
        $year = date('Y',strtotime($bill_date));
        $day = date('d',strtotime($bill_date." -1 day"));
        //create Month
        $current_month = date('Y-m-d',strtotime($year."-".$month."-"."1"));
        $last_month = date('M',strtotime($current_month." -1 month"));
        $last_Month = date('m',strtotime($current_month." -1 month"));
		$last_month_bill =  $this->Bill_detail_model->get_last_month_bill_by_society($society_id,$last_Month);
		// echo"<pre>";print_r($last_month_bill);echo"<pre>";
		$last_month_bill_date = $last_month_bill[0]['bill_date'];
		$payment_date_min = date('Y-m-d', strtotime($last_month_bill_date."+1 day"));
		$payment_date_max = date('Y-m-d',strtotime($bill_date.' -1 day'));
		$last_month_year = date('M-Y',strtotime($current_month." -1 month"));


		foreach($reciept_data as $reciept)
		{
        	$data['bill_month'] = date('M-Y',strtotime($bill_date));
        	$data['last_month'] = date('M-Y',strtotime($current_month." -1 month"));
			$reciept['last_payment'] = $this->Payment_model->get_payment_reciept($reciept['member_id'], $payment_date_min,$payment_date_max);
			// echo"<pre>";print_r($this->db->last_query());echo"<pre>";
        	$data['last_payment_date'] = date('M-Y',strtotime($current_month." -1 month"));
			// $data['rds'][] = $reciept;
			$rds[] = $reciept;
		  }
	
  		$this->load->library('Pdf'); // Load library
  		$this->load->library('Numbertowords');
		$this->pdf->fontpath = 'font/'; // Specify font folder
		foreach ($rds as $rd) {
			if(!empty($rd['last_payment'])):
			
			if(!empty($rd["last_payment"][0]['payment_date']))
			{
				$payment_date = date('d M Y',strtotime($rd["last_payment"][0]['payment_date']));
			}
			else{
				$payment_date = '';
			}
				$dt = unserialize($rd["details"]);

              $this->pdf->AddPage('P','A4'); 
              $this->pdf->Rect(5, 5, 200, (287/2)-10, 'D');   
              $this->pdf->SetFont('Arial','',20);

              // $this->pdf->setX('40');
              $this->pdf->SetFont('Times','B',14);              
              $this->pdf->MultiCell(190,2,$rd["societyname"],0,'C');
              $this->pdf->Ln();
              $this->pdf->SetFont('Times','',10);
              $this->pdf->MultiCell(190,2,$rd["registration_no"],0,'C');
              $this->pdf->Ln();

              $this->pdf->SetFont('Times','',10);
              $this->pdf->MultiCell(190,2,$rd["address"],0,'C');
              $this->pdf->Ln();
              $this->pdf->Ln();
              $this->pdf->setX('85');
              $this->pdf->SetFont('Times','B',16);
              $this->pdf->Cell(30,5,'Reciept for '.$last_month_year,0,'R');
              $this->pdf->Ln();
              $this->pdf->Ln();
              $this->pdf->SetFont('Times','',12);
              $this->pdf->Cell(20,5,'Reciept No : ',0,'R');
              $this->pdf->setX('33');
              $this->pdf->Cell(15,5,$rd["last_payment"][0]['receipt_id'],0,'L');/*$rd["last_payment"]['receipt_id']*/
              $this->pdf->setX('163');
              $this->pdf->Cell(30,5,'Date :',0,'R');
              $this->pdf->setX('175');
			  $this->pdf->Cell(25,5,$payment_date,0,'L');/*$rd["last_payment"]['payment_date']*/
			  
			//   $user = $this->Member_model->get_flat_owner($rd["member_id"]);

              $this->pdf->Ln();
              $this->pdf->Cell(30,5,'Received with Thanks From :',0,'R');
              $this->pdf->setX('62');
            //   $this->pdf->Cell(50,5,$user ? 'Name: '.$user['first_name'].' '.$user['last_name'] : '',0,'L');
              $this->pdf->Cell(50,5,$rd['member_name'],0,'L');

              $this->pdf->Ln();
              $this->pdf->Cell(30,5,'Wing/Flat No :',0,'R');
              $this->pdf->setX('37');
              $this->pdf->Cell(25,5,$rd["wing"].'/'.$rd["flat_no"],0,'L');

	            $this->pdf->Ln();
	            $this->pdf->Cell(30,5,'The sum of Rs.:',0,'R');
	            $this->pdf->setX('38');
	            $this->pdf->Cell(30,5,$rd['last_payment'][0]['credit'],0,'R');/*$rd["last_payment"]['credit']*/
	            $this->pdf->Ln();
	            $this->pdf->Cell(50,5,'(Rupees '.$this->numbertowords->convert_number($rd["last_payment"][0]["credit"]).' Only)' ,0,'L');/*$rd["last_payment"]['credit']*/

	            $this->pdf->Ln();
	            $this->pdf->Cell(30,5,'By '.$rd['last_payment'][0]['paid_by'],0,'R');
	            if($rd['last_payment'][0]['paid_by'] == 'cheque' || $rd['last_payment'][0]['paid_by'] == 'Cheque'):
		            $this->pdf->Ln();
		            $this->pdf->Cell(30,5,'Cheque No.: '.$rd['last_payment'][0]['cheque_no'],0,'R');
	        	endif;
	        	$this->pdf->setX('156');
	            $this->pdf->Cell(25,5,'Dated On :'.$payment_date,0,'R');

	            $this->pdf->Ln();
		        $this->pdf->Cell(30,5,'Drawn On.: '.$rd['last_payment'][0]['depositor_bank'],0,'R');

	            // $this->pdf->setX('175');
	            // $this->pdf->Cell(25,5,$rd["last_payment"][0]['payment_date'],0,'L');
	            // $this->pdf->setX('95');
	            // $this->pdf->Cell(30,5,!empty($rd['last_payment'][0]['paid_by'])?$rd['last_payment'][0]['paid_by']:'',0,'R');
	            // $this->pdf->setX('170');
	            // $this->pdf->Cell(30,5,!empty($rd['last_payment'][0]['credit'])?$rd['last_payment'][0]['credit']:'',0,'R');
              // $this->pdf->Cell(50,5,$receipt['post_code'].' '.$receipt['country_name'],0,'L');
              // $this->pdf->Footer();
	            // $this->pdf->Ln();
	            // $this->pdf->Cell(30,5,'Name: ',0,'R');
	            // $this->pdf->setX('24');
	            // $this->pdf->Cell(30,5,$rd['member_name'],0,'R');
	            // $this->pdf->setX('170');
	            // $this->pdf->Cell(30,5,$rd['societyname'],0,'R');

	            $this->pdf->Ln();
	        	// $this->pdf->setY('195');
                $this->pdf->MultiCell(190,5,' -------------------------------------------------------------------------------------------------------------------------------------',0,'L');
                $this->pdf->Ln();
	            $this->pdf->Cell(30,5,'This is system generated reciept and does not require signature.',0,'R');
	            $this->pdf->setX('152');
	            $this->pdf->Cell(30,5,'Hon. Secretary / Chairman',0,'R');
	        endif;
            }
            $this->pdf->Output();
  		//$this->load->view('societies/bills/pf',$data);
 		//$mpdf = new \Mpdf\Mpdf();
		// $html = 
    	// $mpdf->WriteHTML($html);
    	// $mpdf->Output();
		// $mpdf->Output($society_id.'_'.$bill_month.'_'."bill.pdf",'D'); 
		// $this->load->view('societies/bills/bill_pdf_new',$data);
		// ini_set("pcre.backtrack_limit", "5000000");
  // 		ini_set('max_execution_time', "-1");
		// $this->pdfdom->load_view('societies/bills/bill_pdf_new', $data);
		// $this->pdfdom->render();
	 //  	$this->pdfdom->stream($society_id.'_'.$bill_month.'_'."bill.pdf");
	}

	public function sms_send_bill() {
		$society_id = $this->uri->segment(3);
		$bill_month = $this->uri->segment(4);
		$society = $this->Society_model->get_society_details($society_id);
		$members = $this->Member_model->get_members_society($society_id);
		
		foreach($members as $member)
		{
			$bill_details = $this->Bill_detail_model->get_bill_by_date_member_id($member['id'], $bill_month);
			$member_balance = $this->Payment_model->get_payment_by_member($bill_details[0]['member_id']);
			$difference = 0;
			if(($member_balance[count($member_balance)-2]['balance']) < 0 && $bill_details[0]['principal_arrears']):
				$difference = $member_balance[0]['balance'];
			elseif($bill_details[0]['principal_arrears'] < 0):
				$difference = $bill_details[0]['amount'];
			endif;

			$outstanding = $difference != 0 ? ($bill_details[0]['total_due'] + $bill_details[0]['amount']) : $bill_details[0]['total_due'];
	            if(!empty($member['phone']) && $member['phone'] != NULL):
					$b_sender = 'PayNet';
                    // $msg =  'Dear Member '.$member['wing'].' '.$member['flat_no'].', Maintenance Bill No'.$bill_details[0]['bill_no'].' for the month of '.$bill_details[0]['bill_month'].' amounting to Rs. '.$bill_details[0]['bill_amount'].' has been generated and the due date is '.$bill_details[0]['due_date'].'. Current O/S balance is Rs.'.$outstanding.' '.'Regards '.$society[0]->name;
                    $msg =  'Dear Member '.$member['wing'].' '.$member['flat_no'].', Please note your Maintenance Bill for '.$bill_details[0]['bill_month'].' is generated for Rs. '.$bill_details[0]['total_due'].'. Please login to app and pay the bill. Regards '.$society[0]->name.'. Powered by PayNet.';
                    $m_phone = $member['phone'];
                    
                    $postData = array(
                        'to' => "+91".$m_phone,
                        'body' => $msg,
                        'from' => $b_sender,
						"restrictions" => ["india" =>[
							"templateId"=>1007261609457684277,
							"entityId"=>1001034198501773685
							]
						]
                    );
                    
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://connect.routee.net/sms",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => json_encode($postData),
                        CURLOPT_HTTPHEADER => array(
                            "authorization: Bearer 3b03fb0e-ae81-4f2e-80d4-2e93b446ae30",
                        	"content-type: application/json"
                        ),
                    ));
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    $resp = json_decode($response,true);
	                $message['text'] = "Bill sent Successfully!!";
					$message['status'] = "Success";
					$this->session->set_flashdata('message', $message);
					// exit(json_encode(array(
					// 	'errorMsg' => 'Bill sent successfully.'
					// )));
	                // exit(json_encode(array('errorMsg' => $society['name'].'_'.'- SMS Sent.')));
	            else:
					$message['text'] = "Please Check Your Input!!";
					$message['status'] = "Fail";
					$this->session->set_flashdata('message', $message);
					// exit(json_encode(array(
					// 		'errorMsg' => 'Bill not sent.'
					// 	)));
	                // echo 'SMS not sent.';
	            endif;
        	// endif;
		}
		redirect('societies/details/'.$society_id);
	}

	public function email_send_bill() {
		$society_id = $this->uri->segment(3);
		$bill_month = $this->uri->segment(4);
		$society = $this->Society_model->get_society_details($society_id);
		$members = $this->Member_model->get_members_by_society_led($society_id);
		

		foreach($members as $member)
		{
			$bill_details = $this->Bill_detail_model->get_bill_by_date_member_id($member['id'], $bill_month);
			$member_balance = $this->Payment_model->get_payment_by_member($bill_details[0]['member_id']);
			$difference = 0;
			if($member_balance[0]['balance'] < 0 && $bill_details[0]['principal_arrears']):
				$difference = $member_balance[0]['balance'];
			elseif($bill_details[0]['principal_arrears'] < 0):
				$difference = $bill_details[0]['amount'];
			endif;
			$flat_owner = $this->Member_model->get_flat_owner($member['id']);
			$outstanding = $difference != 0 ? ($bill_details[0]['total_due'] + $bill_details[0]['amount']) : $bill_details[0]['total_due'];
	            // if(!empty($email) && $email != NULL):
				if($flat_owner['email'] != NULL):
		            $email_to = $flat_owner['email'];
		            $messages = 'Dear Member '.$member['wing'].' '.$member['flat_no'].', Maintenance Bill No'.$bill_details[0]['bill_no'].' for the month of '.$bill_details[0]['bill_month'].' amounting to Rs. '.$bill_details[0]['bill_amount'].' has been generated and the due date is '.$bill_details[0]['due_date'].'. Current O/S balance is Rs.'.$outstanding.' '.'Regards '.$society[0]->name;
		            $this->load->library('email');
		            $this->email->set_newline("\r\n");
		            $this->email->from('no-reply@paynet.co.in'); // change it to yours
		            $this->email->to($email_to);// change it to yours
		            $this->email->subject('Society Notification');
		            $this->email->message($messages);
		            if($result = $this->email->send())
		            {
		            	$message['text'] = "Bill sent Successfully!!";
						$message['status'] = "Success";
						$this->session->set_flashdata('message', $message);
						// exit(json_encode(array(
						// 	'errorMsg' => 'Bill sent successfully.'
						// )));
		              // echo 'Email sent.';
		            }
		            else
		            {
		            	// show_error($this->email->print_debugger());
						$message['text'] = "Please Check Your Input!!";
						$message['status'] = "Fail";
						$this->session->set_flashdata('message', $message);
						// exit(json_encode(array(
						// 		'errorMsg' => 'Bill not sent.'
						// 	)));
		            }
		        endif;
			// endif;
        	// endif;
		}
		redirect('societies/details/'.$society_id);
		
	}

	public function member_ledger() {
		$data = array(
			'title' => "Societies"
		);
		$this->load->view('societies/members/member_ledger', $data);
	}

	public function view_security_guard($society_id) {
		$data = array(
			'title' => "Societies"
		);
		$data['security_guards'] = $this->Society_model->get_security_guard($society_id);
		
		$vend['vendor_id'] = intval($society_id);
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://msociety.paynet.co.in/vms/public/index.php/api/v1/vendor/users',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_POSTFIELDS =>json_encode($vend),
			CURLOPT_HTTPHEADER => array(
			  'Accept: application/json',
			  'secret: GuSkc8LVB9sj75ex7i8KyxivA0oNcirfBfVIZrCs',
			  'Content-Type: application/json'
			),
		  ));

		$response = curl_exec($curl);
		
		curl_close($curl);
		$resp = json_decode($response,true);
	
		if(isset($resp['data']) &&!empty($resp['data']))
			$data['security_guards'] = $resp['data'];
			
		else
		  $data['security_guards'] = array();
		$this->load->view('societies/society_actions/view_security_guards', $data);
	}

	public function view_visitors($society_id) {
		$data = array(
			'title' => "Societies"
		);
  		$vm['vendor_id'] = $society_id;
		  // $rad['password'] = $this->input->post('password');
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://msociety.paynet.co.in/vms/public/index.php/api/v1/vendor/visitor/log',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_POSTFIELDS =>json_encode($vm),
			CURLOPT_HTTPHEADER => array(
			  'Accept: application/json',
			  'secret: GuSkc8LVB9sj75ex7i8KyxivA0oNcirfBfVIZrCs',
			  'Content-Type: application/json'
			),
		  ));
		  $response = curl_exec($curl);
		
		  curl_close($curl);
		  $resp = json_decode($response,true);
		  $data['visitors'] = $resp['data'];
		
		// $data['security_guards'] = $this->Society_model->get_security_guard($society_id);
		
		$this->load->view('societies/society_actions/view_visitors', $data);
	}

	public function add_security_guard($society_id) {
		$data = array(
			'title' => "Societies"
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name','Last Name','required');
		$this->form_validation->set_rules('mobile','Phone','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run())     
        {
			$society_id = $this->input->post('vendor_id');
			$send_data = array(
				'first_name'=>$this->input->post('first_name'),
				'last_name'=>$this->input->post('last_name'),
				'mobile'=>$this->input->post('mobile'),
				'password'=>$this->input->post('password'),
				'username'=>$this->input->post('username'),
				'vendor_id'=>$this->input->post('vendor_id'),
				'member_id'=>$this->session->userdata('user_id')
			);
			if(!empty($this->input->post('email')))
			{
				$send_data['email'] = $this->input->post('email');
			}
			$curl = curl_init();
			
			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://msociety.paynet.co.in/vms/public/index.php/api/v1/vendor/user',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS =>json_encode($send_data),
				CURLOPT_HTTPHEADER => array(
				  'secret: GuSkc8LVB9sj75ex7i8KyxivA0oNcirfBfVIZrCs',
				  'Content-Type: application/json'
				),
			  ));
			  
			  $response = curl_exec($curl);
			curl_close($curl);
			$resp = json_decode($response,true);        
			
        	if($resp['response']['status'] == 'success'):
				$send = array(
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'phone'=>$this->input->post('mobile'),
					'email'=>$this->input->post('email'),
					'username'=>$this->input->post('username'),
					'society_id' => $society_id,
					'guard_id' => $resp['data']['id'],
					'created_by' => $this->session->userdata('user_id'),
					'created_at' => date('Y-m-d h:i:s')
				);

				$add_security_guard = $this->Society_model->add_security_guard($send);
            	$message['text'] = "Security Guard Added successfully!!";
				$message['status'] = "Success";
				$this->session->set_flashdata('message', $message);
            	redirect('societies/details/'.$society_id);
            else:
            	$data['_view'] = 'society/add';
        		$message['text'] = "Please Check Your Input!!";
        		$message['status'] = "Fail";
        		$this->session->set_flashdata('message', $message);
            	$this->load->view('societies/society_actions/add_security_guard',$data);
            endif;
        }
        else
        {
            $data['_view'] = 'society/add';
            $data['society_id'] = $society_id;
            $this->load->view('societies/society_actions/add_security_guard',$data);
        }
	}

	public function delete_guard($id,$society_id)
    {

        $guard = $this->Society_model->get_security_guard_indv($id);
        $society_id = $this->uri->segment(4);
        if(isset($guard['security_guard_id']))
        {
			$vend = array(
				'id' => $guard['guard_id'],
				'vendor_id' => $guard['society_id'],
				'member_id' => $this->session->userdata('user_id'),
			);
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://msociety.paynet.co.in/vms/public/index.php/api/v1/vendor/user',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'DELETE',
			CURLOPT_POSTFIELDS =>json_encode($vend),
			CURLOPT_HTTPHEADER => array(
				'Accept: application/json',
				'secret: GuSkc8LVB9sj75ex7i8KyxivA0oNcirfBfVIZrCs',
				'Content-Type: application/json'
			),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$resp = json_decode($response,true);        
			
        	if($resp['response']['status'] == 'success'):
            	$this->Society_model->delete_guard($guard['security_guard_id']);
				redirect('societies/details/'.$society_id);
			endif;
        }
        else
            show_error('The Guard you are trying to delete does not exist.');
    }

	public function edit_security_guard($id, $society_id)
	{
        $data = array(
            'title' => "Edit Society"
        );
        // check if the member exists before trying to edit it
        $id = $this->uri->segment(3);
        $data['society_id'] =  $society_id = $this->uri->segment(4);
		$gurrd = $this->Society_model->get_security($id,$society_id);
		$curl = curl_init();
		$vend['id'] = $gurrd['guard_id'];
		$vend['vendor_id'] = $society_id;
		if(in_array($_SERVER['HTTP_HOST'], array('msociety.paynet.co.in'))){
			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://msociety.paynet.co.in/vms/public/index.php/api/v1/vendor/user/find',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_POSTFIELDS =>json_encode($vend),
				CURLOPT_HTTPHEADER => array(
					'Accept: application/json',
					'secret: GuSkc8LVB9sj75ex7i8KyxivA0oNcirfBfVIZrCs',
					'Content-Type: application/json'
				),
				));
		
				$response = curl_exec($curl);
				curl_close($curl);
				$resp = json_decode($response,true);
				$data['security_guard'] = $resp['data'];
				$data['local_guard'] = $gurrd;
		}else{
			$data['security_guard'] = array();
			$data['local_guard'] = array();
		}
		
				
        $this->load->view('societies/society_actions/edit_security_guard',$data);
	}

	public function update_security_guard($id,$society_id)
	{
		$society_id = $this->input->post('vendor_id');
		$send_data = array(
			'id'=>$this->input->post('id'),
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'vendor_id'=>$this->input->post('vendor_id'),
			'member_id'=>$this->session->userdata('user_id'),
		);
		if(!empty($this->input->post('phone')))
		{
			$send_data['mobile'] = $this->input->post('phone');
		}
		if(!empty($this->input->post('username')))
		{
			$send_data['username'] = $this->input->post('username');
		}
		if(!empty($this->input->post('email')))
		{
			$send_data['email'] = $this->input->post('email');
		}
		if(!empty($this->input->post('password')))
		{
			$send_data['password'] = $this->input->post('password');
		}
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://msociety.paynet.co.in/vms/public/index.php/api/v1/vendor/user',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS =>json_encode($send_data),
		CURLOPT_HTTPHEADER => array(
			'Accept: application/json',
			'secret: GuSkc8LVB9sj75ex7i8KyxivA0oNcirfBfVIZrCs',
			'Content-Type: application/json'
		),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$resp = json_decode($response,true);
		
		if($resp['response']['status'] == 'success'):
			$send = array(
				'first_name'=>$this->input->post('first_name'),
				'last_name'=>$this->input->post('last_name'),
				'society_id' => $society_id,
				'guard_id' => $resp['data']['id'],
				'updated_at' => date('Y-m-d h:i:s')
			);
			if(!empty($this->input->post('phone')))
			{
				$send['phone'] = $this->input->post('phone');
			}
			if(!empty($this->input->post('username')))
			{
				$send['username'] = $this->input->post('username');
			}
			if(!empty($this->input->post('email')))
			{
				$send['email'] = $this->input->post('email');
			}
			$security_guard_id = $this->input->post('security_guard_id');
			$add_security_guard = $this->Society_model->update_security_guard($security_guard_id,$send);
			$message['text'] = "Security Guard Added successfully!!";
			$message['status'] = "Success";
			$this->session->set_flashdata('message', $message);
			redirect('societies/view_security_guard/'.$society_id);
		else:
			$data['_view'] = 'society/add';
			$message['text'] = "Please Check Your Input!!";
			$message['status'] = "Fail";
			$this->session->set_flashdata('message', $message);
			redirect('societies/view_security_guard/'.$society_id);
		endif;
	}

	
	public function import_members()
    {
        $society_id = $this->uri->segment(3);
		$this->load->library("Excel");
		$file=$_FILES['member_file']['tmp_name'];
		$dublicateCount = 0;     
		$objPHPExcel = PHPExcel_IOFactory::load($file);		
		$success=0;
		$duplicated=0;
		$worksheet=$objPHPExcel->getWorksheetIterator();
        foreach($objPHPExcel->getWorksheetIterator() as $worksheet)
        {			
			$objValidation = $objPHPExcel->getActiveSheet()->getCell('A1')->getDataValidation();
			$highestRow=$worksheet->getHighestRow();
			$highestColumn=$worksheet->getHighestColumn();
			
			for($row=1; $row<=$highestRow;$row++)
			{	
				
				if($row==1)
				{
					$wing=trim($worksheet->getCellByColumnAndRow(0,$row)->getValue());
					$flat_no=trim($worksheet->getCellByColumnAndRow(1,$row)->getValue());
					$tenant
					=trim($worksheet->getCellByColumnAndRow(2,$row)->getValue());
					$name
					=trim($worksheet->getCellByColumnAndRow(3,$row)->getValue());
					$flat_area
					=trim($worksheet->getCellByColumnAndRow(4,$row)->getValue());
					$principal_arrears
					=trim($worksheet->getCellByColumnAndRow(5,$row)->getValue());
					$interest_arrears
					=trim($worksheet->getCellByColumnAndRow(6,$row)->getValue());

					$no_of_two_wheelers
					=trim($worksheet->getCellByColumnAndRow(7,$row)->getValue());
					$no_of_four_wheelers
					=trim($worksheet->getCellByColumnAndRow(8,$row)->getValue());					
					
					if($wing != 'wing' || $flat_no != 'flat_no'|| $tenant != 'tenant'|| $name != 'name'|| $flat_area != 'flat_area'|| $principal_arrears != 'principal_arrears'|| $interest_arrears != 'interest_arrears'|| $no_of_two_wheelers != 'no_of_two_wheelers'|| $no_of_four_wheelers != 'no_of_four_wheelers'){		
								
						$this->session->set_flashdata('message', array("status"=>"Fail","text"=>"Please Upload Proper Excel"));
        				redirect('member/manage'.'/'.$society_id);
					}
					
				}
				else {	
					
					$wing=trim($worksheet->getCellByColumnAndRow(0,$row)->getValue());
					$flat_no=trim($worksheet->getCellByColumnAndRow(1,$row)->getValue());
					$tenant=trim($worksheet->getCellByColumnAndRow(2,$row)->getValue());
					$name=trim($worksheet->getCellByColumnAndRow(3,$row)->getValue());
					$flat_area=trim($worksheet->getCellByColumnAndRow(4,$row)->getValue());
					$principal_arrears=trim($worksheet->getCellByColumnAndRow(5,$row)->getValue());
					$interest_arrears=trim($worksheet->getCellByColumnAndRow(6,$row)->getValue());
					$no_of_two_wheelers=trim($worksheet->getCellByColumnAndRow(7,$row)->getValue());
					$no_of_four_wheelers=trim($worksheet->getCellByColumnAndRow(8,$row)->getValue());

					if((preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $flat_no))OR(preg_match('/[\'^£$%;*()}{@#~?><>,|=_+¬-]/', $name))OR (!is_numeric($tenant))OR (!is_numeric($flat_area))  OR (!is_numeric($principal_arrears)) OR (!is_numeric($interest_arrears))OR (!is_numeric($no_of_two_wheelers)) OR (!is_numeric($no_of_four_wheelers))){
						$error_data[]=array("flat"=>$wing."-".$flat_no);
						
					}else{
						$exit_flat=$this->Member_model->get_member_exit($wing,$flat_no,$society_id);				
						
						if(empty($exit_flat)){

							// $principal_arrears = $row['principal_arrears'];
							// $interest_arrears = $row['interest_arrears'];
							$member_balance = (-($principal_arrears + $interest_arrears));	
							$flat_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
	
							//check duplicate flat code-24-08-2022 sachhidanand gupta
							$check_flat_code=$this->Member_model->check_flat_code($flat_code);
							if(!empty($exit_flat)){
								$flat_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
							}
							$params = array(
								'wing' => $wing,
								'flat_no' => $flat_no,
								'tenant' => $tenant,
								'name' => $name,
								'flat_area' => $flat_area,
								'principal_arrears' => $principal_arrears,
								'interest_arrears' => $interest_arrears,
								'two_wheelers' => $no_of_two_wheelers,
								'four_wheelers' => $no_of_four_wheelers,
								'member_balance' => $member_balance,
								'society_id' => $society_id,
								'flat_code' => $flat_code
							);
							// Insert member data							
							$insert = $this->Member_model->add_member($params);
							if($principal_arrears > 0){
								$this->Member_model->insert_member_arrears($insert,$principal_arrears);
							}
							
							if($interest_arrears > 0){
								$this->Member_model->insert_member_interest_arrears($insert,$interest_arrears);
							}

							//add condition for add balance base on principal_arrears

							$this->Member_model->insert_member_balance($insert,-($principal_arrears+$interest_arrears));	
							$balance = -($principal_arrears+$interest_arrears);
							
							/*Add society member bill payment logs*/
							$bpm_logs = array(
								'entity_id' => $insert,
								'member_id' => $insert,
								'amount' => $balance,
								'type' => 'OPENINGBALANCE',
								'dnt' => time(),
							);
							$this->Member_model->insert_bpm_logs($bpm_logs);

							if($balance >= 0):
								/*Add society member bill payment transaction logs*/
								$bpm_txn_logs = array(
									'entity_id' => $insert,
									'narration' => 'OPENINGBALANCE',
									'credit' => '',
									'debit' => $balance,
									'balance' => $balance,
									'dnt' => time(),
									'member_id' => $insert,
								);
								$this->Member_model->insert_bpm_txn_logs($bpm_txn_logs);
							elseif($balance < 0):
								/*Add society member bill payment transaction logs*/
								$bpm_txn_logs = array(
									'entity_id' => $insert,
									'narration' => 'OPENINGBALANCE',
									'credit' => -($balance),
									'debit' => '',
									'balance' => $balance,
									'dnt' => time(),
									'member_id' => $insert,
								);
								$this->Member_model->insert_bpm_txn_logs($bpm_txn_logs);
							endif;

							//checking society accounting details present or not-03-03-2022
							$accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
							if(!empty($accounting_db_details)){
								//accounting entry
								if($wing!=''){
									$ledger_name="Flat-".$wing."-".$flat_no;
								}else{
									$ledger_name="Flat-".$flat_no;
								}						
								$bal= $principal_arrears + $interest_arrears;	
								if($bal >= 0):									
									$debit_crdit="D";								
									// $group_id=6;
									$group_id=$this->ledger->get_group_id("Current Assets");
								elseif($bal < 0):								
									$debit_crdit="C";								
									//$group_id=11;
									$group_id=$this->ledger->get_group_id("Current Liabilities");
								
								endif;
								
								$flat_ledger_id=$this->ledger->create_ledger($ledger_name,"flat",$society_id,"sc_flat_acc_Details",abs($bal),$group_id,$debit_crdit,$insert);
								
							}							
							
							$success++;
						}else{
							$duplicated++;
						}
					}
					
				}
				
			}
		}
		
		$message['status'] = "Success";
		$error_data_explite='';
		if(!empty($error_data)){
			$error_data_explite="And Error in --(".implode(', ', array_map(function ($error_data) {
				return $error_data['flat'];
			  }, $error_data)).")";	
			 
		}

		$message['text'] ="Members added successfully and Import data is ".$success." and duplicate data is ".$duplicated." ".$error_data_explite;		
		$this->session->set_flashdata('message', $message);
		
		echo "1";
		// redirect('member/manage'.'/'.$society_id);
    }

	public function import_members_bak()
    {

        $society_id = $this->uri->segment(3);

        if(is_uploaded_file($_FILES['member_file']['tmp_name']))
        {			
            // Load CSV reader library
            $this->load->library('CSVReader');
            // Parse data from CSV file
            $csvData = $this->csvreader->parse_csv($_FILES['member_file']['tmp_name']);			
            $rowCount = 0;
            $insertCount = 0;
			$dublicateCount = 0;
            // Insert/update CSV data into database
            if(!empty($csvData))
            {

				$error_count = 0;
                foreach($csvData as $row)
                {
                    $flat = $row['flat_no'];
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $flat)){
                        $message['text'] = "Mamber Flat No. is not valid";
                        $error_count++;
                    }
                    elseif(!is_numeric($row['tenant'])){
                        $message['text'] = "Please specify proper values for tenant or owner";
                        $error_count++;

                    }

                    // elseif(!preg_match("/^[0-9]{10}$/", $row['phone'])){

                    //     $message['text'] = "Mamber Phone No. is invalid";

                    //     $error_count++;

                    // }

                    elseif(!is_numeric($row['flat_area'])){
                        $message['text'] = "Mamber Flat Area is invalid or missing";
                        $error_count++;
                    }

                    elseif(!is_numeric($row['principal_arrears'])){
                        $message['text'] = "Mamber Principal Arrears is invalid or missing";
                        $error_count++;
                    }

                    elseif(!is_numeric($row['interest_arrears'])){
                        $message['text'] = "Mamber Interest Arrears is invalid or missing";
                        $error_count++;

                    }

                    // elseif(!filter_var($row['email_id'], FILTER_VALIDATE_EMAIL))
                    // {
                    //     $message['text'] = "Mamber Email is invalid or missing";
                    //     $error_count++;
                    // }                    

                    elseif(!is_numeric($row['no_of_two_wheelers'])){
                        $message['text'] = "Mamber Two Wheeler is invalid or missing";
                        $error_count++;
                    }
                    elseif(!is_numeric($row['no_of_four_wheelers'])){
                        $message['text'] = "Mamber Four Wheeler is invalid or missing";
                        $error_count++;
                    }

                }

               	if($error_count > 0)
               	{

               		$error_count = $error_count;
               		$message['status'] = "Fail";
               		$this->session->set_flashdata('error_count', $error_count);
					// $this->session->set_flashdata('message', $message);
               		// redirect('societies/details'.'/'.$society_id);

               	}
               	else
               	{					
					$i=0;
					$split_csv_Data=array_chunk($csvData,50);					
					foreach($split_csv_Data as $x => $val)
               		{
						foreach($val as $y => $row){
							$exit_flat=$this->Member_model->get_member_exit($row['wing'],$row['flat_no'],$society_id);
							if(empty($exit_flat)){
								$rowCount++;
								// Prepare data for DB insertion
								$principal_arrears = $row['principal_arrears'];
								$interest_arrears = $row['interest_arrears'];
								$member_balance = (-($principal_arrears + $interest_arrears));
								$flat_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
								//check duplicate flat code-24-08-2022 sachhidanand gupta
								$check_flat_code=$this->Member_model->check_flat_code($flat_code);
								if(!empty($exit_flat)){
									$flat_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
								}

								$params = array(
									'wing' => $row['wing'],
									'flat_no' => $row['flat_no'],
									'tenant' => $row['tenant'],
									'name' => $row['name'],
									'flat_area' => $row['flat_area'],
									'principal_arrears' => $row['principal_arrears'],
									'interest_arrears' => $row['interest_arrears'],
									'two_wheelers' => $row['no_of_two_wheelers'],
									'four_wheelers' => $row['no_of_four_wheelers'],
									'member_balance' => $member_balance,
									'society_id' => $society_id,
									'flat_code' => $flat_code

								);

								// Insert member data

								$principal_arrears = $row['principal_arrears'];
								$interest_arrears = $row['interest_arrears'];
								$insert = $this->Member_model->add_member($params);			
								if($principal_arrears > 0){
									$this->Member_model->insert_member_arrears($insert,$principal_arrears);
								}

								if($interest_arrears > 0){
									$this->Member_model->insert_member_interest_arrears($insert,$interest_arrears);

								}

								$this->Member_model->insert_member_balance($insert,-($principal_arrears+$interest_arrears));
								
								$balance = -($principal_arrears+$interest_arrears);

								/*Add society member bill payment logs*/

								$bpm_logs = array(
									'entity_id' => $insert,
									'member_id' => $insert,
									'amount' => $balance,
									'type' => 'OPENINGBALANCE',
									'dnt' => time(),

								);

								$this->Member_model->insert_bpm_logs($bpm_logs);
								if($balance > 0):
									/*Add society member bill payment transaction logs*/

									$bpm_txn_logs = array(
										'entity_id' => $insert,
										'narration' => 'OPENINGBALANCE',
										'credit' => '',
										'debit' => $balance,
										'balance' => $balance,
										'dnt' => time(),
										'member_id' => $insert,

									);

									$this->Member_model->insert_bpm_txn_logs($bpm_txn_logs);

								elseif($balance < 0):
									/*Add society member bill payment transaction logs*/
									$bpm_txn_logs = array(
										'entity_id' => $insert,
										'narration' => 'OPENINGBALANCE',
										'credit' => -($balance),
										'debit' => '',
										'balance' => $balance,
										'dnt' => time(),
										'member_id' => $insert,

									);

									$this->Member_model->insert_bpm_txn_logs($bpm_txn_logs);

								endif;

								//checking society accounting details present or not-03-03-2022

								$accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
								if(!empty($accounting_db_details)){
									//accounting entry
									if($row['wing']!=''){
										$ledger_name="Flat-".$row['wing']."-".$row['flat_no'];
									}else{
										$ledger_name="Flat-".$row['flat_no'];

									}						

									$bal= $row['principal_arrears'] + $row['interest_arrears'];

									if($bal >= 0):								

										$debit_crdit="D";
										// $group_id=6;
										$group_id=$this->ledger->get_group_id("Current Assets");
									elseif($bal < 0):								

										$debit_crdit="C";								
										//$group_id=11;
										$group_id=$this->ledger->get_group_id("Current Liabilities");									
									endif;
									
									$flat_ledger_id=$this->ledger->create_ledger($ledger_name,"flat",$society_id,"sc_flat_acc_Details",abs($bal),$group_id,$debit_crdit,$insert);

									if($flat_ledger_id=="0"){
										echo $insert;exit();

									}
								}
								if($insert)
								{					

									$insertCount++;

								}	

							}else{
								$dublicateCount++;
							}
						}
						sleep(10);// this should halt for 5 seconds for every loop
                										
					}
					
					$text="Members added successfully and Import data is ".$insertCount." and duplicate data is ".$dublicateCount; 
            		$message['status'] = "Success";
            		$message['text'] =$text ;

	            }				
				$this->session->set_flashdata('message', $message);
				redirect('member/manage'.'/'.$society_id);

            }

        }

    }

    public function get_society_qr()
    {
    	$society_id = $this->uri->segment(3);
		$society = $this->Society_model->get_society_details($society_id);
      
        $invo_path = 'https://merchants.paynet.co.in/apipaynet/get_merchant_qr';

        $post = array(
            'merchant_email'=>$society[0]->email,
            'secret_key'=>$society[0]->secret_key,
        );
        // $inv_data = json_encode($post);
        $curl = curl_init($invo_path);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $info = curl_getinfo($curl);
		$resp = json_decode($response,true);
        if($resp['response_code'] == 4002 || $resp['response_code'] == 4109)
        {
					$message['status'] = "Fail";
            $message['text'] = "QR Code not found!!!";
            $this->session->set_flashdata('message', $message);
            redirect('societies/details'.'/'.$society_id);
        }
        $qr_code_url = array(
        	'qr_code' => $resp['qr'],
        );
        $update_qr_code = $this->Society_model->update_society($society_id,$qr_code_url);
        if($update_qr_code)
        {
        	$message['status'] = "Success";
            $message['text'] = "QR Code successfully Imported";
            $this->session->set_flashdata('message', $message);
            redirect('societies/details'.'/'.$society_id);
        }
        else
        {
        	$message['status'] = "Fail";
            $message['text'] = "Unable to import QR Code!!!";
            $this->session->set_flashdata('message', $message);
            redirect('societies/details'.'/'.$society_id);
        }
	}
	
	public function import_societies()
    {
		
        // $society_id = $this->uri->segment(3);
        if(is_uploaded_file($_FILES['society_file']['tmp_name']))
        {
			
            // Load CSV reader library
            $this->load->library('CSVReader');
            // Parse data from CSV file
            $csvData = $this->csvreader->parse_csv($_FILES['society_file']['tmp_name']);
            $rowCount = 0;
			$insertCount = 0;		
			
            // Insert/update CSV data into database
            if(!empty($csvData))
            {
            	$error_count = 0;

                foreach($csvData as $row)
                {
					
					$rowCount++;

					if(empty($row['Society_Name']))
					{
						$error_count++;
                        $message['text'] = "Please provide Society Name on row ".$rowCount." Total Error Count ".$error_count;
                    }
					elseif(empty($row['Society_Address']))
					{
						$error_count++;
                        $message['text'] = "Please provide Society Address on row ".$rowCount." Total Error Count ".$error_count;
					}
					elseif(!filter_var($row['Society_Email'], FILTER_VALIDATE_EMAIL))
                    {
						$error_count++;
                        $message['text'] = "Society Email is invalid or missing on row ".$rowCount." Total Error Count ".$error_count;
					}
					elseif(!preg_match("/^[0-9]{10}$/", $row['Phone_Number']))
					{
						$error_count++;
                        $message['text'] = "Society Phone No. is invalid on row ".$rowCount." Total Error Count ".$error_count;
					}
					elseif(empty($row['Society_Reg_No']))
					{
						$error_count++;
                        $message['text'] = "Please provide Society Registeration Number on row ".$rowCount." Total Error Count ".$error_count;
					}
					// elseif(empty($row['SocietyOpeningBal']) || !is_numeric($row['SocietyOpeningBal']))
					// {
					// 	$error_count++;
                    //     $message['text'] = "Please provide Society Opening Balance on row ".$rowCount." Total Error Count ".$error_count;
					// }
					elseif(!is_numeric($row['No_Of_Flats']))
					{
						$error_count++;
                        $message['text'] = "Total Number of Flats invalid or missing on row ".$rowCount." Total Error Count ".$error_count;
                    }
					elseif(!is_numeric($row['Billing_Day']))
					{
						$error_count++;
                        $message = "Bill Day is invalid or missing on row ".$rowCount." Total Error Count ".$error_count;
                    }
					elseif(!is_numeric($row['Due_Day']))
					{
                        $message['text'] = "Due Day is invalid or missing on row ".$rowCount." Total Error Count ".$error_count;
                        $error_count++;
					}
					elseif(empty($row['Interest_Type']))
					{
						$error_count++;
                        $message['text'] = "Society Interest Type is invalid or missing on row ".$rowCount." Total Error Count ".$error_count;
					}
					elseif(empty($row['Interest_Span']))
					{
						$error_count++;
                        $message['text'] = "Society Interest Span is invalid or missing on row ".$rowCount." Total Error Count ".$error_count;
					}
					elseif(!is_numeric($row['Interest_Rate']))
					{
						$error_count++;
                        $message['text'] = "Interest Rate is invalid or missing on row ".$rowCount." Total Error Count ".$error_count;
                    }
					// elseif(!is_numeric($row['NOCCharge']))
					// {
					// 	$error_count++;
                    //     $message['text'] = "NOC Charge value is invalid or missing on row ".$rowCount." Total Error Count ".$error_count;
					// }
					// elseif(!is_numeric($row['IsNOCPerUnit']))
					// {
					// 	$error_count++;
                    //     $message['text'] = "NOC Charge type is invalid or missing on row ".$rowCount."Total Error Count ".$error_count;
                    // }
                }

               	if($error_count > 0)
               	{
               		$error_count = $error_count;
               		$message['status'] = "Fail";
               		$this->session->set_flashdata('message', $message);
               		$this->session->set_flashdata('error_count', $error_count);
               		// redirect('societies');
               	}
               	else
               	{
               		foreach($csvData as $row)
               		{
                		$rowCount++;

						$post['how_you_know'] = 'ManageMod';
						$post['web_url'] = 'msociety.paynet.co.in';
						$post['web_desc'] = 'msociety';
						$post['email'] = $row['Society_Email'];
						$post['f_name'] = $row['Society_Name'];
						$post['store_name'] = $row['Society_Name'];
						$post['password'] = 'PaySociety@123';
						$post['country_code'] = '0091';
						$post['from_api'] = 'true';
						$post['phone_number'] = $row['Phone_Number'];
						

						// $reg_path = 'https://develop.paynet.co.in/user/authenticate_registeration/';

						// $reg_data = json_encode($post);

						// $curl = curl_init($reg_path);

						// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
						// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
						// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
						// curl_setopt($curl, CURLOPT_POST, true);
						// curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
						// $response = curl_exec($curl);
						// $err = curl_error($curl);
						// $info = curl_getinfo($curl);
						// $resp = json_decode($response,true);	
						
						
						$reg_path = 'https://merchants.paynet.co.in/user/authenticate_registeration1/';             
						$reg_data = json_encode($post);
						if(in_array($_SERVER['HTTP_HOST'], array('msociety.paynet.co.in'))){
							$curl = curl_init($reg_path);

							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
							curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
							curl_setopt($curl, CURLOPT_POST, true);
							curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
							$response = curl_exec($curl); //tempory comment for local use
							$err = curl_error($curl);
							$info = curl_getinfo($curl);
							$resp = json_decode($response,true);
						}else{
							$resp['email']=$row['Society_Email'];
							$resp['secret_key']="123";//tempory secret key local
						}
						if(!empty($resp['secret_key']) || $resp['secret_key'] != NULL):
							$params = array(
								'name' => $row['Society_Name'],
								'phone_number' => $row['Phone_Number'],
								'email' => $resp['email'],
								'secret_key' => $resp['secret_key'],
								'address' => $row['Society_Address'],
								'registration_no' => $row['Society_Reg_No'],
								'gstin' => $row['GST_No'],
								'is_gst' => $row['Is_GST_Applicable'],
								'opening_balance' => 0,
								'no_of_flats' => $row['No_Of_Flats'],
								'auto_create_bill' => 0,
								'bill_day' => $row['Billing_Day'],
								'due_day' => $row['Due_Day'],
								'interest_type' => $row['Interest_Type'],
								'interest_span' => $row['Interest_Span'],
								'interest_rate' => $row['Interest_Rate'],
								'noc_charge' => 0,
								'noc_unit_value' => 0,
								'image_file_name' => 'profile.png',
								'created_at' => date('Y-m-d H:i:s'),
								'image_updated_at' => date('Y-m-d H:i:s'),
								'full_mode' => '1',
								'bill_payments' => '0',
								'accounting' => '0',
								'gatekeeper' => '0',
								'vms' => '0',
							);
						
							if($society_id = $this->Society_model->add_society($params)):
								$op_bal = 0;
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

								if($this->session->userdata('role') == 'channel_partner'|| $this->session->userdata('role') == 'CA')
								{
									$par = array(
										'user_id' => $this->session->userdata('user_id'),
										'role_id' => 16,
										'society_id' => $society_id,
										'created_at' => date('Y-m-d H:i:s'),
									);
									$society_access_id = $this->Society_access_model->add_society_access($par);
								}

								//create account//
								$prefix="ms_".$society_id;

								if(date('n')<=3){
									$finacial_start =date('Y', strtotime('-1 years'))."-04-01";
									$finacial_end =date('Y')."-03-31";
								}else{
									$finacial_start =date('Y')."-04-01";
									$finacial_end =(date('Y') +1)."-03-31";
								}
								$accounting_param=[
									'label' =>str_replace(' ', '',$row['Society_Name']),
									//'prefix' => strval($society_id),
									'prefix' => $prefix,
									'name' =>$row['Society_Name'],
									'email' => $row['Society_Email'],
									'address' => $row['Society_Address'],
									'fy_start' => $finacial_start,
									'fy_end' => $finacial_end
								];
								$create_account=$this->ledger->account($society_id,$accounting_param);							
								if($create_account!=0){
									$cash_ledger_id=$this->ledger->create_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details",0,8,"D");						
									$noc_ledger_id=$this->ledger->create_ledger("NOC Charge","NOC Charge",$society_id,"sc_acc_details",0,18,"C");								
								}

							endif;
						else:
							$message['text'] = "API Key for row ".$rowCount." not generated. Please onboard again!!";
							$message['status'] = "Fail";
							// $this->session->set_flashdata('message', $message);
							continue;
						endif;
	                    
						if($society_id)
						{
							$insertCount++;
						}
					}
					$message['status'] = "Success";
					$message['text'] = $insertCount." Societies Imported";
				}
				$this->session->set_flashdata('message', $message);
                // redirect('societies');
            }
        }
	}
	
	// public function master_cp()
	// {
	// 	$data = array(
	// 		'title' => "Societies"
	// 	);
	// 	$user_id = $this->session->userdata('user_id');
	// 	$company = $this->session->userdata('company');
	// 	$data['channel_partners'] = $this->User_model->get_child_cp($user_id,$company);
	// 	foreach($data['channel_partners'] as $cp)
	// 	{
	// 		$cp_user_id[] = $cp['id'];
	// 	}
	// 	// print_r($cp_user_id);die;
	// 	$data['total_number_of_societies'] = $this->Society_access_model->get_master_cp_societies($cp_user_id);
	// 	// echo"<pre>";print_r($total_number_of_societies);die;
	// 	$data['_view'] = 'society/index';
    //     $this->load->view('users/master_cp_dashboard',$data);
	// }

	public function master_cp()
    {
        $data = array(
            'title' => "Societies"
        );
        $user_id = $this->session->userdata('user_id');
		$company = $this->session->userdata('company');
        $data['channel_partners'] = $this->User_model->get_child_cp($user_id,$company);
        foreach($data['channel_partners'] as $cp)
        {
            $cp_user_id[] = $cp['id'];
        }
        $data['total_number_of_societies'] = $total_number_of_societies = $this->Society_access_model->get_master_cp_societies($cp_user_id);
        foreach($total_number_of_societies as $cps){
            $total_flats_cp[] = $cps['society_id'];
		}
		if(!empty($total_flats_cp))
		{
			$data['cp_master_total_flats'] = $this->Society_access_model->get_cp_master_flats($total_flats_cp);
		}
		else
		{
			$data['cp_master_total_flats'] = array();
		}
		
        $data['_view'] = 'society/index';
        $this->load->view('users/master_cp_dashboard',$data);
    }

	public function noc($society_id){
       
		$this->load->library('HTML_TO_DOC');
		$society_details = $this->Society_model->get_society_details($society_id);
		
		$docs = new HTML_TO_DOC();
		
		
		$data["society_details"]=$society_details[0];					
		$html= $this->load->view('society_document/nocletter',$data,true);
		$docs->createDoc($html, "NOC", 1);

	} 

	public function agm($society_id){

		$this->load->library('HTML_TO_DOC');
		$society_details = $this->Society_model->get_society_details($society_id);
		
		$docs = new HTML_TO_DOC();
		
		
		$data["society_details"]=$society_details[0];					
		$html= $this->load->view('society_document/agmnotice',$data,true);
		$docs->createDoc($html, "AGM", 1);

	} 

	function nomination_pdf(){
		header('Content-type: application/pdf');
		header('Content-disposition: attachment; filename=nomination.pdf');
		readfile(base_url("assets/uploads/society_docs/")."8_Nomination_form.pdf");
		
	}

}
?>

