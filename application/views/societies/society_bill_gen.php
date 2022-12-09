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
      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>
        <div class="section-header-breadcrumb">
            <?php if ($this->ion_auth->is_admin()) :?> 
            <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
            <?php endif;?>
            <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div> 
            <div class="breadcrumb-item"><a href="<?php echo base_url("societies/details/").$society->id; ?>">Society Dashboard</a></div>       
            <div class="breadcrumb-item">Society Bill</div>

        </div>
    </div>
    <div class="section-body">
     
    
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
        <h2 class="section-title">Bills</h2>
         
          <div class="card border shadow-sm">
         
            <div class="card-body text-left">
              <?php if ($society->full_mode == 1) : ?>
              <button class="btn btn-lg btn-primary " id="generate_bill"><i class="fas fa-file-invoice"></i> Generate
                Bills</button>
              <?php else : ?>
              <a class="btn btn-lg btn-primary "
                href="<?php echo base_url(); ?>bill_payment_mod/index/<?php echo $society->id; ?>"><i
                  class="fas fa-file-invoice"></i> Generate Bills</a>
              <?php endif; ?>
            
              <button class="btn btn-lg btn-primary " id="bill_register"><i class="fas fa-address-book"></i> Bill
                Register</button>
              <button class="btn btn-lg btn-primary " id="collection_register"><i class="fas fa-address-book"></i>
                Collection Register</button>
            </div>
            <?php if ($this->ion_auth->is_admin() || $this->session->userdata('role') == 'CA') : ?>
            <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
            <div class="p-3 ml-2">
              <button class="btn btn-lg btn-danger last_bill float-right" id="<?php echo $society->id; ?>"><i
                  class="fas fa-trash-alt"></i> Delete Last Bill</button>
            </div>
            <?php endif; ?>
            <?php endif; ?>
          </div>
        
          
        </div>
        
      </div>

      <div class="section-body">

<h2 class="section-title">View Monthly Bills</h2>

<div class="row">

  <div class="col-12">

    <div class="card p-2 shadow-sm">

      <div class="card-header">

        <h4>Monthly Bills List</h4>

      </div>

     

      <div class="card-body p-3 border">

        <div class="table-responsive">

          <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

            <thead>

              <tr>

                <th style="width: 200px;" class="text-left">Bill Month</th>

                <th class="text-left">Action</th>

                <?php if ($this->ion_auth->is_admin() ) : ?>
                <!-- <th class="text-left">Action</th> -->
                <!-- <th class="text-left">Action</th>
                <th class="text-left">Action</th>
                <th class="text-left">Action</th>
                -->
                <?php endif;?>
              </tr>

            </thead>

            <tbody>
              <?php foreach ($bill_month as $month) { ?>
              <tr>

                <td class="text-left"><?= date("d-m-Y",strtotime($month['bill_month'])); ?></td>
                <!-- set alligment  sachhidanand 06-10-2021-->
                <td class="text-left">
                  <div class="col-sm-3">
                  <select   class="form-control bill_type ">
                    <option value=''>Select bill format </option>
                    <option value='1'>bill format 1 </option>
                    <option value='2'>bill format 2</option>
                    <option value='3'>bill format 3</option>
                    <option value='4'>bill format 4 </option>
                    <option value='5'>bill format 5 </option>
                  </select>
                  </div>
                  
                  <input type="hidden" class="bill_data" data-society_id="<?php echo  $society->id ?>" data-bill_month="<?php echo $month['bill_month'] ?>" value="4" >
                  
                  <!-- <a href="<?php // echo base_url("societies/bill/"); ?><?php //echo  $society->id."/".$month['bill_month'] ?>" class="btn btn-primary mr-2">Download Bill</a> -->


                </td>

                <!-- <td>
                <a   class="btn btn-primary mr-2">Download Bill</a>
                </td> -->

                 

              </tr>
              <?php } ?>
            </tbody>

          </table>

        </div>


        <!-- img loader -->
       
        <!-- img loader -->



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
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text']?>',
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
            window.location.replace("../../societies/society_bill_generate/" +id);
          }
        });
      } else {
        swal("Your Bills are safe!");
      }
    });
});

let modal_3_body ='<div class="form-group row mb-3"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Date<span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="bill_date" id="bill_date" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';
modal_3_body +='<div class="form-group row mb-3"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Due Date<span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="due_date" id="due_date" class="form-control datepicker" required=""></div></div>';

modal_3_body +=`<div class="form-group row mb-3" ><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select bill Generate Type<span class="required"> *</span></label><div class="col-sm-12 col-md-7"><select class="form-control bill_generate_type"  name="bill_generate_type" ><option value="">Select Bill Generate Type</option><option value="upload_csv">Upload CSV</option><option value="manual">Manual</option> </select></div></div>`;

modal_3_body +=`<div class="form-group row mb-3 file_div" style="display:none;">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload<span class="required"> *</span></label>
    <div class="col-sm-12 col-md-7">
        <input type="file" class=" float-left" name="flat_type_file" id="flat_type_file" required accept=".xls, .xlsx" />
    </div>
</div>
    <div class="form-group row mb-3 download_div" style="display:none;">
        <label class="col-12 col-md-3 col-lg-3"></label>
        <div class="col-sm-12 col-md-7">
            <div class=""> 
                <div class="me-3">Download sample format file by clicking link below.</div>
                <a href="<?php echo base_url("assets/uploads/")."bill.csv"?>" class="btn btn-primary text-white downloadCSV">Download CSV</a>
            </div>
        </div>
    </div>`;

