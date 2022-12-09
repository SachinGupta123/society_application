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

      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

      <div class="section-header-breadcrumb">
              <?php if ($this->ion_auth->is_admin()) : ?>
                <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <?php endif; ?>

              <?php if($this->session->userdata('role') != 'committee_member' ): ?>
                  <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies">Society List</a></div>
              <?php endif;?>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id ?>">Society Dashboard</a></div>

              <div class="breadcrumb-item">View Parking Charges</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Parking Charge</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 border">
            <div class="card-header">
              <h4>Parking Charge List</h4>
            </div>
            <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'committee_member'|| $this->session->userdata('role') == 'CA') : ?>
            <?php if (!$parking_charges) { ?>
            <div class="col-sm-12">

              <a href="<?php echo base_url(); ?>parking_charges/add/<?php echo $society_id; ?>"
                class="btn btn-icon btn-primary float-right mb-3"><i class="far fa-edit"></i>Add Parking Charge</a>

            </div>
            <?php  } ?>
            <?php endif; ?>

            <div class="card-body p-0 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                  <thead>
                    <tr>
                    <th class="text-left">Sr No.</th>
                      <th class="text-left">Member Two Wheeler</th>

                      <th class="text-left">Member Four Wheeler</th>

                      <th class="text-left">Tenant Two Wheeler</th>

                      <th class="text-left">Tenant Four Wheeler</th>

                      <th class="text-left w15">Action</th>

                    </tr>
                  </thead>

                  <tbody>
                  <?php if(!empty($parking_charges)) :
                    $i=0;
                    foreach ($parking_charges as $parking) { ?>
                 
                      
                    <tr id="<?= $parking['id'] ?>">
                    <td class="text-left"><?=++$i ?></td>

                      <td class="text-left"><?= round($parking['member_two_wheeler']) ?></td>

                      <td class="text-left"><?= round($parking['member_four_wheeler']) ?></td>

                      <td class="text-left"><?= round($parking['tenant_two_wheeler']) ?></td>

                      <td class="text-left"><?= round($parking['tenant_four_wheeler']) ?></td>

                      <td class="text-left">
                      <div class="btn-group">
                      <a href="<?php echo base_url(); ?>parking_charges/edit/<?php echo $society_id; ?>/<?php echo $parking['id']; ?>"
                      class="bg-primary p-2 text-white rounded-left" ><i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Edit" ></i></a>
                        <a class=" bg-danger remove  p-2 text-white rounded-right"
                          id="<?php echo $parking['id']; ?>"><i class="fa fas fa-trash-alt"  data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                      </div>

                        <!-- <a href="<?php echo base_url(); ?>parking_charges/edit/<?php echo $society_id; ?>/<?php echo $parking['id']; ?>"
                          class="btn btn-outline-info mr-2 text-dark">Edit</a>
                        <button
                          class="btn btn-outline-danger text-dark remove"
                          id="<?php echo $society_id; ?>">Delete</button> -->
                        
                        </td>

                    </tr>
              
                  <?php } 
                      else :
                      
                  ?>
                    <tr>
                      <td colspan="6" class="text-center text-info font-weight-bold">No data Found</td>
                    </tr>

                        
                    <?php endif;?>
                   
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
          url: '../../parking_charges/delete/' + id1 + '/' + id2,
          type: 'DELETE',
          // error: function() {
          //   swal("Oh Snap!", "Something went Wrong", {
          //     icon: "error",
          //   });
          // },
          success: function(data) {
            if(data==0){
              swal("Poof! Your User has been deleted!", {
                icon: "success",
              });
              location.reload();
            }else if(data==1){
              swal("Oh Snap!", "The parking charge Used in transaction", {
                icon: "error",
              });
            }else if(data==2){
              swal("Oh Snap!", "The parking_charge you are trying to delete does not exist", {
                icon: "error",
              });
            }
            
          }
        });
      } else {
        swal("Your parking charge details is safe!");
      }
    });
});
</script>