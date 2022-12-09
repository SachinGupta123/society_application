<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$usp_id = $this->uri->segment(4);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Utility Service Provider</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Utility Service Provider Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_plan/plans/<?= $usp_id ?>">Utility Plans</a></div>

              <div class="breadcrumb-item">Edit Utility Plans</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit Utility Plans</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $arr = array('utility_plan_id'=>$utility_plan['id']); ?>
                  <?php echo form_open_multipart('utility_plan/edit_plan', '', $arr); ?>

                    <div class="card-header">

                      <h4>Edit Utility Plans</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="utility_plan_name" id="utility_plan_name" value="<?= $utility_plan['plan_name'] ?>" class="form-control">
                          <input type="hidden" name="usp_id" value="<?= $utility_plan['utility_service_provider_id'] ?>">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save Changes</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>utility_plan/plans/<?= $usp_id ?>">Cancel Changes</a>

                        </div>

                      </div>

                    </div>

                  </form>

                </div>

              </div>

            </div>

          </div>

        </section>

      </div>

<?php $this->load->view('common/footer'); ?>