<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$uplan_id = $this->uri->segment(3);
$usp_id = $this->uri->segment(4);
$this->load->view('common/header_msoc');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Utility Service Providers</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>utility_service_provider/details/<?= $usp_id ?>">Utility Service Provider Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>utility_plan/plans/<?= $usp_id ?>">Utility Plans</a></div>
              <div class="breadcrumb-item">View Billing Heads</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">View Billing Heads</h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Billing Heads List</h4>
                  </div>
                  <div class="col-2">
                    <a href="<?php echo base_url(); ?>utility_billing_head/add/<?php echo $uplan_id; ?>/<?php echo $usp_id; ?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Billing Heads</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <input type="hidden" value="<?= $usp_id ?>" id="usp_id" name="usp_id">
                        <thead>                                 
                          <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Value Type</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($up_billing_heads as $up_bill_head){ ?>                                
                          <tr id="<?= $up_bill_head['id']?>">
                            <td class="text-center"><?= $up_bill_head['id']?></td>
                            <td class="text-center"><?= $up_bill_head['name']?></td>
                            <td class="text-center"><?= $up_bill_head['is_unit_value']?></td>
                            <td class="text-center"><?= $up_bill_head['amount']?></td>
                            <td class="text-center">
                              <div class="btn-group">
                              <a href="<?php echo base_url(); ?>utility_billing_head/edit/<?= $up_bill_head['id']?>/<?= $uplan_id ?>/<?= $usp_id ?>" class="btn btn-info">Edit</a>
                              <button id="<?= $uplan_id ?>" class="btn btn-danger remove">Delete</button>
                              </div>
                             
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
  $(".remove").click(function(){
    var id1 = $(this).parents("tr").attr("id");
    var id2 = $(this).attr("id");
    var id3 = $('#usp_id').val();
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
        //  url: '../../../utility_billing_head/remove/'+id1+'/'+id2+'/'+id3,
         url: '<?php echo base_url(); ?>utility_billing_head/remove/'+id1+'/'+id2+'/'+id3,//sachhidnand-25-11-2021
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