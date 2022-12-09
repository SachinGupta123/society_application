<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$user_id = $this->uri->segment(3);
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

              <div class="breadcrumb-item">Assign Societies</div>

            </div>

          </div>



          <div class="section-body">

            <h2 class="section-title">Assign Societies</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open_multipart('users/assign_societies'); ?>

                    <div class="card-header">

                      <h4>Assign Society</h4>

                    </div>

                      <div class="card-body">                      

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Society Name</label>
                        <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" name="society_id" id="society" required="">

                          <option value="">Select Society</option>
                          <?php foreach($all_societies as $society) { ?>
                          <option value="<?= $society['id']?>"><?php echo $society['name']?></option>
                          <?php } ?>
                        </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save User</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>users">Cancel Changes</a>

                        </div>

                      </div>

                    </div>
                    <?php echo form_close(); ?>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </section>

      </div>

<?php $this->load->view('common/footer'); ?>