<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Societies</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>enrolment_requests">Enrollment Requests</a></div>

              <div class="breadcrumb-item">Enrollment Details</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Enrollment Details</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Enrollment Details</h4>

                  </div>

                  <!-- <div class="col-2">

                    <a href="<?php echo base_url(); ?>societies/add_bank" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Bank</a>

                  </div> -->

                </div>

              </div>

            </div>

          </div>

        </section>

      </div>

<?php $this->load->view('common/footer'); ?>