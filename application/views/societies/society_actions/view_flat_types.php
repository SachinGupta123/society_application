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

        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id  ?>">Society Dashboard</a></div>

        <div class="breadcrumb-item">Flat Category</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Flat Category</h2>

      <div class="row">

         <?php //if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || ($this->session->userdata('role') == 'CA')) : ?>
          <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || ($this->session->userdata('role') == 'CA')) : ?>
          <div class="col-12">
              <div class=" card p-2">
                <div class="card-body p-3 border">
              
                  <?php //echo form_open_multipart('flat_type/import_flat_type' . '/' .$society_id); ?>

                  <form id="flat_type_import" enctype="multipart/form-data"  accept-charset="utf-8" >
                
                  <div class="card-body">
                    <div class="custom-file">
                      <p style="border:1px dotted #5e5e5e; padding:10px; border-radius:5px"><label>Import Flat Category</label>
                        <input type="file" class=" float-left" name="flat_type_file" id="flat_type_file" required accept=".xls, .xlsx" />
                        <button class="btn btn-primary float-left mr-3" type="submit">Import Flat Category</button>
                      </p>
                      <p>Only CSV format is allowed! <a
                          href="https://support.office.com/en-us/article/save-a-workbook-to-text-format-txt-or-csv-3e9a9d6c-70da-4255-aa28-fcacf1f081e6"
                          class="ml-2 badge badge-primary" target="_blank">Help ?</a>
                        
                        </p>
                    </div>
                  </div>
                  
                  <?php //echo form_close(); ?>
                  </form>
                  <div class="card-footer ">
                    <div class="me-3">Download sample format file by clicking link below.</div>
                  
                    <!-- <a href="<?php echo base_url(); ?>assets/uploads/flat_bill.csv"
                      class="btn btn-info text-white downloadCSV">Download
                      CSV</a> -->
                      <a href="<?php echo base_url("flat_type/exportCSV/").$society_id; ?>"
                      class="btn btn-info text-white downloadCSV">Download
                      CSV</a>
                  </div>
                
                </div>
              </div>
          </div>
       <?php endif; ?>
                
        <div class="col-12">

          <div class="card shadow-sm p-2">

            <div class="card-header">

              <h4>Flat Category List</h4>

            </div>

            <div class="col-">

              <a href="<?php echo base_url(); ?>flat_types/add/<?php echo $society_id; ?>" class="btn btn-icon btn-primary float-right mb-3"><i class="far fa-edit"></i>Add Flat Category</a>

            </div>

            <div class="card-body p-3  border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                  <thead>

                    <tr>

                      <th class="text-left">Sr No.</th>

                      <th class="text-left">Name</th>

                      <th class="text-left w-25">Action</th>

                    </tr>

                  </thead>
                 
                  <tbody>
                  <?php $row = 1; ?>
                  <?php foreach ($flat_types as $flat_type) { ?>
                    <tr>

                      <td class="text-left"><?= $row ?></td>

                      <td class="text-left"><?= $flat_type['name'] ?></td>

                      <td class="text-left">
                        <div class="btn-group">
                            <a href="<?php echo base_url(); ?>flat_types/edit/<?php echo $society_id; ?>/<?php echo $flat_type['id']; ?>"class="bg-primary p-2 text-white rounded-left" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?php echo base_url(); ?>billing_head/view/<?php echo $society_id; ?>/<?php echo $flat_type['id']; ?>" class="bg-info p-2 text-white rounded-right" data-toggle="tooltip" data-placement="top" title="Details"><i class="fa fa-eye"></i></a> 
                        </div>

                        <!-- <a href="<?php echo base_url(); ?>flat_types/edit/<?php echo $society_id; ?>/<?php echo $flat_type['id']; ?>"
                          class="btn btn-primary mr-3">Edit
                        </a>
                        <a href="<?php echo base_url(); ?>billing_head/view/<?php echo $society_id; ?>/<?php echo $flat_type['id']; ?>"
                          class="btn btn-primary">Details
                        </a> -->

                        </td>

                    </tr>
                    <?php $row++; } ?>
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

    // data table
    $('#table-1').DataTable({
      "paging": true,
    });

    $("#flat_type_import").submit(function(event){
            event.preventDefault();           
            var form_data = new FormData();
            var flat_type_file = $("#flat_type_file").prop("files")[0];
            form_data.append("flat_type_file", flat_type_file);
            document.getElementById('popup1').style.display ='block';
            document.getElementById('loaderdiv').classList.add("divSHow"); 
            $.ajax({
                url: '<?php echo base_url("flat_type/import_flat_type/").$society_id; ?>',
                type:'POST',
                data:form_data,
                contentType: false,
                cache: false,
                processData: false,
                // dataType:"json",	
                success:function(result){                 
                  result.replace(/\s/g, '');
                  console.log(result);
                  if(result!="" ){                    
                    window.location.reload();
                  }
                  
                }

            });
    });


});
</script>