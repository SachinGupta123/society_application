<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$usp_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Utility Service Provider</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_service_provider">Utility Service Provider</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Utility Service Provider Dashboard</a></div>

              <div class="breadcrumb-item">View Reports</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">View Reports</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Reports</h4>

                  </div>

                  <!-- <div class="col-2">

                    <a href="<?php echo base_url(); ?>societies/add_bank" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Bank</a>

                  </div> -->

                  <p>Under Construction.....</p>

                </div>

              </div>

            </div>

          </div>

        </section>

      </div>

<?php $this->load->view('common/footer'); ?>