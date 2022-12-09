<?php
defined('BASEPATH') or exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
//sachhidanand -25-11-2021
if (!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else {
  $message['status'] = '';
  $message['text'] = '';
}
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
        <div class="breadcrumb-item">View Security Guard</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">View Security Guard</h2>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Security Guard List</h4>
            </div>
            <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner') : ?>
            <div class="col-sm-12">
              <a href="<?php echo base_url(); ?>societies/add_security_guard/<?php echo $society_id; ?>"
                class="btn btn-icon btn-primary float-right mb-3"><i class="far fa-edit"></i>Add Security Guard</a>
            </div>
            <?php endif; ?>
            <div class="card-body p-0 border">
              <div class="table-responsive">
                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                  <thead>
                  <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <thead>
                  <?php if(!empty($security_guards)){foreach ($security_guards as $security_guard) { ?>
                  <tr id="<?= $security_guard['id'] ?>">
                    <td class="text-center"><?= $security_guard['name'] ?></td>
                    <td class="text-center"><?= $security_guard['email'] ?></td>
                    <td class="text-center"><?= $security_guard['mobile'] ?></td>
                    <td class="text-center"><a
                        href="<?php echo base_url(); ?>societies/edit_security_guard/<?php echo $security_guard['id']; ?>/<?php echo $society_id; ?>"
                        class="btn btn-warning">Edit</a><button class="btn btn-danger remove"
                        id="<?php echo $society_id; ?>">Delete</button></td>
                  </tr>
                  <?php }} ?>
                  </thead>
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
  <?php if (isset($message['status'])) : ?>
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
  <?php endif; ?>
});
$(".remove").click(function() {
  var id1 = $(this).parents("tr").attr("id");
  var id2 = '<?php echo $society_id ?>';
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