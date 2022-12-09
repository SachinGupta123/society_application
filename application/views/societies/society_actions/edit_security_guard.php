<?php

defined('BASEPATH') or exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1>Societies</h1>

      <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url();   ?>societies/details/<?=$local_guard['society_id']    ?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url();   ?>societies/view_security_guard/<?=$local_guard['society_id']  ?>">Security Guard</a></div>

              <div class="breadcrumb-item">Add Security Guard</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Add Security Guard</h2>

      <div class="row">

        <div class="col-12">

          <div class="card">

            <?php echo form_open_multipart('societies/update_security_guard/' . $local_guard['security_guard_id'] . '/' . $local_guard['society_id']); ?>

            <div class="card-header">

              <h4>Add Security Guard</h4>

            </div>

            <div class="card-body">

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">First Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="first_name" value="<?= $local_guard['first_name'] ?>" class="form-control">
                  <input type="hidden" name="vendor_id" value="<?= $local_guard['society_id'] ?>">
                  <input type="hidden" name="id" value="<?= $local_guard['guard_id'] ?>">
                  <input type="hidden" name="security_guard_id" value="<?= $local_guard['security_guard_id'] ?>">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Last Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="last_name" value="<?= $local_guard['last_name'] ?>" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="security_email" value="<?= $security_guard['email'] ?>" class="form-control">
                </div>
              </div>

              <!-- <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="username" class="form-control" value="<?= $security_guard['username'] ?>" required>
                        </div>
                      </div> -->

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="phone" value="<?= $security_guard['mobile'] ?>" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="password" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary" type="submit">Save</button>
                  <a class="btn btn-danger"
                    href="<?php echo base_url(); ?>societies/view_security_guard/<?= $society_id ?>">Cancel Changes</a>
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