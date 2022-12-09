<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// print_r($expense_category);die;
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>City</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>cityState/view_city">City</a></div>

              <div class="breadcrumb-item">Edit City</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit City</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $arr = array('city'=>$city['id']); ?>
                  <?php echo form_open('cityState/edit_city/'.$city['id'], '', $arr); ?>

                    <div class="card-header">

                      <h4>Edit City</h4>

                    </div>

                    <div class="card-body">

                    <div class="card-body">
                          <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name<span class="required">*</span></label>
                              <div class="col-sm-12 col-md-7">
                                  <input type="text" name="city_name" id="city_name" value="<?=$city['city_name']?>" class="form-control">
                              </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State<span class="required">*</span></label>
                            <div class="col-sm-12 col-md-7">
                              <select class="form-control select" name="state" id="state">
                                <?php foreach($states as $state){ ?>
                                  <?php if($city['state_id'] == $state['id']) {?>
                                    <option value="<?= $state['id'] ?>" selected><?= $state['name'] ?></option>
                                  <?php } ?>
                                  <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary">Update City</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>cityState/view_city">Cancel Changes</a>

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