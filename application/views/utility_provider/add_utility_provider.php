<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_msoc');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Utility Service Providers</h1>
            <div class="section-header-breadcrumb">
               <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_service_provider">Utility Service Provider</a></div>

              <div class="breadcrumb-item">Add Utility Service Providers</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add Utility Service Providers</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open('utilityProvider/add_utility_provider'); ?>

                    <div class="card-header">

                      <h4>Add Service Providers</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Business Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_business_name" id="utility_business_name" class="form-control" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_address" id="utility_address" class="form-control" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">License Number</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_license_number" id="utility_license_number" class="form-control" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Owner Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_owner_name" id="utility_owner_name" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_email" id="utility_email" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provider Type</label>

                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" name="utility_provider_type" id="utility_provider_type">

                          <option value="abc">abc</option>

                          <option value="bcd">bcd</option>

                          <option value="def">def</option>

                        </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone Number</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_phone_number" id="utility_phone_number" class="form-control" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Tax Unit</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_service_tax_unit" id="utility_service_tax_unit" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button type="submit" class="btn btn-primary">Save New Provider</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>utility_service_provider">Cancel Changes</a>

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