
<?php
defined('BASEPATH') or exit('No direct script access allowed');
$message = $this->session->flashdata('message');
$error_count = '';
if (isset($message['status']) && $message['status'] == "Fail") {
  $error_count = $this->session->flashdata('error_count');
}
$this->load->view('common/header_msoc');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> <?php echo society_name($this->uri->segment(3)) ?></h1>
      <div class="section-header-breadcrumb">
        <?php if ($this->ion_auth->is_admin()) : ?>
        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
        <?php endif; ?>
        <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner') : ?>
        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies">View Society</a></div>
        <?php endif; ?>
        <div class="breadcrumb-item">Society Dashboard</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title"> <?= $society->name; ?> </h2>
      <div class="row">
        <div class="col-12">

        </div>
      </div>
      <div class="row">
     
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <!-- add a tage for link to Payment list module -->
        <a href="<?php echo base_url("societies_report/payment_report/").$this->uri->segment(3)?>">
          <div class="card border card-statistic-1 p-2">
            <div class="card-icon bg-primary width40">
              <i class="fas fa-rupee-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header ptop8">
                <h4>Revenue</h4>
              </div>
              <div class="card-body">
                <?php echo round($total_revenue); ?>
              </div>
            </div>
          </div>
          </a>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <!-- add a tage for link to Outstanding list module -->
          <a href="<?php echo base_url("societies_report/outstanding_report/").$this->uri->segment(3)?>">
            <div class="card border card-statistic-1 p-2">
              <div class="card-icon bg-danger width40">
                <i class="far fa-newspaper"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header ptop8">
                  <h4>Outstanding</h4>
                </div>
                <div class="card-body">
                  <?php echo round($outstanding); ?>
                </div>
              </div>
            </div>
        </a>
        </div>
        <?php if($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
           <!-- add a tage for link to Service provider list module -->
          <a href="<?php echo base_url("service_providers/view/").$this->uri->segment(3)?>">
            <div class="card border card-statistic-1 p-2">
              <div class="card-icon bg-warning width40">
                <i class="fa fa-wrench text-white"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header ptop8">
                  <h4>Service Providers</h4>
                </div>
                <div class="card-body">
                  <?php echo $service_providers; ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php endif; ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
           <!-- add a tage for link to Flat list module -->
          <a href="<?php echo base_url("member/manage/").$this->uri->segment(3)?>">
            <div class="card border card-statistic-1 p-2">
              <div class="card-icon bg-success width40">
                <i class="far fa-building text-dark"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header ptop8">
                  <h4>Flats</h4>
                </div>
                <div class="card-body">
                  <?php echo $member_count; ?>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- <div class="row">
       
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card border">
            <div class="card-header">
              <h4>Payment RReceived</h4>
            </div>
            <div class="card-body">
              <canvas id="abc"></canvas>
            </div>
          </div>
        </div>
        <?php //if ($society->full_mode == 1 ) : ?>
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card border">
            <div class="card-header">
              <h4>Income/Expense</h4>
            </div>
            <div class="card-body">
              <canvas id="abcd"></canvas>
            </div>
          </div>
        </div>
        <?php //endif; ?>
     
      </div> -->

      <div class="row">       
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card border">
                <div class="card-header border">
                  <h4 style="font-size: 20px !important;">Payment Received</h4>
                  <!-- <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>                 -->
                </div>               
                <div class="card-body p-0">
                  <div class="container">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link btopradiuso active show p-0" id="Transaction-tab3" data-toggle="tab" href="#Transaction3" role="tab" aria-controls="Transaction" aria-selected="false">Online</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link p-0 btopradiuso" id="Cheque-tab3" data-toggle="tab" href="#Cheque3" role="tab" aria-controls="Cheque" aria-selected="false">Cheque</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link p-0 btopradiuso" id="Cash-tab3" data-toggle="tab" href="#Cash3" role="tab" aria-controls="Cash" aria-selected="true">Cash</a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content" id="myTabContent2" style="height: 275px;overflow: hidden;">
                    <div class="tab-pane fade active show" id="Transaction3" role="tabpanel" aria-labelledby="Transaction-tab3">
                        <div class="table-responsive table-invoice scrollTable02" >
                          <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                            <thead>
                              <tr>
                                <!-- <th>ID</th>
                                <th>Date</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Balance</th>
                                <th>Narration</th> -->
                                <th>Wing</th>
                                <th>Flat No.</th>
                                <th>Date</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(!empty($online_transaction)){ 
                                foreach($online_transaction as $value){
                                ?>
                              <tr>
                                <td><?php echo $value['wing']; ?></td>
                                <td><?php echo $value['flat_no']; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($value['payment_date'])); ?></td>
                                <td class="font-weight-600 text-right"><?php if(!empty($value['credit']))echo round($value['credit']) ?></td>
                                
                            
                              </tr>
                              <?php }}
                              else{ ?>
                              <tr>
                                <td colspan="4" class="text-center">No data found</td>
                              </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Cheque3" role="tabpanel" aria-labelledby="Cheque-tab3">
                        
                      <div class="table-responsive table-invoice scrollTable02" >
                        <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                          <thead>
                            <tr>
                              <!-- <th>ID</th>
                              <th>Date</th>
                              <th>Credit</th>
                              <th>Debit</th>
                              <th>Balance</th>
                              <th>Narration</th> -->

                              <th>Wing</th>
                              <th>Flat No.</th>
                              <th>Date</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($cheque_transaction)){ 
                              foreach($cheque_transaction as $value){
                                
                              ?>
                              <tr>
                                <!-- <td><a href="#"><?php //echo $value['id']; ?></a></td>
                                <td><?php //echo date("d-m-Y",strtotime($value['date'])); ?></td>
                                <td><?php //if(!empty($value['credit']))echo round($value['credit']) ?></td>
                                <td><?php //if(!empty($value['debit']))echo round($value['debit']) ?></td>
                                <td class="font-weight-600 text-right"><?php //echo round($value['balance']) ?></td>
                                <td><?php //echo $value['narration'] ?></td> -->

                                <td><?php echo $value['wing']; ?></td>
                                <td><?php echo $value['flat_no']; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($value['payment_date'])); ?></td>
                                <td class="font-weight-600 text-right"><?php if(!empty($value['credit']))echo round($value['credit']) ?></td>
                            
                              </tr>
                            <?php }}
                              else{ ?>
                              <tr >
                                  <td colspan="4" class="text-center">No data found</td>
                              </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>

                    </div>
                    <div class="tab-pane fade " id="Cash3" role="tabpanel" aria-labelledby="Cash-tab3">
                      
                      <div class="table-responsive table-invoice scrollTable02" >
                        <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                          <thead><tr>
                            <!-- <th>ID</th>
                            <th>Date</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Balance</th>
                            <th>Narration</th> -->
                            <th>Wing</th>
                              <th>Flat No.</th>
                              <th>Date</th>
                              <th>Amount</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($cash_transaction)){ 
                              foreach($cash_transaction as $value){
                              ?>
                            <tr>
                              <!-- <td><a href="#"><?php //echo $value['id']; ?></a></td>
                              <td><?php //echo date("d-m-Y",strtotime($value['date'])); ?></td>
                              <td><?php //if(!empty($value['credit']))echo round($value['credit']) ?></td>
                              <td><?php //if(!empty($value['debit']))echo round($value['debit']) ?></td>
                              <td class="font-weight-600 text-right"><?php //echo round($value['balance']) ?></td>
                              <td><?php //echo $value['narration'] ?></td> -->
                              <td><?php echo $value['wing']; ?></td>
                                <td><?php echo $value['flat_no']; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($value['payment_date'])); ?></td>
                                <td class="font-weight-600 text-right"><?php if(!empty($value['credit']))echo round($value['credit']) ?></td>

                          
                            </tr>
                            <?php }}
                            else{ ?>
                            <tr>
                              <td colspan="4" class="text-center">No data found</td>
                            </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>                  
                </div>
          </div>
        </div>
        <?php if ($society->full_mode == 1 ) : ?>
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card border">
              <div class="card-header border">
                    <h4 style="font-size: 20px !important;">Outstanding</h4>
                    <!-- <div class="card-header-action">
                      <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                    </div> -->
              </div>
              <div class="card-body p-0">
                  <div class="table-responsive table-invoice scrollTable02" >
                    <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                      <thead>
                          <tr>
                            <th>WING</th>
                            <th>FLAT</th>
                            <th>Name</th>                           
                            <th>Amount</th>
                            <th>Status</th>
                          </tr>
                          </thead>
                       
                         
                              <tbody>
                              <?php if(!empty($flat_outstanding)){
                            foreach($flat_outstanding as $value){  
                          ?>
                          <tr>
                          <td class="text-left"><?= $value['wing'] ?></td>
                              <td class="text-left"><?= $value['flat_no'] ?></td>
                              <td class="text-left"><?= $value['name'] ?></td>
                              
                              <td class="text-right font-weight-bold"><?= round($value['total_due']) ?></td>
                              <td class="text-left <?php if($value['bill_status'] == 'Unpaid') {echo 'badge badge-warning text-dark';} else{ echo 'badge  badge-success text-dark';}  ?> "><?= $value['bill_status'] ?></td>
                              <!-- print_r($value['bill_status']); exit(); -->
                          </tr>  
                          <?php } }else{?>
                            <tr>
                            <td colspan="6" class="text-center">No data found</td>
                            
                          </tr>
                          <?php }?>
                        </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card border">
              <div class="card-header border">
                <h4 style="font-size: 20px !important;">Expense</h4>
                <!-- <div class="card-header-action">
                  <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                </div> -->
              </div>
              <div class="card-body p-0">
              <div class="table-responsive table-invoice scrollTable02" >
                    <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                      <thead>
                        <tr>
                          <th style="width: 100px;">Date</th>
                          <th>Service Provider</th>
                          <th>Expense Category</th>
                          <th>Description</th>
                          <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($expenses)){
                          foreach ($expenses as $expense) { ?>
                            <tr>

                            
                              <td ><?= date("d-m-Y",strtotime($expense['date'])) ?></td>

                              <td ><?= $expense['payee'] ?></td>

                              <td ><?= $expense['expense_category_id'] ?></td>

                              <td ><?= $expense['description'] ?></td>

                              <td ><?= round($expense['amount']) ?></td>

                            </tr>
                            <?php } }else{?>
                              <tr>
                                <td colspan="5" class="text-center">Not data found</td>

                              </tr>
                            <?php }?>
                      
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>

          
        <?php endif; ?>

        
     
      </div>
    
    
         
          <?php //endif; ?>
        </div>
      </div>


    </div>
  </section>
