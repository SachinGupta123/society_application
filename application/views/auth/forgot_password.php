<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('common/_partials/header');
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

              <div class=" card-primary">
                <div class="card-header p-0">
                  <h4>Forgot Password </h4>
                </div>
                <div class="card-body p-0">
                  <?php if ($success != NULL) : ?><div
                    class="alert <?= ($success == 1 & $success) ? 'alert-success' : 'alert-danger'; ?>">
                    <?php echo $message; ?>
                  </div><?php endif; ?>
                  <p class="text-muted">We will send a link to reset your password</p>
                  <?php echo form_open("auth/forgot_password"); ?>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <?php echo form_input($identity); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Forgot Password
                    </button>
                  </div>
                  <?php echo form_close(); ?>
                </div>
              </div>




              <!-- {{loginForm.value| json}} -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('dist/_partials/js'); ?>