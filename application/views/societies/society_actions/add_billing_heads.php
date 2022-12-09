<?php

defined('BASEPATH') or exit('No direct script access allowed');
$flat_type_id = $this->uri->segment(4);
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
          <div class="breadcrumb-item"><a href="<?php echo base_url("societies/details/").$society_id; ?>">Society Dashboard</a></div>    

        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>flat_types/view/<?= $society_id ?>">Flat Category</a></div>

        <div class="breadcrumb-item"><a href="<?php echo base_url();  ?>billing_head/view/<?= $society_id ?>/<?=$flat_type_id ?>">Billing Heads</a></div>

        <div class="breadcrumb-item">Add Billing Heads</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Add Billing Heads</h2>

      <div class="row">

        <div class="col-12">

          <div class="card">

            <?php echo form_open_multipart('billing_head/add_billing_head'); ?>

            <div class="card-header">

              <h4>Add Billing Heads</h4>

            </div>

            <div class="card-body">

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>

                <div class="col-sm-12 col-md-7">

                  <!-- <input type="text" name="billing_head_name" class="form-control" required=""> -->

                  <div class="form-group row mb-4">
                    <div class="col-sm-12">
                      <select class="form-control select" name="billing_head_name" required="">
                        <option value="" selected>Select Bill</option>
                        <?php foreach($bill_head_details as $bill){ ?>
                          <option value="<?php echo $bill['bill_head_name']; ?>">
                          <?php echo $bill['bill_head_name']; ?></option>
                          <?php }?>
                      </select>
                    </div>
                  </div>

                  <input type="hidden" name="flat_type_id" value="<?= $flat_type_id ?>">
                  <input type="hidden" name="society_id" value="<?= $society_id ?>">
                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Unit Value</label>

                <div class="col-sm-12 col-md-7">
                  <input class="form-check-input  ml-1" name="is_unit_value" type="checkbox" value="1" id="defaultCheck2">

                </div>

              </div>
              <!-- add for gst apply - 23/11/2022 sachhidanand -->
              <!-- <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">GST Applicable</label>

                <div class="col-sm-12 col-md-7">
                  <input class="form-check-input  ml-1" name="gst_applicable" type="checkbox" value="1" id="gst_applicable">

                </div>

              </div> -->

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount<span class="required">*</span></label>

                <div class="col-sm-12 col-md-7">

                  <input type="text" id="bill_head_amount" name="bill_head_amount" class="form-control" required="">
                  
                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                <div class="col-sm-12 col-md-7">

                  <button class="btn btn-primary">Save</button>

                  <a class="btn btn-danger"
                    href="<?php echo base_url(); ?>billing_head/view/<?= $society_id ?>/<?= $flat_type_id ?>">Cancel
                    Changes</a>

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
  $("#bill_head_amount").ForceNumericOnly();
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