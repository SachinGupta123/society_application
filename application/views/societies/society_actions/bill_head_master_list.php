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

      <h1>Societies</h1>

      <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <!-- <div class="breadcrumb-item"><a href="<?php //echo base_url(); ?>flat_types/view/<? //=$society_id  ?>">Flat Types</a></div> -->

              <div class="breadcrumb-item">View Billing Heads</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Bill Heads</h2>
      <div class="row">
        <div class="col-12">
          <div class="card p-2 shadow-sm">
            <div class="card-header justify-content-between">
              <h4 class="textColor">Bill Heads</h4>
              <a href="<?php echo base_url('bill_head_master/add'); ?>"
                          class="btn  btn-primary borderRadiusnone"> <i class="far fa-edit mr-2"></i>Create Bill Heads</a>
            </div>   
            
            
                  <div class="card-body p-3 border">
                      <div class="table-responsive">
                        <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="billHeads">
                          <thead>
                            <tr>

                              <th class="text-left">Sr No.</th>

                              <th class="text-left">Name</th>

                              <th class="text-left w15">Action</th>

                            </tr>
                          </thead>
                         
                          <tbody>
                          <?php $row = 1; ?>
                          <?php foreach ($bill_head_list as $billing_head) { ?>

                          <tr id="<?= $billing_head['bill_head_id'] ?>">

                            <td class="text-left"><?= $row ?></td>

                            <td class="text-left"><?= $billing_head['bill_head_name'] ?></td>                           

                            <td class="text-left">
                              <div class="btn-group">

                               <?php if( $billing_head['created_by']==$this->session->userdata("user_id") || ($this->session->userdata("user_id")=="1") ){ ?>

                                <a href="<?php echo base_url(); ?>bill_head_master/edit/<?php echo $billing_head['bill_head_id']; ?>"
                                class="bg-info p-2 text-white rounded-left"><i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Edit" ></i></a>
                                <?php }
                                  if($this->session->userdata("user_id")=="1"){
                                ?>
                                <a class="bg-danger remove  p-2 text-white rounded-right" data-toggle="tooltip" id="<?= $billing_head['bill_head_id'] ?>" data-placement="top" title="" data-original-title="<?= $billing_head['bill_head_name'] ?>"> <i class="fas fa-trash fa-fw"></i></a>
                               <?php } ?>
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


  $('#billHeads').dataTable({
    paging: true,
      "searching": true,
      // pageLength: 20
      //Get a reference to the new datatable

  });   



});
$('#table-1').dataTable();  
$(".remove").click(function() {
  var id1 = $(this).parents("tr").attr("id");
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
          url: '<?= base_url() . 'billing_head/delete_master_bill_head/' ?>' + id1,
          type: 'DELETE',
          // error: function() {
          //   swal("Oh Snap!", "Something went Wrong", {
          //     icon: "error",
          //   });
          // },
          success: function(data) {
            console.log(data);
            if(data==1){
              swal("Poof! Bill Head has been deleted!", {
                icon: "success",
              });
              location.reload();
            }else{
              swal("Oh Snap!", "Bill Head use in Society", {
                icon: "error",
              });
              location.reload();
            }
           
          }
        });
      } else {
        swal("Bill Head is safe!");
      }
    });
});
</script>