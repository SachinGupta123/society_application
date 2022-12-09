<style>
		p{
		margin: 0;
		padding: 0;
	}
  td{
    /* height: 20px; */
    padding: 2px;
  }
</style>



      <table width="100%" border="1" cellspacing="0" cellpadding="0" autosize="1" style="page-break-inside:avoid">
        <tr>
          <td colspan="2" align="center"><p style="text-align:center; font-size: 24px;"><strong> <?php echo $member_bill_details["societyname"]?></strong></p>
            <p style="text-align:center; font-weight: bold;">REGD. NO. <?php echo $member_bill_details["registration_no"]?></p>
                  <p style="text-align:center; font-weight: bold;">ADD: <?php echo $member_bill_details["address"]?></p>
          </td>
        </tr>
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" rowspan="2">Name :<strong> <?php echo ucwords($member_bill_details['member_name'])?>	</strong></td>
                <td width="19%">Bill No. :</td>
                <td width="18%"><strong><?php echo $member_bill_details["bill_no"]?></strong></td>
              </tr>
              <tr>
                <td>Bill Date :</td>
                <td><strong><?php echo date('d-m-Y',strtotime($member_bill_details["bill_date"]))?></strong></td>
              </tr>
              <tr>
                <td width="24%">Flat No. :</td>
                <td width="39%"><strong><?php if(!empty($member_bill_details["wing"])) echo $member_bill_details["wing"]."/".$member_bill_details["flat_no"];else echo $member_bill_details["flat_no"]  ?></strong></td>
                <td>Area Sq. Ft.. :</td>
                <td>&nbsp;<?php echo $member_bill_details["flat_area"] ?></td>
              </tr>
              <tr>
                <td>Bill For the Month of. </td>
                <td><strong><?php echo date('M-Y',strtotime($member_bill_details["bill_date"]))?></strong></td>
                <td>Due Date :</td>
                <td><strong><?php echo date("d-m-Y",strtotime($member_bill_details['due_date']))?></strong></td>
              </tr>

              <tr>
                  <td colspan="5">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" style="padding-left:30px; border:1px solid #000"><strong>Sr No.</strong></td>
                        <td align="center" style="padding-left:15px;border:1px solid #000"><strong>Nature Of charges</strong></td>
                        <td align="center" style="padding-left:15px;border:1px solid #000"><strong>Amount</strong></td>
                      </tr>
                      <?php  $dt = unserialize($member_bill_details["details"]);
                            $i=0;
                        foreach($dt as $d=>$t): 
                            if($d != "sub_total"):
                                if($t != "0.00"):                                 
                        ?>

                      <tr>
                        <td style="padding-left:30px; border:1px solid #000"><?php echo ++$i?></td>
                        <td style="padding-left:15px; border:1px solid #000"><?php echo $d?></td>
                        <td align="right" style="padding-right:15px; border:1px solid #000"><?php echo $t?></td>
                      </tr>


                      <?php 
                      
                            endif; 
                            endif; 
                            endforeach;
                      ?>

                      <?php if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):?>

                        <tr>
                          <td style="padding-left:30px; border:1px solid #000"><?php echo ++$i?></td>
                          <td style="padding-left:15px; border:1px solid #000"><?php echo "GST" ;?></td>
                          <td align="right" style="padding-right:15px; border:1px solid #000"><?php echo $member_bill_details["tax_amount"];?></td>
                        </tr>

                      <?php endif;?>
                      <tr>
                        <td style="border:1px solid #000"></td>
                        <td align="right" style="border:1px solid #000"><strong>Total  :</strong></td>
                        <td align="right" style="border:1px solid #000">
                        <strong>
                          <?php 
                            $gst=0;
                          if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):
                            $gst= $member_bill_details["tax_amount"];
                              echo $member_bill_details["bill_amount"]+$member_bill_details["tax_amount"]; 
                          else:
                            echo  $member_bill_details["bill_amount"];
                          
                          endif;
                          ?>
                        </strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="border:1px solid #000"></td>
                        <td align="right" style="border:1px solid #000"><strong>Previous Dues  :</strong></td>
                        <td align="right" style="border:1px solid #000"><strong> 
                          <?php 
        
                                $interest_arrears=0 ; $interest=0; 
                                if($member_bill_details["interest_arrears"] != 0 || $member_bill_details["interest_arrears"] != "0.00" || $member_bill_details["interest_arrears"] != "0"):
                                  $interest_arrears=$member_bill_details["interest_arrears"];
                                endif;
                                if($member_bill_details["interest"] != 1):
                                  if($member_bill_details["interest"] != 0 || $member_bill_details["interest"] != "0.00" || $member_bill_details["interest"] != "0"):
                                    $interest= $member_bill_details["interest"];
                                  endif;
                                endif;
                                echo $interest_arrears+$interest +$member_bill_details["principal_arrears"];
                          ?>
                        </strong></td>
                      </tr>
                      <tr> 
                        <td style="border:1px solid #000"></td>
                        <td align="right" style="border:1px solid #000"><strong>Grand total  :</strong></td>
                        <td align="right" style="border:1px solid #000">
                          <strong>
                            <?php echo $member_bill_details["total_due"]+$gst;?>
                           </strong></td>
                      </tr>
                      
                      <tr>
                        <td colspan="3" style="border:1px solid #000"><strong>Amount in Words</strong>: Rupees <?php
                                    $CI =& get_instance();
                                    $CI->load->library('Numbertowords');
                                    if($member_bill_details["total_due"] > 0){
                                      echo $CI->numbertowords->convert_number($member_bill_details["total_due"])." Only";
                                    }else{
                                      echo $CI->numbertowords->convert_number(-$member_bill_details["total_due"])." Only";
                                    } 
                                  
                                    ?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3">Note:
                          <p style="padding: 0px 20px;">Interest <?php echo "@".$member_bill_details["society_interest_rate"]."%";?> pa will be charged for delayed payments</p>

                          <p style="padding: 0px 20px;">Please write your Mobile No. and Flat No behind the Cheque</p>
                          <?php if(!empty($member_bill_details["bill_summary"])){?>
                          <p style="padding: 0px 20px;"><?php echo $member_bill_details["bill_summary"] ;?></p>
                          <?php }?>
                          <p>Bank Details for Online Payment: <strong><?php echo $member_bill_details["bank_name"] ?> A/C No. <?php echo $member_bill_details["ac_no"]?><br />
                            IFSC code -  <?php echo $member_bill_details["ifsc"] ?>, <?php echo $member_bill_details["branch"] ?></strong></p>
                          
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" align="right"><p><strong>FOR <?php echo $member_bill_details["societyname"]?></strong></p>
                          <br />
                          <p><strong>HON. SECRETARY / TREASURER</strong></p></td>
                      </tr>
                      <tr>
                          <td colspan="6"> </td>
                      </tr>
                      
                    </table>
                  </td>
              </tr>
              
              
            </table>
          </td>
        </tr>
      </table>


      <table width="100%" border="1" cellspacing="0" cellpadding="0" style="margin-top:20px">
        <tr>
          <td colspan="6" align="center">RECEIPT </td>
        </tr>
        <tr>
          <td colspan="1"> <?php if(!empty($member_bill_details["last_payment"])) echo "SR. No. :".$member_bill_details["last_payment"][0]["receipt_id"];else echo "SR. No. :" ?></td>
          
          <td colspan="5"><?php if(!empty( $member_bill_details["last_payment"][0]["payment_date"])) echo "Date :".date("d-m-Y",strtotime($member_bill_details["last_payment"][0]["payment_date"] )); else echo "Date :" ;?></td>
          
        </tr>
        <tr>
          <td>Received with Thanks from Flat No.</td>
          <td colspan="5"><strong><?php if(!empty($member_bill_details["wing"])) echo $member_bill_details["wing"]."/".$member_bill_details["flat_no"];else echo $member_bill_details["flat_no"]  ?>  <?php echo $member_bill_details["member_name"] ?></strong></td>
       
        </tr>
        <tr>
          <td>Sum of Rupees:</td>
          <td colspan="5">Rupees  <?php if(!empty( $member_bill_details["last_payment"]))  echo $CI->numbertowords->convert_number($member_bill_details["last_payment"][0]["credit"])." Only"?> </td>
        
        </tr>
        <tr>
          <td>Being Amount received by Cheque No./Online:<strong><?php  if(!empty( $member_bill_details["last_payment"])) echo $member_bill_details["last_payment"][0]["cheque_no"];?></strong> </td>
          
          <td colspan="5">Payment against Bill No. <?php  if(!empty( $member_bill_details["last_payment"])) echo $member_bill_details["last_payment"][0]["bill_id"] ?></td>
          
        </tr>
        <tr>
          <td>Rs: </td>
          <td colspan="5"><strong><?php if(!empty( $member_bill_details["last_payment"]))  echo  $member_bill_details["last_payment"][0]["credit"]; ?> </strong></td>
        
        </tr>
        <tr>
          <td>Subject to realization of cheque(s) </td>
          <td colspan="5">&nbsp;</td>
        
        </tr>
        <tr>
         
          <td colspan="6" align="right"><p>FOR <?php echo $member_bill_details["societyname"]?> </p>
            <p>&nbsp;</p>
          <p>HON. SECRETARY / TREASURER </p></td>
        </tr>

      </table>	

<pagebreak />