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
              <?php if ($this->ion_auth->is_admin()) :?> 
              <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
              <?php endif;?>
              <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div> 

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

                  <?php echo form_open_multipart('expense/add_expense_bill'); ?>
                  <input type="hidden" name="society_id" value="<?= $society_id?>">
                    <div class="card-header">

                      <h4>Add Expense</h4>

                    </div>

                    <div class="card-body"> 
                      <div class="form-group row mb-4 spu">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Provider<span class="required"> *</span></label>
                       
                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" id="service_provider" name="service_provider_id" required>
                            <option value="" >Select Service Provider</option>
                            <?php foreach($all_service_providers as $service){ ?>
                            <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                            <?php } ?>
                          </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expense Category<span class="required"> *</span></label>

                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select"  id="expense_category_id" disabled  >
                            <option value=''>Select Expense Category</option>
                            <?php foreach($all_expense_categories as $categories){ ?>
                            <option value="<?= $categories['name'] ?>"><?= $categories['name'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" class="form-control" id="expense_category_id_input" name="expense_category_id">

                        </div>
                      </div>                     

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Date<span class="required"> *</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" class="form-control datepicker datepicker1"  name="expense_date" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount<span class="required"> *</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="number" class="form-control" name="expense_amount"  required="" pattern="^[0-9\.]*$">

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
$(function() {
    $('#service_provider').change(function() {
       
    });
});




$('#service_provider').on('change', function() {

  var provider=this.value ;

  $.ajax({
        
        url: '<?php echo base_url("expense/get_service_provider"); ?>',
        type: 'POST',
        data: {
          'provider': provider,
         
        }, 
        dataType:"Json",      
        success: function(data) {
          $("#expense_category_id").val(data.sp_type);
          $("#expense_category_id_input").val(data.sp_type);
          
        },
       
      });

});





</script>