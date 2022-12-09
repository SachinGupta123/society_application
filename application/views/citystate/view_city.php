<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//add this line print session message 09-10-2021 sachhidanand

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
            <h1>City</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <div class="breadcrumb-item">City</div>
              <!-- <div class="breadcrumb-item">View services Categories</div> -->
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">View City</h2>


            
            
            <div class="row">
              <div class="col-12">
                <div class="card p-2 shadow-sm">
                  <div class="card-header justify-content-between">
                    <h4 class="textColor">View City</h4>
                    <a href="<?php echo base_url(); ?>cityState/add_city" class="btn  btn-primary borderRadiusnone"><i class="far fa-edit mr-2"></i>Add City</a>
                  </div>
                  <div class="card-body p-3 border">
                    <div class="table-responsive">
                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                      <thead>
                          <tr>
                            <th class="text-left">Sr No.</th>
                            <th class="text-left">City</th>
                            <th class="text-left">State</th>
                            <th class="text-left w15">Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $i=1;foreach($cities as $city) {   ?>
                          <tr id="<?= $city['city_id']?>">
                            <td class="text-left"><?= $i ?></td>
                            <td class="text-left"><?= $city['city_name']?></td>
                            <td class="text-left"><?= $city['name']?></td>
                            <td class="text-left">
                              <div class="btn-group">
                              <a href="<?php echo base_url(); ?>cityState/edit_city/<?php echo $city['city_id'] ?>" class="bg-primary p-2 text-white rounded-left"><i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Edit" ></i></a>
                            <a class="bg-danger remove  p-2 text-white rounded-right"><i class="fa fas fa-trash-alt"  data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                              </div>
                              

                            <!-- <a href="<?php echo base_url(); ?>cityState/edit_city/<?php echo $city['city_id'] ?>" class="btn btn-outline-info mr-3">Edit</a>
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
  //add for message show 09-10-2021 sachhidanand
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

    
      $("#table-1").dataTable({
        "columnDefs": [
          { "sortable": false, "targets": [1,2] }
        ]
      });

  // change for delete function work on next page go in datatable  sachhidanand 09-10-2021
  $(document).on('click', '.remove', function(){
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
         url: '<?php echo base_url(); ?>cityState/remove_city/'+id,
         type: 'PUT',
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
        swal("Your City details is safe!");
      }
    });
  });
</script>