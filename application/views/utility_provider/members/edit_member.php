<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_msoc');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Utility Service Provider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Utility Service Provider</a></div>
              <div class="breadcrumb-item"><a href="#">Members</a></div>
              <div class="breadcrumb-item">Edit Member</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Edit New Member</h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <form>
                    <div class="card-header">
                      <h4>Edit New Member</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wing</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat No.</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Outstanding</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Society Name</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Society Reg No.</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Society Address</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary">Save Changes</button>
                          <button class="btn btn-danger">Cancel</button>
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