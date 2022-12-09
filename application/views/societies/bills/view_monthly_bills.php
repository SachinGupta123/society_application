<?php

defined('BASEPATH') or exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1>Societies</h1>

      <div class="section-header-breadcrumb">

        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies">Societies</a></div>

        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id ?>">Society
            Dashboard</a></div>

        <div class="breadcrumb-item">View Monthly Bills</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View View Monthly Bills</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Monthly Bills List</h4>

            </div>

            <!-- <div class="col-2">

                    <a href="<?php echo base_url(); ?>societies/add_bank" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Bank</a>

                  </div> -->

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                  <thead>

                    <tr>

                      <th style="width: 200px;" class="text-left">Bill Month</th>

                      <th class="text-left">Action</th>

                    </tr>

                  </thead>

                  <tbody>
                    <?php foreach ($bill_month as $month) { ?>
                    <tr>

                      <td class="text-left"><?= $month['bill_month'] ?></td>
                      <!-- set alligment  sachhidanand 06-10-2021-->
                      <td class="text-left">
                        <a href="<?php echo base_url(); ?>societies/bill/<?php echo $society_id ?>/<?php echo $month['bill_month'] ?>"
                          class="btn btn-primary mr-2">Download Bill</a>
                        <!-- <a href="<?php //echo base_url(); ?>societies/download_reciept/<?php //echo $society_id ?>/<?php //echo $month['bill_month'] ?>"
                          class="btn btn-primary mr-2">Download Reciept</a>
                        <a href="<?php //echo base_url(); ?>societies/sms/<?php //echo $society_id ?>/<?php //echo $month['bill_month'] ?>"
                          class="btn btn-primary mr-2">Send SMS</a>
                        <a href="<?php //echo base_url(); ?>societies/email/<?php //echo $society_id ?>/<?php //echo $month['bill_month'] ?>"
                          class="btn btn-primary mr-2">Send Email</a> -->

                      </td>

                    </tr>
                    <?php } ?>
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
<script type="text/javascript">
$(document).ready(function(){
    // data table
    $('#table-1').DataTable({
  
});

})


</script>