<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('common/_partials/header');

if (isset($enroll) && !empty($enroll))
  $enroll_message_data = $enroll;
else {
  $enroll_message_data['status'] = '';
  $enroll_message_data['text'] = '';
}
?>

<body>
  <div id="loginCon">
    <div class="conteiner">
      <div class="row">
        <div class="login_box">
          <div class="login_container">
            <div class="brand_company">
              <a class="brand-link fs-1 text-center m-auto an">
                <span class="brand-text fw-bold ms-3"> <span class="brandCaptialW">m</span>Society</span>
              </a>
            </div>
            <div class="wrap_login card p-4 shadow rounded ">

              <div class="card-body p-2">
              
                <?php echo form_open("auth/login"); ?>
               

                <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <?php echo form_input($identity); ?>
                  <div class="invalid-feedback">
                    Please fill in your email
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="d-block mb-1">
                    <label for="password" class="control-label ">Password</label>
                    <div class="float-end">
                      <a href="forgot_password" class="text-small text-primary an">
                        Forgot Password?
                      </a>
                    </div>
                  </div>
                  <div class="d-flex align-items-center">
                  <?php echo form_input($password); ?>
                  <i class="bi bi-eye-slash-fill text-dark ms-1" id="togglePassword"></i>
                  </div>
                  
                  <div class="invalid-feedback">
                    please fill in your password
                  </div>
                </div>

                <div class="form-group mb-0">
                  <div class="custom-control custom-checkbox">
                    <!-- <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me"> -->
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember" class="custom-control-input"'); ?>
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>
                <div class="form-group mb-0">
                  <div class="float-left">
                    <a href="<?php echo base_url(); ?>auth/tnc" class="text-small TextGreyD an"><u class="an">
                        By Clicking Login You Agree to our Terms and Conditions.</u>
                    </a>
                  </div>

                </div>               
                <div class="form-group mb-0 mt-3">
                  <button type="submit" class="btn btn-primary btn-lg btn-block w-100" tabindex="4">
                    Login
                  </button>
                </div>
                
                <?= form_close() ?>
                <br/>
                <br/>
                <!-- Validation Messsage show in -Sachhidanand -->
                <?php if(isset($success) && $success =="0") : ?>
                  <div class="<?php if($success =="0") echo "alert alert-danger" ?>" >
                    <?php echo $message; ?>
                  </div>
                <?php elseif(isset($success) && $success =="1"): ?>
                  <div class="<?php if($success =="1") echo "alert alert-success" ?>" >
                    <?php echo $message; ?>
                  </div>

                <?php endif;?>
              </div>
             

              <ul class="login-menu">

                <li class="blue-login"><a class="an ml-2" href="<?php echo base_url(); ?>auth/enroll">Enrollment</a></li>
              </ul>
             

              <!-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-dark"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-dark"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-dark"><i class="fab fa-google fa-lg"></i></a>
              </div> -->


              <!-- {{loginForm.value| json}} -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('common/_partials/js'); ?>
  <script src="<?php echo base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>

  <script>
  const togglePassword = document.querySelector("#togglePassword");                             

  const password = document.querySelector("#password");


    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        
        this.classList.toggle("bi-eye");
    });


       
</script>

<script type="text/javascript">
    $(document).ready(function() {
      var message = '<?php echo $enroll_message_data['status'] ?>';
      if (message == 'Success') {
       
        iziToast.success({
          title: message,
          message: '<?php echo $enroll_message_data['text'] ?>',
          position: 'topRight',         
          onClosing: function() {
                    window.location.href = '<?php echo base_url("auth/login")?>';
                },
          onClosed:function() {
              window.location.href = '<?php echo base_url("auth/login")?>';
          },
         
        });
        
      } else if (message == 'Fail') {
        
        iziToast.error({
          title: message,
          message: '<?php echo $enroll_message_data['text'] ?>',
          position: 'topRight',                 
          onClosing: function() {
                    window.location.href = '<?php echo base_url("auth/login")?>';
                },
          onClosed:function() {
                    window.location.href = '<?php echo base_url("auth/login")?>';
                },

        });
      }
    });


</script>