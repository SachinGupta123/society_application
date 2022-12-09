<?php
$CI =& get_instance();
$CI->load->library('Numbertowords');
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Monthly bill');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');

$pdf->AddPage();

// create some HTML content

$html = '<head>
    <title>Monthly Bill</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets\modules\bootstrap-4.3.1\css\bootstrap.min.css">   
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


  </style>
  </head>
  <body>';

foreach($rds as $rd):
    $dt = unserialize($rd["details"]);
  $html .= '<table class="table table-borderless" style="page-break-after: always;">
    <tr class="text-center">
      <td colspan="4" class="h2 text-center"><span style="font-weight: bold;">'.$rd["societyname"].'</span></td>
    </tr>
    <tr>
      <td colspan="4" class="h4 m-0 p-0 text-center">'.$rd["registration_no"].'</td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0 text-center">'.$rd["address"].'</td>
    </tr><br>
    <tr class="single-border-top double-border-bottom m-0 p-0">
      <td class="m-0 p-0">Bill No.: '.$rd["bill_no"].'</td>
      <td class="border-right-0 m-0 p-0">Wing/Flat No:</td>
      <td class="border-left-0 m-0 p-0">'.$rd["wing"].'-'.$rd["flat_no"].'</td>
      <td class="m-0 p-0">Date : '.$rd["bill_date"].'</td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0"><span>Name : </span><span class="text-uppercase"><b>'.$rd["member_name"].'</b></span></td>
    </tr>
    <tr>
      <td colspan="2" class="m-0 p-0">Bill Period : Bill for '.$bill_month.'</td>
      <td></td>
      <td class="mt-0 pt-0 mb-2 pb-0"><u>Area</u> : '.$rd["flat_area"].' Sq. Ft.</td>
    </tr><br>
    <tr>
      <td colspan="3" rowspan="2" class="m-0 p-0">
         <table class="table table-bordered border-2 table-bordered-no-inherit">
              <tr>
              <td class="m-0 p-0 text-center">Sr.No.</td>
              <td class="m-0 p-0 text-left">Particulars</td>
              <td class="m-0 p-0 text-center">Amount</td>
            </tr>';

          $counter = 1;
          ksort($dt);
          foreach($dt as $d=>$t): 
            if($d !== "sub_total"):
              if($t != "0.00"):
            $html .= '<tr>
                <td class="m-0 p-0 text-center">'.$counter.'</td>
                <td class="m-0 p-0 text-left">'.$d.'</td>
                <td class="m-0 p-0 text-right">'.$t.'</td>
              </tr>';
            $counter++;
            endif; endif; endforeach;
        $html .= '<tr class="m-0 p-0">
            <td colspan="2" class="m-0 p-0 text-uppercase"><b>Total</b></td>
            <td class="m-0 p-0 text-right"><b>'. $rd["bill_amount"].'</b></td>
          </tr>';
          if($rd["principal_arrears"] != 0 || $rd["principal_arrears"] != "0.00" || $rd["principal_arrears"] != "0"):
        $html .= '<tr class="m-0 p-0">
              <td colspan="2" class="m-0 p-0">Arrears as on '.$last_month.'</td>
              <td class="m-0 p-0 text-right">'.$rd["principal_arrears"].'</td>
            </tr>';
          endif;
          if($rd["interest_arrears"] != 0 || $rd["interest_arrears"] != "0.00" || $rd["interest_arrears"] != "0"):
        $html .= '<tr class="m-0 p-0">
              <td colspan="2" class="m-0 p-0">Interest Arrears</td>
              <td class="m-0 p-0 text-right">'.$rd["interest_arrears"].'</td>
            </tr>';
          endif;
          if($rd["interest"] != 0 || $rd["interest"] != "0.00" || $rd["interest"] != "0"):
            $html .= '<tr class="m-0 p-0">
              <td colspan="2" class="m-0 p-0">Interest on Arrears</td>
              <td class="m-0 p-0 text-right">'.$rd["interest"].'</td>
            </tr>';
          endif;
          if($rd["late_payment_charges"] != 0 || $rd["late_payment_charges"] != "0.00" || $rd["late_payment_charges"] != "0"):
            $html .= '<tr class="m-0 p-0">
              <td colspan="2" class="m-0 p-0">Late Payment Charges</td>
              <td class="m-0 p-0 text-right">'.$rd["late_payment_charges"].'</td>
            </tr>';
          endif;
          $html .= '<tr>
            <td colspan="2" class="p-0 m-0"><b>Grand Total</b></td>
            <td class="text-right p-0 m-0"><b>'.$rd["total_due"].'</b></td>
          </tr>
        </table>
      </td>
      <td class="border border-dark" style="border:0.5px;"><h5>Scan QR Code & Pay</h5>
        <img src="'.base_url().'assets\img\paynetupi.png" style="width:150px; height:150px;">
      </td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0"></td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">';
      if($rd["total_due"] >= 0):
        $html .= '<b>Amount in Words: Indian Rupees '.$CI->numbertowords->convert_number($rd["total_due"]).' Only.</b>';
      endif;
      $html .= '</td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0"><h4>Bank Details</h4></td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">Name: '.$rd["bank_name"].'</td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">Branch: '.$rd["branch"].'</td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">IFSC: '.$rd["ifsc"].'</td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">A/C: '.$rd["ac_no"].'</td>
    </tr><br>
    <tr>
      <td colspan="4" class="m-0 p-0">N.B. Interest @ 21.00% P.A. will be charged on Arreas after Due Date i.e '.$rd["due_date"].'</td>
    </tr>
    <tr>
      <td colspan="4" class="m-0 p-0">Please draw a cheque in favour of '.$rd["societyname"].'<br>Please write your Mobile No. and Flat No behind the Cheque</td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td class="text-right"><span class="text-right">'.$rd["societyname"].'</span></td>
    </tr>
    <tr>
      <td class="text-left p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td colspan="2" class="p-0 m-0 text-left"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
      <td class="text-right p-0 m-0"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
    </tr>
     <tr>
      <td colspan="5" class="p-0 m-0 text-left">This is system generated bill and does not require signature.</td>
      <!--<td colspan="5" class="p-0 m-0 text-right" style="margin-left:500px;">Hon. Secretary / Chairman</td>-->
    </tr><br>
    <tr>
      <td colspan="4" class="single-border-top double-border-bottom p-0 mb-0 mt-2"><h2 class="text-center"><b>Reciept for'; !empty($last_payment_date) ? $last_payment_date : ''; $html .= '</b></h2></td>
    </tr><br>
    <tr>
      <td colspan="4">
        <table class="table table-borderless" style="width:100%;">
          <tr>
            <td class="text-center"><b>Payment Date</b></td>
            <td class="text-center"><b>Paid By</b></td>
            <td class="text-center"><b>Amount</b></td>
          </tr>';
        foreach($rd["last_payment"] as $last_payment):
          $html .= '<tr>
            <td class="text-center">'.$last_payment["payment_date"].'</td>
            <td class="text-center">'.$last_payment["paid_by"].'</td>
            <td class="text-center">'.$last_payment["credit"].'</td>
          </tr>';
        endforeach;
        $html .= '</table>
      </td>
    </tr>
    <tr><br>
      <td class="p-0 m-0" colspan="4">
      <table class="table table-borderless" style="width:100%;">
          <tr>
            <td colspan="3"><span>Name : </span><span class="text-uppercase"><b> '.$rd["member_name"].'</b></span></td>
            <td class="text-right"><span class="text-right">'.$rd["societyname"].'</span></td>
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
      <td colspan="5" class="p-0 m-0 text-left">This is system generated reciept and does not require signature.</td>
      <!--<td colspan="5" class="p-0 m-0 text-right" style="margin-left:500px;">Hon. Secretary / Chairman</td>-->
    </tr>
  </table>';
endforeach;
  $html .= '</body>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();
$pdf->Output('monthly_bill_'.$rds[0]['societyname'].'_'.$rds[0]['bill_date'].'.pdf', 'I');
?>