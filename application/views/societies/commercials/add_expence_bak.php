<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Societies</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>expense/view/<?=$society_id?>">Expense</a></div>

              <div class="breadcrumb-item">Add Expense</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add Expense</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open_multipart('expense/add_expense'); ?>
                  <input type="hidden" name="society_id" value="<?= $society_id?>">
                    <div class="card-header">

                      <h4>Add Expense</h4>

                    </div>

                    <div class="card-body">

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Service Provider</label>
                        <div class="col-sm-12 col-md-7">
                          <input class="form-check-input check" name="select_sp" id="select_sp" type="checkbox" value="1" id="defaultCheck2" checked>
                          <span data-toggle="tooltip" title="If you want to select existing Service Provider let the checkbox remained cecked, else uncheck the checkbox to enter a name of Payee."><a href="#" style="text-decoration: underline;">Help ?</a></span>
                        </div>
                      </div>
                      <div class="form-group row mb-4 payee">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payee</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="pay_to">
                        </div>
                      </div>

                      <div class="form-group row mb-4 spu">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Provider</label>
                        <input type="hidden" name="payee" id="payee" value="">
                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" id="service_provider" name="service_provider_id">
                            <option value="" selected="">Select Service Provider</option>
                            <?php foreach($all_service_providers as $service){ ?>
                            <option value="<?= $service['name'] ?>"><?= $service['name'] ?></option>
                            <?php } ?>
                          </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expense Category</label>

                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" name="expense_category_id" required="">
                            <option selected="">Select Expense Category</option>
                            <?php foreach($all_expense_categories as $categories){ ?>
                            <option value="<?= $categories['name'] ?>"><?= $categories['name'] ?></option>
                            <?php } ?>
                        </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bank</label>

                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" name="bank_id">
                           <option selected="">Select Bank</option>
                            <?php foreach($all_banks as $bank){ ?>
                            <option value="<?= $bank['id'] ?>"><?= $bank['bank_name'] ?></option>
                            <?php } ?>
                        </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" class="form-control datepicker" name="expense_date">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" class="form-control" name="expense_amount"  required="" pattern="^[0-9\.]*$">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>

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
$(function() {
    $('#service_provider').change(function() {
        // if changed to, for example, the last option, then
        // $(this).find('option:selected').text() == D
        // $(this).val() == 4
        // get whatever value you want into a variable
        var x = $(this).val();
        // and update the hidden input's value
        $('#payee').val(x);
    });
});

$(document).ready(function() {
  $('.payee').hide();
});

$(".check").change(function()
{
    if(this.checked)
    {
        $('.spu').show();
        $('.payee').hide();
    }
    else
    {
      $('.spu').hide();
      $('.payee').show();
    }
});
</script>