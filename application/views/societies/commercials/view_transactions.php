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

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>bank/view/<?=$society_id?>">Bank</a></div>

              <div class="breadcrumb-item">View Transactions</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">View Transactions</h2>

            <div class="row">

              <div class="col-12">

                <div class="card shadow-sm p-2">

                  <div class="card-header">

                    <h4>Transactions List</h4>

                  </div>


                  <div class="card-body p-3 border">

                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-left">Date</th>
                            <th class="text-left">Narration</th>
                            <th class="text-left">Debit</th>
                            <th class="text-left">Credit</th>
                            <th class="text-left">Balance</th>
                          </tr>
                        </thead>
                        <tbody>

                        
                  <?php if(isset($bank_transaction) && !empty($bank_transaction)){
                            $balance=0;  
                     foreach($bank_transaction->opening_balance as $ob){
                        if($ob->op_balance_dc=="D")
                          $balance=$balance+$ob->op_balance;

                        if($ob->op_balance_dc=="C") 
                          $balance=$balance-$ob->op_balance;
                  ?>
                    <tr>                     
                      <td class="text-left"><?php echo date('d-m-Y', strtotime($ob->date)); ?></td>
                      <td class="text-left"><?php echo "Opening Balance"?></td>
                     
                      <td class="text-right"><?php //if($ob->dc=="D") echo round($ob->op_balance)?></td>
                      <td class="text-right"><?php //if($ob->dc=="C") echo round($ob->op_balance)?></td>
                      <td class="text-right"><?php echo  $balance;?></td>
                    </tr>
                   
                   
                    
                    <?php 
                      }
                      //opening balance
                      if(isset($bank_transaction->transaction) && !empty($bank_transaction->transaction)){
                        foreach($bank_transaction->transaction as $ob){
                          if($ob->dc=="D")
                            $balance=$balance+$ob->amount;
  
                          if($ob->dc=="C") 
                            $balance=$balance-$ob->amount;



                    ?>

                    <tr>                     
                      <td class="text-left"><?php echo date('d-m-Y', strtotime($ob->date)); ?></td>
                      <td class="text-left"><?php echo $ob->narration?></td>                      
                      <td class="text-right"><?php if($ob->dc=="D") echo round($ob->amount)?></td>
                      <td class="text-right"><?php if($ob->dc=="C") echo round($ob->amount)?></td>
                      <td class="text-right"><?php echo  $balance;?></td>
                     
                    </tr>
                    
                    
                    <?php

                        }


                      }


                      }else{
                    ?>
                         
                        <?php $row = 1; ?>                                 
                          <?php foreach($transactions as $transact) {?>
                            <tr>

                              <!-- <td class="text-left"><?//= $row ?></td> -->

                              <td class="text-left"><?=  date('d-m-Y', strtotime($transact['date']));  ?></td>

                              <td class="text-left"><?= $transact['narration'] ?></td>

                              <td class="text-left"><?php if(!empty($transact['credit'])) echo round($transact['credit']) ?></td>

                              <td class="text-left"><?php if(!empty($transact['debit'])) echo round($transact['debit']) ?></td>

                              <td class="text-right font-weight-bold"><?= $transact['is_cash'] == 0 && $transact['is_arrears'] == 0 ? round($transact['balance']) : '' ?></td>
                            
                            </tr>
                          <?php  $row++; }} ?> 
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
    // alert('working');
    $('#table-1').DataTable({
      "aaSorting": [],    
      // dom:'Bfrtip',
      // "pageLength": 100,
      // paging: true,
      dom: 'lBfrtip',
      "ordering": false,
      "aaSorting": [],
      scrollY:false,
    scrollX:true,
    "autoWidth": false,     
      buttons: [
       
        {
            extend:  'csv', 
            title:'<?php echo $title ?>',
        },
        {
            extend: 'excel', 
            title:'<?php echo $title ?>',
        },
        
        
      ]
    });
  });
</script>