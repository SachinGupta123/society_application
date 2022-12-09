
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// echo "<pre>";print_r($user);die;
$this->load->view('common/header_msoc');
?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Users</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>users">Users</a></div>

              <div class="breadcrumb-item">Edit User</div>

            </div>

          </div>



          <div class="section-body">

            <h2 class="section-title">Edit User</h2>

            <div class="row">

              <div class="col-12">
                <div id="infoMessage"><?php echo $message;?></div>
                <div class="card">


                  <?php echo form_open(current_url());?>

                    <div class="card-header">

                      <h4>Edit User</h4>

                    </div>

                    <div class="card-body">
                    	<div id="infoMessage"><?php echo $message;?></div>
                      <div class="form-group row mb-4">

                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                          <?php echo lang('edit_group_name_label', 'group_name');?>
                        </div>

                        <div class="col-sm-12 col-md-7">

                          <?php echo form_input($group_name);?>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                          <?php echo lang('edit_group_desc_label', 'description');?>
                        </div>

                        <div class="col-sm-12 col-md-7">

                          <?php echo form_input($group_description);?>

                        </div>

                      </div>
                     
                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <?php echo form_submit('submit', lang('edit_group_submit_btn'), "class='btn btn-primary'");?>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>users">Cancel Changes</a>

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