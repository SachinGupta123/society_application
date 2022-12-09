<?php

defined('BASEPATH') or exit('No direct script access allowed');
$member_id = $this->uri->segment(4);
$society_id = $this->uri->segment(3);

//sachhidanand -25-11-2021
if (!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else {
  $message['status'] = '';
  $message['text'] = '';
}
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

      <div class="section-header-breadcrumb">
        <?php if ($this->ion_auth->is_admin()) :?> 
        <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
        <?php endif;?>
        <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div>            
        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id ?>">Society Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>member/manage/<?=$society_id ?>">Manage Flats</a></div>
      
        <div class="breadcrumb-item">Flat Details</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Flat Details</h2>

      <div class="row">

        <div class="col-12">

          <div class="card shadow-sm p-2">

            <div class="card-header">

              <h4>Flat</h4>

            </div>

            <div class="card-body p-2 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                  <thead>

                    <tr>

                      <th class="text-left">Wing</th>

                      <th class="text-left">Flat No.</th>

                      <!-- <th class="text-left">Name</th>

                      <th class="text-left">Mobile</th> -->

                      <th class="text-left">Flat Area</th>

                      <th class="text-left">Current Principal Arrears</th>

                      <th class="text-left">Current Interest Arrears</th>

                      <!-- <th class="text-left">Email</th> -->

                      <th class="text-left">Two Wheelers</th>

                      <th class="text-left">Four Wheelers</th>

                    </tr>

                  </thead>

                  <tbody>

                    <?php $owner = $this->Member_model->get_flat_owner($member_id); ?>
                    <tr>

                      <td class="text-left"><?= $member->wing; ?></td>

                      <td class="text-left"><?= $member->flat_no; ?></td>

                      <!-- <td class="align-middle"><?php // if(!empty($owner)) echo $owner['first_name'] . ' ' . $owner['last_name']; ?></td> -->

                      <!-- <td class="text-left"><?php //if(!empty($owner)) echo $owner['phone']; ?></td> -->

                      <td class="text-left"><?= $member->flat_area; ?></td>

                      <td class="text-left"><?= round($this->Member_model->get_member_current_arrears($member_id)); ?></td>

                      <td class="align-middle">
                        <?= round($this->Member_model->get_member_current_intrest_arrears($member_id)); ?></td>

                      <!-- <td class="text-left"><?php //if(!empty($owner)) echo $owner['email']; ?></td> -->

                      <td class="text-left"><?= $member->two_wheelers; ?></td>

                      <td class="text-left"><?= $member->four_wheelers; ?></td>

                    </tr>

                  </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="row">
        <?php if ($member_balance > 0) : ?>
        <h4 class="section-title">Total Advance: <?php echo round($member_balance) ?></h4>
        <?php else : ?>
        <h4 class="section-title">Total Outstanding: <?php echo round(-$member_balance) ?></h4>
        <?php endif; ?>

        <div class="card-body">        
          <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'committee_member' || $this->session->userdata('role') == 'CA') : ?>
          <?php if ($society['full_mode'] == 1 || $this->ion_auth->is_admin()) : ?>
          <button class="btn btn-primary" id="debit_note">Debit Note</button>

          <button class="btn btn-primary" id="credit_note">Credit Note</button>
          <?php endif; ?>
          <?php endif; ?>

          <button class="btn btn-primary" id="pay_bill">Pay Bills</button>

          <?php if ($this->session->userdata('role') == 'operator' || $this->session->userdata('role') == 'committee_member' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' ||$this->session->userdata('role') == 'CA') : ?>
          <?php if ($society['full_mode'] == 1 || $this->ion_auth->is_admin() ||$this->session->userdata('role') == 'CA') : ?>
          <button class="btn btn-primary" id="notification">Send Notification</button>
          <?php endif; ?>
          <?php endif; ?>

          <a href="<?php echo base_url(); ?>member/ledger/<?= $society_id ?>/<?= $member_id ?>"
            class="btn btn-primary mr-5">Ledger</a>

          <?php if ($this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' ||$this->session->userdata('role') == 'CA') :?>
          

          <div class="float-right">
            <?php    
              if(!empty($previous_member_details)){?>
              <a href="<?php echo base_url("member/view/"); ?><?= $society_id ?>/<?= $previous_member_details["id"] ?>"class="btn btn-info">Previous Flat</a>
            <?php }?>
            <?php  
            if(!empty($next_member_details)){?>
            <a href="<?php echo base_url("member/view/"); ?><?= $society_id ?>/<?= $next_member_details["id"] ?>"class="btn btn-info">Next Flat</a>
          <?php }?>
          </div>

         
         
          <?php
            endif;
          ?>
        </div>

      </div>
      
      <br>

      <div class="row">

        <div class="col-12">

          <div class="card shadow-sm p-2">

            <div class="card-header">

              <h4>Bill Details</h4>

            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table">

                  <thead>

                    <tr>

                      <th class="text-left">Bill No.</th>

                      <th class="text-left">Bill Date</th>

                      <th class="text-left">Due Date</th>

                      <th class="text-left">Bill Details</th>

                      <th class="text-right">Bill Amount</th>

                      <th class="text-right">Interest Amount</th>

                      <th class="text-left">Status</th>
                      <th class="text-left">Action</th>
                    </tr>

                  </thead>

                  <tbody>
                    <?php $row = 1; ?>
                    <?php foreach($bill_details as $detail) { ?>
                    <tr>

                      <td class="text-left"><?= $row ?></td>

                      <td class="text-left"><?= date("d-m-Y",strtotime($detail['bill_date'])); ?></td>

                      <td class="text-left"><?= date("d-m-Y",strtotime($detail['due_date'])); ?></td>
                      <?php $bd =  unserialize($detail['details']); ?>
                      <td class="text-left">
                        <?php foreach ($bd as $b => $a) {
                            if ($b != 'sub_total') {
                              $a=round($a);
                              echo "{$b} = {$a} <br>";
                            }
                            
                          }
                          echo "<br>";
                          echo "Bill Amount = ";
                          echo round($detail['bill_amount']);
                          echo "<br>";
                          echo "Current Interest = ";
                          echo round($detail['interest']);
                          echo "<br>";
                          echo "Late Payment Interest = ";
                          echo round($detail['late_payment_charges']);
                          echo "<br>";
                          if ($detail['principal_arrears'] < 0)
                          {
                            echo "Advance Balance = ";
                          }
                          else{
                            echo "Principal Arrears = ";
                          }
                          
                          echo abs($detail['principal_arrears']);
                          echo "<br>";
                          echo "Interest Arrears = ";
                          echo round($detail['interest_arrears']);
                          echo "<br>";
                          if(($society["is_gst"]==1 || $society["is_gst"]=="1") && $detail['tax_amount']>0){
                            echo "GST = ";
                            echo round($detail['tax_amount']);
                            echo "<br>";
                          }
                          echo "Total Due = ";
                          echo round($detail['total_due']);
                          ?>
                      </td>

                      <td class="text-right font-weight-bold"><?= round($detail['bill_amount']); ?></td>

                      <td class="text-right"><?= round($detail['interest_arrears']); ?></td>

                      <td class="text-center"><?= $detail['bill_status']; ?></td>
                      <td class="text-center">
                        <?php if(($detail['id']==$last_bill[0]['id']) && ($detail['bill_status']=="Unpaid") &&( $this->ion_auth->is_admin()|| $this->session->userdata('role') == 'CA')){ 
                            
                          ?>
                            <a  href="<?php echo base_url("member/edit_last_member_bill/").$detail['society_id']."/".$detail['member_id']."/".$detail['id'] ?>" class="bg-primary p-2 text-white " > <i class="fas fa-pen fa-fw"></i></a>
                        <?php 
                           }?>

                          <?php if(($detail['id']==$last_bill[0]['id']) && ($detail['bill_status']=="Paid")  && $this->ion_auth->is_admin()) {?>
                              <a  href="<?php echo base_url("member/edit_last_member_bill/").$detail['society_id']."/".$detail['member_id']."/".$detail['id'] ?>" class="bg-primary p-2 text-white " > <i class="fas fa-pen fa-fw"></i></a>
                          <?php }?>
                                 
                       
                      </td>
                    </tr>
                    <?php $row++;
                    } ?>
                  </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <div class="card shadow-sm p-2">

            <div class="card-header">

              <h4>Payments Recieved</h4>

            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table1">

                  <thead>
                    <tr>

                      <th class="text-left">Payment Date</th>

                      <th class="text-left">Narration</th>

                      <th class="text-left mtWid">Amount</th>

                      <th class="text-left">Paid By</th>

                      <th class="text-left">Reference No.</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($payments as $payment) { ?>
                    <tr>

                      <td class="text-left"><?= date('d-m-Y', strtotime($payment['payment_date'])); ?></td>

                      <td class="text-left"><?= $payment['narration']; ?></td>

                      <td class="text-right font-weight-bold "><?= round($payment['credit'] ? $payment['credit'] : $payment['debit']) ?></td>

                      <td class="text-left"><?= $payment['paid_by']; ?></td>

                      <td class="text-left"><?= $payment['cheque_no']; ?></td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

</div>

<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
$(document).ready(function() {
  var message = '<?php echo $message['status']; ?>';
  if (message == 'Success') {
    iziToast.success({
      title: message,
      message: '<?php echo $message['text'] ?>',
      position: 'topRight'
    });
  } else if (message == 'Fail') {
    iziToast.error({
      title: message,
      message: '<?php echo $message['text'] ?>',
      position: 'topRight'
    });
  }
});

$(document).on('change', '#payment_mod', function() {
      let payment_mod=$(this).val();
      if(payment_mod=="cash"){
        
        $(".cheque_div").hide();
        $(".cheque").prop('disabled', true);
       
        $(".bank_div").hide();
        $(".bank").prop('disabled', true);
        
        $(".depositer_div").hide();
        $(".depositer").prop('disabled', true);
      }else{
       
        $(".cheque_div").show();
        $(".cheque").prop('disabled', false);
      
        $(".bank_div").show();
        $(".bank").prop('disabled', false);
       
        $(".depositer_div").show();
        $(".depositer").prop('disabled', false);
      }
});

$("#table").dataTable({
  "columnDefs": [{
    "sortable": false,
    "targets": [2, 3]
  }]
});

$("#table1").dataTable({
  "ordering": false
  // order: [[0, 'DESC']],
  // "sortable": false,
  // "columnDefs": [{
  //   // "sortable": false,
  //   // "targets": [2, 3]
  // }]
});

let modal_3_body ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="number" name="amount" id="amount" class="form-control" required=""></div></div>';

modal_3_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Date<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="text" name="payment_date" id="payment_date" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society_id; ?>"><input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id; ?>"></div></div>';
modal_3_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Head<span class="required">*</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bill_head_name" id="bill_head_name"><option value="">Select Bill</option><?php foreach ($bill_head_list as $bill_head) { ?> <option value = "<?php echo $bill_head['name']; ?>"> <?php echo $bill_head['name']; ?> </option><?php } ?></select ></div></div>';

modal_3_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="text" name="description" id="description" class="form-control" required=""></div></div>';
$("#debit_note").fireModal({
  title: 'Issue Debit Note',
  body: modal_3_body,
  buttons: [{
    text: 'Debit Note',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_date = $('#payment_date').val();
      var amount = $('#amount').val();
      var description = $('#description').val();
      // var bill = $('#bill').val();
      var society_id = $('#society_id').val();
      var bill_head_name = $('#bill_head_name').val();
      var member_id = $('#member_id').val();
      $.ajax({
        // url: '../../../member/debit_note',
        url: '<?php echo base_url(); ?>member/debit_note', //sachhidanand-25-11-2021
        type: 'POST',
        data: {
          'society_id': society_id,
          'payment_date': payment_date,
          'amount': amount,
          'description': description,
          // 'bill': bill,
          'bill_head_name': bill_head_name,
          'member_id': member_id
        },
        //dataType: 'text',
        success: function(data) {
           location.reload();
          // setInterval('location.reload()', 5000);
        },
        error: function(data) {
           location.reload();
        },
      });

      // $(document).ajaxStop(function() {
      //   $("#table1").ajax.reload();
      // });
     
      // window.location.replace("../../../member/view/" +member_id+"/"+society_id);
    }
  }]
});

let modal_body ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="number" name="amoun" id="amoun" class="form-control" required=""></div></div>';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Date<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="text" name="payment_da" id="payment_da" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society_id; ?>"><input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id; ?>"></div></div>';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Head<span class="required">*</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="credit_bill_head" id="credit_bill_head"><option value="">Select Bill</option><?php foreach ($bill_head_list as $bill_head) { ?> <option value = "<?php echo $bill_head['name']; ?>"> <?php echo $bill_head['name']; ?> </option><?php } ?></select ></div></div>';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="text" name="descriptio" id="descriptio" class="form-control" required=""></div></div>';
$("#credit_note").fireModal({
  title: 'Issue Credit Note',
  body: modal_body,
  buttons: [{
    text: 'Credit Note',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_da = $('#payment_da').val();
      var amoun = $('#amoun').val();
      var descriptio = $('#descriptio').val();
      var bill_head_name = $('#credit_bill_head').val();
      var society_id = $('#society_id').val();
      var member_id = $('#member_id').val();
      $.ajax({
        // url: '../../../member/credit_note',
        url: '<?php echo base_url(); ?>member/credit_note', //sachhidanand-25-11-2021
        type: 'POST',
        data: {
          'society_id': society_id,
          'payment_da': payment_da,
          'amoun': amoun,
          'descriptio': descriptio,
          'bill_head_name': bill_head_name,
          'member_id': member_id
        },
        //dataType: 'text',
        success: function(data) {
          location.reload(true);
        },
        error: function(data) {
          location.reload(true);
        },
      });
      // location.reload(true);
      // window.location.replace("../../../member/view/" +member_id+"/"+society_id);
    }
  }]
});
// <option value="Online">Online</option>
let modal ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="number" name="amount1" id="amount1" class="form-control" required=""></div></div>';
modal +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="text" name="payment_dat" id="payment_dat" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society_id; ?>"><input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id; ?>"></div></div>';
modal +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Mode<span class="required">*</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="payment_mod" id="payment_mod"><option value="" selected>Select Payment Mode</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="neft">NEFT</option></select></div></div>';
modal +='<div class="form-group row mb-4 cheque_div"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Cheque No.</label><div class="col-sm-12 col-md-7"><input type="text" name="cheque" id="cheque" class="form-control cheque" required=""></div></div>';
modal +=`<div class="form-group row mb-4 bank_div"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bank</label><div class="col-sm-12 col-md-7"><select class="form-control select bank_pay" name="bank"><option value="" >Select Bank</option><?php foreach ($banks as $bank) { ?> <option value = "<?php echo $bank['id']; ?>"> <?php echo $bank['bank_name']; ?> </option><?php } ?></select > </div></div >` ;
modal +='<div class="form-group row mb-4 depositer_div"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Depositors Bank</label><div class="col-sm-12 col-md-7 "><input type="text" name="depositor_bank" id="depositor_bank" class="form-control depositer" required=""></div></div>';
$("#pay_bill").fireModal({
  title: 'Pay Bill',
  body: modal,
  buttons: [{
    text: 'Pay Bill',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_dat = $('#payment_dat').val();
      var payment_mod = $('#payment_mod').val();
      var amount = $('#amount1').val();
      var cheque = $('#cheque').val();
      var bank = $('.bank_pay').val();
      
      var depositor_bank = $('#depositor_bank').val();
      var society_id = $('#society_id').val();
      var member_id = $('#member_id').val();
     
      $.ajax({
        // url: '../../../payment/create',//sachhidanand discuss with zaid
        url: '<?php echo base_url(); ?>payment/create',
        type: 'POST',
        data: {
          'society_id': society_id,
          'payment_dat': payment_dat,
          'payment_mod': payment_mod,
          'amount1': amount,
          'bank': bank,
          'cheque': cheque,
          'depositor_bank': depositor_bank,
          'member_id': member_id
        },
        //dataType: 'text',
        success: function(data) {
          location.reload(true);
          // data = $.parseJSON(data);
          // console.log('SUCCESS: ', data);
        },
        error: function(data) {
          location.reload(true);
          // data = $.parseJSON(data);
          // console.log('ERROR: ', data);
        },
      });
      
      // window.location.replace("../../../member/view/" +member_id+"/"+society_id);
    }
  }]
});

