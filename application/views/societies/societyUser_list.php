<?php
defined('BASEPATH') or exit('No direct script access allowed');

$message = $this->session->flashdata('message');
$this->load->view('common/header_msoc');
 
?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      
      <h1 class="brandCaptialW"><?php echo society_name($this->uri->segment(3)) ?></h1>

      <div class="section-header-breadcrumb">       
      
    
        <div class="breadcrumb-item">Societies User</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Societies</h2>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
        </div>
      </div>
      

      <div class="row"> 
        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header justify-content-between">
              <h4 class="textColor">Society User List</h4>
              <a href="<?php echo base_url("society_access_user/society_access_user_add/").$this->uri->segment(3); ?>" class="btn  btn-primary borderRadiusnone"><i class="far fa-edit"></i>Add User</a>             
            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm society_table" id="table-1">
                  <thead>
                   
                    <tr>                 

                      <th class="text-left">First Name</th>

                      <th class="text-left">Last Name</th>
                      <th class="text-left">Email</th>
                      <th class="text-left">Role</th>
                      <th class="text-left">Status</th>
                      <th class="text-left">Action</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($users_list)):
                          foreach($users_list as $user):
                    ?>
                    <tr>

                          <td class="text-left"><?php echo htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                          <td class="text-left"><?php echo htmlspecialchars($user['last_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                          <td class="text-left"><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                          <td class="text-left">
                            <?php if(isset($user['groups']) && !empty($user['groups'])):
                              foreach ($user['groups'] as $group):?>
                                  <a  class='badge bg-primary text-white mb-2'><?php echo $group->name ?></a>
                                  <?php // echo //anchor("auth/edit_user_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), "class='badge bg-primary text-white mb-2'" ;?>
                            <?php endforeach;
                                endif;
                            ?>
                          </td>
                          <td class="text-left">
                            <?php echo ($user['active']) ? anchor("auth/deactivate/" .$user['society_id']."/".$user['id'], lang('index_active_link'), "class='badge bg-success text-dark'") : anchor("auth/activate/" .$user['society_id']."/".$user['id'], lang('index_inactive_link'), "class='badge bg-danger text-white'"); ?>
                          </td>

                          <td class="text-left">
                            <div class="btn-group">                             
                              <?php echo anchor("society_access_user/society_access_user_edit/" . $user['society_id']."/".$user['id'], '<i class="fas fa-pen fa-fw"></i>', 'data-toggle="tooltip"  data-placement="top" title="Edit "'.$user['first_name'].' class="bg-info p-2 text-white rounded-left" '); ?>
                              

                            </div>
                          </td>

                    </tr>
                    <?php endforeach; endif;?>
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

    $('.society_table').dataTable();

    

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
              success: function() {
                // swal("Poof! Your Society has been deleted!", {
                //   icon: "success",
                // }).then(function() {
                //     window.location = "societies";
                // });
                
              }
            });
          } else {
            swal("Your Society is safe!");
          }
        });
  
});
</script>