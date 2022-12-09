<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->model('Payment_model');
$society_id = $this->uri->segment(3);
// echo "<pre>";print_r($reciept_data);die;
// foreach($reciept_data as $r_data){
// $rd =  unserialize($r_data['details']);
// }
$this->load->view('common/header_msoc');
$headers = array();
$b_heads = array();
$op_balance = array();
?>

      <!-- Main Content -->

      <div class="main-content" id="main">

        <section class="section">

          <div class="section-header">

            <h1>Societies</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies">Societies</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item">Bill Register</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Bill Register</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Bill Register</h4>

                  </div>

                  <!-- <div class="form-group text-right">

                        <div class="col-sm-12">

                          <button class="btn btn-primary" id="transfer_to_cash">Download As CSV</button>

                          <button class="btn btn-primary" id="to_bank">Download As XLS</button>

                        </div>

                    </div> -->

                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table_bill">
                        <thead>
                          <tr>

                            <th class="text-center">Bill No.</th>

                            <th class="text-center">Wing</th>

                            <th class="text-center">Flat No.</th>

                            <th class="text-center">Member Name</th>

                            <th class="text-center">Opening Balance</th>

                            <?php foreach($bill_heads as $head) { $headers[] = $head['name']; ?>
                              <th class="text-center"><?= $head['name']?></th>
                            <?php } ?>
                            <th class="text-center">Parking Charges</th>

                            <th class="text-center">Noc Charges</th>

                            <th class="text-center">Credit Note</th>

                            <th class="text-center">Debit Note</th>

                            <th class="text-center">Current Interest</th>

                            <th class="text-center">Month Total</th>

                            <th class="text-center">Grand Total</th>

                          </tr>
                        </thead>

                        <tbody>
                          <?php $row = 1; ?>
                          <?php foreach($reciept_data as $rdata) {  ?>
                          <tr>

                            <td class="text-center"><?= /*$row*/ $rdata['bill_no'] ?></td>

                            <td class="text-center"><?= $rdata['wing'] ?></td>

                            <td class="text-center"><?= $rdata['flat_no'] ?></td>

                            <td class="text-center"><?= $rdata['member_name'] ?></td>

                            <td class="text-center"><?= $op_balance[$row] = round(-$this->Member_model->get_bill_register_op_balance($rdata['member_id'],$this->uri->segment(4)),2); ?></td>
                            <!-- <td class="text-center"><?= $rdata['member_principal_arrears'] + $rdata['member_interest_arrears'] ?></td>  -->
                            <?php $rd =  unserialize($rdata['details']); ?>                        
                              <?php foreach($headers as $bh) :?>
                                <?php $b_heads[$bh][$rdata['id']] = !empty($rd[$bh]) ? $rd[$bh] : ''; ?>
                                <td class="text-center"><?= !empty($rd[$bh]) ? $rd[$bh] : ''; ?></td>
                              <?php endforeach; ?>
                            <td class="text-center">
                              <?= $rd['Parking Charges'] ?>
                            </td>
                            <td class="text-center">
                              <?= $rd['NOC Charges'] ?>
                            </td>
                            <?php
                            $pc[] = $rd['Parking Charges'];
                            $total_parking_charge = array_sum($pc);
                            $nc[] = $rd['NOC Charges'];
                            $total_noc_charge = array_sum($nc);
                            $pay = array();
                            $credit_note = array();
                            $debit_note = array();
                            $last_month =date('Y-m-d h:i:s',strtotime($rdata['bill_date']." -1 month"));
                            // echo"<pre>";print_r($rdata['member_id']);
                            $pay = $this->Payment_model->get_all_notes($rdata['member_id'], $last_month, date('Y-m-d h:i:s',strtotime($rdata['bill_date'])));
                            $society_credit_amount = $this->Payment_model->get_credit_notes_sum($rdata['society_id'], $last_month, date('Y-m-d h:i:s',strtotime($rdata['bill_date'])));
                            $society_debit_amount = $this->Payment_model->get_debit_notes_sum($rdata['society_id'], $last_month, date('Y-m-d h:i:s',strtotime($rdata['bill_date'])));
                            // echo"<pre>";print_r($pay);die;
                              foreach($pay as $p)
                              {
                                if($p['is_credit_note'] == 1):
                                  $credit_note[] = $p;
                                elseif($p['is_debit_note'] == 1):
                                  $debit_note[] = $p;
                                endif;
                              }

                              $credit_amount = 0;
                              foreach($credit_note as $note)
                              {
                                $credit_amount = $credit_amount + $note['credit'];
                              }

                              $debit_amount = 0;
                              foreach($debit_note as $note)
                              {
                                $debit_amount = $debit_amount + $note['credit'];
                              }

                              // $society_credit_amount = 0;
                              $society_credit_amount = $society_credit_amount[0]['credit'] + $credit_amount;

                              // $society_debit_amount = 0;
                              $society_debit_amount = $society_debit_amount[0]['credit'] + $debit_amount;
                            ?>
                            <td class="text-center"> <?= $credit_amount ?></td>

                            <td class="text-center"><?= $debit_amount ?></td>

                            <td class="text-center"><?= $rdata['interest'] ?></td>

                            <td class="text-center"><?= $rdata['bill_amount'] ?></td>

                            <td class="text-center"><?= $rdata['total_due'] ?></td>

                          </tr>
                          <?php $row++; } ?>
                          </tbody>
                          <tr>
                          <th colspan="4">Total</th>
                          <!-- <th class="text-center"><?= -($total_opening_balance[0]->previous_member_balance) ;?></th> -->
                          <th class="text-center"><?= array_sum($op_balance); ?></th>
                          <?php foreach($b_heads as $k => $b) :?>
                            <th class="text-center"><?= array_sum($b) ?></th>
                          <?php endforeach; ?>
                          <th class="text-center"><?= $total_parking_charge; ?></th>
                          <th class="text-center"><?= $total_noc_charge; ?></th>
                          <th class="text-center"><?= $society_credit_amount[0]['credit'] != NULL ?$society_credit_amount[0]['credit'] : 0; ?></th>
                          <th class="text-center"><?= $society_debit_amount[0]['credit'] != NULL ?$society_debit_amount[0]['credit'] : 0; ?></th>
                          <th class="text-center"><?= $total_interest[0]->interest; ?></th>
                          <th class="text-center"><?= $total_bill_amount[0]->bill_amount;?></th>
                          <th class="text-center"><?= $total_due[0]->total_due; ?></th>
                        </tr>
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
    $('#table_bill').DataTable({
      dom:'Bfrtip',
      paging: false,
      buttons: [
                  'copy','csv','excel',
                  { extend: 'pdf', orientation: 'landscape'},//change pdf sachhidanand 06-10-2021
                'print',              
      ]
    });
  });

</script>