let body1 =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label><div class="col-sm-12 col-md-7"><input type="text" name="amou" id="amou" class="form-control" required=""></div></div>';
body1 +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date</label><div class="col-sm-12 col-md-7"><input type="text" name="payment_date" id="payment_date" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society_id; ?>"><input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id; ?>"></div></div>';
body1 +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Mode</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="payment_mode" id="payment_mode"><option value="" selected>Select Payment Mode</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="neft">NEFT</option></select></div></div>';
body1 +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Cheque No.</label><div class="col-sm-12 col-md-7"><input type="text" name="cheque_no" id="cheque_no" class="form-control" required=""></div></div>';
body1 +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bank</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bank_id" id="bank_id"><option value="" selected>Select Bank</option><?php foreach ($banks as $bank) { ?><option value="<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']; ?></option><?php } ?></select></div></div>';
body1 +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Depositors Bank</label><div class="col-sm-12 col-md-7"><input type="text" name="depositor_bank" id="depositor_bank" class="form-control" required=""></div></div>';
$("#pay_arrear").fireModal({
  title: 'Pay Arrears',
  body: body1,
  buttons: [{
    text: 'Pay Arrears',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_date = $('#payment_date').val();
      var payment_mode = $('#payment_mode').val();
      var amou = $('#amou').val();
      var cheque_no = $('#cheque_no').val();
      var bank_id = $('#bank_id').val();
      var depositor_bank = $('#depositor_bank').val();
      var society_id = $('#society_id').val();
      var member_id = $('#member_id').val();
      $.ajax({
        // url: '../../../payment/arrear',
        url: '<?php echo base_url(); ?>payment/arrear', //sachhidnand 25-11-2021
        type: 'POST',
        data: {
          'society_id': society_id,
          'payment_date': payment_date,
          'payment_mode': payment_mode,
          'amou': amou,
          'bank_id': bank_id,
          'cheque_no': cheque_no,
          'depositor_bank': depositor_bank,
          'member_id': member_id
        },
        //dataType: 'text',
        success: function(data) {
          data = $.parseJSON(data);
          console.log('SUCCESS: ', data);
        },
        error: function(data) {
          data = $.parseJSON(data);
          console.log('ERROR: ', data);
        },
      });
      window.location.reload();
    }
  }]
});

