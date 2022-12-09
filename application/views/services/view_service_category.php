<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// echo "<pre>";print_r($services_categories);die;
$this->load->view('common/header_msoc');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <div class="breadcrumb-item">Services Categories</div>
              <!-- <div class="breadcrumb-item">View services Categories</div> -->
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">View Services Categories</h2>

            <div class="row">
              <div class="card-body">
                <div class="col-2">
                  <a href="<?php echo base_url(); ?>services-categories/add" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add New Category</a>
                </div>
              </div>
            </div>

            
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>services Categories</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                          <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Action</th>
                          </tr>
                          <?php foreach($services_categories as $services_categorie) {   ?>
                          <tr id="<?= $services_categorie['id']?>">
                            <td class="text-center"><?= $services_categorie['id']?></td>
                            <td class="text-center"><?= $services_categorie['service_name']?></td>
                            <td class="text-center"><a href="<?php echo base_url(); ?>services-categories/edit/<?php echo $services_categorie['id'] ?>" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger remove">Delete</button></td>
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
  $(".remove").click(function(){
    var id = $(this).parents("tr").attr("id");
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
         url: 'services_categories/delete/'+id,
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