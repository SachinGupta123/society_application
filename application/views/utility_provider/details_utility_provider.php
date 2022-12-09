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
               <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_service_provider">Utility Service Provider</a></div>
              <div class="breadcrumb-item">Utility Service Provider Dashboard</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Utility Service Provider Details</h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Utility Service Provider Details</h4>
                  </div>
                  <!-- <div class="col-2">
                    <a href="<?php echo base_url(); ?>societies/add_society" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Society</a>
                  </div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">Business Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">License No.</th>
                            <th class="text-center">Owner Name</th>
                            <th class="text-center">Phone No.</th>
                            <th class="text-center">Email</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                          <tr>
                            <td class="text-center"><?= $usp->id; ?></td>
                            <td class="text-center"><?= $usp->business_name; ?></td>
                            <td class="text-center"><?= $usp->address; ?></td>
                            <td class="text-center"><?= $usp->license_no; ?></td>
                            <td class="text-center"><?= $usp->owner_name; ?></td>
                            <td class="text-center"><?= $usp->phone_no; ?></td>
                            <td class="text-center"><?= $usp->email_id; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-rupee-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Revenue</h4>
                  </div>
                  <div class="card-body">
                    10
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Outstanding</h4>
                  </div>
                  <div class="card-body">
                    42
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Service Providers</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Members</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
              <!-- <div class="col-12"> -->
                <div class="col-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>Doughnut Chart</h4>
                    </div>
                    <div class="card-body">
                      <canvas id="abc"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Bar Chart</h4>
                  </div>
                  <div class="card-body">
                    <canvas id="abcd"></canvas>
                  </div>
                </div>
              </div>
            <!-- </div> -->
          </div>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Utility Service Provider Actions</h4>
                    
                  </div>
                  <div class="card-body text-center">
                    <a href="<?php echo base_url(); ?>utility_service_provider/edit/<?= $usp->id; ?>" class="btn btn-lg btn-success"><i class="fas fa-car"></i> Edit Provider</a>
                    <a href="<?php echo base_url(); ?>utility_plan/plans/<?= $usp->id; ?>" class="btn btn-lg btn-success"><i class="fas fa-wrench"></i> Plan Types</a>
                    <a href="<?php echo base_url(); ?>utility_provider_member/assign_plan/<?= $usp->id; ?>" class="btn btn-lg btn-success"><i class="fas fa-wrench"></i> Assign Plans</a>
                  </div>
                  <div class="card-body text-center">
                    <button class="btn btn-lg btn-danger"><i class="fas fa-trash-alt"></i> Delete Utility Service Provider</button>
                  </div>
                </div>
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Bills</h4>
                  </div>
                  <div class="card-body text-center">
                    <button class="btn btn-lg btn-success"><i class="fas fa-file-invoice"></i> Generate Bills</button>
                    <a href="<?php echo base_url(); ?>utilityProvider/monthly_bill/<?= $usp->id; ?>" class="btn btn-lg btn-success"><i class="fas fa-download"></i> Download Bills</a>
                    </div>
                    <div class="card-footer text-center">
                    <!-- <button class="btn btn-info">Download PDF</button> -->
                    <!-- <button class="btn btn-info">Download CSV</button> -->
                    <button class="btn btn-lg btn-danger">Delete Last Bill</button>
                  </div>
                </div>
                
              </div>
              <div class="col-12 col-md-6 col-lg-6">
              	<div class="card card-secondary">
                  <div class="card-header">
                    <h4>Member Actions</h4>
                    <div class="card-header-action">
                    </div>
                  </div>
                  <div class="card-body text-center">
                    <a href="<?php echo base_url(); ?>utility_provider_member/add/<?= $usp->id; ?>" class="btn btn-primary btn-lg">
                        <i class="far fa-user"></i> Add Member
                      </a>
                      <a href="<?php echo base_url(); ?>utility_provider_member/manage/<?= $usp->id; ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-users"></i> Manage Members
                      </a>
                  </div>
                  <!-- <div class="card-footer">
                    <button class="btn btn-success">Submit</button>
                  </div> -->
                  <div class="card-footer text-center">
                    <!-- <button class="btn btn-info">Download PDF</button> -->
                    <!-- <button class="btn btn-info">Download CSV</button> -->
                    <button class="btn btn-lg btn-danger">Delete All Members</button>
                  </div>
                </div>
                
                <div class="card card-secondary">
                  <div class="card-header">
                    <h4>Reports</h4>
                  </div>
                  <div class="card-body text-center">
                    <a href="<?php echo base_url(); ?>utilityProvider/reports/<?= $usp->id; ?>" class="btn btn-lg btn-light"><i class="fas fa-chart-bar"></i> Reports</a>
                  </div>
                  <div class="card-body text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
var ctxD = document.getElementById("abc").getContext('2d');
var myChartD = new Chart(ctxD, {
  type: 'pie',
  data: {
    datasets: [{
      data: [
        80,
        50
      ],
      backgroundColor: [
        '#191d21',
        '#63ed7a'
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Recieved',
      'Outstanding'
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});
var ctxB = document.getElementById("abcd").getContext('2d');
var myChartB = new Chart(ctxB, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: 'Statistics',
      data: [460, 458, 330, 502, 430, 610, 488],
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    },
    {
      label: 'Stat',
      data: [420, 490, 330, 502, 600, 400, 400],
      borderWidth: 2,
      backgroundColor: '#505578',
      borderColor: '#505578',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});
</script>