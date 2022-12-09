<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$usp_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Utility Service Provider</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_service_provider">Utility Service Provider</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Utility Service Provider Dashboard</a></div>

              <div class="breadcrumb-item">Add New Member</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add New Member</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open_multipart('utility_provider_member/add_member'); ?>

                    <div class="card-header">

                      <h4>Add New Member</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wing</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_member_wing" id="utility_member_wing" class="form-control">
                          <input type="hidden" name="usp_id" value="<?= $usp_id?>">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat No.</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_member_flat" id="utility_member_flat" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_member_name" id="utility_member_name" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_member_phone" id="utility_member_phone" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_member_email" id="utility_member_email" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Outstanding</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_member_outstanding" id="utility_member_outstanding" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Society Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="society_name" id="society_name" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Society Reg No.</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="society_reg" id="society_reg" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Society Address</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="society_address" id="society_address" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save Member</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Cancel</a>

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