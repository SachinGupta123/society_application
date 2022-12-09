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
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <div class="breadcrumb-item">Expense Categories</div>
              <!-- <div class="breadcrumb-item">View Expense Categories</div> -->
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">View Expense Categories</h2>


            
            
            <div class="row">
              <div class="col-12">
                <div class="card shadow-sm p-2">
                  <div class="card-header justify-content-between">
                    <h4 class="textColor">Expense Categories</h4>
                    <a href="<?php echo base_url(); ?>expense_categories/add" class="btn  btn-primary borderRadiusnone"><i class="far fa-edit mr-2"></i>Add New Category</a>
                  </div>
                  <div class="card-body border p-3">
                    <div class="table-responsive">
                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                         <thead>
                          <tr>
                            <th class="text-left">Sr No.</th>
                            <th class="text-left">Name</th>
                            <th class="text-left w15">Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $i=1;foreach($expense_categories as $expense_categorie) {   ?>
                          <tr id="<?= $expense_categorie['id']?>">
                            <td class="text-left"><?= $i// $expense_categorie['id']?></td>
                            <td class="text-left"><?= $expense_categorie['name']?></td>
                            <td class="text-left">
                            <div class="btn-group">
                            <a href="<?php echo base_url(); ?>expense_categories/edit/<?php echo $expense_categorie['id'] ?>" class="bg-primary p-2 text-white rounded-left"><i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Edit" ></i></a>
                              <a class=" bg-danger remove  p-2 text-white rounded-right"><i class="fa fas fa-trash-alt"  data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                            </div>

                              <!-- <a href="<?php echo base_url(); ?>expense_categories/edit/<?php echo $expense_categorie['id'] ?>" class="btn btn-outline-info mr-3">Edit</a>
                              <button class="btn btn-outline-danger remove">Delete</button> -->

                            </td>
                          </tr>
                        <?php $i++;} ?>
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
         url: 'expense_categories/delete/'+id,
         type: 'DELETE',
         error: function() {
          swal("Oh Snap!","Something went Wrong", {
            icon: "error",
          });
         },
         success: function() {
          swal("Poof! Your Expense Categories has been deleted!", {
            icon: "success",
          });
          location.reload();
         }
        });        
      } else {
        swal("Your Expense Categories is safe!");
      }
    });
});
</script>