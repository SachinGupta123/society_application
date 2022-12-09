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

              <div class="breadcrumb-item">Income/Collection</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Income/Collection</h2>

            <div class="row">

              <div class="col-12">

                <div class="card p-2 shadow-sm">

                  <div class="card-header">

                    <h4>Income/Collection</h4>

                  </div>

                  <div class="card-body p-3 border">

                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                        <thead>                                 

                          <tr>
                            <th class="text-left">Payment Date</th>
                            <th class="text-left">Wing</th>
                            <th class="text-left">Flat No.</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Phone</th>
                            <th class="text-left">Narration</th>
                            <th class="text-left mtWid">Amount</th>
                            <th class="text-left">Paid By</th>
                            
                          </tr>

                        </thead>

                        <tbody>                                 
                          <?php foreach($all_payments as $payment) { ?>
                            <tr>
                              <td class="text-left"><?= date("d-m-Y",strtotime($payment['payment_date'])) ?></td>
                              <td class="text-left"><?= $payment['wing'] ?></td>
                              <td class="text-left"><?= $payment['flat_no'] ?></td>
                              <td class="text-left"><?= $payment['name'] ?></td>
                              <td class="text-left"><?= $payment['phone'] ?></td>
                              <td class="text-left"><?= $payment['narration'] ?></td>
                              <td class="text-right font-weight-bold"><?= round($payment['credit']) ?></td>
                              <td class="text-left"><?= $payment['paid_by'] ?></td>
                              
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
      "aaSorting": [],
      "ordering": false,
    //   "aoColumnDefs": [
    //     { "bSortable": false }, 
     
    // ],

      buttons: [
       
        {
            extend:  'csv', 
            title:'<?php echo $title ?>',
        },
        {
            extend: 'excel', 
            title:'<?php echo $title ?>',
        },
       
      ],
      scrollY:false,
      scrollX:true,
      "autoWidth": false,
    });
  });
</script>