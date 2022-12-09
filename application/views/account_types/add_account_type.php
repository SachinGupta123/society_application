<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Account Type</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>expense_categories">Account Type</a></div>

              <div class="breadcrumb-item">Add Account Type</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add Account Type</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open_multipart('accountType/add_account_type'); ?>

                    <div class="card-header">

                      <h4>Add Account Type</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Account Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="account_type" id="account_type" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>account_type">Cancel Changes</a>

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