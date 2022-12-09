<?php

defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('common/header_msoc');
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

      <h1>Users </h1>

      <div class="section-header-breadcrumb">

        <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>

        <div class="breadcrumb-item">View Users</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Users</h2>

      <div class="row">

        <div class="card-body">

          

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header justify-content-between">

              <h4 class="textColor">Society Operator</h4>

              <a href="<?php echo base_url(); ?>users/add" class="btn  btn-primary borderRadiusnone"><i class="far fa-edit mr-2"></i>Add Users</a>
            
            </div>

            <div class="card-body p-3 border">             
              <div class="table-responsive ">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm society_table" id="executives">

                  <thead>
                    <tr>
                    

                      <th class="text-left" > <?php echo lang('index_fname_th'); ?></th>

                      <th class="text-left"><?php echo lang('index_lname_th'); ?></th>

                      <th class="text-left"><?php echo lang('index_email_th'); ?></th>

                      <th class="text-left" >Roles</th>
                      <th class="text-left"><?php echo lang('index_status_th'); ?></th>

                      <th class="text-left "><?php echo lang('index_action_th'); ?></th>

                    </tr>
                  </thead>

                  <tbody>
                    <?php if (isset($users) && !empty($users)) :
                      foreach ($users as $user) :
                        if($user['id']!=1):
                    ?>

                        <tr>

                          <td class="text-left"><?php echo htmlspecialchars($user['first_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                          <td class="text-left"><?php echo htmlspecialchars($user['last_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                          <td class="text-left">
                            <?php foreach ($user['groups'] as $group):?>
                                  <?php //echo anchor("auth/edit_user_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), "class='badge bg-primary text-white mb-2'") ;?>
                                  <a  class='badge bg-primary text-white mb-2'><?php echo $group->name ?></a>

                            <?php endforeach?>
                          </td>
                          <td class="text-left">
                            <?php echo ($user['active']) ? anchor("auth/deactivate/0/" . $user['id'], lang('index_active_link'), "class='badge bg-success text-dark'") : anchor("auth/activate/0/" . $user['id'], lang('index_inactive_link'), "class='badge bg-danger text-white'"); ?>
                          </td>

                          <td class="text-left">
                            <div class="btn-group">                             
                              <?php echo anchor("auth/edit_user/" . $user['id'], '<i class="fas fa-pen fa-fw"></i>', 'data-toggle="tooltip"  data-placement="top" title="Edit "'.$user['first_name'].' class="bg-info p-2 text-white rounded-left" '); ?>
                              <a href="<?php echo base_url(); ?>society_access/assign_society/<?php echo $user['id'] ?>" class="btn btn-info" data-toggle="tooltip" id="<?php echo $user['id'] ?>" data-placement="top" title=" Assign Society <?= $user['first_name'] ?>"><i class="far fa-edit"></i>Assign Society</a>

                              <a href="<?php echo base_url(); ?>society_access/society_list/<?php echo $user['id'] ?>" class="btn btn-warning bg-warning" data-toggle="tooltip" id="<?php echo $user['id'] ?>" data-placement="top" title="<?= $user['first_name'] ?> Society List "><i class="fas fa-list-ul fa-fw text-dark"></i></a>

                            </div>
                          </td>
                        
                        </tr>
                    <?php endif;
                    endforeach;
                    endif; ?>
                  </tbody>
                

                </table>

              </div>

            </div>

          </div>

        </div>

      </div>







      <!-- <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Service Availers</h4>

            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="Availers">

                  <thead>

                    <tr>
                      <th class="text-left">Sr No.</th>
                      <th class="text-left">Id</th>
                      <th class="text-left">Societies</th>
                      <th class="text-left">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php // $i = 1;
                    // foreach ($all_societies as $society) { ?>
                      <tr>
                        <td class="text-left"><? // = $i ?></td>
                        <td class="text-left"><? // = $society['id'] ?></td>
                        <td class="text-left"><? // = $society['name'] ?></td>
                        <td class="text-left"><a href="<?php // echo base_url(); ?>users/view_members/<?php // echo $society['id'] ?>" class="btn btn-info">Details</a></td>
                      </tr>
                    <?php // $i++;
                   // } ?>
                  </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>

      </div> -->

    </div>

  </section>

</div>

<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {


    $('#executives').DataTable({
      paging: true,
      "searching": true,
      // pageLength: 20
      //Get a reference to the new datatable

    }) ;


    $('#partners').DataTable({
      paging: true,
    });
    $('#channelPartners').DataTable({
      paging: true,
    });
    $('#Availers').DataTable({
      paging: true,
    });
    $('#sProviders').DataTable({
      paging: true,
    });

    var message = '<?php if (isset($message['status']) && !empty($message['status'])) echo $message['status']; else echo ''; ?>';
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




  })

  $(".remove").click(function() {
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
            url: 'users/remove/' + id,
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
              location.reload();
            }
          });
        } else {
          swal("Your User is safe!");
        }
      });
  });
</script>