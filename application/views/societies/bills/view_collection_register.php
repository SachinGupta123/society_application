<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
// foreach($reciept_data as $r_data){
// $rd =  unserialize($r_data['details']);
// echo "<pre>";print_r($total_interest);die;
// }
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content" id="main">

        <section class="section">

          <div class="section-header">

          <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies">Societies</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url("societies/society_bill_generate/").$society_id; ?>">Society bill</a></div>

              <div class="breadcrumb-item">Collection Register</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Collection Register</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Collection Register</h4>

                  </div>

                  <div class="form-group text-right">
                       <!-- no needed of csv and xls for download bcoz already define in jquery datatable -sachhidanand 06-10-2021 -->
                      <!--   <div class="col-sm-12">

                          <a href="<?php //echo base_url(); ?>societies/exportCollection/<?php //echo $reciept_data[0]['society_id']?>/<?php //echo $reciept_data[0]['bill_month']?>" class="btn btn-primary" id="csv">Download As CSV</a>

                          <button class="btn btn-primary" id="xls">Download As XLS</button>

                        </div>
 -->
                    </div>

                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table_collection">
                        <thead>

                          <tr>

                            <th class="text-center">Bill No.</th>

                            <th class="text-center">Wing</th>

                            <th class="text-center">Flat No.</th>

                            <th class="text-center">Member Name</th>

                            <th class="text-center">Bill Amount</th>

                            <th class="text-center">Principal Arrears</th>

                            <th class="text-center">Interest Arrears</th>

                            <th class="text-center">Interest</th>

                            <th class="text-center">Total Due</th>

                            <th class="text-center">Transaction Type</th>

                            <th class="text-center">Cheque No.</th>

                            <th class="text-center">Cheque Date</th>

                            <th class="text-center">Bank Name</th>

                            <th class="text-center">Amount</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($reciept_data as $reciept) {?>
                          <tr>
                            <td class="text-center"><?= $reciept['bill_no'] ?></td>

                            <td class="text-center"><?= $reciept['wing'] ?></td>

                            <td class="text-center"><?= $reciept['flat_no'] ?></td>

                            <td class="text-center"><?= $reciept['member_name'] ?></td>

                            <td class="text-center"><?= round($reciept['bill_amount']) ?></td>
                            
                            <td class="text-center"><?= round($reciept['principal_arrears']) ?></td>

                            <td class="text-center"><?= round($reciept['interest_arrears']) ?></td>

                            <td class="text-center"><?= round($reciept['interest']) ?></td>

                            <td class="text-center"><?= round($reciept['total_due']) ?></td>

                            <td class="text-center"></td>

                            <td class="text-center"></td>

                            <td class="text-center"></td>

                            <td class="text-center"></td>

                            <td class="text-center"></td>

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
    $('#table_collection').DataTable({
      // dom:'Bfrtip',
      dom: 'lBfrtip',
      buttons: [
        {
            extend:  'csv', 
            title:'<?php echo $title ?>',
        },
        {
            extend: 'excel', 
            title:'<?php echo $title ?>',
        },
                // { extend: 'pdf', orientation: 'landscape'},//change pdf sachhidanand 06-10-2021
                // 'print',
      ],
      scrollY: false,
      scrollX: true,
    });
  });

</script>