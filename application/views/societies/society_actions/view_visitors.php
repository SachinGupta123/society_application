<?php

defined('BASEPATH') or exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$message = $this->session->flashdata('message');
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1>Societies</h1>

      <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url();   ?>societies">Societies</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url();   ?>societies/details/<?=$society_id  ?>">Society Dashboard</a></div>

              <div class="breadcrumb-item">View Visitors</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Visitors</h2>

      <div class="row">

        <div class="col-12">

          <div class="card">

            <div class="card-header">

              <h4>Visitors List</h4>

            </div>
            <!-- <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner') : ?>
                    <div class="col-2">

                      <a href="<?php echo base_url(); ?>societies/add_security_guard/<?php echo $society_id; ?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Security Guard</a>

                    </div>
                  <?php endif; ?> -->

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-striped" id="table-1">

                  <tr>

                    <th class="text-center">Visitor Name</th>

                    <th class="text-center">Visitor Phone</th>

                    <th class="text-center">Visitor Email</th>

                    <th class="text-center">Visit Purpose</th>

                    <th class="text-center">In Time</th>

                    <th class="text-center">Out Time</th>

                    <th class="text-center">Wing/Flat No.</th>

                  </tr>


                  <?php foreach ($visitors as $visitor) { ?>
                  <tr id="<?= $visitor['visitor_id'] ?>">

                    <td class="text-center"><?= $visitor['name'] ?></td>

                    <td class="text-center"><?= $visitor['phone_no'] ?></td>

                    <td class="text-center"><?= $visitor['email'] ?></td>

                    <td class="text-center"><?= $visitor['purpose'] ?></td>

                    <td class="text-center"><?= date('m/d/Y h:i:s', $visitor['dnt_in']) ?></td>

                    <td class="text-center"><?= date('m/d/Y h:i:s', $visitor['dnt_out']) ?></td>
                    <?php
                      $CI = &get_instance();
                      $CI->load->model('Member_model');
                      $member = $CI->Member_model->get_member_by_user_id($visitor['entity_id']);
                      ?>
                    <td class="text-center"><?= $member[0]->wing ?>/<?= $member[0]->flat_no ?></td>

                  </tr>
                  <?php } ?>

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
  if (message == 'Success') {
    iziToast.success({
      title: message,
      message: '<?php echo $message['text'] ?>',
      position: 'topRight'
    });
  } else if (message == 'Fail') {
    iziToast.error({
      title: message,
      message: '<?php echo $message['text'] ?>',
      position: 'topRight'
    });
  }
});
$(".remove").click(function() {
  var id1 = $(this).parents("tr").attr("id");
  var id2 = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../societies/delete_guard/' + id1 + '/' + id2,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
          },
          success: function() {
            swal("Poof! Your User has been deleted!", {
              icon: "success",
            });
            location.reload();
          }
        });
      } else {
        swal("Your User is safe!");
      }
    });
});
</script>