<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_msoc');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Enrollment Requests</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <div class="breadcrumb-item">Enrollment Requests</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">View Enrollment Requests</h2>
            <div class="row">
              <div class="col-12">
                <div class="card p-2 shadow-sm">
                  <div class="card-header">
                    <h4>Enrollment Requests</h4>
                  </div>
                  <div class="card-body p-3 border">
                    <div class="table-responsive">
                      <table class="col-md-12 zi-table table table-hover table-condensed cf table-sm" id="table_enroll">
                        <thead>                                 
                          <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Society Name</th>
                            <th class="text-center">Society Address</th>
                            <th class="text-center">CA Firm Name</th>
                            <th class="text-center">CA Member Number</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Joining Span</th>
                            <th class="text-center">No of Units</th>
                            <th class="text-center">Reference</th>
                            <th class="text-center">subscription Plan</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                            <?php foreach($enrolment_requests as $request): ?>
                          <tr>
                           <td class="text-center"><?php echo $request['id']; ?></td>
                           <td class="text-center"><?php echo date('d-m-Y', strtotime($request['created_at'])); ; ?></td>
                            <td class="text-center"><?php echo $request['name']; ?></td>
                            <td class="text-center"><?php echo $request['email']; ?></td>
                            <td class="text-center"><?php echo $request['phone']; ?></td>
                            <td class="text-center"><?php echo $request['role']; ?></td>
                            <td class="text-center"><?php echo $request['society_name']; ?></td>
                            <td class="text-center"><?php echo $request['society_address']; ?></td>
                            <td class="text-center"><?php echo $request['ca_firm_name']; ?></td>
                            <td class="text-center"><?php echo $request['ca_member_number']; ?></td>
                            <td class="text-center"><?php echo $request['city']; ?></td>
                            <td class="text-center"><?php echo $request['span']; ?></td>
                            <td class="text-center"><?php echo $request['no_of_units']; ?></td>
                            <td class="text-center"><?php echo $request['reference']; ?></td>
                            <td class="text-center"><?php if(!empty($request['operation_mode'])) echo $request['operation_mode']; ?></td>
                            <!-- <td class="text-center"><a href="<?php //echo base_url(); ?>enrolment_requests/details" class="btn btn-info">Details</a></td> -->
                          </tr>
                          <?php endforeach; ?>
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
    $('#table_enroll').DataTable({
      dom:'Bfrtip',
      "order": [[ 0, "desc" ]],
      paging: true,//changes false to true-sachhidanand
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
  });

</script>