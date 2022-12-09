<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>expense/view/<?=$society_id?>">Expense</a></div>

              <div class="breadcrumb-item">Expense Payment</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Expense Payment</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open_multipart('expense/expense_payment'); ?>
                    <input type="hidden" name="society_id" value="<?= $society_id?>">
                    <input type="hidden" name="expense_id" value="<?= $expense_details["id"] ?>">
                    <div class="card-header"> <h4>Expense Payment</h4> </div>

                    <div class="card-body"> 

                      <div class="form-group row mb-4 spu">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Provider<span class="required"> *</span></label>
                        
                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" id="service_provider" name="service_provider_id" required disabled>
                            <option value="" >Select Service Provider</option>
                            <?php foreach($all_service_providers as $service){ ?>
                            <option value="<?= $service['id'] ?>" <?php if($service['id']==$expense_details["service_provider_id"]) echo "Selected" ;?>><?= $service['name'] ?></option>
                            <?php } ?>
                          </select>

                        </div>

                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expense Category<span class="required"> *</span></label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control select" name="expense_category_id" id="expense_category_id" disabled>
                            <option value=''>Select Expense Category</option>
                            <?php foreach($all_expense_categories as $categories){ ?>
                            <option value="<?= $categories['name'] ?>" <?php if($categories['name']==$expense_details["expense_category_id"]) echo "Selected" ;?>><?= $categories['name'] ?></option>
                            <?php } ?>
                          </select>

                        </div>

                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Date<span class="required"> *</span></label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control datepicker" name="expense_date" value="<?php echo date("d-m-Y",strtotime($expense_details["date"]))?>" disabled>
                        </div>

                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount<span class="required"> *</span></label>
                        <div class="col-sm-12 col-md-7">
                          <input type="number" class="form-control" name="expense_amount"  required="" pattern="^[0-9\.]*$" disabled  value="<?php echo $expense_details["amount"]?>">
                        </div>
                      </div>
                      <div class="form-group row mb-4 spu">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Mode<span class="required"> *</span></label>                        
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control select" id="payment_mode" name="payment_mode" required >
                            <option value="" >Select Mode</option>
                            <option value="cash" >Cash</option>
                            <option value="bank" >Bank</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row mb-4 bank_div d-none" >
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bank<span class="required"> *</span></label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control select bank" name="bank_id" required="" >
                           <option value=''>Select Bank</option>
                            <?php foreach($all_banks as $bank){ ?>
                            <option value="<?= $bank['id'] ?>"><?= $bank['bank_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div> 
                      
                      <div class="form-group row mb-4 cheque_no_div d-none" >
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cheque No./NEFT<span class="required"> *</span></label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control cheque_no" name="cheque_no"  required=""  disabled>
                        </div>
                      </div> 

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Date<span class="required"> *</span></label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="payment_date" id="bill_date" class="form-control datepicker" required="">
                        </div>
                      </div>                  

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description<span class="required"> *</span></label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="expense_description" required="">                         
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary" type="submit">Save</button>
                          <a class="btn btn-danger" href="<?php echo base_url(); ?>expense/view/<?=$society_id?>">Cancel</a>
                        </div>
                      </div>
                    </div>

                  <?php echo form_close(); ?>

                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?php $this->load->view('common/footer'); ?>
<script type='text/javascript'>

$('.bank_div').addClass("d-none");
$(".bank").prop('disabled', true);
$('.cheque_no_div').addClass("d-none");
$(".cheque_no").prop('disabled', true);

$('#payment_mode').on('change', function() {   
    let mode=this.value;
    if(mode=="bank"){      
      $('.bank_div').removeClass("d-none");   
      $(".bank").prop('disabled', false);
      $('.cheque_no_div').removeClass("d-none");   
      $(".cheque_no").prop('disabled', false);

    }else{
      $('.bank_div').addClass("d-none");
      $(".bank").prop('disabled', true);

      $('.cheque_no_div').addClass("d-none");
      $(".cheque_no").prop('disabled', true);
    }
});

// $(".check").change(function()
// {
//     if(this.checked)
//     {
//         $('.spu').show();
//         $('.payee').hide();
//     }
//     else
//     {
//       $('.spu').hide();
//       $('.payee').show();
//     }
// });
</script>