let body =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Notification Content<span class="text-danger">*<span></label><div class="col-sm-12 col-md-7"><textarea type="textarea" name="content" id="content" class="form-control" required=""></textarea><input type="hidden" name="society_id" id="society_id" value="<?php echo $society_id; ?>"><input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id; ?>"></div></div>';
// body += '<div class="container" style="width:500px;">';

// body +='<div class="checkbox"><input type="checkbox" class="get_value" value="email" />Email <br /><input type="checkbox" class="get_value1" value="sms" />SMS <br /></div>';
// body += '</div>';
body += `<div class="form-group row" style="margin-left: 120px;"><div class="form-check form-check-inline"><input type="checkbox" class="get_value form-check-input" value="email"> <label class="form-check-label" for="inlineCheckbox1">Email</label> </div><div class="form-check form-check-inline"><input type="checkbox" class="get_value1 form-check-input" value="sms"> <label class="form-check-label" for="inlineCheckbox1">SMS</label> </div></div>`;
$("#notification").fireModal({
  title: 'Send Notification',
  body: body,
  buttons: [{
    text: 'Send Notification',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var email = [];
      $('.get_value').each(function() {
        if ($(this).is(":checked")) {
          email.push($(this).val());
        }
      });
      email = email.toString();
      var sms = [];
      $('.get_value1').each(function() {
        if ($(this).is(":checked")) {
          sms.push($(this).val());
        }
      });
      sms = sms.toString();
      var push = [];
      $('.get_value2').each(function() {
        if ($(this).is(":checked")) {
          push.push($(this).val());
        }
      });
      push = push.toString();
      var content = $('#content').val();
      var society_id = $('#society_id').val();
      var member_id = $('#member_id').val();

      $.ajax({
        // url: '../../../member/notification',
        url: '<?php echo base_url(); ?>member/notification', //sachhidnand 25-11-2021
        type: 'POST',
        data: {
          'society_id': society_id,
          'content': content,
          'member_id': member_id,
          email: email,
          push: push,
          sms: sms
        },        
        success: function(data) {
          window.location.reload();        
        },
        error: function(data) {
          window.location.reload();
         
        },
      });     
      
    }
  }]
});
</script>

