<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// print_r($expense_category);die;
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Services Categories</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>expense_categories">Services Categories</a></div>

              <div class="breadcrumb-item">Edit Services Categories</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit Services Categories</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $arr = array('services_category_id'=>$services_category['id']); ?>
                  <?php echo form_open('Services/edit_services_categories', '', $arr); ?>

                    <div class="card-header">

                      <h4>Edit Services Categories</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="services_category_name" id="services_category_name" value="<?=$services_category['service_name']?>" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary">Update Services Categories</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>services-categories">Cancel Changes</a>

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