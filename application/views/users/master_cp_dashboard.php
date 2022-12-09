<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $role = $this->session->userdata('role');
// print_r($role);die;
$message = $this->session->flashdata('message');
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Statistics</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item">Dashboard</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Dashboard</h2>
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-hotel"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Channel Partners</h4>
                  </div>
                  <div class="card-body">
                    <?= count($channel_partners) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-building"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Societies</h4>
                  </div>
                  <div class="card-body">
                    <?= count($total_number_of_societies) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Flats</h4>
                  </div>
                  <div class="card-body">
                    <?= count($cp_master_total_flats) ?>
                  </div>
                </div>
              </div>
            </div>
           <!--  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Reports</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Online Users</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>      -->             
          </div>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Societies List</h4>

                  </div>

                  <div class="card-body">

                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">          

                          <tr>

                            <th class="text-center">SR No.</th>

                            <th class="text-center">Name</th>

                            <th class="text-center">Email</th>

                            <th class="text-center">Phone</th>

                            <th class="text-center">No. of Societies</th>

                            <!-- <?php if($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner'): ?>
                              <th class="text-center">Action</th>
                            <?php endif; ?> -->
                          </tr>

                          <?php $row = 1; ?>
                          <?php foreach($channel_partners as $channel_partner)
                            {
                              $total_societies = $this->Society_access_model->get_all_society_accesses_by_user($channel_partner['id']);
                          ?>
                          <tr>

                            <td class="text-center"><?= $row ?></td>

                            <td class="text-center"><?= $channel_partner['first_name'].' '.$channel_partner['last_name'] ?></td>

                            <td class="text-center"><?= $channel_partner['email'] ?></td>

                            <td class="text-center"><?= $channel_partner['phone'] ?></td>

                            <td class="text-center"><?= count($total_societies) ?></td>

                            <!-- <?php if($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner'): ?>
                              <td class="text-center"><a href="<?php echo base_url(); ?>societies/details/<?php echo $society['id'] ?>" class="btn btn-info">Details</a></td>
                            <?php endif; ?> -->

                          </tr>
                        <?php $row++; } ?>

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
var message = '<?php echo $message['status'] ?>';
if(message == 'Success')
{
  iziToast.success({
    title: message,
    message: '<?php echo $message['text'] ?>',
    position: 'topRight'
  });
} else if(message == 'Fail') {
  iziToast.error({
    title: message,
    message: '<?php echo $message['text'] ?>',
    position: 'topRight'
  });
}
});
</script>