modal_3_body +='<div class="form-group row mb-3"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Summary<span class="required"></span></label><div class="col-sm-12 col-md-7"><textarea type="textarea" name="bill_summary" id="bill_summary" class="form-control summernote-lite" ></textarea></div></div>';

modal_3_body +=`<div class="container text-center " id="loaderdiv_bill"><img src="<?php echo base_url(); ?>assets/img/Loading.gif" alt="" class="loader-img"> </div><div class="popup" id="popup2"></div>`;


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
      var flat_type_file = $("#flat_type_file").prop("files")[0];
      var society_id = $('#society_id').val(); 
      var society_id = $('#society_id').val(); 
      var bill_generate_type = $('.bill_generate_type').val();      
      var form_data = new FormData();
      form_data.append("file", flat_type_file);
      form_data.append("bill_date", bill_date);
      form_data.append("bill_summary", bill_summary);
      form_data.append("due_date", due_date);
      form_data.append("society_id", society_id);
      form_data.append("bill_generate_type", bill_generate_type);
      // var flat_type_file = $('#flat_type_file').val();
      document.getElementById('popup2').style.display ='block';
      document.getElementById('loaderdiv_bill').classList.add("divSHow_bill"); 
      $.ajax({
        url: '../../bill_detail/generate_bill/' + society_id,
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        // type: 'POST',
        // data: {
        //   // 'society_id': society_id,
        //   // 'bill_date': bill_date,
        //   // 'due_date': due_date,
        //   // 'bill_summary': bill_summary,
        
        // },        
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

let modal ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Month</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bill_month" id="bill_month"><option value="" selected>Select Month</option><?php foreach ($bill_month as $months) { ?><option value="<?php echo $months['bill_month']; ?>"><?php echo date("d-m-Y",strtotime($months['bill_month'])); ?></option><?php } ?></select></div></div>';
$("#bill_register").fireModal({
  title: 'Bill Register',
  body: modal,
  buttons: [{
    text: 'Go',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var bill_month = $('#bill_month').val();
      var society_id = $('#society_id').val();
      if(bill_month=='')
        bill_month=0;    
       
        location.replace('<?= site_url() ?>societies/register/' + society_id + '/' + bill_month);
        
      
    }
  }]
});

let mod =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Month</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bill_month1" id="bill_month1"><option value="" selected>Select Month</option><?php foreach ($bill_month as $months) { ?><option value="<?php echo $months['bill_month']; ?>"><?php echo date("d-m-Y",strtotime($months['bill_month'])); ?></option><?php } ?></select></div></div>';
$("#collection_register").fireModal({
  title: 'Collection Register',
  body: mod,
  buttons: [{
    text: 'Go',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var bill_month1 = $('#bill_month1').val();
      var society_id = $('#society_id').val();
      if(bill_month1=='')
       bill_month1=0;
      location.replace('<?= site_url() ?>societies/collection/' + society_id + '/' + bill_month1);
    }
  }]
});

let body =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Notification Content</label><div class="col-sm-12 col-md-7"><textarea type="textarea" name="content" id="content" class="form-control" required=""></textarea><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';
body += '<div class="container" style="width:500px;">';

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

<script type="text/javascript">
  $(document).ready(function() {
    // due date grether than bill date
    $('#due_date').daterangepicker({
          minDate:moment($('#bill_date').val(), "DD-MM-YYYY").add(1, 'd'),
          singleDatePicker: true,
          autoUpdateInput: true,
          locale: {            
              format: 'DD-MM-YYYY'
          },
    });

    $('#bill_date').on('change', function() {      
        $('#due_date').daterangepicker({
          
              // alwaysShowCalendars: true,
              // showCustomRangeLabel: true,
              minDate:moment($('#bill_date').val(), "DD-MM-YYYY").add(1, 'd'),
              singleDatePicker: true,
              // showDropdowns:true,
              autoUpdateInput: true,
              locale: {
                  // cancelLabel: 'Clear',
                  format: 'DD-MM-YYYY'
              },
        });
    });

    $('.bill_type').on('change', function() { 
        bill_format= $(this).val();
        if(bill_format!=''){          
          var bill_month=$(this).closest("td").find("input").attr("data-bill_month");
          var society_id=$(this).closest("td").find("input").attr("data-society_id");
          $(this).val('');
          var url="<?php echo base_url("societies/bill/")?>"+society_id+"/"+bill_month+"/"+bill_format;         
          window.open(url, '_blank');//add condition new tab open for all bill show
        }    
        
    });
    // add condition for bill generate by csv input filed show-sachhidanand Gupta
    $('.bill_generate_type').on('change', function() { 
        bill_format= $(this).val();
        if(bill_format=='upload_csv'){          
          $(".file_div").show();
          $(".download_div").show();
        }else{
          $(".file_div").hide();
          $(".download_div").hide();
        }    
        
    });
   

   
  });
</script>