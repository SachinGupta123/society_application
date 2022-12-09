<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_msoc');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Utility Service Provider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <div class="breadcrumb-item">View Utility Service Provider</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">View Utility Service Provider</h2>

            <div class="row">
              <div class="card-body">
                <div class="col-2">
                  <a href="<?php echo base_url(); ?>utility_service_provider/add" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add New Service Provider</a>
                </div>
              </div>
            </div>

            
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Utility Service Provider</h4>
                  </div>
                  <!-- <div class="col-2">
                    <a href="<?php echo base_url(); ?>dist/add_society" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Society</a>
                  </div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                          <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Business Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Phone No.</th>
                            <th class="text-center">Owner Name</th>
                            <th class="text-center">License No.</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">ServiceTax Unit</th>
                            <th class="text-center">Provider Type</th>
                            <th class="text-center">Action</th>
                          </tr>
                          <?php foreach($utility_service_providers as $usp) {?>
                          <tr id="<?= $usp['id']?>">
                            <td class="text-center"><?= $usp['id']?></td>
                            <td class="text-center"><?= $usp['business_name']?></td>
                            <td class="text-center"><?= $usp['address']?></td>
                            <td class="text-center"><?= $usp['phone_no']?></td>
                            <td class="text-center"><?= $usp['owner_name']?></td>
                            <td class="text-center"><?= $usp['license_no']?></td>
                            <td class="text-center"><?= $usp['email_id']?></td>
                            <td class="text-center"><?= $usp['service_tax_unit']?></td>
                            <td class="text-center"><?= $usp['provider_type']?></td>
                            <td class="text-center"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?php echo $usp['id'] ?>" class="btn btn-info">Details</a><a href="<?php echo base_url(); ?>utility_service_provider/edit/<?php echo $usp['id'] ?>" class="btn btn-warning">Edit</a><button class="btn btn-danger remove">Delete</button></td>
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
         url: 'utilityProvider/remove/'+id,
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