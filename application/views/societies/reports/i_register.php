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

          <div class="breadcrumb-item">I Register</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">I Register</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>I Register</h4>

            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                  <thead>
                    <tr>
                      <th class="text-left">Sr</th>
                      <th class="text-left">Flat No./Unit</th>
                      <th class="text-left">Date Of Admission</th>
                      <th class="text-left">Date of Payment of Entrance Fees</th>
                      <th class="text-left">Full Name</th>
                      <th class="text-left">Address</th>
                      <th class="text-left">Occupation</th>
                      <th class="text-left">Age on the date of Admission</th>
                      <th class="text-left">Full Name & Address of the person nominated by member</th>
                      <th class="text-left">Date of Nomination</th>
                      <th class="text-left">Date of cessation of membership</th>
                      <th class="text-left">Reason of cessation</th>
                      <th class="text-left">Remark</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $row = 1; ?>
                    <?php foreach ($members as $member) { ?>
                    <tr>
                      <td class="text-left"><?= $row; ?></td>
                      <td class="text-left"><?= $member['wing'] . ' ' . $member['flat_no'] ?></td>
                      <td class="text-left"></td>
                      <td class="text-left"></td>
                      <td class="text-left"><?= $member['name']?></td>
                      <td class="text-left"><?= $society['address'] ?></td>
                      <td class="text-left"></td>
                      <td class="text-left"></td>
                      <td class="text-left"></td>
                      <td class="text-left"></td>
                      <td class="text-left"></td>
                      <td class="text-left"></td>
                      <td class="text-left"></td>
                    </tr>
                    <?php $row++;
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
    scrollY: false,
    scrollX: true,
  });
});
</script>