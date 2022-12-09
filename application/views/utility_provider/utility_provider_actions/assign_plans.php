<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$usp_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Utility Service Providers</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_service_provider">Utility Service Provider</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Utility Service Provider Dashboard</a></div>

              <div class="breadcrumb-item">View Plan Types</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">View Plan Types</h2>

            <div class="row">

              <div class="col-12">
                <?php echo form_open_multipart('utility_provider_member/assign_plan'); ?>
                  <input type="hidden" name="usp_id" value="<?= $usp_id?>">
                <div class="card">

                  <div class="card-header">

                    <h4>Plan Types</h4>

                  </div>

                  <!-- <div class="col-2">

                    <a href="<?php echo base_url(); ?>societies/add_flat_types" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Flat Types</a>

                  </div> -->

                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">

                        <thead>                                 

                          <tr>

                            <th class="text-center">Wing</th>

                            <th class="text-center">Flat No.</th>

                            <th class="text-center">Name</th>

                            <th class="text-center">Plan Type</th>

                          </tr>

                        </thead>

                        <tbody>                                 
                          <?php $i = 0 ?>
                          <?php foreach ($member_data as $member) { ?>
                          <tr>

                            <td class="text-center"><?= $member['wing'] ?></td>

                            <td class="text-center"><?= $member['flat_no'] ?></td>

                            <td class="text-center"><?= $member['name'] ?></td>

                            <td class="text-center">
                              <input type="hidden" name="post_data[<?= $i ?>][utility_member_id]" value="<?= $member['id'] ?>">
                              <select class="form-control select" name="post_data[<?= $i ?>][plan_name]" id="utility_plan_type">

                                <?php foreach($utility_plans as $plans) {?>
                                  <?php if($member['utility_plan_id'] == $plans['id']) { ?>
                                  <option value="<?php echo $plans['id']?>" selected style="display: none">
                                    <?php echo $plans['plan_name']?>
                                  </option>
                                  <?php } else { ?>
                                    <option value="" style="display: none;" selected>Select Plan Type</option>
                                    <?php } ?>
                                  <option value="<?= $plans['id'] ?>"><?= $plans['plan_name'] ?></option>
                                <?php }?>
                            </td>

                          </tr>
                          <?php ++$i; } ?>
                        </tbody>

                      </table>

                    </div>

                  </div>

                  <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary">Save</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Cancel Changes</a>

                        </div>

                      </div>

                </div>
                <?php echo form_close(); ?>
              </div>

            </div>

          </div>

        </section>

      </div>

<?php $this->load->view('common/footer'); ?>