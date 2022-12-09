<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

            <div class="section-header-breadcrumb">
              <?php if ($this->ion_auth->is_admin()) :?> 
              <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
              <?php endif;?>
              <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div>            

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>member/manage/<?=$society_id?>">Manage Flats</a></div>

              <div class="breadcrumb-item">Edit Flat</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit Flat</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $arr = array('member_id'=>$member['id']); ?>
                  <?php echo form_open('member/edit_member', '', $arr); ?>

                    <div class="card-header">

                      <h4>Edit Flat</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wing</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="member_wing" value="<?= $member['wing'] ?>" class="form-control">
                          <input type="hidden" name="society_id" value="<?php echo $society_id?>">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat No.<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="member_flat_no" value="<?= $member['flat_no'] ?>" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="member_name" value="<?= $member['name'] ?>" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tenant</label>

                        <div class="col-sm-12 col-md-7">
                        <label class="custom-switch mt-2">
                        <input type="checkbox" name="tenant" value="1" <?php if($member['tenant'] == 1) { echo "checked='checked'"; }?> class="custom-switch-input" id="defaultCheck2">
                        <span class="custom-switch-indicator"></span>
                        
                      </label>

                          <!-- <input class="form-check-input" name="tenant" value="1" type="checkbox" value="" id="defaultCheck2"> -->

                        </div>

                        <!-- <div class="col-sm-12 col-md-7">

                          <input class="form-check-input" type="checkbox" id="defaultCheck2" name="tenant" value="1" <?php // if($member['tenant'] == 1) { echo "checked='checked'"; }?> >

                        </div> -->

                      </div>

                     

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat Area<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="member_flat_area" value="<?= $member['flat_area'] ?>" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Principal Arrears</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="principal_arrears" value="<?= $member['principal_arrears'] ?>" class="form-control" readonly>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest Arrears</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="interest_arrears" value="<?= $member['interest_arrears'] ?>" class="form-control" readonly>

                        </div>

                      </div>

                      <!-- <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text"name="member_email" value="<?= $member['email_id'] ?>" class="form-control" required>

                        </div>

                      </div> -->

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Of Two Wheelers<span class="required">*</span> </label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="member_two_wheeler" value="<?= $member['two_wheelers'] ?>" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Of Four Wheelers<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="member_four_wheeler" value="<?= $member['four_wheelers'] ?>" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat Type</label>

                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" name="member_flat_type">

                          <?php foreach($all_flat_types as $flat_type) {?>
                            <?php if ($member['flat_type_id'] == $flat_type['id']) { ?>
                              <option value="<?php echo $flat_type['id']?>" selected style="display: none"><?php echo $flat_type['name'] ?></option>
                            <?php } else {?>
                              <option value="" style="display: none;">Select Flat Type</option>
                            <?php } ?>
                              <option value="<?= $flat_type['id'] ?>"><?= $flat_type['name'] ?></option>
                          <?php } ?>

                        </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save Changes</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>member/manage/<?=$society_id?>">Cancel Changes</a>

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