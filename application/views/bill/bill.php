<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>mSociety</title>
	
</head>
<style type="text/css">
		p{
		margin: 0;
		padding: 0;
	}
	.tblthem1CSS{
		padding: 10px;
		
	}
	.billTBL{
		border: 1px solid #e1e1e1;
	}
</style>
<body>

	<table width="100%" border="1" cellspacing="0" cellpadding="0"  class="tblthem1CSS">
      <tr>
        <td colspan="2" align="center"><p style="text-align:center; font-size: 24px;"><strong><?php echo $member_bill_details["societyname"]?></strong></p>
          <p style="text-align:center"><?php echo $member_bill_details["address"]?></p>
          <p style="text-align:center">Registration No: <?php echo $member_bill_details["registration_no"]?></p>
          <p style="text-align:center">&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="0" class="billTBL">
          <tr>
            <td align="center">Bill No.</td>
            <td align="center">Bill Date</td>
            <td align="center">Flat No.</td>
            <td align="center">Due Date</td>
          </tr>
          <tr>
            <td align="center"><?php echo $member_bill_details["bill_no"]?></td>
            <td align="center"><?php echo date('d-m-Y',strtotime($member_bill_details["bill_date"]))?></td>
            <td align="center"><?php echo $member_bill_details["flat_no"] ?></td>
            <td align="center"><?php echo date("d-m-Y",strtotime($member_bill_details['due_date']))?></td>
          </tr>
        </table>
      </td>
      </tr>
      <tr>
        <td height="33" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td  height="36" style="padding: 0px 20px;">Name : <?php echo ucwords($member_bill_details['member_name'])?> </td>
            <!-- <td width="85%" align="left"></td> -->
          </tr>
        </table>
      </td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%" height="24" align="center">Sr. No</td>
            <td width="64%" align="center">Description</td>
            <td width="23%" align="center">Amount</td>
          </tr>      

          <?php  $dt = unserialize($member_bill_details["details"]);
                                    $i=0;
                                    foreach($dt as $d=>$t): 
                                        if($d != "sub_total"):
                                            if($t != "0.00"):
                                            
                                              
            ?>

                
            <tr>
                <td height="24" align="center"><?php echo  ++$i; ?></td>
                <td align="left" style="padding: 0px 20px;"><?php echo $d?></td>
                <td align="right"  style="padding: 0px 20px 0px 0px;"><?php echo $t?></td>

            
            </tr>
            <?php endif; endif;
                
            endforeach;
            ?>
         

          <tr>
            <td height="24" align="center"><?php echo $i+1?></td>
            <td align="left" style="padding: 0px 20px;">Arrears</td>
            <td align="right"  style="padding: 0px 20px 0px 0px;"><?php echo $member_bill_details["principal_arrears"] ?></td>
          </tr>


          <tr>
            <td height="24" align="center"><?php echo $i+2?></td>
            <td align="left" style="padding: 0px 20px;">Interest</td>
            <td align="right"  style="padding: 0px 20px 0px 0px;">
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
                    echo $interest_arrears+$interest 
                  ?>
            </td>
          </tr>

          <?php if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):?>
          <tr>
            <td height="24" align="center"><?php echo $i+3?></td>
            <td align="left" style="padding: 0px 20px;">GST</td>
            <td align="right"  style="padding: 0px 20px 0px 0px;"><?php echo $member_bill_details["tax_amount"] ;?></td>
          </tr>
          <?php endif;?>


          <tr>
            <td height="24" align="center">&nbsp;</td>
            <td align="left" style="padding: 0px 20px;">&nbsp;</td>
            <td align="right"  style="padding: 0px 20px 0px 0px;">&nbsp;</td>
          </tr>
          <tr>
            <td height="24" align="center">&nbsp;</td>
            <td align="left" style="padding: 0px 20px;">&nbsp;</td>
            <td align="right"  style="padding: 0px 20px 0px 0px;">&nbsp;</td>
          </tr>
          <tr>
            <td height="24" align="center">&nbsp;</td>
            <td align="left" style="padding: 0px 20px;">&nbsp;</td>
            <td align="right"  style="padding: 0px 20px 0px 0px;">&nbsp;</td>
          </tr>
          <tr>
            <td height="24" colspan="2" align="center">Total <?php if($member_bill_details["total_due"] > 0) echo "Payable"; else  echo "Advance" ?></td>
            <td align="right"  style="padding: 0px 20px 0px 0px;">            
              <?php if($member_bill_details["total_due"] > 0){
                      if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):
                        echo $member_bill_details["total_due"]+$member_bill_details["tax_amount"];
                      else:
                        echo $member_bill_details["total_due"];
                      endif;
                         
                    }else{
                       echo  -($member_bill_details["total_due"]);
                    }
                     ?>
            </td>
          </tr>
          
        </table></td>
      </tr>
      <tr>
        <td width="27%" height="36" style="padding: 0px 20px;">Amount in Words:</td>
        <td width="73%" style="padding: 0px 20px;">
          <strong> 
            <?php
                $val=0;
                if($member_bill_details["total_due"] > 0){
                  if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):
                    $val= $val+round($member_bill_details["total_due"]+$member_bill_details["tax_amount"]);
                  else:
                    $val= $val+round($member_bill_details["total_due"]);
                  endif;
                  
                }else{
                  $val= $val+round(-$member_bill_details["total_due"]);
                }                       
                $CI =& get_instance();
                $CI->load->library('Numbertowords');
                echo $CI->numbertowords->convert_number($val) ." Only";
              
            ?>
          </strong>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="padding: 0px 20px;">
        <p>Note:-</p>
        <p style="padding: 0px 20px;"> Cheque should be drawn in favour of society only</p>
        <p style="padding: 0px 20px;">Interest <?php echo "@".$member_bill_details["society_interest_rate"]."%";?> pa will be charged for delayed payments</p>
        <p style="padding: 0px 20px;">Please write your Mobile No. and Flat No behind the Cheque</p>
        <?php if(!empty($member_bill_details["bill_summary"])){?>
          <p style="padding: 0px 20px;"><?php echo $member_bill_details["bill_summary"] ;?></p>
          <?php }?>
      </td>
      </tr>
      <tr>
        <td colspan="2" align="right"  style="padding: 0px 20px 0px 0px;"><p><strong>For  <?php echo $member_bill_details["societyname"]?> </strong></p>
        <p>&nbsp;</p>
        <p>Secretary / Chairman / Treasurer</p></td>
      </tr>


  </table>
	
</body>
</html>