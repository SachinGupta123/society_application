<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$uplan_id = $this->uri->segment(4);
$usp_id = $this->uri->segment(5);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Utility Service Provider</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Utility Service Provider</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_billing_head/view/<?= $uplan_id ?>/<?= $usp_id ?>">Billing Heads</a></div>

              <div class="breadcrumb-item">Edit Billing Heads</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit Billing Heads</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $arr = array('up_billing_head_id'=>$up_billing_head['id']); ?>
                  <?php echo form_open_multipart('utility_billing_head/edit_utility_billing_head', '', $arr); ?>

                    <div class="card-header">

                      <h4>Edit Billing Heads</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_bill_head_name" id="utility_bill_head_name" value="<?=$up_billing_head['name'] ?>" class="form-control">
                           <input type="hidden" name="uplan_id" value="<?= $up_billing_head['utility_plan_id']?>">
                          <input type="hidden" name="usp_id" value="<?= $up_billing_head['utility_service_provider_id']?>">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Unit Value</label>

                        <div class="col-sm-12 col-md-7">

                          <input class="form-check-input" name="utility_unit_value" type="checkbox" id="defaultCheck2 utility_unit_value" value="1" <?php if($up_billing_head['is_unit_value'] == 1) { echo "checked='checked'"; }?> >

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_bill_head_amount" value="<?=$up_billing_head['amount'] ?>" id="utility_bill_head_amount" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary">Save Changes</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>utility_billing_head/view/<?= $uplan_id ?>/<?= $usp_id ?>">Cancel Changes</a>

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