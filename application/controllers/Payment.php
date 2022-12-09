<?php
/**
 * 
 */
class Payment extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Payment_model');
        $this->load->model('Society_model');
        $this->load->model('Member_model');
        $this->load->model('Bank_model');
        $this->load->model('Bill_detail_model');
        $this->load->model('Bank_transaction_model');
    }

    public function create()
    {
        $member_id = $this->input->post('member_id');
        $society_id = $this->input->post('society_id');
        $bank_id = $this->input->post('bank');
        $payment_date = $this->input->post('payment_dat');        
        $paid_by = $this->input->post('payment_mod');
        $cheque_no = $this->input->post('cheque');
        $depositor_bank = $this->input->post('depositor_bank');
        $amount = $this->input->post('amount1');
        $society = $this->Society_model->get_society($society_id);
        $member = $this->Member_model->get_single_member($member_id);
        $wing = $member[0]->wing;
        $flat_no = $member[0]->flat_no;
        if(!empty($amount) && !empty($member_id) && !empty($paid_by)  && !empty($payment_date)):      
            $payment_date=date("Y-m-d",strtotime($payment_date));
         
            if($amount == 0 || $amount < 0):   
                $message['status'] = "Fail";
                $message['text'] = 'Please enter a valid payment amount.';
                $this->session->set_flashdata('message', $message);
            elseif(($paid_by == 'Online'|| $paid_by == 'cheque'||$paid_by == 'neft'||$paid_by == 'upi' ||$paid_by == 'IMPS') && ($cheque_no==''|| $bank_id == '')):                   
                $message['status'] = "Fail";
                if($bank_id == '')
                    $message['text'] = 'Please select bank.';
                if($cheque_no == '')
                    $message['text'] = 'Please Enter cheque no.';
                $this->session->set_flashdata('message', $message);

            elseif($this->Member_model->get_member_current_intrest_arrears($member_id) <= 0 && $this->Member_model->get_member_current_arrears($member_id) <= 0):
               
                $this->arrear_debit($amount, $member_id, $society_id, $payment_date, $paid_by, $cheque_no, $bank_id, $depositor_bank,$wing,$flat_no);
               
                //checking society accounting details present or not-03-03-2022
                 //As discuss Anish sir changes for accounting entry bank or cash dr and flat cr-04-03-2022
                $accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
                if(!empty($accounting_db_details)){
                    $narration="Payment Recieved".$wing."-".$flat_no;
                    $flat_ledger_id=$this->ledger->get_ledger("flat","flat",$society_id,"sc_flat_acc_Details",$member_id);
                    if($paid_by=="Cash" ||$paid_by=="cash"){
                        $debit_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details",0);
                    }else{                   
                        $debit_ledger_id=$this->ledger->get_ledger("bank","bank",$society_id,"sc_bank_acc_details",$bank_id); 
                    }
                    $this->ledger->accounting_double_entry($society_id,1,$payment_date,$narration,$amount,$debit_ledger_id,$flat_ledger_id);
                }               
              
                $message['status'] = "Success";
            	$message['text'] = $society['name'].'_'.'- Payment of Rs.'.'_'.$amount.' successfull.';
				$this->session->set_flashdata('message', $message);
                return true;

            else:
               
                $this->arrear_debit($amount, $member_id, $society_id, $payment_date, $paid_by, $cheque_no, $bank_id, $depositor_bank, $wing, $flat_no);

                //checking society accounting details present or not-03-03-2022 
                //As discuss Anish sir changes for accounting entry bank or cash dr and flat cr-04-03-2022

                $accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
                if(!empty($accounting_db_details)){
                    $narration="Payment Recieved".$wing."-".$flat_no;
                    $flat_ledger_id=$this->ledger->get_ledger("flat","flat",$society_id,"sc_flat_acc_Details",$member_id);
                    if($paid_by=="Cash" ||$paid_by=="cash"){
                        $debit_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details",0);
                    }else{                   
                        $debit_ledger_id=$this->ledger->get_ledger("bank","bank",$society_id,"sc_bank_acc_details",$bank_id); 
                    }               
                    $this->ledger->accounting_double_entry($society_id,1,$payment_date,$narration,$amount,$debit_ledger_id,$flat_ledger_id);
                }               

                $message['status'] = "Success";
            	$message['text'] = $society['name'].'_'.'- Payment of Rs.'.'_'.$amount.' successfull.';
				$this->session->set_flashdata('message', $message);
                return true;
                
            endif;
           
        else:
            if(empty($amount)):
                $message['status'] = "Fail";
                $message['text'] = 'Please enter a valid payment amount.';
                $this->session->set_flashdata('message', $message);
            elseif(empty($member_id)):
                $message['status'] = "Fail";
                $message['text'] = 'Please Select Flat.';
                $this->session->set_flashdata('message', $message);
            elseif(empty($paid_by)):
                $message['status'] = "Fail";
                $message['text'] = 'Please Select Payment mode.';
                $this->session->set_flashdata('message', $message);

            elseif(empty($payment_date)):
                $message['status'] = "Fail";
                $message['text'] = 'Please Select date .';
                $this->session->set_flashdata('message', $message);
            endif;
           
           
        endif;
         
            // redirect('member/view_single_member/'.'/'.$member_id.'/'.$society_id);        
    }

    public function import_payments()
    {
        $society_id = $this->uri->segment(3);
               
        $get_flat_onboarding_data=$this->Payment_model->get_flat_onboarding_data($society_id);
        
        if(is_uploaded_file($_FILES['payment_file']['tmp_name']))
        {
            // Load CSV reader library
            $this->load->library('CSVReader');                    
            // Parse data from CSV file
            $csvData = $this->csvreader->parse_csv($_FILES['payment_file']['tmp_name']);
            $rowCount = 0;
            $insertCount = 0;  
            
            $flat_wing_error_count=0;
            $flat_wing_error=[];
            // Insert/update CSV data into database
            if(!empty($csvData))
            {
                $error_count =0;
               
                foreach($csvData as $row)
                {
                    if($get_flat_onboarding_data==1){
                        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $row['wing'])){
                            $message['text'] = "Mamber Wing is invalid or missing";
                            $error_count++;
                        }
                    }else{
                        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $row['wing'])||empty($row['wing'])){
                            $message['text'] = "Mamber Wing is invalid or missing";
                            $error_count++;
                        }
                    }
                    
                    
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $row['flat_no'])||empty($row['flat_no'])){
                        $message['text'] = "Mamber Flat No. is invalid or missing";
                        $error_count++;
                    }
                    elseif(!DateTime::createFromFormat('d-m-Y', $row['payment_date'])||empty($row['payment_date'])){
                        $message['text'] = "Mamber Payment Date is invalid or missing";
                        $error_count++;
                    }
                    // elseif($row['payment_date'] == NULL || $row['payment_date'] == ''){
                    //     $message = "Mamber Payment Date is invalid or missing";
                    //     $error_count++;
                    // }

                    elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-].*[0-9]|[0-9]/', $row['paid_by'])||empty($row['paid_by'])){
                        $message['text'] = "Payment Mode is invalid or missing";
                        $error_count++;
                    }
                    elseif(!is_numeric($row['amount']) || $row['amount'] == NULL){
                        $message['text'] = "Amount is invalid or missing";
                        $error_count++;
                    }
                    elseif($row['bank_name'] != ''){                        
                        $bank = $this->Bank_model->get_bank_by_bank_society($society_id, $row['bank_name']);
                        
                        if(empty($bank)){
                            $message['text'] = "Please Enter Correct Bank Name";
                            $error_count++;
                        }
                        
                    }
                    elseif($row['wing'] != '' && $row['flat_no'] != ''  )
                    { 
                        $member = $this->Member_model->get_member_by_wingflat($row['wing'], $row['flat_no'], $society_id);
                        
                        if(empty($member)){
                            $message['text'] = "Please Enter Correct Flat no and Wing";
                            $error_count++;
                            $flat_wing_error_count++;
                            array_push($flat_wing_error,$row['wing']."-".$row['flat_no']);
                        }
                        
                    }
                    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $row['cheque_no'])){
                        $message['text'] = "Please select text format in file";
                        $error_count++;
                    }
                }
                
                if($error_count > 0)
                {
                    
                    // $error_count = $error_count;
                    if($flat_wing_error_count>0){
                        $message['text'] = "This flat and wing not available-".implode(",",$flat_wing_error);
                    }
                    $message['status'] = 'Fail';
                    $this->session->set_flashdata('message', $message);
                    $this->session->set_flashdata('error_count', $error_count);
                    // redirect('societies/details'.'/'.$society_id);
                    echo "1";
                }
                else
                {    
                         
                    $success=0;
                    $failed=0;
                    foreach ($csvData as $row) {

                        if(($row['paid_by'] == 'cash' || $row['paid_by'] == 'Cash') || ($row['paid_by'] == 'Cheque' || $row['paid_by'] == 'cheque') || ($row['paid_by'] == 'IMPS' || $row['paid_by'] == 'imps') || ($row['paid_by'] == 'UPI' || $row['paid_by'] == 'upi') || ($row['paid_by'] == 'NEFT' || $row['paid_by'] == 'neft') ){
                            $wing = $row['wing'];
                            $flat_no = $row['flat_no'];
                            $member = $this->Member_model->get_member_by_wingflat($wing, $flat_no, $society_id);
                            $bank_name = $row['bank_name'];
                            $bank = $this->Bank_model->get_bank_by_bank_society($society_id, $bank_name);
                            $amount = $row['amount'];
                            $date = date('Y-m-d', strtotime($row['payment_date']));
                                                   
                            if($row['paid_by'] == 'cash' || $row['paid_by'] == 'Cash'):
                                $params = array(
                                    'member_id' => $member[0]['id'],
                                    'society_id' => $society_id,
                                    'payment_date' => $date,
                                    'paid_by' => $row['paid_by'],
                                    'cheque_no' => '',
                                    'bank_id' => '',
                                    'depositor_bank' => '',
                                    'amount' => $row['amount'],
                                );
    
                                // $tran = $this->Bank_transaction_model->get_transaction_by_society($society_id);
                                // $balance = $tran[0]['balance'] + $row['amount'];
                                // $bt = array(
                                //         'society_id' => $society_id,
                                //         'credit' => $row['amount'],
                                //         'narration' => 'Payment_Received',
                                //         'is_cash' => 1,
                                //         'balance' => $balance,
                                //         'date' => date('Y-m-d H:i:s'),
                                //     );
                                // $this->Bank_transaction_model->add_bank_transaction($bt);
    
                                $bank_id = '';
                                $arrear_debit = $this->arrear_debit($row['amount'], $member[0]['id'], $society_id, $date, $row['paid_by'], $row['cheque_no'], $bank_id, $row['payee_bank'], $wing, $flat_no);
                                $debit_ledger_id=$this->ledger->get_ledger("Cash Book","Cash Book",$society_id,"sc_acc_details",0);
                            elseif(($row['paid_by'] == 'Cheque' || $row['paid_by'] == 'cheque') || ($row['paid_by'] == 'IMPS' || $row['paid_by'] == 'imps') || ($row['paid_by'] == 'UPI' || $row['paid_by'] == 'upi') || ($row['paid_by'] == 'NEFT' || $row['paid_by'] == 'neft') ):
                                
                                $params = array(
                                    'member_id' => $member[0]['id'],
                                    'society_id' => $society_id,
                                    'payment_date' => $date,
                                    'paid_by' => $row['paid_by'],
                                    'cheque_no' => $row['cheque_no'],
                                    'bank_id' => $bank[0]->id,
                                    'depositor_bank' => $row['payee_bank'],
                                    'amount' => $row['amount'],
                                );                          
                                $arrear_debit = $this->arrear_debit($row['amount'], $member[0]['id'], $society_id, $date, $row['paid_by'], $row['cheque_no'], $bank[0]->id, $row['payee_bank'], $wing, $flat_no);
                                $debit_ledger_id=$this->ledger->get_ledger("bank","bank",$society_id,"sc_bank_acc_details",$bank[0]->id);                            
                            endif; 
    
                            //checking society accounting details present or not-03-03-2022
                            //As discuss Anish sir changes for accounting entry bank dr and flat cr-04-03-2022
                            $accounting_db_details=$this->Society_model->get_society_accounting_details($society_id);							
                            if(!empty($accounting_db_details)){
                                $narration="Payment Recieved by ".$wing."-".$flat_no;
                                $flat_ledger_id=$this->ledger->get_ledger("flat","flat",$society_id,"sc_flat_acc_Details",$member[0]['id']);                                      
                                $this->ledger->accounting_double_entry($society_id,1, $date,$narration,$amount,$debit_ledger_id,$flat_ledger_id);
                            }
                            $success++;
                        }else{
                            $failed++;
                        }
                                            
                    }                   
                    $message['status'] = "Success";
                    $message['text'] = $success." Flat Payments Uploaded successfully And ".$failed." Flat payments Uploaded unsuccessfully";
                   
                    $this->session->set_flashdata('message', $message);
                    echo "1";
                    // redirect('societies/details'.'/'.$society_id);
                }
            }
        }
    }
   

    public function exportCSV()
    {
        $society_id = $this->uri->segment(3);
        // get data
        $members = $this->Member_model->get_all_members($society_id);
        $bank = $this->Bank_model->get_default_bank($society_id);      
        ob_clean();        
        ob_start();
        
        // file creation
        $file = fopen('php://output', 'w');
 
        $header = array("wing","flat_no","payment_date","paid_by","cheque_no","bank_name","payee_bank", "amount");
        fputcsv($file, $header); 
        foreach ($members as $line){
            fputcsv($file,array($line['wing'],strval($line['flat_no']),"DD-MM-YYYY","","",$bank['bank_name'],"",""));
        }
        $filename = 'sample_payment_'.date('Ymd').'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv;");
        fclose($file);
        exit;
    }

   

    function arrear_debit($amount, $member_id, $society_id, $payment_date, $paid_by, $cheque_no = '', $bank_id ='', $depositor_bank = '', $wing, $flat_no) {
        $amount = $amount;
        $paid_by = $paid_by;
        $current_arrears = $this->Member_model->get_member_current_arrears($member_id);
        $current_interest = $this->Member_model->get_member_current_intrest_arrears($member_id);
        $current_balance = $this->Member_model->get_member_current_balance($member_id);
        $last_bill = $this->Bill_detail_model->get_last_bill_details_member($member_id);
        $bill_due_date = $last_bill[0]['due_date'];
        $receipt_no = $this->Payment_model->get_last_receipt($society_id);

        $receipt_no++;

        //1000+100 = 1100
        //-200+100 = -100
        //-400+500 = 100
        $soft_balance = $current_balance + $amount;
        if($paid_by == 'cash' || $paid_by == 'Cash'){
            $is_cash = 1;

            $tran = $this->Bank_transaction_model->get_transaction_by_society($society_id);
            $balance = $tran[0]['balance'] + $amount;
            $bt = array(
                    'society_id' => $society_id,
                    'credit' => $amount,
                    'narration' => 'Payment_Received '.$wing.' '.$flat_no,
                    'is_cash' => $is_cash,
                    'balance' => $balance,
                    'date' => $payment_date,
                );
            $this->Bank_transaction_model->add_bank_transaction($bt);
        } else {
            $is_cash = 0;
        }
        // $paid_by == 'Online' || $paid_by == 'online'
        if($paid_by == 'cheque' || $paid_by == 'Cheque' || $paid_by == 'NEFT' || $paid_by == 'Neft' || $paid_by == 'neft' || $paid_by == 'Online' || $paid_by == 'upi' || $paid_by == 'UPI' || $paid_by == 'IMPS'){
            $bank = $this->Bank_model->get_bank($bank_id);
            $last_bank_transaction = $this->Bank_transaction_model->get_transaction_by_bank($bank_id);
            $last_bank_balance = $last_bank_transaction != NULL ? $last_bank_transaction[0]['balance'] : NULL;

            $param['credit'] = $amount;
            $param['balance'] = $last_bank_balance != Null ? $last_bank_balance + $amount : $bank['opening_balance'] + $amount;
            $param['is_cash'] = 0;
            $param['society_id'] = $society_id;
            $param['bank_id'] = $bank_id;
            $param['narration'] = "Payment Received from ".$wing." ".$flat_no." ".$cheque_no." ".$bank['bank_name'];
            $param['date'] = $payment_date;
            // $this->Bank_transaction_model->add_bank_transaction($param);

            $data['current_balance'] = $last_bank_balance != Null ? $last_bank_balance + $amount : $bank['opening_balance'] + $amount;
            $id = $bank_id;
            $b = $this->Bank_model->update_bank($id, $data);
        }


        $payment_params = array(
            'payment_date' => $payment_date,
            'narration' => 'Payment Received',
            'credit' => $amount,
            'member_id' => $member_id,
            'society_id' => $society_id,
            'balance' => $soft_balance,
            'paid_by' => $paid_by,
            'cheque_no' => $cheque_no,
            'bank_id' => $bank_id,
            'depositor_bank' => $depositor_bank,
            'receipt_id' => $receipt_no,
            'is_cash' => $is_cash
        );


        //insert payment
        $payment_id = $this->Payment_model->add_payment($payment_params);

        /*Add society member bill payment logs*/
        $bpm_logs = array(
                        'entity_id' => $payment_id,
                        'member_id' => $member_id,
                        'amount' => $amount,
                        'type' => 'PAYMENT',
                        'dnt' => time(),
                    );
        $this->Member_model->insert_bpm_logs($bpm_logs);

        //Irrespective of balance and arrears update member balance
        $this->Member_model->insert_member_balance($member_id,$soft_balance);

        /*Add society member bill payment transaction logs*/
        $bpm_txn_logs = array(
            'entity_id' => $payment_id,
            'narration' => 'AMOUNTPAID',
            'credit' => $amount,
            'debit' => '',
            'balance' => $soft_balance,
            'dnt' => time(),
            'member_id' => $member_id,
        );

        $this->Member_model->insert_bpm_txn_logs($bpm_txn_logs);
        
        //logic for arrears and interest arrears calculation
        if($current_balance >= 0)
        {
            return;
        }
        else
        {
            $soft_amount = $amount - $current_interest;
            if(($amount - $current_interest) >= 0) {
                $new_interest = 0;
            } else {
                $new_interest = $current_interest - $amount;
            }

            if($soft_amount > 0) {
                if(($soft_amount - $current_arrears) >= 0) {
                    $new_arrears = 0;
                } else {
                    $new_arrears = $current_arrears - $soft_amount;
                }
            } else {
                $new_arrears = $current_arrears;
            }
            $this->Member_model->insert_member_interest_arrears($member_id,$new_interest);
            $this->Member_model->insert_member_arrears($member_id,$new_arrears);

            if($bill_due_date < $payment_date)
            {
                $this->Bill_detail_model->update_all_bill_delayed($member_id);
            }
            $this->Bill_detail_model->update_old_bill_delayed($last_bill[0]['id']);

            if($soft_balance >= 0){
                $this->Bill_detail_model->update_all_bill_status($member_id,$payment_id);
            } else {
                $this->Bill_detail_model->update_bill_partially_paid($member_id,$amount,$payment_id);
            }

            return;
        }
        
    }

    public function debit($amount, $member_id, $payment_date, $paid_by, $cheque_no, $bank_id, $depositor_bank)
    {

        $amount = $amount;
        $payment_date = $payment_date;
        $paid_by = $paid_by;
        $cheque_no = $cheque_no;
        $bank_id = $bank_id;
        $depositor_bank = $depositor_bank;
        $member_id = $member_id;
        $member = $this->Member_model->get_single_member($member_id);
        $society = $this->Society_model->get_society_details($member[0]->society_id);
        $member_balance = $member[0]->member_balance;
        $last_receipt = $this->Payment_model->get_last_receipt($society[0]->id);
        $current_receipt = $last_receipt != NULL ? $last_receipt[0]['receipt_id'] + 1 : 1;
        $bill_detail = $this->Bill_detail_model->get_last_bill_details($member_id);
                        // echo "<pre>"; print_r($payment_date);die;

        $params['receipt_id'] = $current_receipt;
        $params['payment_date'] = $payment_date;
        $params['narration'] = "Payment Received";
        $params['debit'] = $amount;
        $params['member_id'] = $member_id;
        $params['society_id'] =  $member[0]->society_id;
        if($paid_by == "cash"):
            $params['is_cash'] = 1;
            $params['paid_by'] = $paid_by;
        else:
            $params['cheque_no'] = $cheque_no;
            $params['bank_id'] = $bank_id;
            $params['depositor_bank'] = $depositor_bank;
            $params['paid_by'] = $paid_by;
        endif;

        //checking member_balance and adjusting payment balance accordingly
        $balance = $member_balance + $amount;

        if($balance >= 0):
            $params['balance'] = 0;
            // $payment = $this->Payment_model->add_payment($params);
        elseif($balance < 0):
            $params['balance'] = -($balance);
            // $payment = $this->Payment_model->add_payment($params);
        endif;

        if($bill_detail != NULL):
            $bill_amount = $bill_detail[0]['bill_amount'];
            $bill_interest = $bill_detail[0]['interest'];
            if($amount >= ($bill_amount + $bill_interest)):
                $bill_detail[0]['total_interest_arrears'] = $bill_detail[0]['total_interest_arrears'] - $bill_interest;
                $bill_detail[0]['bill_status'] = "Paid";
                $data['bill_status'] = $bill_detail[0]['bill_status'];
                $data['total_interest_arrears'] = $bill_detail[0]['total_interest_arrears'];
                $id = $bill_detail[0]['id'];
                $bill = $this->Bill_detail_model->update_bill_detail($id, $data);
            else:
                if($amount >= $bill_interest):
                    $remaining_amount = $amount - $bill_interest;
                    $bill_detail[0]['total_interest_arrears'] = $bill_detail[0]['total_interest_arrears'] - $bill_interest;
                    $bill_detail[0]['bill_status'] = "Partially Paid";
                    $data['total_interest_arrears'] = $bill_detail[0]['total_interest_arrears'];
                    $data['bill_status'] = $bill_detail[0]['bill_status'];
                    $id = $bill_detail[0]['id'];
                    $bill = $this->Bill_detail_model->update_bill_detail($id, $data);
                else:
                    $bill_detail[0]['bill_status'] = "Partially Paid";
                    $data['bill_status'] = $bill_detail[0]['bill_status'];
                    $id = $bill_detail[0]['id'];
                    $bill = $this->Bill_detail_model->update_bill_detail($id, $data);
                endif;
            endif;
        endif;
        $member[0]->member_balance = $balance;
        $balance = $dat['member_balance'] = $member[0]->member_balance;
        $mem = $this->Member_model->update_member_balance($member[0]->id, $balance);
        $payment = $this->Payment_model->add_payment($params);
        $data['payment_id'] = $payment;
        $id = $bill_detail[0]['id'];
        $bill = $this->Bill_detail_model->update_bill_detail($id, $data);
        $bank_transaction = $this->Bank_transaction_model->transaction_entry($amount,$member[0]->society_id,$bank_id,$paid_by,$payment_date);
    }

    public function arrear()
    {
        $member_id = $this->input->post('member_id');
        $member = $this->Member_model->get_single_member($member_id);
        $society_id = $this->input->post('society_id');
        $payment = $this->Payment_model->get_first_payment_details($member_id);
        $amount = $this->input->post('amou');
        $payment_date = $this->input->post('payment_date');
        $paid_by = $this->input->post('payment_mode');
        $cheque_no = $this->input->post('cheque_no');
        $bank_id = $this->input->post('bank_id');
        $depositor_bank = $this->input->post('depositor_bank');
        // $params = array(
        //     'debit' => $amount,
        //     'payment_date' => $payment_date,
        //     'member_id' => $member_id,
        //     'paid_by' => $paid_by,
        //     'society_id' => $society_id,
        //     'bank_id' => $bank_id,
        //     'cheque_no' => $cheque_no,
        //     'depositor_bank' => $depositor_bank,
        // );
        // echo "<pre>"; print_r($params);die;

        if($amount == 0 || $amount < 0):
             exit(json_encode(array(
                'errorMsg' => 'Please enter a valid payment amount.'

            )));
            redirect('member/view_single_member/'.'/'.$member_id.'/'.$society_id);
        elseif($paid_by == "cash" && $payment_date == "" || $paid_by == "cheque" && $payment_date == ""):
            exit(json_encode(array(
                'errorMsg' => 'Please enter payment date.'

            )));
            redirect('member/view_single_member/'.'/'.$member_id.'/'.$society_id);
        elseif($paid_by == "cheque" && $cheque_no == "" || $paid_by == "cheque" && $bank_id == ""):
            exit(json_encode(array(
                'errorMsg' => 'Please select bank.'

            )));
            redirect('member/view_single_member/'.'/'.$member_id.'/'.$society_id);
        elseif($member[0]->interest_arrears <= 0 && $member[0]->principal_arrears <= 0):
            $this->debit($amount, $member_id, $payment_date, $paid_by, $cheque_no, $bank_id, $depositor_bank);
            exit(json_encode(array(
                'errorMsg' => 'Credit note is successfully issued.'

            )));
            // redirect('member/view_single_member/'.'/'.$member_id.'/'.$society_id);
        else:
            $cr = $this->arrear_debit($amount, $member_id, $payment_date, $paid_by, $cheque_no, $bank_id, $depositor_bank);
            exit(json_encode(array(
                'errorMsg' => 'Credit note of Rs.'.'_'.$amount.'_' .' is successfully updated.'

            )));
            redirect('member/view_single_member/'.'/'.$member_id.'/'.$society_id);
        endif;
    }
}
?>