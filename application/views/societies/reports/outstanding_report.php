<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
// echo"<pre>";print_r($ledger_data);die;
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

              <div class="breadcrumb-item">Outstanding</div> 

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Outstanding</h2>

            <div class="row">

              <div class="col-12">

                <div class="card p-2 shadow-sm">

                  <div class="card-header">

                    <h4>Outstanding</h4>

                  </div>

                  <div class="card-body p-3 border">

                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                        <thead>                                 

                          <tr>
                            <th class="text-left">Wing</th>
                            <th class="text-left">Flat No.</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Phone</th>
                            <!-- <th class="text-left">Principal Arrears</th> -->
                            <!-- <th class="text-left">Interest Arrears</th> -->
                            <!-- <th class="text-left">Balance</th> -->
                            <th class="text-left mtWid">Amount</th>
                            <!-- <th class="text-left">Bill Status</th> -->

                          </tr>

                        </thead>

                        <tbody>                                 
                          <?php foreach($unpaid_bills as $unpaid_bill) { ?>
                            <tr>
                              <td class="text-left"><?= $unpaid_bill['wing'] ?></td>
                              <td class="text-left"><?= $unpaid_bill['flat_no'] ?></td>
                              <td class="text-left"><?= $unpaid_bill['name'] ?></td>
                              <td class="text-left"><?php if(!empty($unpaid_bill['phone'])) echo $unpaid_bill['phone'];  ?></td>
                              <!-- <td class="text-left"><?//= $unpaid_bill['principal_arrears'] ?></td> -->
                              <!-- <td class="text-left"><?//= $unpaid_bill['interest_arrears'] ?></td> -->
                              <!-- <td class="text-left"><?//= $unpaid_bill['member_balance'] ?></td> -->
                              <td class="text-right font-weight-bold"><?= round($unpaid_bill['total_due']) ?></td>
                              <!-- <td class="text-left"><?//= $unpaid_bill['bill_status'] ?></td> -->
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
//   $("#table-1").dataTable({
//   "columnDefs": [
//     { "sortable": false, "targets": [2,3] }
//   ]
// });
  $(document).ready(function(){ 
    $('#table-1').DataTable({
      // dom:'Bfrtip',
      // paging: true,
      dom: 'lBfrtip',
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