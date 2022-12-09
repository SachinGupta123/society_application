<?php


    public function generate_bill()
    {
        //check is POST
        if($this->input->post()):

            $society_id = $this->input->post('society_id');
            $id = $society_id;
            //return $society_id;
            //check is Bank Valid
            $bank = $this->Bank_model->get_all_bank($society_id);

            //check is Member Valid
            $members = $this->Member_model->get_all_members($society_id);

            //get society charges by society id
            $parking_charges = $this->Parking_charge_model->get_all_parking_charge($society_id);
            $noc_charges = $this->Society_model->get_noc_charge($society_id);
                
            //get society by society_id
            $society = $this->Society_model->get_society($id);


            //get bill month and bill year and other POST data
            $bill_date = $this->input->post('bill_date');
            $month = date('m',strtotime($this->input->post('bill_date')));
            $year = date('Y',strtotime($this->input->post('bill_date')));
            $bill_summary = $this->input->post('bill_summary');
            $due_date = $this->input->post('due_date');

            //create Month
            $current_month = date('Y-m-d',strtotime($year."-".$month."-"."1"));

            //set last bill month
            $last_month = date('Y-m-d',strtotime($current_month." -1 month"));

            //get all society members
            $members = $this->Member_model->get_members_by_society($society_id);

            //check bill already created for given month and year
            $check_bill = $this->Bill_detail_model->get_all_bill_by_month_society_id($society_id,$current_month);
            
            //get last bill details
            $last_bill_details = $this->Bill_detail_model->get_all_bill_by_month_society_id($society_id,$last_month);

            //set Counter
            $counter = (!empty($last_bill_details) && $last_bill_details[0]['bill_no'] != NULL) ? $last_bill_details[0]['bill_no'] : 0;

            // Validate Checkpoints to generate
            // echo "Bank : "; var_dump($bank);
            // echo "Members : "; var_dump($members);
            // echo "Parking : "; var_dump($parking_charges);
            // echo "NOC : "; var_dump($noc_charges);die;



            // Valid All Data (Bank, Member, Bill Already Created, All Checkpoints Valid ) As Needed
            if($bank != NULL && $check_bill == NULL && $members != NULL && $parking_charges != NULL && $noc_charges != NULL):

                //Loop Members
                foreach($members as $member):
                if(!empty($member['flat_type_id'])):
                    //set bill amount variable for each member as null or 0
                    $total_bill_amount = 0;

                    //increment bill_no counter
                    $counter++;

                    $member_current_balance = 0;
                    
                    //get member details by member id
                    $member_details = $this->Member_model->get_single_member($member['id']);
                    $member_last_bill = $this->Bill_detail_model->get_last_bill_details($member['id']);
                    $member_last_payment = $this->Payment_model->get_last_payment_details($member['id']);
                    $member_current_balance = $member['member_balance'];
                    $member_flat_type = $this->Flat_type_model->get_flat_type($member['flat_type_id']);
                    $billing_heads = $this->Billing_head_model->get_all_billing_heads($member['flat_type_id']);
                    $last_total_interest_arrears = !empty($last_bill_details) ? $last_bill_details[0]['total_interest_arrears'] : $member['interest_arrears'];
                    $last_total_arrears = !empty($last_bill_details) ? $last_bill_details[0]['total_arrears'] : $member['principal_arrears'];
                    $last_total_due = !empty($last_bill_details) ? $last_bill_details[0]['total_due'] : 0;
                    $last_payment_date = !empty($member_last_payment) ? $member_last_payment[0]['payment_date'] : 0;
                    $last_payment_balance = !empty($member_last_payment) ? $member_last_payment[0]['balance'] : $member_current_balance;
                    $late_payment_charge = 0;
                    $interest = 0;
                    $interestable_amount = 0;
                    $total_due = 0;
                    
                    //check if last bill is present or not
                    if($member_last_bill == NULL && $member_last_payment != NULL)
                    {
                        // echo "<pre>"; print_r($member);die;
                        $amount = $member_last_payment[0]['debit'];
                        $member_principal_arrears = $member['principal_arrears'];
                        $member_interest_arrears = $member['interest_arrears'];
                        if($amount - $member_interest_arrears >= 0)
                        {
                            $remaining_balance = $amount - $member_interest_arrears;
                            $last_total_interest_arrears = 0;
                            if($remaining_balance - $member_principal_arrears >= 0)
                            {
                                $remaining_balance = $remaining_balance - $member_principal_arrears;
                                $last_total_arrears = 0;
                            }
                            else
                            {
                                $last_total_arrears = $member_principal_arrears - $remaining_balance;
                            }
                        }
                        else
                        {
                            $last_total_interest_arrears = $member_interest_arrears - $amount;
                        }
                    }
                    $bill = array();
                        //calculation of billing heads
                    foreach($billing_heads as $head)
                    {
                        $bill_head_amount = 0;
                        if($head['is_unit_value'])
                        {
                            $bill_head_amount = $head['amount'] * $member['flat_area'];
                            $bill[$head['name']] = round($bill_head_amount, 2);
                        }
                        else
                        {
                            $bill_head_amount = $head['amount'];
                            $bill[$head['name']] = round($bill_head_amount, 2);
                        }
                        $total_bill_amount += round($bill_head_amount, 2);
                    }
                            //calculation of parking charges
                    $total_parking = 0;
                    if($parking_charges !=0 && $parking_charges != NULL)
                    {
                        if($member['tenant'] == 1)
                        {
                            $tenant_two_charge = $member['two_wheelers'] * $parking_charges[0]['tenant_two_wheeler'];
                            $tenant_four_charge = $member['four_wheelers'] * $parking_charges[0]['tenant_four_wheeler'];
                            $total_parking = $tenant_two_charge + $tenant_four_charge;
                        }
                        else
                        {
                            $member_two_charge = $member['two_wheelers'] * $parking_charges[0]['member_two_wheeler'];
                            $member_four_charge = $member['four_wheelers'] * $parking_charges[0]['member_four_wheeler'];
                            $total_parking = $member_two_charge + $member_four_charge;
                        }
                            $bill['Parking Charge'] = $total_parking;
                    }
                            //calculation of noc charges
                    $total_noc = 0;
                    if($noc_charges != 0 && $noc_charges != NULL)
                    {
                        if($noc_charges[0]['noc_unit_value'])
                        {
                            $noc = $noc_charges[0]['noc_charge'] * $member['flat_area'];
                        }
                        else
                        {
                            $noc = $noc_charges[0]['noc_charge'];
                        }
                        $total_noc = round($noc, 2);
                        $bill['Noc Charge'] = round($total_noc, 2);
                    }

                        //calculation of interest
                    if($member_current_balance <= 0)
                    {
                        $interestable_amount = -($member_current_balance) - $last_total_interest_arrears;
                        if($society['interest_type'] == 'Compound Interest')
                        {
                            $interest = $this->Member_model->calculate_compound_interest($society['interest_rate'], $last_month, $member_current_balance, $bill_date);
                        }
                        elseif($society['interest_type'] == 'Simple Interest')
                        {
                            $interest = $this->Member_model->calculate_simple_interest($society['interest_rate'], $last_month, $interestable_amount, $bill_date);
                        }
                        elseif($society['interest_type'] == 'Fixed Penalty')
                        {
                            $interest = $this->Member_model->calculate_fixed_interest($society['interest_rate'], $last_month, $interestable_amount, $bill_date);
                        }
                    }
                    else
                    {
                        $interest = 0;
                        $interestable_amount = 0;
                    }

                        // echo "MEMLP :";var_dump($member_last_bill);die;
                        //calculation of late payment amount
                    if($member_last_payment &&  $member_last_bill != NULL)
                    {
                        if($member_last_payment[0]['payment_date'] > $member_last_bill[0]['due_date'])
                        {
                            $late_amount = $member_last_bill[0]['total_due'] - $last_total_interest_arrears;
                            if($society['interest_type'] == 'Compound Interest')
                            {
                                $late_payment_charge = $this->Member_model->calculate_compound_interest($society['interest_rate'], $last_month, $member_current_balance, $bill_date);
                            }
                            elseif($society['interest_type'] == 'Simple Interest')
                            {
                                $late_payment_charge = $this->Member_model->calculate_simple_interest($society['interest_rate'], $last_month, $late_amount, $bill_date);
                            }
                            elseif($society['interest_type'] == 'Fixed Penalty')
                            {
                                $late_payment_charge = $this->Member_model->calculate_fixed_interest($society['interest_rate'], $last_month, $late_amount, $bill_date);
                            }
                        }
                    }

                        //total amount to be paid
                    $total_due = -($member_current_balance) + $total_bill_amount + $late_payment_charge+$interest;
                            // echo"<pre>";print_r($total_bill_amount);die;
                            //final values to be save in bill_details table
                    $params = array(
                        'interest' => $interest,
                        'bill_date' => $bill_date,
                        'due_date' => $due_date,
                        'bill_month' => $current_month,
                        'member_id' => $member['id'],
                        'society_id' => $society_id,
                        'bill_no' => $counter,
                        'bill_amount' => $total_bill_amount,
                        'bill_summary' => $bill_summary,
                        'details' => serialize($bill),
                        'principal_arrears' => $interestable_amount,
                        'total_arrears' => $interestable_amount,
                        'total_interest_arrears' => $last_total_interest_arrears + $interest,
                        'interest_arrears' => $last_total_interest_arrears,
                        'total_due' => $total_due,
                        'previous_member_balance' => $member_current_balance,
                    );
                    if($total_due <= 0)
                    {
                        $params['bill_status'] = "Paid";
                    }
                    else
                    {
                        $params['bill_status'] = "Unpaid";
                    }

                            //save bill details
                    $bill_id = $this->Bill_detail_model->add_bill_detail($params);
                    // return $bill_id;

                    $payment = array();
                    $payment['credit'] = $params['total_due'];
                    $payment['balance'] = $last_payment_balance + $total_due;
                    $payment['member_id'] = $member['id'];
                    $payment['society_id'] = $society_id;
                    $payment['due_date'] = $due_date;
                    $payment['bill_id'] = $bill_id;
                    $payment['narration'] = $bill_date.'_'.'Bill';

                    $payment_id = $this->Payment_model->add_payment($payment);

                    $mem['member_balance'] = -($total_due);
                    $id = $member['id'];
                            // echo "<pre>"; print_r($mem);die;
                    $this->Member_model->update_member($id, $mem);
                endif;
                endforeach;//end membetr loop
                redirect('societies/details'.'/'.$society_id);
            else://else for valid all data
                if($check_bill != NULL):
                    exit(json_encode(array('errorMsg' => 'Bill for this month is already generated.')));
                    // redirect('societies/details'.'/'.$society_id);
                elseif($bank == NULL):
                    exit(json_encode(array('errorMsg' => 'Bank is not created for this society.Kindly create the bank.')));
                    // redirect('societies/details'.'/'.$society_id);
                elseif($member == NULL):
                    exit(json_encode(array('errorMsg' => 'Member Data is Not valid.Kindly check data.')));
                    // redirect('societies/details'.'/'.$society_id);
                endif;
            endif;
        endif;
    }
?>