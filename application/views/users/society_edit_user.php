<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('common/header_msoc');
?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            
            <h1 class="brandCaptialW"><?php if(!empty($society_id))echo society_name($society_id);else echo "Users" ?></h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?php echo $society_id ?>">Society Dashboard</a></div>            
                <div class="breadcrumb-item "><a href="<?php echo base_url("users/view_members/"); ?><?php echo $society_id ?>">Society Member</a></div>               
                <div class="breadcrumb-item">Edit User</div>
            </div>

          </div>



          <div class="section-body">

            <h2 class="section-title">Edit User</h2>

            <div class="row">

              <div class="col-12">
                <div id="infoMessage"><?php echo $message;?></div>
                <div class="card">


                  <?= form_open(uri_string()); ?>

                    <div class="card-header">

                      <h4>Edit User</h4>

                    </div>

                    <div class="card-body">
                    <?php if(isset($society_id) && !empty($society_id) && $society_id != ''){ ?>
                            <input type="hidden" name="society_id" value="<?php echo $society_id; ?>" />
                          <?php } ?>
                      <div class="form-group row mb-4">

                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                          <?php echo lang('edit_user_fname_label', 'first_name');?><span class="required">*</span>
                        </div>

                        <div class="col-sm-12 col-md-7">
                          
                         
                          <?php echo form_input($first_name);?>

                        </div>

                      </div>

                      
                      <div class="form-group row mb-4">

                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                          <?php echo lang('edit_user_email_label', 'email');?><span class="required">*</span>
                        </div>

                        <div class="col-sm-12 col-md-7">

                          <?php echo form_input($email);?>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                          <?php echo lang('edit_user_phone_label', 'phone');?><span class="required">*</span>
                        </div>

                        <div class="col-sm-12 col-md-7">

                          <?php echo form_input($phone);?>

                        </div>

                      </div>



                      
                      
                    

                      <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Member of groups<span class="required">*</span></div>

                        <div class="col-sm-12 col-md-7 form p-0">
                          
                          <select class="selectpicker form-control society_user" name="groups[]" style="height: 200px;" required multiple="multiple">
                          <!-- <option value="">Select</option> -->
                          <?php 
                              $array = explode(',', $member["member_role"]);
                             
                              foreach ($groups as $group):

                                $gID=$group['id'];
                                $checked = null;
                                $item = null;
                                foreach($array as $grp) {
                                  
                                    if ($gID == $grp) {
                                        $checked= ' selected';
                                    break;
                                    }
                                }
                            ?>
                            <option value="<?php echo $group['id'];?>" <?php echo  $checked ?>><?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?></option>
                           
                          <?php endforeach?>

                        </select>
                          </div>
                      
                       
                        
                      </div>


                      <?php //endif ?>

                     

                      <?php echo form_hidden('id', $member['id']);?>
                      <?php echo form_hidden($csrf); ?>
                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <?php echo form_submit('submit', lang('edit_user_submit_btn'), "class='btn btn-primary'");?>                         
                          <input  class="btn btn-danger" onclick="window.history.go(-1); return false;" type="submit"  value="Cancel" />

                        </div>

                      </div>

                    </div>

                  <?php echo form_close(); ?>

                </div>

              </div>

            </div>

          </div>

        </section>

      </div>


<?php $this->load->view('common/footer'); ?>

<script>
  const togglePassword = document.querySelector("#togglePassword");
  const togglePasswordConfirmPass = document.querySelector('#togglePasswordConfirmPass');                             

  const password = document.querySelector("#password");
  const confirmPassword = document.querySelector('#password_confirm');

  togglePassword.addEventListener("click", function () {
      // toggle the type attribute
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      
      // toggle the icon
      
      this.classList.toggle("bi-eye");
  });

  togglePasswordConfirmPass.addEventListener("click", function () {
      // toggle the type attribute
      const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
      confirmPassword.setAttribute("type", type);
      
      // toggle the icon
      this.classList.toggle("bi-eye");
  });

       
</script>


<script >
  $(document).ready(function(){
    $("#phone").ForceNumericOnly();
    $('.society_user').selectpicker();

  })

  // Numeric only control handler
  jQuery.fn.ForceNumericOnly =
  function()
  {
      return this.each(function()
      {
          $(this).keydown(function(e)
          {
              var key = e.charCode || e.keyCode || 0;
              // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
              // home, end, period, and numpad decimal
              return (
                  key == 8 || 
                  key == 9 ||
                  key == 13 ||
                  key == 46 ||
                  key == 110 ||
                  key == 190 ||
                  (key >= 35 && key <= 40) ||
                  (key >= 48 && key <= 57) ||
                  (key >= 96 && key <= 105));
          });
      });
  };

</script>