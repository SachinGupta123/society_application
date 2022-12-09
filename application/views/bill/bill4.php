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
  table td, table td * {
    vertical-align: top;
}   
td{
    /* height: 20px; */
    padding: 2px;
  }

</style>
<body>

  <table width="100%" border="1" cellspacing="0" cellpadding="0"  >
    <tr>
      <td colspan="2" align="center"><h2><?php echo $member_bill_details["societyname"]?></h2>

        <p style="text-align:center">REGD. NO. <?php echo $member_bill_details["registration_no"]?></p>
        <p style="text-align:center">ADD: <?php echo $member_bill_details["address"]?></p>
      </td>
    </tr>
    <tr>
      <td colspan="6">
            <table width="100%" border="1" cellspacing="0" cellpadding="0" class="billTBL" >
              <tr>
                <td colspan="2" style="padding-left:15px;" align="left" >Bill No. :  <?php echo $member_bill_details["bill_no"]?></td>
                
                <td align="right" style="padding-right:15px;" colspan="2">BILL DATE :  <?php echo date('d-m-Y',strtotime($member_bill_details["bill_date"]))?></td>
                
              </tr>
              <tr>
                <td colspan="2" style="padding-left:15px;" align="left">FLAT NO :  <?php if(!empty($member_bill_details["wing"])) echo $member_bill_details["wing"]."/".$member_bill_details["flat_no"];else echo $member_bill_details["flat_no"]  ?></td>
               
                <td colspan="2" style="padding-right:15px;" align="right">DUE DATE :  <?php echo date("d-m-Y",strtotime($member_bill_details['due_date']))?></td>
               
              </tr>
              <tr>
                  <td colspan="2" style="padding-left:15px; " align="left">NAME :  <?php echo ucwords($member_bill_details['member_name'])?></td>
                 
                  <td colspan="2" style="padding-right:15px;"  align="right"></td>
               
              </tr>
            </table>
      </td>
    </tr>

    <tr>
      <td colspan="6">
          <table width="100%" style="border:1px solid #000; margin-top:10px" cellspacing="0" cellpadding="0">
            <tr>       
              <td width="64%" align="center" style="border:1px solid #000">Charge Descriptions</td>
              <td width="23%" align="center" style="border:1px solid #000">Amount</td>
            </tr>
          
            <?php  $dt = unserialize($member_bill_details["details"]);
                  $i=0;
                $sub_total=0;
              foreach($dt as $d=>$t): 
                  if($d != "sub_total"){
                      if($t != "0.00"):
                        
              ?>
            <tr>
            
              <td align="left" style="padding: 0px 20px; border:1px solid #000"><?php echo $d?></td>
              <td align="right"  style="padding: 0px 20px 0px 0px; border:1px solid #000"><?php echo $t?></td>
            </tr>
          
            <?php   
                    endif;
                  }else{
                    $sub_total=$t;
                  } 
                  endforeach;
            ?>  
            
            <?php if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):?>
              <tr>
            
                <td align="left" style="padding: 0px 20px; border:1px solid #000"><?php echo "GST"?></td>
                <td align="right"  style="padding: 0px 20px 0px 0px; border:1px solid #000"><?php echo $member_bill_details["tax_amount"]?></td>
              </tr>
            <?php endif;?>

            <tr>
              <td height="24"  align="right" style="padding: 0px 20px; border:1px solid #000">Total Payable</td>
              <td align="right"  style="padding: 0px 20px 0px 0px; border:1px solid #000">
                    <?php  
                          echo $sub_total;
                    ?>
              </td>
            </tr>
            
          </table>
      </td>
    </tr>

    <tr>
      <td width="30%" style="padding: 0px 20px;border:1px solid #000">Amount in Words:</td>      
      <td  style="padding: 0px 20px;border:1px solid #000">
          <strong>
                  <?php
                        $CI =& get_instance();
                        $CI->load->library('Numbertowords');                       
                        if($member_bill_details["total_due"] > 0){
                          if(($member_bill_details["tax_amount"] != "0.00" &&  $member_bill_details["tax_amount"] != "") && $member_bill_details["is_gst"] != 0 ):
                            echo $CI->numbertowords->convert_number($member_bill_details["total_due"]+$member_bill_details["tax_amount"]);
                          else:
                            echo $CI->numbertowords->convert_number($member_bill_details["total_due"]);
                          endif;

                          
                        }else{
                          echo $CI->numbertowords->convert_number(-$member_bill_details["total_due"]);
                        } 
                  ?>
          </strong>
      </td>
    </tr>
 
    <tr>
      <td width="70%" style="padding: 0px 20px;border:1px solid #000"><p>Note:-</p>
        <p style="padding: 0px 20px;">Interest <?php echo "@".$member_bill_details["society_interest_rate"]."%";?> pa will be charged for delayed payments</p>

        <p style="padding: 0px 20px;">Please write your Mobile No. and Flat No behind the Cheque</p>
        <?php if(!empty($member_bill_details["bill_summary"])){?>
          <p style="padding: 0px 20px;"><?php echo $member_bill_details["bill_summary"] ;?></p>
        <?php }?>

        <p style="padding: 0px 20px;">Bank Details for online payment:.</p>
        <p style="padding: 0px 20px;">A/C Number: <?php echo $member_bill_details["ac_no"]?>  IFSC CODE:<?php echo $member_bill_details["ifsc"] ?> <br> Bank Name: <?php echo $member_bill_details["bank_name"] ?>  branch : <?php echo $member_bill_details["branch"] ?></p>
      </td>
      <td width="30%" vertical-align="top" style="border:1px solid #000; ">
          <table width="100%"  cellspacing="0" cellpadding="0" >
            <tr>          
              <td width="64%" align="left" style="padding: 20px 20px; ">ARREARS / ADV :</td>
              <td width="23%" align="center" style="padding: 20px 20px 0px 0px; " ><?php if($member_bill_details["principal_arrears"]!="0") echo $member_bill_details["principal_arrears"];else echo "0"; ?></td>
            </tr>
            <tr>
          
              <td align="left" style="padding: 20px 20px; ">INTEREST :</td>
              <td align="right"  style="padding: 20px 20px 0px 0px; ">
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
                    echo $interest_arrears+$interest;
                ?>
              </td>
            </tr>
            <tr>        
              <td align="left" style="padding: 20px 20px; ">NET AMOUNT  :</td>
              <td align="right"  style="padding: 20px 20px 0px 0px; "><?php echo $member_bill_details["total_due"];?></td>
            </tr>
          
          </table>
      </td>
    </tr>
    <tr>
        <td colspan="2" style="border:1px solid #000;">
          <table cellspacing="0px" cellpadding="0px"  width="100%" style="border-bottom:1px solid #000; margin-top:15px">
                <tr>
                    <td class="regno txt-upper" style="border-bottom:1px solid #000; padding:5px" colspan="2" align="center">Receipt Details
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border:1px solid #000;" >
                      <table width="100%"  cellspacing="0" cellpadding="0" >
                          <tr>
                            <td align="left" style="padding-left:15px">Receipt No. :</td>
                            <td align="left" style="padding-left:15px"><?php if(!empty($member_bill_details["last_payment"])) echo $member_bill_details["last_payment"][0]["receipt_id"] ?></td>
                            <td align="left" style="padding-left:15px">Date :</td>
                            <td align="left" style="padding-left:15px"><?php if(!empty( $member_bill_details["last_payment"][0]["payment_date"])) echo date("d-m-Y",strtotime($member_bill_details["last_payment"][0]["payment_date"] ))?></td>
                          </tr>
                          <tr>
                            <td align="left" style="padding-left:15px">Flat No. :</td>
                            <td align="left" style="padding-left:15px"> <?php if(!empty($member_bill_details["wing"])) echo $member_bill_details["wing"]."/".$member_bill_details["flat_no"];else echo $member_bill_details["flat_no"]  ?> </td>
                            <td align="left" style="padding-left:15px">Name :</td>
                            <td align="left" style="padding-right:15px"><?php echo ucwords($member_bill_details['member_name'])?></td>
                          </tr>
                          <tr>
                            <td align="left" style="padding-left:15px">Narration :</td>
                            <td align="left" style="padding-left:15px"><?php if(!empty( $member_bill_details["last_payment"][0]["bill_id"])) echo "Against Bill No. " .$member_bill_details["last_payment"][0]["bill_id"]. "Dated ".date("d-m-Y",strtotime($member_bill_details["last_payment"][0]["payment_date"] )) ?> </td>
                            <td align="left" style="padding-left:15px">Bank Name : </td>
                            <td align="left" style="padding-left:15px"></td>
                          </tr>
                          <tr>
                            <td align="left" style="padding-left:15px">Amount (INR). </td>
                            <td align="left" style="padding-left:15px"><?php if(!empty( $member_bill_details["last_payment"]))  echo  $member_bill_details["last_payment"][0]["credit"]; ?> </td>
                            <td align="left" style="padding-left:15px"> </td>
                            <td align="left" style="padding-left:15px"></td>
                          </tr>
      
                      </table>
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid #000;padding-left:15px" colspan="2">
                        <strong> Recevived with Thanks sum of : </strong> <?php if(!empty($member_bill_details["last_payment"][0]["credit"])) echo "Total Rupees ".$CI->numbertowords->convert_number($member_bill_details["last_payment"][0]["credit"])." Only";?>
                    </td>
                </tr>

                <tr>
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000;padding-left:15px;padding:7px" colspan="2">
                        Subject to realization of Cheque(s). </td>
                </tr>
          </table>
        </td>
    </tr>

    <tr>
      <td colspan="6" align="right"  style="border-top: 1px solid #000; border-bottom: 1px solid #000;padding: 0px 20px 0px 0px;"><p><strong>FOR <?php echo $member_bill_details["societyname"]?> </strong></p>
      <p>&nbsp;</p>
      <p>Secretary / Chairman / Treasurer</p></td>
    </tr>

</table>
  
</body>
</html>