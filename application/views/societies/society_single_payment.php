<?php
defined('BASEPATH') or exit('No direct script access allowed');

if(!empty($this->session->flashdata('message'))){
  $message = $this->session->flashdata('message');
}else{
  $message["status"] ='';
  $message["text"] ='';
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
        <div class="breadcrumb-item">Payment</div>
      </div>
    </div>
    <div class="section-body">  
    <h2 class="section-title">Society Payments </h2>
      <div class="row">        
        <div class="col-sm-12 col-md-6 col-lg-12">         
          <div class="card border shadow-sm">
            <h4 class="txtfm">Receipts/Flat Collection</h4>
            <div class="card-header">              
              <button class="btn btn-icon btn-info br0 mr-3" id="add_single_payment">Add Single Payment</button>
            </div>
            <?php //echo form_open_multipart('payment/import_payments' . '/' . $society->id); ?>

            <form id="paymnet_import" enctype="multipart/form-data"  accept-charset="utf-8" >
              
              <div class="card-body">
            
                <div class="custom-file">
                  <p class="bNp"><label>Import Receipts</label>
                    <input type="file" name="payment_file" id="payment_file" required accept=".csv" />
                    <button class="btn btn-primary float-right" type="submit">Add Receipts</button>
                  </p>
                  <p>Only CSV format is allowed! <a
                      href="https://support.office.com/en-us/article/save-a-workbook-to-text-format-txt-or-csv-3e9a9d6c-70da-4255-aa28-fcacf1f081e6"
                      class="ml-2" target="_blank">Help ?</a></p>
                </div>
              </div>
            
            <?php //echo form_close(); ?>
            </form>
            <div class="card-footer">            
              <p>Download sample payment format file by clicking link below </p>
              <a href="<?php echo base_url(); ?>payment/exportCSV/<?php echo $society->id; ?>"class="btn btn-info">Download CSV</a>
             
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
  
    if (message == 'Success') {
      iziToast.success({
        title: message,
        message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text'] ?>',
        position: 'topRight'
      });
    } else if (message == 'Fail') {
      iziToast.error({
        title: message,
        message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text']  ?>',
        position: 'topRight'
      });
    }

    //bulk payment upload

    $("#paymnet_import").submit(function(event){
            event.preventDefault();           
            var form_data = new FormData();
            var payment_file = $("#payment_file").prop("files")[0];
            form_data.append("payment_file", payment_file);
            document.getElementById('popup1').style.display ='block';
            document.getElementById('loaderdiv').classList.add("divSHow"); 
            $.ajax({
                url: '<?php echo base_url("payment/import_payments/").$society->id; ?>',
                type:'POST',
                data:form_data,
                contentType: false,
                cache: false,
                processData: false,
                success:function(result){
                  if(result==1){                   
                    window.location.reload();
                  }
                  
                }

            });
    });
  });

  $(document).ready(function() {
    $(".cheque_div").hide();
    $(".cheque").prop('disabled', true);
    
    $(".bank_div").hide();
    $(".bank").prop('disabled', true);
    
    $(".depositer_div").hide();
    $(".depositer").prop('disabled', true);

  });

  $(document).on('change', '#payment_mod', function() {
        let payment_mod=$(this).val();

        if(payment_mod=="cheque"||payment_mod=="neft"||payment_mod=="upi"){
          
          $(".cheque_div").show();
          $(".cheque").prop('disabled', false);
        
          $(".bank_div").show();
          $(".bank").prop('disabled', false);
        
          $(".depositer_div").show();
          $(".depositer").prop('disabled', false);
        }else{
          $(".cheque_div").hide();
          $(".cheque").prop('disabled', true);
        
          $(".bank_div").hide();
          $(".bank").prop('disabled', true);
          
          $(".depositer_div").hide();
          $(".depositer").prop('disabled', true);
        }

  });




//changes in line number 640 -society id  sachhidnand 25-11-2021
// add single payment
let add_single_payment ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="number" name="amount1" id="amount1" class="form-control" required=""></div></div>';
add_single_payment +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="text" name="payment_dat" id="payment_dat" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';

add_single_payment +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Flat<span class="required">*</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="member_id" id="member_id"><option value="" selected>Select Flat</option><?php foreach ($members as $member) { ?><option value="<?php echo $member['id']; ?>"><?php if(!empty($member['wing'])) echo $member['wing'] . '-' . $member['flat_no'];else echo $member['flat_no']  ?></option><?php } ?></select></div></div>';

add_single_payment +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Mode<span class="required">*</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="payment_mod" id="payment_mod"><option value="">Select Payment Mode</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="neft">NEFT</option><option value="IMPS">IMPS</option><option value="upi">UPI</option><?php if($this->ion_auth->is_admin()){?><option value="Online">Online</option> <?php }?></select></div></div>';

add_single_payment +='<div class="form-group row mb-4 cheque_div"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reference No.<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="text" name="cheque" id="cheque" class="form-control cheque" required=""></div></div>';
add_single_payment +=`<div class="form-group row mb-4 bank_div"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bank<span class="required">*</span></label><div class="col-sm-12 col-md-7"><select class="form-control select bank" name="bank" id="bank"><option value="" selected>Select Bank</option><?php foreach ($banks as $bank) { ?> <option value = "<?php echo $bank['id']; ?>" > <?php echo $bank['bank_name']; ?></option><?php } ?></select></div></div > `;
add_single_payment +='<div class="form-group row mb-4 depositer_div"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Depositors Bank<span class="required">*</span></label><div class="col-sm-12 col-md-7"><input type="text" name="depositor_bank" id="depositor_bank" class="form-control depositer" required=""></div></div>';

add_single_payment +=`<div class="container text-center " id="loaderdiv_payment"><img src="<?php echo base_url(); ?>assets/img/Loading.gif" alt="" class="loader-img"> </div><div class="popup" id="popup_payment"></div>`;

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
      document.getElementById('popup_payment').style.display ='block';
      document.getElementById('loaderdiv_payment').classList.add("divSHow_payment"); 
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
          window.location.reload();          
        },
        error: function(data) {          
          window.location.reload();
          
        },
      });
      
    }
  }]
});
// add single payment
</script>