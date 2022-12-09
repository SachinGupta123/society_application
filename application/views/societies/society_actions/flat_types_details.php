<?php

defined('BASEPATH') or exit('No direct script access allowed');
//sachhidanand -25-11-2021
if (!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else {
  $message['status'] = '';
  $message['text'] = '';
}
$society_id = $this->uri->segment(3);
$flat_type_id = $this->uri->segment(4);
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
          <div class="breadcrumb-item"><a href="<?php echo base_url("societies/details/").$society_id; ?>">Society Dashboard</a></div>          
          <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>flat_types/view/<?=$society_id ?>">Flat Category</a></div>
          <div class="breadcrumb-item">View Billing Heads</div>
      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View <?php echo $flat_details['name']?> Bill Heads</h2>
      <div class="row">
        <div class="col-12">
          <div class="card p-2 shadow-sm">
            <div class="card-header">
              <h4>Billing Heads</h4>
            </div>

            <!-- <div class="col-2">

                    <a href="<?php echo base_url(); ?>societies/add_flat_types" class="btn btn-icon btn-primary"><i class="far fa-edit"></i>Add Flat Types</a>

                  </div> -->

                  <div class="form-group row mb-4">
                      <div class="col-sm-12 col-md-12 ">
                        <a href="<?php echo base_url(); ?>billing_head/add/<?php echo $society_id; ?>/<?php echo $flat_type_id; ?>"
                          class="btn btn-primary float-right"> <i class="far fa-edit mr-1"></i> Create Billing Heads</a>

                      </div>
                    </div>

                    <div class="card-body p-3 border">
                      <div class="table-responsive">
                        <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                          <thead>
                            <tr>

                              <th class="text-left">Sr No.</th>

                              <th class="text-left">Name</th>

                              <th class="text-left">Value Type</th>

                              <th class="text-left">Amount</th>

                              <th class="text-left w10">Action</th>

                            </tr>
                          </thead>
                         
                          <tbody>
                          <?php $row = 1; ?>
                          <?php foreach ($billing_heads as $billing_head) { ?>

                          <tr id="<?= $billing_head['id'] ?>">

                            <td class="text-left"><?= $row ?></td>

                            <td class="text-left"><?= $billing_head['name'] ?></td>

                            <td class="text-left">
                              <?php if($billing_head['is_unit_value']=="1"){
                                 echo "Per sqft";
                              }else{
                                echo "Standard";
                              }  
                              ?>
                            </td>

                            <td class="text-right font-weight-bold"><?= $billing_head['amount'] ?></td>

                            <td class="text-left">
                            <div class="btn-group">
                            <a href="<?php echo base_url(); ?>billing_head/edit/<?php echo $society_id; ?>/<?php echo $flat_type_id; ?>/<?php echo $billing_head['id']; ?>"
                                class="bg-info p-2 text-white rounded-left" >
                                <i class="fas fa-pen fa-fw" data-toggle="tooltip" data-placement="top" title="<?= $billing_head['name'] ?>"></i>
                              </a>
                              <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin()) : ?>
                              <a class="bg-danger remove  p-2 text-white rounded-right" id="<?php echo $billing_head['id']; ?>" >
                              <i class="fas fa-trash fa-fw" data-toggle="tooltip" data-placement="top" title="<?= $billing_head['name'] ?>"></i>
                            </a>
                              <?php endif; ?>
                            </div>  
                          
                            </td>

                          </tr>
                          <?php $row++;
                          } ?>
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
$("#table-1").dataTable({
        "columnDefs": [
          { "sortable": false }
        ]
      });
$(".remove").click(function() {
  var id1 = $(this).parents("tr").attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this bill head details!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '<?= base_url() . 'billing_head/remove/' ?>' + id1,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
          },
          success: function() {
            swal("BillHead Details has been deleted!", {
              icon: "success",
            });
            location.reload();
          }
        });
      } else {
        swal("BillHead Details is safe!");
      }
    });
});
</script>