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

              <div class="breadcrumb-item">View Monthly Bills</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">View View Monthly Bills</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Monthly Bills List</h4>

                  </div>

                  <!-- <div class="col-2">

                    <a href="<?php echo base_url(); ?>societies/add_bank" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Bank</a>

                  </div> -->

                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">

                        <thead>                                 

                          <tr>

                            <th class="text-center">

                              #

                            </th>

                            <th class="text-center">Bill Month</th>

                            <th class="text-center">Action</th>

                          </tr>

                        </thead>

                        <tbody>                                 

                          <tr>

                            <td class="text-center">

                              1

                            </td>

                            <td class="text-center"> # </td>

                            <td class="text-center"><a href="" class="btn btn-info">Download PDF</a></td>

                          </tr>

                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </section>

      </div>

<?php $this->load->view('common/footer'); ?>