</div>
<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
$(document).ready(function() {
  var message = '<?php if (isset($message['status']) && !empty($message['status'])) echo $message['status'] ?>';
  var error_count = '<?php echo $error_count ?>';
  if (message == 'Success') {
    iziToast.success({
      title: message,
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text'] ?>',
      position: 'topRight'
    });
  } else if (message == 'Fail') {
    iziToast.error({
      title: message,
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text'] . ' Total Errors: ' . $error_count ?>',
      position: 'topRight'
    });
  }
});



$(".remove").click(function() {
  var id = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this society!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../societies/delete/' + id,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
            console.log();
          },
          success: function() {
            swal("Poof! Your User has been deleted!", {
              icon: "success",
            });
            window.location.replace("../../societies");
          }
        });
      } else {
        swal("Your Society is safe!");
      }
    });
});

$(".delete").click(function() {
  var id = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover these members!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../societies/delete_members_by_society/' + id,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
          },
          success: function() {
            swal("Poof! Your User has been deleted!", {
              icon: "success",
            });
            window.location.replace("../../societies/details/" + id);
          }
        });
      } else {
        swal("Your Members are safe!");
      }
    });
});

$(".last_bill").click(function() {
  var id = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover these bills!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../societies/delete_last_bill/' + id,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
          },
          success: function() {
            swal("Poof! Bills have been deleted!", {
              icon: "success",
            });
            // window.location.replace("../../societies/details/" +id);
          }
        });
      } else {
        swal("Your Bills are safe!");
      }
    });
});

