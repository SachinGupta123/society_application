<?php

defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

        <h1>Bill Heads</h1>

        <div class="section-header-breadcrumb">
          
          <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="<?php echo base_url();  ?>/billing_head/view_bill_head_master">View Billing Heads</a></div>
          <div class="breadcrumb-item"><?php if($this->uri->segment(2) == "add") echo "Add ";else echo "Edit " ;?> Bill Heads</div>

                

        </div>

    </div>

    <div class="section-body">

      <h2 class="section-title"><?php if($this->uri->segment(2) == "add") echo "Add ";else echo "Edit " ;?>Bill Head Master</h2>

      <div class="row">

        <div class="col-12">

          <div class="card">

            <?php $arr = array('bill_head_id' => $bill_head['bill_head_id']); ?>
            <?php echo form_open_multipart('billing_head/add_edit_bill_head', '', $arr); ?>

            <div class="card-header">

              <h4><?php if($this->uri->segment(2) == "add") echo "Add ";else echo "Edit " ;?>Bill Head Master</h4>

            </div>

            <div class="card-body">

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name <span class="required">*</span></label>

                <div class="col-sm-12 col-md-7">
                  <input type="text" name="billing_head_name" value="<?php if(isset($bill_head['bill_head_name']) && !empty($bill_head['bill_head_name'])) echo $bill_head['bill_head_name'] ?>" class="form-control" required>
                </div>

              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Group Name<span class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <div class="form-group row mb-4">
                    <div class="col-sm-12">
                      <select class="form-control select" name="billing_head_category_id" required="">
                        <option value="" selected>Select Bill Group</option>
                        <?php foreach($bill_head_category as $bill){ ?>
                          <option value="<?php echo $bill['bill_head_category_id'];?>" <?php if((isset($bill_head['ref_group_id'])) && $bill_head['ref_group_id']==$bill['bill_head_category_id']) echo "selected";?>>
                          <?php echo $bill['bill_head_category_name'];?></option>
                          <?php }?>
                      </select>
                    </div>
                  </div>

                </div>

              </div>

              
             

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                <div class="col-sm-12 col-md-7">

                  <button class="btn btn-primary">Save Changes</button>

                  <a class="btn btn-danger"
                    href="<?php echo base_url("bill_head_master"); ?>">Cancel Changes</a>

                    <!-- billing_head/view_bill_head_master -->

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