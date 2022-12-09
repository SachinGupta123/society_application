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
              <div class="breadcrumb-item">Manage Members</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Manage Members</h2>
            <div class="row">
              <div class="col-12">
                <div class="card p-2 shadow-sm">
                  <div class="card-header">
                    <h4>Members List</h4>
                  </div>
                  <!-- <div class="col-2">
                    <a href="<?php echo base_url(); ?>societies/add_society" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Society</a>
                  </div> -->
                  <div class="card-body p-3 border">
                    <div class="table-responsive">
                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Wing</th>
                            <th class="text-center">Flat No.</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">UserName</th>
                            <th class="text-center">Initial Outstanding</th>
                            <th class="text-center">Current Outstanding</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <?php foreach($member_data as $upm)  :?>
                          <tr>
                            <td class="text-center"><?= $upm['id']?></td>
                            <td class="text-center"><?= $upm['wing']?></td>
                            <td class="text-center"><?= $upm['flat_no']?></td>
                            <td class="text-center"><?= $upm['name']?></td>
                            <td class="text-center"><?= $upm['phone']?></td>
                            <td class="text-center"><?= $upm['email_id']?></td>
                            <td class="text-center"><?= $upm['initial_outstanding']?></td>
                            <td class="text-center"><?= $upm['member_balance']?></td>
                            <td class="text-center"><a href="<?php echo base_url(); ?>utility_provider_member/view/<?php echo $upm['id'] ?>/<?= $usp_id ?>" class="btn btn-warning">Details</a></td>
                          </tr>
                        <?php endforeach; ?>
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