let modal_3_body =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Date</label><div class="col-sm-12 col-md-7"><input type="text" name="bill_date" id="bill_date" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';
modal_3_body +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Due Date</label><div class="col-sm-12 col-md-7"><input type="text" name="due_date" id="due_date" class="form-control datepicker" required=""></div></div>';
modal_3_body +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Summary</label><div class="col-sm-12 col-md-7"><textarea type="textarea" name="bill_summary" id="bill_summary" class="form-control summernote-lite" required=""></textarea></div></div>';
$("#generate_bill").fireModal({
  title: 'New Bill',
  body: modal_3_body,
  buttons: [{
    text: 'Generate Bill',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var bill_date = $('#bill_date').val();
      var due_date = $('#due_date').val();
      var bill_summary = $('#bill_summary').val();
      var society_id = $('#society_id').val(); /*alert(society_id);*/
      $.ajax({
        url: '../../bill_detail/generate_bill/' + society_id,
        type: 'POST',
        data: {
          'society_id': society_id,
          'bill_date': bill_date,
          'due_date': due_date,
          'bill_summary': bill_summary
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

let modal =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Month</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bill_month" id="bill_month"><option value="" selected>Select Month</option><?php foreach ($bill_months as $months) { ?><option value="<?php echo $months['bill_month']; ?>"><?php echo $months['bill_month']; ?></option><?php } ?></select></div></div>';
$("#bill_register").fireModal({
  title: 'Bill Register',
  body: modal,
  buttons: [{
    text: 'Go',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var bill_month = $('#bill_month').val();
      // var due_date = $('#due_date').val();
      // var bill_summary = $('#bill_summary').val();
      var society_id = $('#society_id').val();
      location.replace('<?= site_url() ?>societies/register/' + society_id + '/' + bill_month);
    }
  }]
});

let mod =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Month</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bill_month1" id="bill_month1"><option value="" selected>Select Month</option><?php foreach ($bill_months as $months) { ?><option value="<?php echo $months['bill_month']; ?>"><?php echo $months['bill_month']; ?></option><?php } ?></select></div></div>';
$("#collection_register").fireModal({
  title: 'Collection Register',
  body: mod,
  buttons: [{
    text: 'Go',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var bill_month1 = $('#bill_month1').val();
      var society_id = $('#society_id').val();
      location.replace('<?= site_url() ?>societies/collection/' + society_id + '/' + bill_month1);
    }
  }]
});

let body =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Notification Content</label><div class="col-sm-12 col-md-7"><textarea type="textarea" name="content" id="content" class="form-control" required=""></textarea><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';
body += '<div class="container" style="width:500px;">';
// body += '<h3 class="text-center">Insert Checkbox values using Ajax Jquery in PHP</h3>';
// <input type="checkbox" class="get_value2" value="push" />Push <br />
body +=
  '<div class="checkbox"><input type="checkbox" class="get_value" value="email" />Email <br /><input type="checkbox" class="get_value1" value="sms" />SMS <br /></div>';
body += '</div>';
$("#send_note").fireModal({
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
      // var member_id = $('#member_id').val();
      // alert('Hello, you clicked me!');
      $.ajax({
        url: '../../societies/note',
        type: 'POST',
        data: {
          'society_id': society_id,
          'content': content,
          email: email,
          push: push,
          sms: sms
        },
        //dataType: 'text',
        success: function(data) {
          // data = $.parseJSON(data);
          console.log('SUCCESS: ', data);
        },
        error: function(data) {
          // data = $.parseJSON(data);
          console.log('ERROR: ', data);
        },
      });
      window.location.reload();
    }
  }]
});

</script>