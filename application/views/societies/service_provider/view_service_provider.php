<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
//sachhidanand -25-11-2021
if(!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else{
  $message['status']='';
  $message['text']='';
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

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item">View Service Providers</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">View Service Providers</h2>

            <div class="row">

              <div class="col-12">

                <div class="card shadow-sm p-2">

                  <div class="card-header">

                    <h4>Service Providers List</h4>

                  </div>

                  <div class="col-sm-12">

                    <a href="<?php echo base_url(); ?>service_providers/add/<?php echo $society_id; ?>" class="btn btn-icon btn-primary float-right mb-3"><i class="far fa-edit"></i>Add Service Provider</a>

                  </div>

                  <div class="card-body border p-3">

                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm society_table dataTable no-footer" id="table-1">
                        <thead>
                          <tr>

                            <th class="text-center">Id</th>

                            <th class="text-center">Name</th>

                            <th class="text-center">Address</th>

                            <th class="text-center">Contact No.</th>

                            <th class="text-center">Email</th>

                            <th class="text-center">SP Type</th>

                            <th class="text-center ">Action</th>

                          </tr>
                          </thead>
                          <?php $row = 1; ?>
                        <?php foreach($service_providers as $service) {?>

                          <tbody>
                          <tr id="<?= $service['id'] ?>">

                            <td class="text-center"><?= $row ?></td>

                            <td class="text-center"><?= $service['name'] ?></td>

                            <td class="text-center"><?= $service['address'] ?></td>

                            <td class="text-center"><?= $service['contact_no'] ?></td>

                            <td class="text-center"><?= $service['email'] ?></td>

                            <td class="text-center"><?= $service['sp_type'] ?></td>


                            <td class="text-center">
                          <div class="btn-group">
                            <a href="<?php echo base_url(); ?>service_providers/edit/<?php echo $society_id ?>/<?php echo $service['id'] ?>" class="bg-primary p-2 text-white rounded-left"><i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Edit" ></i></a>
                            <a class="bg-danger remove  p-2 text-white rounded-right" id="<?php echo $society_id ?>"><i class="fa fas fa-trash-alt"  data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                            </div>
                            <!-- <a href="<?php echo base_url(); ?>service_providers/edit/<?php echo $society_id ?>/<?php echo $service['id'] ?>" class="btn btn-outline-info mr-3">Edit</a>
                            <button class="btn btn-outline-danger remove" id="<?php echo $society_id ?>">Delete</button> -->
                          
                          </td>


                          </tr>
                          </tbody>
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
  $(".remove").click(function(){
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
         url: '../../service_providers/delete/'+id1+'/'+id2,
         type: 'DELETE',
         error: function() {
          swal("Oh Snap!","Something went Wrong", {
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