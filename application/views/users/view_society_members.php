<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//sachhidanand -25-11-2021
if(!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else{
  $message['status']='';
  $message['text']='';
}
$error_count = '';
if(isset($message['status']) && $message['status'] == "Fail")
{
  $error_count = $this->session->flashdata('error_count');
}
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
                <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?php echo $society_id ?>">Society Dashboard</a></div>
                <div class="breadcrumb-item">Society Members</div>
            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">View Users</h2>

            <div class="row">

              <div class="card-body">

                <div class="col-2">

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-12">

                <div class="card shadow-sm p-2">

                  <div class="card-header">

                    <h4>Society Members</h4>

                  </div>

                  <div class="card-body p-3 border">

                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                        <thead>                                 

                          <tr>

                            <!-- <th class="text-left">Id</th> -->

                            <th class="text-left">Wing</th>
                            <th class="text-left">Flat No.</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Action</th>

                          </tr>

                        </thead>

                        <tbody>                             
                          <?php foreach($members as $member) { ?>
                            <tr id="<?= $member['user_id']?>">
                              <!-- <td class="text-left"></td> -->
                              <td class="text-left"><?= $member['wing'] ?></td>
                              <td class="text-left"><?= $member['flat_no'] ?></td>
                              <td class="text-left"><?php if($member['first_name']!='') echo $member['first_name'].' '.$member['last_name'];else echo $member['name']  ?></td>
                             
                              <td class="text-left">
                                <div class="btn-group">
                                  <?php if ($this->ion_auth->is_admin() || $this->session->userdata('role') == 'CA') {
                                  ?>
                                    <?php if($member['user_id']>0){ ?>
                                      <a href="<?php echo base_url(); ?>users/edit/<?php echo $society_id ?>/<?php echo $member['user_id'] ?>" class="bg-primary p-2 text-white rounded-left">Edit</a>
                                    <?php }else{ ?>

                                      <a href="<?php echo base_url("society_users/edit/").$society_id."/".$member['id'] ?>" class="bg-primary p-2 text-white rounded-left">Assign Role</a>
                                        
                                    <?php } ?>
                                   
                                  <?php } ?>
                                  <?php if ($this->ion_auth->is_admin()) { ?>
                                  <a class="bg-danger remove  p-2 text-white rounded-right"><i class="fa fas fa-trash-alt"  data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                  <?php } ?> 
                                </div>
                              

                                <!-- <a href="<?php //echo base_url(); ?>users/edit/<?php //echo $society_id ?>/<?php // echo $member['user_id'] ?>" class="btn btn-outline-primary mr-2"><i class="far fa-edit mr-2"></i>Edit</a>
                                <?php //if ($this->ion_auth->is_admin()) { ?>
                                <button class="btn btn-outline-danger remove"><i class="far fa-trash-alt mr-2"></i>Delete</button>
                                <?php //} ?> -->


                              </td>
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
var message = '<?php echo $message['status'] ?>';
var error_count = '<?php echo $error_count ?>';
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
    message: '<?php echo $message['text'];?>',
    position: 'topRight'
  });
}

$('#table-1').DataTable({
    "paging": true,
   
    
  });

});
  $(".remove").click(function(){
    var id = $(this).parents("tr").attr("id");

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Society Members file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
         url: 'users/remove/'+id,
         type: 'DELETE',
         error: function() {
          swal("Oh Snap!","Something went Wrong", {
            icon: "error",
          });
         },
         success: function() {
          swal("Poof! Your Society Members has been deleted!", {
            icon: "success",
          });
          location.reload();
         }
        });        
      } else {
        swal("Your Society Members Details is safe!");
      }
    });
});
</script>