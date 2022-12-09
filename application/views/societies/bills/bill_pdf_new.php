<?php
  $CI =& get_instance();
  $CI->load->library('Numbertowords');
  ini_set("pcre.backtrack_limit", "5000000");
  ini_set('max_execution_time', 300);
?>
<head>
  <title>Monthly Bill</title>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets\modules\bootstrap-4.3.1\css\bootstrap.min.css">   
  <style type="text/css">
      .table-bordered-no-inherit{
        border: 1px #000 !important;
      } 
      .table-bordered-no-inherit tbody+tbody, 
      .table-bordered-no-inherit td,
      .table-bordered-no-inherit th,
      .table-bordered-no-inherit thead th  {
        border: 1px #000 !important;
      }
      .no-border {
        border:none !important;
      }
      .single-border-bottom {
        border-bottom: 2px solid #000 !important;
      }
      .single-border-top {
        border-top: 2px solid #000 !important;
      }
      .double-border-bottom {
        border-bottom: 2px double #000 !important;
      }
      .double-border-top {
        border-top: 2px double #000 !important;
      }

      td
      {
        font-size: 12px !important;
      }
      .table td, .table th {
			    padding: 0rem !important;
			    /*vertical-align: top;*/
			    /*border-top: 1px solid #dee2e6;*/
			}
			.qr{
				width:150px; height:150px;
			}
  </style>
</head>
<body>

