<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id ?>">Society Dashboard</a></div>

              <div class="breadcrumb-item">View Reports</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Reports</h2>

      <div class="row">

        <div class="col-12">

          <div class="card border">

            <div class="card-header">

              <h4>Reports</h4>

            </div>

            <div class="card-body pt-0">

              <div class="colors">
                <?php if ($society['full_mode'] == 1/* || $this->ion_auth->is_admin()*/) : ?>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url('societies_report/bank_reconciliation/').$society_id; ?>">
                    <div>Bank Book</div>
                  </a>
                </div>
                <?php endif; ?>
                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/all_member_list/<?= $society_id ?>">
                    <div>Flat Ledger</div>
                  </a>
                </div>
                <?php if ($society['full_mode'] == 1/* || $this->ion_auth->is_admin()*/) : ?>
                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/expenses/<?= $society_id ?>">
                    <div>Bank Expenses</div>
                  </a>
                </div>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/cash/<?= $society_id ?>">
                    <div>Cash Book</div>
                  </a>
                </div>
                <?php endif; ?>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/outstanding_report/<?= $society_id ?>">
                    <div>Outstanding</div>
                  </a>
                </div>
                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/payment_report/<?= $society_id ?>">
                    <div>Income/Collection</div>
                  </a>
                </div>
                <div class="">
                <!-- color bg-info text-white -->
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/member_balance_report/<?= $society_id ?>">
                    <div>Flat Balance</div>
                  </a>
                </div>

                <!-- <div class="color bg-info text-white">
                        <a class="href" href="<?php echo base_url(); ?>societies/income_report/<?= $society_id ?>">
                          <div>Income Report</div>
                        </a>
                      </div> -->

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <?php if ($society['full_mode'] == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
    <div class="section-body">

      <h2 class="section-title">Compliance</h2>

      <div class="row">

        <div class="col-12">

          <div class="card border">

            <div class="card-header">

              <h4>Compliance</h4>

            </div>

            <!-- <div class="card-body">

                    <?php //echo form_open_multipart('societies/upload_document'); ?>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Document Name</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="document_name" class="form-control" id="document_name">
                          <input type="hidden" name="society_id" value="<?//= $society_id ?>" class="form-control" id="society_id">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Document</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="file" name="image" class="file-input" id="customFile">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary" type="submit">Save Changes</button>
                          <a class="btn btn-danger" href="<?php //echo base_url(); ?>societies">Cancel Changes</a>
                        </div>
                      </div>
                    <?php //echo form_close(); ?>

                  </div> -->

            <div class="card-body pt-0">

              <div class="colors">

                <div class="">
                <!-- color bg-primary text-white -->
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/i_register/<?= $society_id ?>">
                    <div>I Register</div>
                  </a>
                </div>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/j_register/<?= $society_id ?>">
                    <div>J Register</div>
                  </a>
                </div>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/share_register/<?= $society_id ?>">
                    <div>Share Certificate Register</div>
                  </a>
                </div>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>societies_report/investment_register/<?= $society_id ?>">
                    <div>Investment Register Format</div>
                  </a>
                </div>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url("societies/nomination_pdf/"); ?>">
                    <div>Nomination Form Format</div>
                  </a>
                </div>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>assets/uploads/society_docs/NOC Letter.docx">
                    <div>NOC Format</div>
                  </a>
                
                  <!-- <a class="href btn btn-primary ml-2 mb-3" href="<?php //echo base_url("societies/noc/").$society_id; ?>">
                    <div>NOC Format 1</div>
                  </a> -->
                </div>

                <div class="">
                  <a class="href btn btn-primary ml-2 mb-3" href="<?php echo base_url(); ?>assets/uploads/society_docs/AGM NOTICE.docx">
                    <div>AGM Notice Format</div>
                  </a>

                  <!-- <a class="href btn btn-primary ml-2 mb-3" href="<?php //echo base_url("societies/agm/").$society_id; ?>" target="_blank">
                    <div>AGM Notice Format</div>
                  </a> -->
                </div>

                <!-- <div class="color bg-dark text-white"><div>Dark</div></div> -->

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
    <?php endif; ?>
  </section>

</div>

<?php $this->load->view('common/footer'); ?>