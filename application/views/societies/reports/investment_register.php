<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$society_id = $this->uri->segment(3);

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

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies_report/reports/<?=$society_id ?>">View Reports</a></div>

              <div class="breadcrumb-item">Investment Register</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Investment Register</h2>

            <div class="row">

              <div class="col-12">

                <div class="card p-2 shadow-sm">

                  <div class="card-header">

                    <h4>Investment Register Example Format</h4>

                  </div>

                  <div class="card-body p-3 border">

                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                        <thead>                                 
                          <tr>
                            <th class="text-left">Sr</th>
                            <!-- <th class="text-left">Wing</th> -->
                            <th class="text-left">Date</th>
                            <th class="text-left">Particulars</th>
                            <th class="text-left">Amount</th>
                            <th class="text-left">Rate of Interest</th>
                            <th class="text-left">Period</th>
                            <th class="text-left">Bank Name</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php $row = 1; ?>
                          <?php foreach($investment as $invest) { ?>
                            <tr>
                              <td class="text-left"><?= $row; ?></td>
                              <!-- <td class="text-left"><?= $member['wing'] ?></td> -->
                              <td class="text-left"><?= $invest['date'] ?></td>
                              <td class="text-left"><?= $invest['particulars'] ?></td>
                              <td class="text-left"><?= $invest['amount'] ?></td>
                              <td class="text-left"><?= $invest['rate_of_interest'] ?></td>
                              <td class="text-left"><?= $invest['period'] ?></td>
                              <td class="text-left"><?= $invest['bank_name'] ?></td>
                            </tr>
                          <?php  $row++; } ?>
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
//   $("#table-1").dataTable({
//   "columnDefs": [
//     { "sortable": false, "targets": [2,3] }
//   ]
// });
  $(document).ready(function(){ 
    $('#table-1').DataTable({
      dom:'Bfrtip',
      paging: true,
      buttons: [
        // {
        //     extend: 'copy',
        //     title:'<?php //echo $title ?>',
        // },
        {
            extend:  'csv', 
            title:'<?php echo $title ?>',
        },
        {
            extend: 'excel', 
            title:'<?php echo $title ?>',
        },
        // {
        //     extend: 'pdf',
        //     title:'<?php //echo $title ?>',
        // },

        // {
        //     extend: 'print',
        //     title:'<?php //echo $title ?>',
        // },
        
      ],
      scrollY:false,
    scrollX:true,
    "autoWidth": false,
    });
  });
</script>