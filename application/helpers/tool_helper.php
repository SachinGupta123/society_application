<?php
	function calc_bill_heads($billing_heads = array(), $mem_flat_area = '',$member_id =''){
		$bill = array();
		$total_bill_amount = 0;
		foreach($billing_heads as $head) {
            $bill_head_amount = 0;
            if($head['is_unit_value'])
            {
                $bill_head_amount = $head['amount'] * $mem_flat_area;
                //$bill[$head['name']] = round($bill_head_amount, 2);//as discuss harsh sir round of point value -16-03-2022
                $bill[$head['name']] = round($bill_head_amount);
            }
            else
            {
                $bill_head_amount = $head['amount'];
                // $bill[$head['name']] = round($bill_head_amount, 2);
                 $bill[$head['name']] = round($bill_head_amount);//As discuss harsh sir round of point value-16-03-2022 
            }
            // $total_bill_amount += round($bill_head_amount, 2);
            $total_bill_amount += round($bill_head_amount);
        }
        $bill['sub_total'] = $total_bill_amount;

        return $bill;
	}

	//this function modified for gst calculation-sachhidanand 

    function calc_bill_heads_gst($billing_heads = array(), $mem_flat_area = '',$member_id =''){

        $gst_amount=0;
		$bill = array();
		$total_bill_amount = 0;
		foreach($billing_heads as $head) {
            $bill_head_amount = 0;
            if($head['is_unit_value'])
            {
                if($head["gst_applicable"]==1){
                    $bill_head_amount = $head['amount'] * $mem_flat_area;
                    $gst_amount =$gst_amount+ (($head['amount'] * $mem_flat_area*18)/100);
                }else{
                    $bill_head_amount = $head['amount'] * $mem_flat_area;
                }
               
                //$bill[$head['name']] = round($bill_head_amount, 2);//as discuss harsh sir round of point value -16-03-2022
                $bill[$head['name']] = round($bill_head_amount);
            }
            else
            {
                if($head["gst_applicable"]==1){
                    $bill_head_amount = $head['amount'];
                    $gst_amount =$gst_amount+(($head['amount']*18)/100);
                    
                }else{
                    $bill_head_amount = $head['amount'];
                }
                
                // $bill[$head['name']] = round($bill_head_amount, 2);
                 $bill[$head['name']] = round($bill_head_amount);//As discuss harsh sir round of point value-16-03-2022 
            }
            // $total_bill_amount += round($bill_head_amount, 2);
            $total_bill_amount += round($bill_head_amount);
        }
        $bill['sub_total'] = $total_bill_amount;
        $bill['Tax'] = $gst_amount;

        return $bill;
	}

	function calc_parking_charges($member = array(), $parking_charges = array()){
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
            return $total_parking;
        }
	}

	function calc_noc_charges($noc_charges = array(),$member_flat_area = 0){
		$total_noc = 0;
        if($noc_charges != 0 && $noc_charges != NULL)
        {
            if($noc_charges[0]['noc_unit_value'])
            {
                $noc = $noc_charges[0]['noc_charge'] * $member_flat_area;
            }
            else
            {
                $noc = $noc_charges[0]['noc_charge'];
            }
            $total_noc = round($noc, 2);
            return round($total_noc, 2);
        }
	}

    function curret_fiscal_year_opening_date(){
        //$date=date_create("2018-03-31");
        $date=date_create(date("Y-m-d",time()));
        if (date_format($date,"m") >= 4) {
            $financial_year = (date_format($date,"Y"));
        } else {
            $financial_year = (date_format($date,"Y")-1);
        }

        return $financial_year."-04-01";
    }

    function notify($data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://msociety.paynet.co.in/api/public/index.php/api/v3/send/bill',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($data),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
    }

    function society_name($society_id){
        $CI=get_instance();
        $CI->load->database();
        $CI->load->model("Society_model");
        $detasils=$CI->Society_model->get_society_details($society_id);
        if(!empty($detasils))
        return  $detasils[0]->name;
        else
        return '';
    }
?>