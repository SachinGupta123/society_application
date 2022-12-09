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
              
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id ?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies_report/reports/<?=$society_id ?>">View Reports</a></div>
              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies_report/bank_reconciliation/<?=$society_id ?>">View Bank</a></div>            

              <div class="breadcrumb-item">Bank Book</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title"><?php echo $bank_details["bank_name"] ?> Bank Book</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Bank Book</h4>

            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                  <thead>

                    <tr>
                      <th class="text-left">Date</th>
                      <th class="text-left">Bank</th>
                      <th class="text-left">Narration</th>
                      <th class="text-left">Credit</th>
                      <th class="text-left">Debit</th>
                      <th class="text-left mtWid">Balance</th>
                      <th class="text-left">Remark</th>

                    </tr>

                  </thead>

                  <tbody>

                    <?php if(isset($bank_transaction) && !empty($bank_transaction)){
                            $balance=0;
                            foreach($bank_transaction->opening_balance as $ob){
                              $balance=$ob->amount;
                    ?>
                      <tr>                     
                          <td class="text-left"><?php echo date('d-m-Y', strtotime($ob->date)); ?></td>
                          <td class="text-left"><?php echo $bank_details["bank_name"]; ?></td>
                          <td class="text-left"><?php echo $ob->narration?></td>
                          <td class="text-right"><?php if($ob->dc=="C") echo $ob->amount; else echo "0" ;?></td>
                          <td class="text-right"><?php if($ob->dc=="D") echo $ob->amount; else echo "0"; ?></td>
                          <td class="text-right"><?php echo  $ob->amount;?></td>
                          <td class="text-right"></td>
                      </tr>
                    <?php

                              }

                              foreach($bank_transaction->transaction as $ob){

                    ?>
                        <tr>                     
                          <td class="text-left"><?php echo date('d-m-Y', strtotime($ob->date)); 
                           if($ob->dc=="D")
                                $balance=$balance+$ob->amount;
        
                              if($ob->dc=="C") 
                                $balance=$balance-$ob->amount;?></td>
                          <td class="text-left"><?php echo $bank_details["bank_name"]; ?></td>
                          <td class="text-left"><?php echo $ob->narration?></td>
                          <td class="text-right"><?php if($ob->dc=="C") echo $ob->amount; else echo "0" ;?></td>
                          <td class="text-right"><?php if($ob->dc=="D") echo $ob->amount; else echo "0"; ?></td>
                          <td class="text-right"><?php 
                                

                               echo  $balance;
                          
                          ?></td>
                          <td class="text-right"></td>
                      </tr>
                    <?php
                                
                              }

                          
                    
                      }
                      ///end accounting data
                      else{
                         foreach ($transactions as $transaction) { ?>
                            <tr>
                              <td class="text-left"><?= date('d-m-Y', strtotime($transaction['date'])); ?></td>

                              <td class="text-left"><?= $transaction['bank_name'] ?></td>

                              
                              <td class="text-left"><?= $transaction['narration'] ?></td>

                              <td class="text-left"><?= $transaction['credit'] ?></td>

                              <td class="text-left"><?=$transaction['debit'] ?></td>

                              <td class="text-right font-weight-bold">
                                <?= $transaction['is_cash'] == 0 && $transaction['is_arrears'] == 0 ? $transaction['balance'] : '' ?>
                              </td>

                              <td class="text-left"></td>

                            </tr>
                    <?php }  } ?>                  
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

$(document).ready(function() {
  $('#table-1').DataTable({
    // dom: 'Bfrtip',
    // "pageLength": 100,
    // paging: true,
    dom: 'lBfrtip',
    "aaSorting": [],
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
});
</script>