<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->library('Numbertowords');
?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Monthly Bill</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\modules\bootstrap-4.3.1\css\bootstrap.min.css">
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->	
  <style type="text/css">
      .table-bordered-no-inherit{
        border: 1px solid #000 !important;
      } 
      .table-bordered-no-inherit tbody+tbody, 
      .table-bordered-no-inherit td,
      .table-bordered-no-inherit th,
      .table-bordered-no-inherit thead th  {
        border: 1px solid #000 !important;
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
        border-bottom: 4px double #000 !important;
      }
      .double-border-top {
        border-top: 4px double #000 !important;
      }

      td
      {
      	font-size: 14px !important;
      }


  </style>
  </head>
  <body>
<?php foreach($rds as $rd): ?>
	<?php $dt = unserialize($rd['details']); ?>
  <table class="table table-borderless" style="page-break-after: always;">
    <tr>
      <td colspan="4" class="h2 m-0 p-0 text-left"><span style="font-weight: bold;"><?php echo $rd['societyname']?></span></td>
    </tr>
    <tr>
      <td colspan="4" class="h4 m-0 p-0 text-left"><?php echo $rd['registration_no']?></td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0 text-left"><?php echo $rd['address'];?></td>
    </tr>
    <tr class="single-border-top double-border-bottom m-0 p-0">
      <td class="m-0 p-0">Bill No.: <?php echo $rd['bill_no'] ?></td>
      <td class="border-right-0 m-0 p-0">Wing/Flat No:</td>
      <td class="border-left-0 m-0 p-0"><?php echo $rd['wing'] ?>-<?php echo $rd['flat_no'] ?></td>
      <td class="m-0 p-0">Date : <?php echo $rd['bill_date'] ?></td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0"><span>Name : </span><span class="text-uppercase"><b><?php echo $rd['member_name'] ?></b></span></td>
    </tr>
    <tr>
      <td colspan="2" class="m-0 p-0">Bill Period : Bill for <?php echo $bill_month ?></td>
      <td></td>
      <td class="mt-0 pt-0 mb-2 pb-0"><u>Area</u> : <?php echo $rd['flat_area'] ?> Sq. Ft.</td>
    </tr>
    <tr>
      <td colspan="3" rowspan="2" class="m-0 p-0">
      	 <table class="table table-bordered border-2 table-bordered-no-inherit">
      	 	  <tr>
              <td class="m-0 p-0 text-center">Sr.No.</td>
              <td class="m-0 p-0 text-left">Particulars</td>
              <td class="m-0 p-0 text-center">Amount</td>
            </tr>
          <?php $counter = 1; ?>
      	 	<?php 
          ksort($dt);
          foreach($dt as $d=>$t): 
            if($d !== 'sub_total'):
              if($t != '0.00'):
          ?>
	          <tr>
	            <td class="m-0 p-0 text-center"><?php echo $counter ?></td>
	            <td class="m-0 p-0 text-left"><?php echo $d?></td>
	            <td class="m-0 p-0 text-right"><?php echo number_format($t, 2, '.', '');?></td>
	          </tr>
            <?php $counter++; ?>
      		<?php endif; endif; endforeach; ?>
          <tr class="m-0 p-0">
            <td colspan="2" class="m-0 p-0 text-uppercase"><b>Total</b></td>
            <td class="m-0 p-0 text-right"><b><?php echo $rd['bill_amount']?></b></td>
          </tr>
          <?php if($rd['principal_arrears'] != 0 || $rd['principal_arrears'] != '0.00' || $rd['principal_arrears'] != '0'): ?>
            <tr class="m-0 p-0">
              <td colspan="2" class="m-0 p-0">Arrears as on <?php echo $last_month ?></td>
              <td class="m-0 p-0 text-right"><?php echo $rd['principal_arrears'] ?></td>
            </tr>
          <?php endif; ?>
          <?php if($rd['interest_arrears'] != 0 || $rd['interest_arrears'] != '0.00' || $rd['interest_arrears'] != '0'): ?>
            <tr class="m-0 p-0">
              <td colspan="2" class="m-0 p-0">Interest Arrears</td>
              <td class="m-0 p-0 text-right"><?php echo $rd['interest_arrears'] ?></td>
            </tr>
          <?php endif; ?>
          <?php if($rd['interest'] != 0 || $rd['interest'] != '0.00' || $rd['interest'] != '0'): ?>
            <tr class="m-0 p-0">
              <td colspan="2" class="m-0 p-0">Interest on Arrears</td>
              <td class="m-0 p-0 text-right"><?php echo $rd['interest'] ?></td>
            </tr>
          <?php endif; ?>
          <?php if($rd['late_payment_charges'] != 0 || $rd['late_payment_charges'] != '0.00' || $rd['late_payment_charges'] != '0'): ?>
            <tr class="m-0 p-0">
              <td colspan="2" class="m-0 p-0">Late Payment Charges</td>
              <td class="m-0 p-0 text-right"><?php echo $rd['late_payment_charges'] ?></td>
            </tr>
          <?php endif; ?>
          <tr>
            <td colspan="2" class="p-0 m-0"><b>Grand Total</b></td>
            <td class="text-right p-0 m-0"><b><?php echo $rd['total_due'] ?></b></td>
          </tr>
        </table>
      </td>
      <td class="border border-dark">
        <h5><u>Bank Details</u></h5>
        <div>
          <span>Name: </span><span><?php echo $rd['bank_name'] ?></span><br>
          <span>Branch: </span><span><?php echo $rd['branch'] ?></span><br>
          <span>IFSC: </span><span><?php echo $rd['ifsc'] ?></span><br>
          <span>A/C: </span><span><?php echo $rd['ac_no'] ?></span>
        </div>
      </td>
    </tr>
    <tr>
      <td class="border border-dark"><h5>Scan QR Code & Pay</h5>
        <!-- <img src="<?= base_url(); ?>assets\img\paynetupi.png" style="width:150px; height:150px;" -->
      </td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">
      <?php if($rd['total_due'] >= 0): ?>
        <b>Rupees <?php echo $CI->numbertowords->convert_number($rd['total_due']) ?> Only.</b>
      <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">N.B. Interest @ 21.00% P.A. will be charged on Arreas after Due Date i.e <?php echo $rd['due_date']?></td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">
        Please draw a cheque in favour of <?php echo $rd['societyname']?><br>
        Please write your Mobile No. and Flat No behind the Cheque</td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td class="text-right"><span class="text-right"><?php echo $rd['societyname']?></span></td>
    <!-- </tr>
    <tr><td colspan="4" rowspan="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
    <tr> -->
      <!-- <td></td> -->
    </tr>
    <tr>
      <td class="text-left p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td colspan="2" class="p-0 m-0 text-left"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td class="text-right p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
    </tr>
     <tr>
      <td class="p-0 m-0 text-left">This is system generated bill and does not require signature.</td>
      <td colspan="3" class="p-0 m-0 text-right">Hon. Secretary / Chairman</td>
    </tr>
    <tr>
      <td colspan="4" class="single-border-top double-border-bottom p-0 mb-0 mt-2"><h2 class="text-center"><b>Reciept for <?php echo !empty($rd['last_payment']) ? $rd['last_payment'][0]['payment_date'] : '' ?></b></h2></td>
    </tr>
    <tr>
      <td colspan="4">
        <table class="table table-borderless">
          <tr>
            <td class="text-center"><b>Payment Date</b></td>
            <td class="text-center"><b>Paid By</b></td>
            <td class="text-center"><b>Amount</b></td>
          </tr>
        <?php foreach($rd['last_payment'] as $last_payment): ?>
          <tr>
            <td class="text-center"><?= $last_payment['payment_date'] ?></td>
            <td class="text-center"><?= $last_payment['paid_by'] ?></td>
            <td class="text-center"><?= $last_payment['credit'] ?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </td>
    </tr>
    <tr>
      <td class="p-0 m-0" colspan="4">
      <table class="table table-borderless" style="width:100%;">
          <tr>
            <td colspan="3"><span>Name : </span><span class="text-uppercase"><b><?php echo $rd['member_name'] ?></b></span></td>
            <td class="text-right"><span class="text-right"><?php echo $rd['societyname']?></span></td>
          </tr>
      </table>
    </td>
    </tr>
    <tr>
      <td class="text-left p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td colspan="2" class="p-0 m-0 text-left"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td class="text-right p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
    </tr>
     <tr>
      <td class="p-0 m-0 text-left">This is system generated bill and does not require signature.</td>
      <td colspan="3" class="p-0 m-0 text-right">Hon. Secretary / Chairman</td>
    </tr>
  </table>
<?php endforeach; ?>
  </body>
  </html>