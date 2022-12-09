<?php
defined('BASEPATH') or exit('No direct script access allowed');
// $role = $this->session->userdata('role');
// print_r($role);die;
$message = $this->session->flashdata('message');
$this->load->view('common/header_msoc');
 
?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1 class="brandCaptialW">Societies</h1>

      <div class="section-header-breadcrumb">

        <!-- <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div> -->

        <div class="breadcrumb-item">View Societies</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Societies</h2>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1 border">
            
            <div class="card-wrap">
              <div class="card-header p-2 text-left">
                <h4 class="textColor">Total Societies</h4>
              </div>
              <div class="card-body text-left Tsize26">
                <?php echo $total_society; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1 border">
            <div class="card-wrap">
              <div class="card-header p-2 text-left">
                <h4 class="textColor">Total Flats</h4>
              </div>
              <div class="card-body text-left Tsize26">
                <?= $total_members; ?>
              </div>
            </div>
          </div>
        </div>
        
      </div>

      <div class="row">

        <div class="col-12">
          <div class="card card-primary border col-sm-12">
           

            <?php if ($this->ion_auth->is_admin() ||  $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
              <form id="society_csv" enctype="multipart/form-data"  accept-charset="utf-8" >
                <?php // echo form_open_multipart('societies/import_societies'); ?>
                <div class="card-body d-flex justify-content-between viewSociety">
                  <div class="custom-file ">
                    <div><label>Import Societies</label>
                      <input type="file" name="society_file" id="society_file" required accept=".csv" />
                    </div>
                    <div>Only CSV format is allowed! <a
                        href="https://support.office.com/en-us/article/save-a-workbook-to-text-format-txt-or-csv-3e9a9d6c-70da-4255-aa28-fcacf1f081e6" class="ml-2" target="_blank">Help ?</a>
                    </div>
                  </div>
                  <button class="btn btn-primary mb_m20" type="submit">Import Societies</button>
                </div>
                
                <?php //echo form_close(); ?>
          
              </from>
            <?php endif; ?>
           
            <?php if ($this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
            <div class="card-footer d-flex">
              <div class="me-3">Download a sample format file by clicking on the link.</div>
              <a href="<?php echo base_url(); ?>assets/uploads/sample_society.csv"
                class="btn btn-primary text-white downloadCSV">Download
                CSV</a>
            </div>
            <?php endif; ?>
          </div>
        </div>   


        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header justify-content-between">

              <h4 class="textColor">Societies List</h4>

              <?php if ( $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>

              <a href="<?php echo base_url(); ?>societies/add" class="btn  btn-primary borderRadiusnone"><i class="far fa-edit"></i>Add Society</a>

              <?php endif; ?>
            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm society_table" id="table-1">
                  <thead>
                    <tr>

                      <th width="35" class="text-left">Id</th>

                      <th class="text-left">Societies</th>

                      <th class="text-left">Registration No.</th>

                      <th class="text-left">No. of Flats</th>

                      <th class="text-left">Opening Balance</th>
                      <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
                      <th class="text-left" style="width: 150px;">Action</th>
                      <?php endif; ?>
                    </tr>
                  </thead>

                  <tbody>
                  <?php $row = 1; 
                   if(!empty($societies)):
                    foreach ($societies as $society) { ?>
                  <tr>

                    <td class="text-left"><?= $row ?></td>
                    <td class="text-left"><?= $society['name'] ?></td>
                    <td class="text-left"><?= $society['registration_no'] ?></td>
                    <td class="text-left"><?= $society['no_of_flats'] ?></td>
                    <td class="text-left "><?= $society['opening_balance'] ?></td>
                    <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
                    <td class="text-left">
                      <div class="btn-group">
                      <a href="<?php echo base_url(); ?>societies/details/<?php echo $society['id'] ?>" class="bg-info p-2 text-white rounded-left" title="<?= 'Dashboard '.$society['name'] ?>"> <i class="fas fa-eye fa-fw"></i></a>
                        
                      <a href="<?php echo base_url(); ?>societies/edit/<?php echo $society['id'] ?>" class="bg-primary p-2 text-white "  title=" Edit <?= $society['name'] ?>">
                        <i class="fas fa-pen fa-fw"></i>
                      </a>
                      <?php if ($this->ion_auth->is_admin()) : ?>
                      <a  class=" bg-danger remove  p-2 text-white rounded-right" id="<?php echo $society['id'] ?>"  title=" Delete <?= $society['name'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <?php endif; ?>
                      </div>
                      
                     
                    </td>
                 
                    <?php endif; ?>

                  </tr>
                  <?php $row++;
                  } 
                  endif;?>
                   </tbody>
                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="container text-center " id="loaderdiv"><img src="<?php echo base_url(); ?>assets/img/Loading.gif" alt="" class="loader-img"> </div><div class="popup" id="popup1"></div>

  </section>

</div>

<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
$(document).ready(function() {
    var message = '<?php if (isset($message['status']) && !empty($message['status'])) echo $message['status'];
                      else echo ''; ?>';
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

    $('.society_table').dataTable({
      scrollY:false,
      scrollX:true,
      "autoWidth": false,
    }); 
  
    // $(".remove").click(function() {
        // var id = $(this).attr("id");
     
      // swal({
      //     title: "Are you sure?",
      //     text: "Once deleted, you will not be able to recover this society!",
      //     icon: "warning",
      //     buttons: true,
      //     dangerMode: true,
      // })
      //   .then((willDelete) => {
      //     if (willDelete) {
      //       $.ajax({
      //         url: '../../societies/delete/' + id,
      //         type: 'DELETE',
      //         error: function() {
      //           swal("Oh Snap!", "Something went Wrong", {
      //             icon: "error",
      //           });
      //           console.log();
      //         },
      //         success: function() {
      //           swal("Poof! Your User has been deleted!", {
      //             icon: "success",
      //           });
      //           window.location.replace("../../societies");
      //         }
      //       });
      //     } else {
      //       swal("Your Society is safe!");
      //     }
      //   });
    // });


    $("#society_csv").submit(function(event){
            event.preventDefault();           
            var form_data = new FormData();
            var flat_type_file = $("#society_file").prop("files")[0];
            form_data.append("society_file", flat_type_file);
            document.getElementById('popup1').style.display ='block';
            document.getElementById('loaderdiv').classList.add("divSHow"); 
            $.ajax({
                    url: '<?php echo base_url(); ?>societies/import_societies',
                    type:'POST',
                    data:form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(result){
                      window.location.reload();
                    }

            });
    });

});

$(".remove").on("click", function (event) {
  var id = $(this).attr("id");     
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this society!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: '<?php echo base_url("societies/delete/")?>' + id,
              type: 'DELETE',
              error: function() {
                swal("Oh Snap!", "Something went Wrong", {
                  icon: "error",
                });
               
              },
              success: function(data) {
                
                if(data==1){
                  swal("Poof! Your Society has been deleted!", {
                    icon: "success",
                  }).then(function() {
                      window.location = "societies";
                  });
                }else{
                  swal("Poof! Your Society has been not deleted!", {
                    icon: "error",
                  }).then(function() {
                      window.location = "societies";
                  });
                }              
                
              }
            });
          } else {
            swal("Your Society is safe!");
          }
        });
  
});




</script>
