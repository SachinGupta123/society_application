<?php

defined('BASEPATH') or exit('No direct script access allowed');
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

        <div class="breadcrumb-item">Cash</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Cash</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Cash</h4>

            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                  <thead>

                    <tr>
                     
                      <th class="text-left">Date</th>
                      <th class="text-left">Narration</th>
                      <th class="text-left">Credit</th>
                      <th class="text-left">Debit</th>
                      <th class="text-left mtWid">Balance</th>

                    </tr>

                  </thead>

                  <tbody>

                    <?php 
                    if(isset($cash_transaction) && !empty($cash_transaction)){ 

                      if(isset($cash_transaction) && !empty($cash_transaction)){
                        $balance=0;
                        foreach($cash_transaction->opening_balance as $ob){
                          $balance=$ob->amount;
                        

                         ?>
                          <tr>                     
                          <td class="text-left"><?php echo date('d-m-Y', strtotime($ob->date)); ?></td>                          
                          <td class="text-left"><?php echo $ob->narration?></td>
                          <td class="text-right"> </td>
                          <td class="text-right"></td>
                          <td class="text-right"><?php echo   $balance;?></td>
                          
                        </tr>
                    <?php      
                        }
                      }

                      foreach($cash_transaction->transaction as $ob){
                        if($ob->dc=="D")
                          $balance=$balance+$ob->amount;
  
                        if($ob->dc=="C") 
                          $balance=$balance-$ob->amount;
                    ?>
                     <tr>                     
                          <td class="text-left"><?php echo date('d-m-Y', strtotime($ob->date));  ?></td>
                         
                          <td class="text-left"><?php echo $ob->narration?></td>
                          <td class="text-right"><?php if($ob->dc=="C") echo $ob->amount; else echo "0" ;?></td>
                          <td class="text-right"><?php if($ob->dc=="D") echo $ob->amount; else echo "0"; ?></td>
                          <td class="text-right"><?php  echo  $balance;?></td>
                          
                      </tr>
                        
                    <?php 
                      } 
                        }else{ ?> 

                    <?php  foreach ($cash_in_hands as $cash) { ?>
                    <tr>
                      <!-- <td class="text-left" style="display: none"><?//= $cash['id'] ?></td> -->
                      <td class="text-left"><?= date("d-m-Y",strtotime($cash['date'])) ?></td>
                      <td class="text-left"><?= $cash['narration'] ?></td>
                      <td class="text-left"><?php if(!empty($cash['credit'])) echo $cash['credit'] ?></td>
                      <td class="text-left"><?php if(!empty($cash['debit'])) echo $cash['debit'] ?></td>
                      <td class="text-right font-weight-bold"><?= $cash['balance'] ?></td>
                    </tr>
                    <?php } }?>
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
    // "pageLength": 100,
    // paging: true,
    dom: 'lBfrtip',
    "aaSorting": [],
    "ordering": false,
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