<?php foreach($rds as $rd): ?>
    <?php $dt = unserialize($rd["details"]); ?>
  	<table class="table table-borderless" style="page-break-after: always;">
	    <tr class="text-center">
	      <td colspan="3" class="m-0 p-0 "><h3 class="text-center m-0 p-0"><b><?= $rd["societyname"] ?></b></h3></td>
	    </tr>
	    <tr>
	      <td colspan="3" class="m-0 p-0"><h3 class="m-0 p-0 text-center"><i><?= $rd["registration_no"] ?></i></h3></td>
	    </tr>
	    <tr>
	      <td colspan="3" class="m-0 p-0"><h5 class="m-0 p-0 text-center"><i><?= $rd["address"] ?></i></h5></td>
	    </tr>
	    <tr class="single-border-top double-border-bottom m-0 p-0">
	      <td class="m-0 p-0"><b>Bill No.:</b> <?= $rd["bill_no"] ?></td>
	      <td class="border-right-0 m-0 p-0"><b>Wing/Flat No:</b> <?= $rd["wing"].'-'.$rd["flat_no"] ?></td>
	      <td class="m-0 p-0 text-right"><b>Date:</b> <?= $rd["bill_date"] ?></td>
	    </tr>
	    <tr>
	      <td colspan="3" class="m-0 p-0">
	      	<b>Name : </b>
	      	<span class="text-uppercase"><b><?= $rd["member_name"] ?></b></span>
	      </td>
	    </tr>
	    <tr>
	      <td class="m-0 p-0"><b>Bill Period: </b> Bill for <?= $bill_month ?></td>
	      <td></td>
	      <td class="mt-0 pt-0 text-right"><u>Area</u> : <?= $rd["flat_area"] ?> Sq. Ft.</td>
	    </tr>
      <tr>
      	<td class="m-0 p-0 text-left">Sr.No.</td>
      	<td class="m-0 p-0 text-left">Particulars</td>
      	<td class="m-0 p-0 text-right">Amount</td>
      </tr>
    	<?php
    		$counter = 1;
  			ksort($dt);
  			foreach($dt as $d=>$t): 
    			if($d !== "sub_total"):
      			if($t != "0.00"):
			?>
      <tr>
        <td class="m-0 p-0 text-left"><?= $counter ?></td>
        <td class="m-0 p-0 text-left"><?= $d ?></td>
        <td class="m-0 p-0 text-right"><?= $t ?></td>
      </tr>
			<?php
      				$counter++;
          	endif; 
        	endif; 
        endforeach;
			?>
      <tr class="m-0 p-0">
        <td colspan="2" class="m-0 p-0 text-uppercase"><b>Total</b></td>
        <td class="m-0 p-0 text-right"><b><?= $rd["bill_amount"] ?></b></td>
      </tr>
			<?php if($rd["principal_arrears"] != 0 || $rd["principal_arrears"] != "0.00" || $rd["principal_arrears"] != "0"): ?>
    	<tr class="m-0 p-0">
        <td colspan="2" class="m-0 p-0">Arrears as on <?= $last_month ?></td>
        <td class="m-0 p-0 text-right"><?= $rd["principal_arrears"] ?></td>
  		</tr>
			<?php
        endif;
        if($rd["interest_arrears"] != 0 || $rd["interest_arrears"] != "0.00" || $rd["interest_arrears"] != "0"):
			?>
      <tr class="m-0 p-0">
        <td colspan="2" class="m-0 p-0">Interest Arrears</td>
        <td class="m-0 p-0 text-right"><?= $rd["interest_arrears"] ?></td>
  		</tr>
			<?php
        endif;
        if($rd["interest"] != 0 || $rd["interest"] != "0.00" || $rd["interest"] != "0"):
			?>
          <tr class="m-0 p-0">
            <td colspan="2" class="m-0 p-0">Interest on Arrears</td>
            <td class="m-0 p-0 text-right"><?= $rd["interest"] ?></td>
          </tr>
			<?php
        endif;
        if($rd["late_payment_charges"] != 0 || $rd["late_payment_charges"] != "0.00" || $rd["late_payment_charges"] != "0"):
			?>
          <tr class="m-0 p-0">
            <td colspan="2" class="m-0 p-0">Late Payment Charges</td>
            <td class="m-0 p-0 text-right"><?= $rd["late_payment_charges"] ?></td>
          </tr>
			<?php
        endif;
			?>

      <tr>
          <td colspan="2" class="p-0 m-0"><b>Grand Total</b></td>
          <td class="text-right p-0 m-0"><b><?= $rd["total_due"] ?></b></td>
			</tr>
				
    <tr>
      <td colspan="4" class="m-0 p-0"></td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">
			<?php
      	if($rd["total_due"] >= 0):
			?>
        <b>Amount in Words: Indian Rupees <?= $CI->numbertowords->convert_number($rd["total_due"]) ?> Only.</b>
			<?php
      	endif;
			?>
      </td>
    </tr>
    <tr>
    	<td>
    		<table>
    			<tr>
			      <td colspan="3" class="m-0 p-0"><h4>Bank Details</h4></td>
			    </tr>
			    <tr>
			      <td colspan="3" class="m-0 p-0">Name: <?= $rd["bank_name"] ?></td>
			    </tr>
			    <tr>
			      <td colspan="3" class="m-0 p-0">Branch: <?= $rd["branch"] ?></td>
			    </tr>
			    <tr>
			      <td colspan="3" class="m-0 p-0">IFSC: <?= $rd["ifsc"] ?></td>
			    </tr>
			    <tr>
			      <td colspan="3" class="m-0 p-0">A/C: <?= $rd["ac_no"] ?></td>
			    </tr>
			    <tr>
			      <td colspan="3" class="m-0 p-0">N.B. Interest @ 21.00% P.A. will be charged on Arreas after Due Date i.e <?= $rd["due_date"] ?></td>
			    </tr>
    		</table>
    	</td>
    	<td></td>
    	<td>
    		<table>
    			<tr>
			    	<td colspan="2" class="text-right"><h5>Scan QR Code & Pay</h5>
				        <img class="qr" src="<?= base_url() ?>assets\img\paynetupi.png">
				      </td>
			    </tr>
    		</table>
    	</td>
    </tr>
    <tr>
      <td colspan="3" class="m-0 p-0">Please draw a cheque in favour of <?= $rd["societyname"] ?><br>Please write your Mobile No. and Flat No behind the Cheque</td>
    </tr>
    <tr>
      <td colspan="2"></td>
      <td class="text-right"><span class="text-right"><?= $rd["societyname"] ?></span></td>
    </tr>
    <tr>
      <td class="text-left p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td colspan="" class="p-0 m-0 text-left"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td class="text-right p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
    </tr>
     <tr>
      <td colspan="3" class="p-0 m-0 text-left">This is system generated bill and does not require signature.</td>
      <!--<td colspan="5" class="p-0 m-0 text-right" style="margin-left:500px;">Hon. Secretary / Chairman</td>-->
    </tr>
    <tr>
      <td colspan="3" class="single-border-top double-border-bottom p-0 mb-0 mt-2"><h2 class="text-center"><b>Reciept for <?= !empty($last_payment_date) ? $last_payment_date : '' ?></b></h2></td>
    </tr><br>
    <tr>
      <td colspan="3">
        <table class="table table-borderless" style="width:100%;">
          <tr>
            <td class="text-center"><b>Payment Date</b></td>
            <td class="text-center"><b>Paid By</b></td>
            <td class="text-center"><b>Amount</b></td>
          </tr>
	<?php
        foreach($rd["last_payment"] as $last_payment):
	?>
          <tr>
            <td class="text-center"><?= $last_payment["payment_date"] ?></td>
            <td class="text-center"><?= $last_payment["paid_by"] ?></td>
            <td class="text-center"><?= $last_payment["credit"] ?></td>
          </tr>
	<?php
        endforeach;
	?>
        </table>
      </td>
    </tr>
    <tr>
      <td class="p-0 m-0" colspan="3">
      <table class="table table-borderless" style="width:100%;">
          <tr>
            <td colspan="3"><span>Name : </span><span class="text-uppercase"><b><?= $rd["member_name"] ?></b></span></td>
            <td class="text-right"><span class="text-right"><?= $rd["societyname"] ?></span></td>
          </tr>
      </table>
    </td>
    </tr>
    <tr>
      <td class="text-left p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td class="p-0 m-0 text-left"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td class="text-right p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
    </tr>
     <tr>
      <td colspan="3" class="p-0 m-0 text-left">This is system generated reciept and does not require signature.</td>
      <!--<td colspan="5" class="p-0 m-0 text-right" style="margin-left:500px;">Hon. Secretary / Chairman</td>-->
    </tr>
  </table><br>
<?php
endforeach;
?>
</body>
