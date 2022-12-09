<?php

  defined('BASEPATH') or exit('No direct script access allowed');
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

        <div class="breadcrumb-item">Expenses</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Expenses</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Expenses</h4>

            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-left w15">Service Provider</th>
                      <th class="text-left">Expense Category</th>
                      <th class="text-left">Description</th>
                      <th class="text-left">From Bank</th>
                      <th class="text-left mtWid">Amount </th>
                    </tr>

                  </thead>

                  <tbody>
                    <?php foreach ($expenses as $expense) { ?>
                    <tr>
                      <!-- <td class="text-left" style="display: none;"><?//= $expense['id'] ?></td> -->
                      <!-- <td class="text-left"><?//= date(('d-m-Y'), strtotime($expense['date'])) ?></td> -->
                      <td class="text-left"><?= $expense['payee'] ?></td>
                      <td class="text-left"><?= $expense['expense_category_id'] ?></td>
                      <td class="text-left"><?= $expense['description'] ?></td>
                      <td class="text-left"><?= $expense['bank_name'] ?></td>
                      <td class="text-right font-weight-bold"><?= round($expense['amount']) ?></td>
                    </tr>
                    <?php } ?>
                    <!-- <tr>
                            <td class="text-left" colspan="5">Opening Balance</td>
                            <td class="text-left"><?//= $ledger['narration'] == 'OPENINGBALANCE' ? $ledger['balance'] : 0 ?></td>
                          </tr> -->
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
$(document).ready(function() {
  $('#table-1').DataTable({
    // dom: 'Bfrtip',
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