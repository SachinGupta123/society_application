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

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>service_providers/view/<?=$society_id?>">Service Provider</a></div>

              <div class="breadcrumb-item">Edit Service Provider</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit Service Provider</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $arr = array('sp_id'=>$service_provider['id']); ?>
                  <?php echo form_open_multipart('service_provider/edit_service_provider', '', $arr); ?>

                    <div class="card-header">

                      <h4>Add Service Provider</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="service_provider_name" value="<?= $service_provider['name']?>" class="form-control" required>
                          <input type="hidden" name="society_id" value="<?= $society_id?>">


                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="service_provider_address" value="<?= $service_provider['address']?>" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact No. <span class="text-danger">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="service_provider_phone" id="service_provider_phone" pattern="[0-9]{10}" value="<?= $service_provider['contact_no']?>" class="form-control" maxlength="10"  required  oninvalid="this.setCustomValidity('Only 10 digit allowed')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="service_provider_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?= $service_provider['email']?>" class="form-control" >

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SP Type <span class="text-danger">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" name="service_provider_type" required>

                          <option value="">Select Service Provider Type</option>
                            <?php foreach($expense_categories as $val){?>
                              <option value="<?php echo $val["name"]?>" <?php if($service_provider['sp_type']==$val["name"]) echo "selected"?>><?php echo $val["name"]?></option>
                            <?php }?>
                            
                          </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>service_providers/view/<?=$society_id?>">Cancel Changes</a>

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

<script type="text/javascript">

$(document).ready(function() {
  $("#service_provider_phone").ForceNumericOnly();
});
  // Numeric only control handler
jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};

</script>