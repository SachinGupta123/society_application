<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$usp_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Utility Service Providers</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_service_provider">Utility Service Provider</a></div>
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Utility Service Provider Dashboard</a></div>
              <div class="breadcrumb-item">View Plan Types</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">View Plan Types</h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Plan Types List</h4>
                  </div>
                  <div class="col-2">
                    <a href="<?php echo base_url(); ?>utility_plan/add/<?= $usp_id ?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Plan Types</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                          <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Action</th>
                          </tr>
                          <?php foreach($utility_plans as $plan) { ?>
                          <tr id="<?= $plan['id']?>">
                            <td class="text-center"><?= $plan['id']?></td>
                            <td class="text-center"><?= $plan['plan_name']?></td>
                            <td class="text-center"><a href="<?php echo base_url(); ?>utility_plan/edit/<?= $plan['id']?>/<?= $usp_id ?>" class="btn btn-warning">Edit</a><a href="<?php echo base_url(); ?>utility_billing_head/view/<?= $plan['id']?>/<?= $usp_id?>" class="btn btn-info">Details</a><button id="<?= $usp_id?>" class="btn btn-danger remove">Delete</button></td>
                          </tr>
                        <?php  }?>
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
         url: '../../utility_plan/remove/'+id1+'/'+id2,
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