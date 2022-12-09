
<style>
	p{
		margin: 0;
		padding: 0;
	}
	.tblthem1CSS{
		padding: 5px;
		
	}
	.billTBL{
		border: 1px solid #e1e1e1;
	}
</style>

<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tblthem1CSS">
  <tr>
    <td colspan="2"  align="center"><p style="text-align:center; font-size: 24px;"><strong><?php echo $member_bill_details["societyname"]?></strong></p>
      <p style="text-align:center"><?php echo $member_bill_details["address"]?></p>
    </td>
  </tr>
  <tr>
    <td colspan="2">
    <table width="100%" border="1" cellspacing="0" cellpadding="0" class="billTBL">
      <tr>
        <td height="25" style="padding: 0px 10px "><strong>Bill No.</strong></td>
        <td style="padding: 0px 10px "><?php echo $member_bill_details["bill_no"]?></td>
        <td style="padding: 0px 10px "><strong>Bill Date</strong></td>
        <td style="padding: 0px 10px "><?php echo date('d-m-Y',strtotime($member_bill_details["bill_date"]))?></td>
        <td style="padding: 0px 10px "><strong>Name</strong></td>
        <td style="padding: 0px 10px "><?php echo ucwords($member_bill_details['member_name'])?></td>
      </tr>
      <tr>
        <td height="20" style="padding: 0px 10px "><strong>Flat No.</strong></td>
        <td style="padding: 0px 10px "><?php echo $member_bill_details["flat_no"] ?></td>
        <td style="padding: 0px 10px "><strong>Due Date</strong></td>
        <td style="padding: 0px 10px "><?php echo date("d-m-Y",strtotime($member_bill_details['due_date']))?></td>
        <td style="padding: 0px 10px "><strong>Period</strong></td>
        <td style="padding: 0px 10px "><?php echo date('M-Y',strtotime($member_bill_details["bill_date"]))?></td>
      </tr>
    </table>
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td width="13%" align="center"><strong>Sr No.</strong></td>
        <td width="64%" align="center"><strong>Description</strong></td>
        <td width="23%" align="center"><strong>Amount</strong></td>
      </tr>

      <?php  
          $dt = unserialize($member_bill_details["details"]);          
          $i=0;
          foreach($dt as $d=>$t): 
              if($d != "sub_total"):                         
                          
      ?>
      <tr>
        <td align="center"><?php echo ++$i?></td>
        <td style="padding: 0px 20px;"><?php echo $d?></td>
        <td align="right" style="padding: 0px 20px 0px 0px;"><?php echo $t?></td>
      </tr>
      
      <?php            
          endif; 
          endforeach;
      ?>

      
      <tr>
        <td align="center"><?php echo ++$i;?></td>
        <td style="padding: 0px 20px;">Arrears</td>
        <td align="right" style="padding: 0px 20px 0px 0px;"><?php echo $member_bill_details["principal_arrears"];?></td>
      </tr>
      <?php if($member_bill_details["interest_arrears"]>0):?>
      <tr>
        <td align="center"><?php echo ++$i;?></td>
        <td style="padding: 0px 20px;">Interest</td>
        <td align="right" style="padding: 0px 20px 0px 0px;"><?php echo $member_bill_details["interest_arrears"];?></td>
      </tr>
      <?php endif;?>
      <?php if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):?>
      <tr>
        <td align="center"><?php echo ++$i;?></td>
        <td style="padding: 0px 20px;">GST</td>
        <td align="right" style="padding: 0px 20px 0px 0px;"><?php echo $member_bill_details["tax_amount"];?></td>
      </tr>
      <?php endif;?>
      <tr>
        <td align="center">&nbsp;</td>
        <td style="padding: 0px 20px;">&nbsp;</td>
        <td align="right" style="padding: 0px 20px 0px 0px;">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td align="right"><strong>Total <?php if($member_bill_details["total_due"] > 0) echo "Payable"; else  echo "Advance" ?></strong></td>
        <td align="right" style="padding: 0px 20px 0px 0px;">
            <?php if($member_bill_details["total_due"] > 0) echo $member_bill_details["total_due"]; else  echo -($member_bill_details["total_due"]); ?>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="padding: 0px 20px;"><strong>Amount in Words</strong>: Rupees <?php
                    $CI =& get_instance();
                    $CI->load->library('Numbertowords');
                    if($member_bill_details["total_due"] > 0){
                      if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):
                        echo $CI->numbertowords->convert_number($member_bill_details["total_due"]+$member_bill_details["tax_amount"])." Only";
                      else:
                        echo $CI->numbertowords->convert_number($member_bill_details["total_due"])." Only";
                      endif;
                      
                    }else{
                      echo $CI->numbertowords->convert_number(-$member_bill_details["total_due"])." Only";
                    } 
                   
                   
                     ?> </td>
        <td align="right">&nbsp;</td>
      </tr>
     
    </table>
    
    </td>
  </tr>
  <tr>
    <td width="65%" style="padding: 0px 20px;">
    <p>Notes: </p>
    <p style="padding: 0px 20px;font-size: 15px;">1.Cheque should be drawn in favour of society only</p>
    <p style="padding: 0px 20px;font-size: 15px">2.Interest <?php echo "@".$member_bill_details["society_interest_rate"]."%";?> pa will be charged for delayed payments</p>
    <p style="padding: 0px 20px;font-size: 15px">3.Please write your Mobile No. and Flat No behind the Cheque</p>
    <p style="padding: 0px 20px;font-size: 20px; font-weight: bold;"> <?php if(!empty($member_bill_details["registration_no"])) echo "Reg No. ".$member_bill_details["registration_no"] ?></p>
    <?php if(!empty($member_bill_details["bill_summary"])){?>
          <p style="padding: 0px 20px;"><?php echo $member_bill_details["bill_summary"] ;?></p>
    <?php }?>
    </td>
    <td width="35%" align="right" valign="bottom" style="padding: 0px 20px 0px 0px;">Secretary / Chairman / Treasurer</td>
  </tr>  


</table>
<br/>
