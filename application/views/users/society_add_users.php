<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <!-- <h1>Users</h1> -->
            <h1 class="brandCaptialW"><?php echo society_name($this->uri->segment(3)) ?></h1>


            <div class="section-header-breadcrumb">

            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?php echo $society_id ?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/society_users/<?php echo $society_id ?>">Users</a></div>

              <div class="breadcrumb-item">Add User</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add User</h2>

            <div class="row">

              <div class="col-12">
                <div id="infoMessage" class="text-danger"><?php echo $message;?></div>
                <div class="card">
                  <?php echo form_open('society_access_user/society_access_user_add/'.$society_id); ?>
                    <div class="card-header">

                      <h4>Add User</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                         <?php echo lang('create_user_fname_label', 'first_name');?><span class="required">*</span>
                        </div>                     
                        
                        <div class="col-sm-12 col-md-7">

                          <?php echo form_input($first_name);?>

                        </div>

                      </div>

                      <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <?php echo lang('create_user_lname_label', 'last_name');?><span class="required">*</span>
                      </div>
                        <div class="col-sm-12 col-md-7">

                          <?php echo form_input($last_name);?>

                        </div>

                      </div>

                      <?php
                        if($identity_column!=='email') { ?>

                          <div class="form-group row mb-4">
                            <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                              <?php echo lang('create_user_identity_label', 'identity');?>
                            </div>
                            <div class="col-sm-12 col-md-7">
                              <?php form_error('identity'); ?>
                              <?php echo form_input($identity);?>

                            </div>

                          </div>
                        <?php }
                      ?>

                      <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <?php echo lang('create_user_email_label', 'email');?> <span class="required">*</span>
                      </div>
                        <div class="col-sm-12 col-md-7">

                          <?php echo form_input($email);?>

                        </div>

                      </div>

                      <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                         <?php echo lang('create_user_company_label', 'company');?> <span class="required">*</span>
                       </div>
                        <div class="col-sm-12 col-md-7">

                           <?php echo form_input($company);?>

                        </div>

                      </div>

                      <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <?php echo lang('create_user_phone_label', 'phone');?> <span class="required">*</span>
                      </div>
                        <div class="col-sm-12 col-md-7">

                          <?php echo form_input($phone);?>

                        </div>

                      </div>

                      <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <?php echo lang('create_user_password_label', 'password');?> <span class="required">*</span>
                      
                      </div>
                     
                        <div class="col-sm-12 col-md-7  d-flex align-items-center">

                          <?php echo form_input($password);?>
                         
                          <i class="bi bi-eye-slash-fill text-dark ml-3" id="togglePassword"></i>
                        </div>

                      </div>

                      <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <span class="required">*</span>
                      </div>
                        <div class="col-sm-12 col-md-7  d-flex align-items-center">

                          <?php echo form_input($password_confirm);?>
                          <!-- <i class="fas fa-eye-slash fa-fw ml-3" id="togglePasswordConfirmPass"></i>  -->
                          <i class="bi bi-eye-slash-fill text-dark ml-3" id="togglePasswordConfirmPass"></i>
                        </div>

                      </div>

                      
                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role:  <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" name="groups[]" id="role" required="">

                          <option value=''>Select Role</option>
                          <?php if(!empty($role_list)) {
                             foreach($role_list as $list){
                          ?>
                          <option value="<?php echo $list["id"];?>"><?php echo $list["name"]  ?></option>
                            <?php } }?>
                         
                        </select>

                        </div>

                      </div>
                     
                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">
                          <!-- <div class="btn btn-primary"> -->
                          <?php echo form_submit('submit', lang('create_user_submit_btn'), "class='btn btn-primary'");?>
                          <!-- </div> -->
                          <a class="btn btn-danger text-white" onclick="window.history.go(-1); return false;">Cancel Changes</a>

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

<script type="text/javascript">

$(document).ready(function() {
  $("#phone").ForceNumericOnly();
});
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