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
        <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner') : 
        ?>
        <div class="breadcrumb-item active"><a href="<?php echo base_url();  ?>societies">Societies List</a></div>
        <?php endif; 
        ?>
        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id ?>">Society Dashboard</a></div>
       
        <div class="breadcrumb-item"><a href="<?php echo base_url("societies_report/reports/").$society_id; ?>">View Report</a></div>

        <div class="breadcrumb-item">View Bank</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Bank</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Bank List</h4>

            </div>        

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 table table-hover table-sm bankTbl " id="bankList">
                  <thead>
                    <tr>
                     

                      <th >Sr No.</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Branch</th>
                      <th>IFSC Code</th>
                      <th>MICR</th>
                      <th>ACC No.</th>
                      <th class="text-right">Balance</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php $i=0;foreach ($banks as $bank) { 
                    ?>
                    <tr id="<?= $bank['id'] ?>">

                      <td class="text-left"><?= ++$i ?></td>

                      <td class="text-left"><?= $bank['bank_name'] ?></td>

                      <td class="text-left"><?= $bank['address'] ?></td>

                      <td class="text-left"><?= $bank['branch'] ?></td>

                      <td class="text-left"><?= $bank['ifsc'] ?></td>

                      <td class="text-left"><?= $bank['micr'] ?></td>

                      <td class="text-left"><?= $bank['ac_no'] ?></td>

                      <td class="text-right font-weight-bold"> <?= $bank['current_balance'] ?></td>

                      <td class="text-left"><?php if(!empty($bank['phone'])) echo $bank['phone']; ?></td>

                      <td class="text-left"><?= $bank['email'] ?></td>

                      <td class="text-left">
                      <div class="btn-group">
                       
                        <a href="<?php echo base_url("societies_report/bank_report/").$society_id."/".$bank['id']; ?>"
                          class="btn btn-outline-info"  title="Transactions">
                          <i class="fas fa-landmark fa-fw"></i>
                          <!-- Transactions -->
                        </a>
                        
                      </td>
                        </div>
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

$(document).ready(function() {
  //dataTable
  $('#bankList').DataTable({
    scrollY:false,
    scrollX:true,
    "autoWidth": false,
  });





});




</script>