<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// echo "<pre>";print_r($users[0]->groups[0]->id);die;
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Users</h1>

            <!-- <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php //echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item">View Users</div>

            </div> -->

          </div>

          <div class="section-body">

            <h2 class="section-title">View Users</h2>

            <div class="row">

              <div class="card-body">

                <div class="col-sm-12">

                  <a href="<?php echo base_url(); ?>users/add" class="btn btn-icon btn-primary float-right"><i class="far fa-edit"></i>Add Users</a>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-12">

                <div class="card p-2 shadow-sm">

                  <div class="card-header">

                    <h4>Society Executives</h4>

                  </div>

                  <div class="card-body p-3 border">
                    <div id="infoMessage"><?php echo $message;?></div>
                    <div class="table-responsive ">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm society_table" id="executives">

                      <thead>
                          <tr>

                            <th class="text-left" style="width: 100px;"> <?php echo lang('index_fname_th');?></th>

                            <th class="text-left"><?php echo lang('index_lname_th');?></th>

                            <th class="text-left"><?php echo lang('index_email_th');?></th>

                            <th class="text-left" ><?php echo lang('index_groups_th');?></th>

                            <th class="text-left"><?php echo lang('index_status_th');?></th>

                            <th class="text-left w-25"  ><?php echo lang('index_action_th');?></th>

                          </tr>
                          </thead>

                        <tbody>
                          <?php foreach ($users as $user):?>
                            <?php if(isset($user->groups[0]->id) && $user->groups[0]->id == 3): ?>
                            <tr>
                              
                              <td class="text-left"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                              <td class="text-left"><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                              <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                              <td class="text-left">
                                <?php foreach ($user->groups as $group):?>
                                  <?php echo anchor("auth/edit_user_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), "class='btn btn-primary'") ;?>
                                        <?php endforeach?>
                              </td>
                              <td class="text-left"><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'), "class='btn btn-primary'") : anchor("auth/activate/". $user->id, lang('index_inactive_link'), "class='btn btn-danger text-dark'" );?></td>
                              <td class="text-left"><?php echo anchor("auth/edit_user/".$user->society_id."/".$user->id, 'Edit', "class='btn btn-primary far fa-edit mr-3'") ;?><a href="<?php echo base_url(); ?>users/assign_society/<?php echo $user->id ?>" class="btn btn-info"><i class="far fa-edit"></i>Assign Society</a></td>
                           
                            </tr>
                            <?php endif; ?>
                          <?php endforeach;?>
                        </tbody>
                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-12">

                <div class="card shadow-sm p-2">

                  <div class="card-header">

                    <h4>Master Channel Partners</h4>

                  </div>

                  <div class="card-body p-3 border">
                    <div id="infoMessage"><?php echo $message;?></div>
                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="partners">

                         <thead>
                          <tr>

                            <th class="text-left"><?php echo lang('index_fname_th');?></th>

                            <th class="text-left"><?php echo lang('index_lname_th');?></th>

                            <th class="text-left"><?php echo lang('index_email_th');?></th>

                            <th class="text-left w-25"><?php echo lang('index_groups_th');?></th>

                            <th class="text-left"><?php echo lang('index_status_th');?></th>

                            <th class="text-left w-25"><?php echo lang('index_action_th');?></th>
                            
                          </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($users as $user): ?>
                            <?php $group = json_encode($user->groups);
                             $user_groups = json_decode($group,true); ?>
                               <?php foreach ($user_groups as $grp):?>
                                <?php if(isset($grp['id']) && $grp['id'] == 13): ?>
                            <tr>
                          
                              
                              <td class="text-left"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>

                              <td class="text-left"><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>

                              <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>

                              <td class="text-left">
                                <?php foreach ($user->groups as $group):?>
                                  <?php echo anchor("auth/edit_user_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), "class='btn btn-primary'") ;?><br/><br/>
                                        <?php endforeach?>
                              </td>

                              <td class="text-left"><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'), "class='btn btn-primary'") : anchor("auth/activate/". $user->id, lang('index_inactive_link'), "class='btn btn-dangerr'");?></td>

                              <td class="text-left">
                                <?php echo anchor("auth/edit_user/".$user->society_id."/".$user->id, 'Edit', "class='btn btn-outline-info far fa-edit mr-3'") ;?><a href="<?php echo base_url(); ?>users/assign_society/<?php echo $user->id ?>" class="btn btn-info"><i class="far fa-edit"></i>Assign Society</a></td>

                           
                            </tr>
                            <?php endif; ?>
                            <?php endforeach?>
                          <?php endforeach;?>
                           </tbody>
                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-12">

                <div class="card shadow-sm p-2">

                  <div class="card-header">

                    <h4>Channel Partners</h4>

                  </div>

                  <div class="card-body p-3 border">
                    <div id="infoMessage"><?php echo $message;?></div>
                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="channelPartners">

                          <thead>
                          <tr>

                            <th class="text-left"><?php echo lang('index_fname_th');?></th>

                            <th class="text-left"><?php echo lang('index_lname_th');?></th>

                            <th class="text-left"><?php echo lang('index_email_th');?></th>

                            <th class="text-left"><?php echo lang('index_groups_th');?></th>

                            <th class="text-left"><?php echo lang('index_status_th');?></th>

                            <th class="text-left w-25"><?php echo lang('index_action_th');?></th>

                          </tr>
                          </thead>        
                         
                        
                          <tbody>
                          <?php foreach ($users as $user):?>
                          <?php $group = json_encode($user->groups); $user_groups = json_decode($group,true); ?>
                          <?php foreach ($user_groups as $grp):?>
                              <?php if(isset($grp['id']) && $grp['id'] == 5): ?>
                             
                            <tr>
                              
                              <td class="text-left"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                              <td class="text-left"><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                              <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                              <td class="text-left">
                                <?php foreach ($user->groups as $group):?>
                                  <?php echo anchor("auth/edit_user_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), "class='btn btn-info'") ;?><br/><br/>
                                        <?php endforeach?>
                              </td>
                              <td class="text-left"><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'), "class='btn btn-primary'") : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                              <td class="text-left"><?php echo anchor("auth/edit_user/".$user->society_id."/".$user->id, 'Edit', "class='btn btn-outline-info far fa-edit mr-3'") ;?><a href="<?php echo base_url(); ?>users/assign_society/<?php echo $user->id ?>" class="btn btn-outline-primary"><i class="far fa-edit"></i>Assign Society</a></td>
                           
                            </tr>
                          
                            <?php endif; ?>
                            <?php endforeach?>
                            <?php endforeach;?>
                            </tbody>
                       
                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-12">

                <div class="card p-2 shadow-sm">

                  <div class="card-header">

                    <h4>Utility Service Providers</h4>

                  </div>

                  <div class="card-body p-3 border">

                    <div class="table-responsive">

                      <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="sProviders">

                        <thead>                                 

                          <tr>

                            <!-- <th class="text-left">Id</th> -->

                            <th class="text-left " style="width: 200px;">UserName</th>

                            <th class="text-left">Action</th>

                          </tr>

                        </thead>

                        <tbody>                                 
                          <?php foreach ($users as $user):?>
                            <?php if(isset($user->groups[0]->id) && $user->groups[0]->id == 9): ?>
                            <tr>
                             
                              <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                              <td class="text-left"><?php echo anchor("auth/edit_user_group/".$user->society_id."/".$user->id."/".$user->groups[0]->id, 'Edit', "class='btn btn-outline-info far fa-edit mr-3'") ;?><button class="btn btn-outline-danger remove"><i class="far fa-trash-alt"></i>Delete</button></td>
                          
                            </tr>
                            <?php endif; ?>
                          <?php endforeach;?>
                        </tbody>

                      </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="row">

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
                            <!-- <th class="text-left">Id</th> -->
                            <th class="text-left">Societies</th>
                            <th class="text-left">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;foreach($all_societies as $society) { ?>                                
                          <tr>
                             <td class="text-left"><?= $i ?></td>
                            <!-- <td class="text-left"><?= $society['id'] ?></td> -->
                            <td class="text-left"><?= $society['name'] ?></td>
                            <td class="text-left"><a href="<?php echo base_url(); ?>users/view_members/<?php echo $society['id'] ?>" class="btn btn-info">Details</a></td>
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

$(document).ready(function(){

 
$('#executives').DataTable({paging: true,});
$('#partners').DataTable({paging: true,});
$('#channelPartners').DataTable({paging: true,});
$('#Availers').DataTable({paging: true,});
$('#sProviders').DataTable({paging: true,});

})

  $(".remove").click(function(){
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
         url: 'users/remove/'+id,
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