<?php

defined('BASEPATH') or exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

      <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id  ?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>parking_charges/view/<?=$society_id ?>">Parking Charges</a></div>

              <div class="breadcrumb-item">Add Parking Charges</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Add Parking Charges</h2>

      <div class="row">

        <div class="col-12">

          <div class="card">

            <?php echo form_open_multipart('parking_charge/add_parking_charges'); ?>

            <div class="card-header">

              <h4>Add Parking Charges</h4>

            </div>

            <div class="card-body">

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Member Two Wheeler Charge <span class="text-danger">*</span></label>

                <div class="col-sm-12 col-md-7">

                  <input type="number" name="member_two_wheeler" class="form-control" required>
                  <input type="hidden" name="society_id" value="<?= $society_id ?>">

                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Member Four Wheeler Charge <span class="text-danger">*</span></label>

                <div class="col-sm-12 col-md-7">

                  <input type="number" name="member_four_wheeler" class="form-control" required>

                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tenant Two Wheeler Charge <span class="text-danger">*</span></label>

                <div class="col-sm-12 col-md-7">

                  <input type="number" name="tenant_two_wheeler" class="form-control" required>

                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tenant Four Wheeler Charge <span class="text-danger">*</span></label>

                <div class="col-sm-12 col-md-7">

                  <input type="number" name="tenant_four_wheeler" class="form-control" required>

                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                <div class="col-sm-12 col-md-7">

                  <button class="btn btn-primary" type="submit">Save</button>

                  <a class="btn btn-danger"
                    href="<?php echo base_url(); ?>parking_charges/view/<?= $society_id ?>">Cancel Changes</a>

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