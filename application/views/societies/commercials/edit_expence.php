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

              <div class="breadcrumb-item">Expense Payment</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Expense Payment</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open_multipart('expense/edit_expense/'.$society_id."/".$expense_details["id"]); ?>
                  <input type="hidden" name="society_id" value="<?= $society_id?>">
                  <input type="hidden" name="expense_id" value="<?= $expense_details["id"] ?>">
                  <input type="hidden" name="expense_category_id" value="<?= $expense_details["expense_category_id"] ?>">
                    <div class="card-header">
                      <h4>Expense Payment</h4>
                    </div>

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

                        <input type="number" class="form-control" name="expense_amount"  required="" pattern="^[0-9\.]*$"   value="<?php echo $expense_details["amount"]?>" required>

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




</script>