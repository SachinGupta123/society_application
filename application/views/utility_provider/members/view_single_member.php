<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$usp_id = $this->uri->segment(4);
// print_r($member);die;
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Societies</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Utility Service Provider Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_provider_member/manage/<?= $usp_id ?>">Manage Members</a></div>

              <div class="breadcrumb-item">Member</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Manage Members</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Member</h4>

                  </div>

                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">

                        <thead>                                 

                          <tr>

                            <th class="text-center">Wing</th>

                            <th class="text-center">Flat No.</th>

                            <th class="text-center">Name</th>

                            <th class="text-center">Phone</th>

                            <th class="text-center">Initial Outstanding</th>

                            <th class="text-center">Current Balance</th>

                            <th class="text-center">Email</th>

                          </tr>

                        </thead>

                        <tbody>                                 

                          <tr>

                            <td class="text-center"><?= $member[0]->wing; ?></td>

                            <td class="text-center"><?= $member[0]->flat_no; ?></td>

                            <td class="align-middle"><?= $member[0]->name; ?></td>

                            <td class="text-center"><?= $member[0]->phone; ?></td>

                            <td class="text-center"><?= $member[0]->initial_outstanding; ?></td>

                            <td class="text-center"><?= $member[0]->member_balance; ?></td>

                            <td class="text-center"><?= $member[0]->email_id; ?></td>

                          </tr>

                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="row">

              <h4 class="section-title">Total Outstanding Amount: 0</h4>

              <div class="card-body">

                <button class="btn btn-lg btn-info">Pay Bills</button>

              </div>

            </div><br>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Utility Provider Bill Details</h4>

                  </div>

                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">

                        <thead>                                 

                          <tr>

                            <th class="text-center">Bill No.</th>

                            <th class="text-center">Bill Date</th>

                            <th class="text-center">Due Date</th>

                            <th class="text-center">Bill Details</th>

                            <th class="text-center">Bill Amount</th>

                            <th class="text-center">Status</th>

                          </tr>

                        </thead>

                        <tbody>                                 

                          <tr>

                            <td class="text-center">#</td>

                            <td class="text-center"> # </td>

                            <td class="text-center"> # </td>

                            <td class="text-center"> # </td>

                            <td class="text-center"> # </td>

                            <td class="text-center"> # </td>

                            <td class="text-center"> # </td>

                          </tr>

                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Payments Recieved</h4>

                  </div>

                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">

                        <thead>                                 

                          <tr>

                            <th class="text-center">Payment Date</th>

                            <th class="text-center">Narration</th>

                            <th class="text-center">Amount</th>

                            <th class="text-center">Paid By</th>

                            <th class="text-center">Cheque No.</th>

                          </tr>

                        </thead>

                        <tbody>                                 

                          <tr>

                            <td class="text-center">#</td>

                            <td class="text-center"> # </td>

                            <td class="text-center"> # </td>

                            <td class="text-center"> # </td>

                            <td class="text-center"> # </td>

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