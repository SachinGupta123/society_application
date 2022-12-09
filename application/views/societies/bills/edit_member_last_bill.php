<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$member_id = $this->uri->segment(4);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url("member/view/").$society_id."/".$member_id;?>">Flat Details</a></div>

              <div class="breadcrumb-item">Edit Flat Bill</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit Flat Bill</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                 
                  <?php echo form_open('member/edit_last_member_bill_update'); ?>

                    <div class="card-header">

                      <h4>Edit Flat Bill</h4>

                    </div>

                    <div class="card-body">
                      <input type="hidden" name="society_id" value="<?php echo $last_bill[0]['society_id']?>">
                      <input type="hidden" name="member_id" value="<?php echo $last_bill[0]['member_id']?>">
                      <input type="hidden" name="bill_id" value="<?php  echo $last_bill[0]['id']?>">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wing</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text"  value="<?= $member_details[0]->wing ?>" class="form-control" disabled>
                         
                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat No.</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text"  value="<?= $member_details[0]->flat_no?>" class="form-control" disabled>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" value="<?= $member_details[0]->name ?>" class="form-control" disabled>

                        </div>

                      </div>

                      <?php  foreach(unserialize($last_bill[0]['details']) as $x => $val) { 
                            if($x!="sub_total") {
                      ?>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= $x?></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="number" name="<?= str_replace(' ', '_', trim($x))?>" value="<?= $val ?>" class="form-control" required >

                        </div>

                      </div>

                     <?php }}?>
                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save Changes</button>

                          <a class="btn btn-danger" href="<?php echo base_url("member/view/").$society_id."/".$member_id;?>">Cancel Changes</a>

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