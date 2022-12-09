<?php
defined('BASEPATH') or exit('No direct script access allowed');
//sachhidanand -25-11-2021
if (!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else {
  $message['status'] = '';
  $message['text'] = '';
}
$error_count = '';
if ($message['status'] == "Fail") {
  $error_count = $this->session->flashdata('error_count');
}
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>
        <!-- <div class="section-header-breadcrumb">
        <?php  //$this->load->view('common/breadcrumb'); ?>
        </div> -->

      <div class="section-header-breadcrumb">
          <?php if ($this->ion_auth->is_admin()) :?> 
            <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
            <?php endif;?>
            <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div>            
          <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id  ?>">Society
            Dashboard</a></div>
        <div class="breadcrumb-item">Manage Flats</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Manage Flats</h2>
      <div class="row">

        <div class="col-12">
          <div class=" card p-2">
            <div class="card-body p-3 border">
            <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'committee_member' || $this->session->userdata('role') == 'CA') : ?>

              <?php //echo form_open_multipart('societies/import_members' . '/' .$society_id); ?>
              <form id="flat_import" enctype="multipart/form-data"  accept-charset="utf-8" >

              <div class="card-body">
                <div class="custom-file">
                  <p style="border:1px dotted #5e5e5e; padding:10px; border-radius:5px"><label>Import Flats</label>
                    <input type="file" class=" float-left" name="member_file" id="member_file" required accept=".xls, .xlsx" />
                    <button class="btn btn-primary float-left mr-3" type="submit">Import Flats</button>
                  </p>
                  <p>Only CSV format is allowed! <a
                      href="https://support.office.com/en-us/article/save-a-workbook-to-text-format-txt-or-csv-3e9a9d6c-70da-4255-aa28-fcacf1f081e6"
                      class="ml-2 badge badge-primary" target="_blank">Help ?</a>
                    
                    </p>
                </div>
              </div>
              <div class="card-footer">
                <p>Download sample format file by clicking link below.</p>
                <button class="btn btn-info" style="display: none;">Download XLS</button>
                <a href="<?php echo base_url(); ?>member/exportCSV" class="btn btn-info">Download CSV</a>

                <!-- delete all flat functionality hide -->
                <?php //if ($this->ion_auth->is_admin()) : ?>
                <!-- <button class="btn btn-lg btn-danger delete" id="<?php //echo $society_id; ?>">Delete All Flats</button> -->
                <?php //endif; ?>

              </div>            
              
              <?php endif; ?>
              <?php //echo form_close(); ?>
                </form>
             

            </div>
          </div>
        </div>

        <div class="col-12">
          
          <div class="card shadow-sm p-2">
            <div class="card-header">
              <h4>Flats List</h4>
            </div>

            <div class="col-12">

            <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner'  || $this->session->userdata('role') == 'committee_member' || $this->session->userdata('role') == 'CA') : ?>
              <?php if ($society_details['full_mode'] == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
              <a href="<?php echo base_url(); ?>member/add/<?= $society_details['id']; ?>" class="btn btn-icon btn-primary float-right mb-3">
                <i class="far fa-user"></i> Add Flat
              </a>
              <?php endif; ?>
              <?php endif; ?>

            </div>

            <!-- <?php //if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner') : ?>
            <?php //echo form_open_multipart('societies/import_members' . '/' . $society->id); ?>
            <?php //if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
            <div class="card-body">
              <div class="custom-file">
                <p><label>Import Flats</label>
                  <input type="file" name="member_file" id="member_file" required accept=".xls, .xlsx" />
                </p>
                <p>Only CSV format is allowed! <a
                    href="https://support.office.com/en-us/article/save-a-workbook-to-text-format-txt-or-csv-3e9a9d6c-70da-4255-aa28-fcacf1f081e6"
                    class="ml-2" target="_blank">Help ?</a></p>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success" type="submit">Import Flats</button>
            </div>
            <?php //endif; ?>
            <?php //echo form_close(); ?>
            <?php //endif; ?> -->

            <div class="card-body p-3 border">
           
              <div class="table-responsive">
                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm order-column stripe" id="mFlats" style="width:100%">
                <!--  -->
                  <thead>
                    <tr>
                      <th class="text-left">Id</th>
                      <th class="text-left">Wing</th>
                      <th class="text-left">Flat No.</th>
                      <th class="text-left">Name</th>
                      <th class="text-left">Mobile</th>
                      <th class="text-left">Email</th>
                      <th class="text-left">Flat Area</th>
                      <th class="text-left">Principal Arrears</th>
                      <th class="text-left">Interest Arrears</th>
                      <th class="text-left">Flat Code</th>
                      <th class="text-left">Action</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php $row = 1; ?>
                  <?php foreach ($members as $member) { 
                     $owner = $this->Member_model->get_flat_owner($member['id']);
                     ?>
                    <tr id="<?= $member['id'] ?>">
                      <td class="text-left"><?= $row ?></td>
                      <td class="text-left"><?= $member['wing'] ?></td>
                      <td class="align-middle"><?= $member['flat_no'] ?></td>
                      <td class="text-left"><?= $member['name'] ?></td>
                      <td class="text-left"><?php if(!empty($owner)) echo $owner['phone'] ?></td>
                      <td class="text-left"><?php if(!empty($owner)) echo $owner['email'] ?></td>
                      <td class="align-middle"><?= $member['flat_area'] ?></td>
                      <td class="text-left"><?= round($member['principal_arrears']) ?></td>
                      <td class="text-left"><?= round($member['interest_arrears']) ?></td>
                      
                      <td class="text-left"><?php if($member['code_used']==0) echo $member['flat_code'] ?></td>
                      <td class="text-left">                      
                        <div class="btn-group">
                          <a href="<?php echo base_url("member/view/").$society_id ; ?>/<?php echo $member['id'] ?>"
                          class="bg-info p-2 text-white rounded-left"><i class="fa fa-eye"></i> </a>

                          <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
                              <a href="<?php echo base_url(); ?>member/edit/<?= $society_id ?>/<?php echo $member['id'] ?>" class="bg-primary p-2 text-white"><i class="fas fa-pencil-alt"></i></a>
                        
                          <?php endif; ?>

                          <?php if($this->ion_auth->is_admin()):?>                       
                            <a class=" bg-danger remove  p-2 text-white rounded-right"><i class="fa fas fa-trash-alt"></i></a>
                          <?php endif; ?>

                        </div>

                      <!-- <td class="text-center">
                        <a href="<?php // echo base_url(); ?>member/view/<?php // echo $member['id']?>/<?//=$society_id?>" class="btn btn-warning">Details</a>
                        <?php //if($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner'): ?>
                          <a href="<?php //echo base_url(); ?>member/edit/<?php //echo $member['id'] ?>/<?//=$society_id?>" class="btn btn-info">Edit</a>
                          <button class="btn btn-danger remove">Delete</button>
                        <?php // endif; ?>
                      </td> -->


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
$(".remove").click(function() {
  var id = $(this).parents("tr").attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover Member Flat!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../member/remove/' + id,
          type: 'DELETE',
          // error: function() {
          //   swal("Oh Snap!", "Something went Wrong", {
          //     icon: "error",
          //   });
          // },
          success: function(data) {
            console.log(data);
            if(data==0){
              swal("Poof! Your Member has been deleted!", {
              icon: "success",
               });
              location.reload();
            }else if(data==1){
              swal(" Your Member has not deleted!", {
              icon: "error",
               });
              // location.reload();
            }else if(data==2){
              swal(" The member you are trying to delete does not exist.", {
              icon: "error",
               });
              
            }
            
          }
        });
      } else {
        swal("Your Member is safe!");
      }
    });
});
$(".delete").click(function() {
  var id = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover these members!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {       
        $.ajax({
          url: '../../societies/delete_members_by_society/' + id,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
          },
          success: function() {
            swal("Poof! Your User has been deleted!", {
              icon: "success",
            });
            window.location.replace("../../societies/details/" + id);
          }
        });
      } else {
        swal("Your Members are safe!");
      }
    });
});
$(document).ready(function() {
   
  $('#mFlats').DataTable({
      
      // scrollY:'100%',
      scrollX:true,
      scrollCollapse:true,
      lengthMenu: [10, 25, 50, 100],
      "ordering": false,
      fixedColumns: true,  
      fixedColumns:   {
          leftColumns: 4
      }, 
      
  });

  


    // $(".dataTables_info").closest('div.row').css("padding-top", "0em");
    // $('select[name="mFlats_length"]').on('change', function(){    
    //   let a=$(this).val();
    //   if(a==100){
    //     $(".dataTables_info").closest('div.row').css("padding-top", "3em");
    //   }else{
    //     $(".dataTables_info").closest('div.row').css("padding-top", "0em");
    //   }
    // });
  
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
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text'] . ' Total Errors: ' . $error_count ?>',
      position: 'topRight'
    });
  }

  $("#flat_import").submit(function(event){
            event.preventDefault();           
            var form_data = new FormData();
            var member_file = $("#member_file").prop("files")[0];
            form_data.append("member_file", member_file);
            document.getElementById('popup1').style.display ='block';
            document.getElementById('loaderdiv').classList.add("divSHow"); 
            $.ajax({
                    url: '<?php echo base_url("societies/import_members/").$society_id; ?>',
                    type:'POST',
                    data:form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(result){                      
                      result.replace(/\s/g, '');
                      // console.log(result);
                      if(result!=""){                        
                        window.location.reload();
                      }
                      
                    }

            });
  });


});
</script>

<!-- pradeep css add  -->
<style>

/* th, td { white-space: nowrap !important; }
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }

    .DTFC_LeftBodyWrapper{
      background-color:#fff !important;
    }

    .DTFC_LeftBodyLiner{overflow-y:unset !important}
    .DTFC_RightBodyLiner{
      overflow-y:unset !important
    }

    div.table-responsive>div.dataTables_wrapper>div.row{
      margin: 20px !important;
    }
     */
  </style>
 
