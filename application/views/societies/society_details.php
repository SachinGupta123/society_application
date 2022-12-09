<?php
defined('BASEPATH') or exit('No direct script access allowed');

$message = $this->session->flashdata('message');
$error_count = '';
if (isset($message['status']) && $message['status'] == "Fail") {
  $error_count = $this->session->flashdata('error_count');
}
$this->load->view('common/header_msoc');
// echo "<pre>"; print_r($_SESSION); exit();
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>
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
      <h2 class="section-title"><?= $society->name; ?> Society </h2>
      <div class="row">
        <div class="col-12">

        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
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
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
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
        </div>
        <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border card-statistic-1 p-2">
            <div class="card-icon bg-warning width40">
              <i class="fas fa-file"></i>
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
        </div>
        <?php endif; ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border card-statistic-1 p-2">
            <div class="card-icon bg-success width40">
              <i class="fas fa-users"></i>
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
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-12"> -->
        <div class="col-sm-12 col-md-12 col-lg-6 ">
          <div class="card border">
            <div class="card-header">
              <h4>Payment</h4>
            </div>
            <div class="card-body">
              <canvas id="abc"></canvas>
            </div>
          </div>
        </div>
        <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
        <div class="col-sm-12 col-md-12 col-lg-6 ">
          <div class="card border">
            <div class="card-header">
              <h4>Income/Expense</h4>
            </div>
            <div class="card-body">
              <canvas id="abcd"></canvas>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- </div> -->
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

var ctxD = document.getElementById("abc").getContext('2d');
var myChartD = new Chart(ctxD, {
  type: 'doughnut',
  data: {
    datasets: [{
      data: [
        <?php echo $outstanding ?>,
        <?php echo $total_revenue; ?>,
      ],
      backgroundColor: [
        '#6777ef',
        '#ffa426',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Outstanding',
      'Recived',
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});
<?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
var ctxB = document.getElementById("abcd").getContext('2d');
var myChartB = new Chart(ctxB, {
  type: 'line',
  data: {
    // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    labels: JSON.parse('<?php echo json_encode($month); ?>'),
    datasets: [{
        label: 'Income',
        data: JSON.parse('<?php echo json_encode($income); ?>'),
        // data: [460, 458, 330, 502, 430, 610, 488],
        borderWidth: 2,
        backgroundColor: 'transparent',
        borderColor: '#6777ef',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      },
      {
        label: 'Expense',
        // data: [260, 258, 230, 402, 230, 310, 288],
        data: JSON.parse('<?php echo json_encode($expense); ?>'),
        borderWidth: 2,
        backgroundColor: 'transparent',
        borderColor: '#505578',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }
    ]
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
    
  }
});
<?php endif; ?>
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
          // data = $.parseJSON(data);
          // console.log('SUCCESS: ', data);
        },
        error: function(data) {
          window.location.reload();
          // data = $.parseJSON(data);
          // console.log('ERROR: ', data);
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
//changes in line number 640 -society id  sachhidnand 25-11-2021
// add single payment
let add_single_payment =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label><div class="col-sm-12 col-md-7"><input type="text" name="amount1" id="amount1" class="form-control" required=""></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date</label><div class="col-sm-12 col-md-7"><input type="text" name="payment_dat" id="payment_dat" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Mode</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="payment_mod" id="payment_mod"><option value="" selected>Select Payment Mode</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="Online">Online</option><option value="neft">NEFT</option></select></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Cheque No.</label><div class="col-sm-12 col-md-7"><input type="text" name="cheque" id="cheque" class="form-control" required=""></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bank</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bank" id="bank"><option value="" selected>Select Bank</option><?php foreach ($banks as $bank) { ?> <option value = "<?php echo $bank['id']; ?>" > <?php echo $bank['bank_name']; ?></option><?php } ?></select></div></div > ';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Depositors Bank</label><div class="col-sm-12 col-md-7"><input type="text" name="depositor_bank" id="depositor_bank" class="form-control" required=""></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Flat</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="member_id" id="member_id"><option value="" selected>Select Flat</option><?php foreach ($members as $member) { ?><option value="<?php echo $member['id']; ?>"><?php echo $member['flat_no'] . '-' . $member['wing']; ?></option><?php } ?></select></div></div>';
$("#add_single_payment").fireModal({
  title: 'Add Single Payment',
  body: add_single_payment,
  buttons: [{
    text: 'Add Single Payment',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_dat = $('#payment_dat').val();
      var payment_mod = $('#payment_mod').val();
      var amount = $('#amount1').val();
      var cheque = $('#cheque').val();
      var bank = $('#bank').val();
      var depositor_bank = $('#depositor_bank').val();
      var society_id = $('#society_id').val();
      var member_id = $('#member_id').val();
      // alert('Hello, you clicked me!');
      $.ajax({
        url: '../../payment/create',
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
// add single payment
</script>