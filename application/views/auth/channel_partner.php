<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/_partials/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-8 col-sm-8 offset-sm-2">
              <div class="login-brand">
                <img src="<?php echo base_url(); ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
              </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Channel Partner Signup</h4></div>

              <div class="card-body">
                <!-- <?php if($success != NULL):?><div class="alert <?= ($success==1 & $success)?'alert-success':'alert-danger'; ?>"><?php echo $message;?></div><?php endif; ?> -->
                <?php echo form_open("auth/channel_partner");?>
                  <!-- <div class="card-header"> -->
                    <!-- <h4>Add Flat Types</h4> -->
                  <!-- </div> -->
                    <div class="card-body">
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="name" class="form-control" required="">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="email" class="form-control" required="">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="phone" class="form-control" required="">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="society_address" class="form-control" required="">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">City</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="city" class="form-control" required="">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="state" class="form-control" required="">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pincode</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="pincode" class="form-control" required="">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Of Units</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="units" class="form-control" required="">
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">When Can You Connect?</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control select" name="connect_time" id="connect_time">
                            <option>Select Interval</option>
                            <option value="Immediately">Immediately</option>
                            <option value="0-3 Months">0-3 Months</option>
                            <option value="3-6 Months">3-6 Months</option>
                            <option value="6-9 Months">6-9 Months</option>
                            <option value="More than 9 Months">More than 9 Months</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                      </div>

                    </div>
                <?= form_close() ?>
              </div>
            </div>
            <!-- <div class="mt-5 text-muted text-center">
              Not Enrolled Yet? <a href="<?php echo base_url(); ?>auth/enroll">Enroll Your Society</a>
            </div> -->
            <!-- <div class="simple-footer">
              Copyright &copy; PAYNET 2019
            </div> -->
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('common/_partials/js'); ?>