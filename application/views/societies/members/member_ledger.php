<?php

defined('BASEPATH') or exit('No direct script access allowed');
$member_id = $this->uri->segment(4);
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

      <div class="section-header-breadcrumb">
              <?php if($this->session->userdata('role') == 'operator' || $this->session->userdata('role') == 'committee_member' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner'): 
              ?>
              <div class="breadcrumb-item active"><a href="<?php echo base_url();  ?>member/manage/<?=$society_id ?>">Manage Flats</a></div>
              <?php endif; 
              ?>
              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>member/view/<?=$society_id ?>/<?=$member_id ?>">Flat Details</a></div>

              <div class="breadcrumb-item">Flat Ledger</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Flat Ledger</h2>

      <div class="row">

        <div class="col-12">

          <div class="card shadow-sm p-2">

            <div class="card-header">

              <h4>Flat Ledger</h4>

            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                  <thead>

                    <tr>

                      <!-- <th class="text-left">Posted As Of</th>

                      <th class="text-left">Doc No.</th>

                      <th class="text-left">Comments</th>

                      <th class="text-left">Credit</th>

                      <th class="text-left">Debit</th>

                      <th class="text-left mtWid">Balance</th> -->
                      <th class="text-left">Posted As Of</th>
                      
                      <th class="text-left">Comments</th>
                      <th class="text-left">Credit</th>
                      <th class="text-left">Debit</th>
                      <th class="text-left mtWid">Balance</th>

                    </tr>

                  </thead>

                  <tbody>

                  <?php 
                   if(isset($flat_transaction) && !empty($flat_transaction)){ 
                    $balance=0;
                    foreach($flat_transaction as $ob){
                     
                      if($ob->dc=="D")
                        $balance=$balance+$ob->amount;

                      if($ob->dc=="C") 
                        $balance=$balance-$ob->amount;
                  ?>
                    <tr>                     
                    <td class="text-left"><?php echo date('d-m-Y', strtotime($ob->date)); ?></td>
                    <td class="text-left"><?php echo $ob->narration?></td>
                    <td class="text-right"><?php if($ob->dc=="C") echo round($ob->amount)?></td>
                    <td class="text-right"><?php if($ob->dc=="D") echo round($ob->amount)?></td>
                    <td class="text-right"><?php echo round($balance);?></td>
                    </tr>
                  
                    <?php }
                    
                  }else{
                      
                            foreach ($ledger_data as $ledger) { 
                       
                      ?>
                    <tr>

                      <td class="text-left">
                     
                        <?=  $ledger['date']//date('d-m-Y', strtotime($this->Member_model->get_entity_date($ledger['entity_id'], $ledger['narration'], $member_id))); ; ?>
                      </td>

                      <!-- <td class="text-left"><?//= $ledger['entity_id'] ?></td> -->

                      <td class="text-left"><?= $ledger['narration'] ?></td>

                      <td class="text-left">
                        <?= round(($ledger['narration'] == "OPENINGBALANCE") ? number_format((float)$ledger['debit'], 2, '.', '') : number_format((float)$ledger['credit'], 2, '.', '')); ?>
                      </td>

                      <td class="text-left">
                        <?= round(($ledger['narration'] == "OPENINGBALANCE") ? number_format((float)$ledger['credit'], 2, '.', '') : number_format((float)$ledger['debit'], 2, '.', '')); ?>
                      </td>

                      <td class="text-right font-weight-bold"><?= round(number_format((float)-$ledger['balance'], 2, '.', '')); ?></td>

                    </tr>
                    <?php }
                   } ?> 
                  
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
    "aaSorting": [],
    "ordering": false,
    dom: 'Bfrtip',
    paging: true,
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