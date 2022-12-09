<?php
defined('BASEPATH') or exit('No direct script access allowed');

// $message = $this->session->flashdata('message');
if (!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else {
  $message['status'] = '';
  $message['text'] = '';
}
$error_count = '';
if ($message['status'] == "Fail") {
  $error_count = $this->session->flashdata('error_count');
}
$this->load->view('common/header_msoc');


?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>
      <!-- breadcrum -->
      <div class="section-header-breadcrumb">
        <?php if ($this->ion_auth->is_admin()) : ?>
        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
        <?php endif; ?>
        <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner') : ?>
        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies">All Society</a></div>
        <?php endif; ?>
        <div class="breadcrumb-item"><?= substr($society->name,0, 6)  ?> Dashboard</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title"><?= $society->name; ?> Society</h2>
      
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?php echo base_url("societies_report/payment_report/").$this->uri->segment(3)?>">
            <div class="card card-statistic-1 border p-2">
              <div class="card-icon bg-primary width40">
                <i class="fas fa-rupee-sign"></i>
              </div>
              <div class="card-wrap ">
                <div class="card-header ptop8">
                  <h4>Revenue</h4>
                </div>
                <div class="card-body">
                  <?php echo round($total_revenue); ?>
                </div>
              </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?php echo base_url("societies_report/outstanding_report/").$this->uri->segment(3)?>">
            <div class="card card-statistic-1 border p-2">
              <div class="card-icon bg-danger width40">
                <i class="far fa-newspaper"></i>
              </div>
              <div class="card-wrap ">
                <div class="card-header ptop8">
                  <h4>Outstanding</h4>
                </div>
                <div class="card-body">
                  <?php echo round($outstanding); ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?php echo base_url("service_providers/view/").$this->uri->segment(3)?>">
            <div class="card card-statistic-1 border p-2">
              <div class="card-icon bg-warning width40">
                <i class="fa fa-wrench text-white"></i>
              </div>
              <div class="card-wrap ">
                <div class="card-header ptop8">
                  <h4>Service Providers</h4>
                </div>
                <div class="card-body">
                  <?php echo $service_providers; ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php endif; ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="<?php echo base_url("member/manage/").$this->uri->segment(3)?>">
            <div class="card card-statistic-1 border p-2">
              <div class="card-icon bg-success width40">
                <i class="far fa-building text-dark"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header ptop8">
                  <h4>Flats</h4>
                </div>
                <div class="card-body">
                  <?php echo $member_count; ?>
                </div>
              </div>
            </div>
          </a>

        </div>
      </div>
      <!-- end total count section -->

      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-12">
          <div class="card p-2 shadow-sm">
            <div class="card-header">
              <h4>Society Details</h4>
            </div>
            <!-- <div class="col-2">
                    <a href="<?php echo base_url(); ?>societies/add_society" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Society</a>
                  </div> -->
            <div class="card-body p-3 border">
              <div class="table-responsive">
                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-left w15">Society Name</th>
                      <th class="text-left">Address</th>
                      <th class="text-left">Registration No.</th>
                      <th class="text-left  w10">No. of Flats</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <!-- <td class="text-left"><?= $society->id; ?></td> -->
                      <td class="text-left"><?= $society->name; ?></td>
                      <td class="text-left"><?= $society->address; ?></td>
                      <td class="text-left"><?= $society->registration_no; ?></td>
                      <td class="text-left"><?= $society->no_of_flats; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- <div class="col-12"> -->
        <div class="col-md-6 col-sm-6 col-12">
          <div class="card border">
            <div class="card-header">
              <h4>Payment</h4>
            </div>
            <div class="card-body">
              <canvas id="abc"></canvas>
            </div>
          </div>
        </div>
        <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
        <div class="col-md-6 col-sm-6 col-12">
          <div class="card border">
            <div class="card-header">
              <h4>Income/Expense</h4>
            </div>
            <div class="card-body">
              <canvas id="abcd"></canvas>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- </div> -->
      </div> 
    </div>
  </section>
</div>
<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
$(document).ready(function() {
  var message = '<?php if (isset($message['status']) && !empty($message['status'])) echo $message['status'] ?>';
  var error_count = '<?php echo $error_count ?>';
  if (message == 'Success') {
    iziToast.success({
      title: message,
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text'] ?>',
      position: 'topRight'
    });
  } else if (message == 'Fail') {
    iziToast.error({
      title: message,
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text'] . ' Total Errors: ' . $error_count ?>',
      position: 'topRight'
    });
  }
});

</script>
