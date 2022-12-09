<?php

defined('BASEPATH') OR exit('No direct script access allowed');
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

            <h1>Roles</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

             
              <div class="breadcrumb-item">View Roles</div>

            </div>

          </div>



          <div class="section-body">

            <h2 class="section-title">View Roles</h2>






            <div class="row">

              <div class="col-12">

                <div class="card p-2 shadow-sm">

                  <div class="card-header justify-content-between">

                    <h4 class="textColor">Roles</h4>
                    <a href="<?php echo base_url(); ?>roles/add" class="btn  btn-primary borderRadiusnone"><i class="far fa-edit mr-2"></i>Add Roles</a>

                  </div>

                  <!-- <div class="col-2">

                    <a href="<?php echo base_url(); ?>dist/add_society" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Society</a>

                  </div> -->

                  <div class="card-body p-3 border">

                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                        <thead>
                          <tr>

                            <!-- <th class="text-center">Id</th> -->
                            <th class="text-center">Sr No.</th>
                            <th class="text-center">Role Name</th>

                            <th class="text-center">Description</th>

                            <th class="text-center w15">Action</th>

                          </tr>
                         </thead>
                          <tbody>
                          <?php $i=1;foreach ($roles as $role) { ?>

                          <tr id="<?= $role['id']?>">

                            <!-- <td class="text-center"><? //= $role['id']?></td> -->
                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center"> <?= $role['name']?> </td>

                            <td class="text-center"> <?= $role['slug']?> </td>

                            <td class="text-center">
                            <div class="btn-group">
                            <a href="<?php echo base_url(); ?>roles/edit/<?php echo $role['id'] ?>" class="bg-primary p-2 text-white rounded-left"><i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Edit" ></i></a>
                              <a class="bg-danger remove  p-2 text-white rounded-right"><i class="fa fas fa-trash-alt"  data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                            </div>

                              <!-- <a href="<?php echo base_url(); ?>roles/edit/<?php echo $role['id'] ?>" class="btn btn-outline-info mr-3">Edit</a>
                              <button class="btn btn-outline-danger remove">Delete</button> -->
                            
                            </td>

                          </tr>
                          <?php $i++ ;} ?>
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
    var message = '<?php if (isset($message['status']) && !empty($message['status'])) echo $message['status']; else echo ''; ?>';
    if (message == 'Success') {
      iziToast.success({
        title: message,
        message: '<?php if (isset($message['status']) && !empty($message['status'])) echo $message['text'] ?>',
        position: 'topRight'
      });
    } else if (message == 'Fail') {
      iziToast.error({
        title: message,
        message: '<?php if (isset($message['status']) && !empty($message['status'])) echo $message['text'] ?>',
        position: 'topRight'
      });
    }
    
    $('#table-1').dataTable({})
  })

  $(".remove").click(function(){
    var id = $(this).parents("tr").attr("id");
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this role!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
         url: 'roles/delete/'+id,
         type: 'DELETE',
         error: function() {
          swal("Oh Snap!","Something went Wrong", {
            icon: "error",
          });
         },
         success: function() {
          swal("Poof! Your Role has been deleted!", {
            icon: "success",
          });
          location.reload();
         }
        });        
      } else {
        swal("Your Role is safe!");
      }
    });
});
</script>