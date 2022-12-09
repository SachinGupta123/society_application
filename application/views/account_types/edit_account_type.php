<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// print_r($expense_category);die;
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Expense Categories</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>expense_categories">Expense Categories</a></div>

              <div class="breadcrumb-item">Edit Expense Categories</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit Expense Categories</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $arr = array('account_type'=>$account_type['id']); ?>
                  <?php echo form_open('expenceCategories/edit_expense_categories', '', $arr); ?>

                    <div class="card-header">

                      <h4>Edit Expense Categories</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Account Name</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="account_name" id="account_name" value="<?=$account_type['account_name']?>" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary">Update Account Type</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>account_type">Cancel Changes</a>

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