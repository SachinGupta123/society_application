<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/_partials/header');
?>
<div id="infoMessage"><?php echo $message;?></div>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
				<img src="<?php echo base_url(); ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <div class="card card-primary">
              	<div class="card-header"><h4><?php echo lang('reset_password_heading');?></h4></div>
              	<div class="card-body">
					<?php echo form_open('auth/reset_password/' . $code);?>

					<div class="form-group">
						<label for="new_password" class="control-label"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
						<?php echo form_input($new_password);?>
					</div>

					<div class="form-group">
						<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
						<?php echo form_input($new_password_confirm);?>
					</div>
					<?php echo form_input($user_id);?>
					<?php echo form_hidden($csrf); ?>

					<p><?php echo form_submit('submit', lang('reset_password_submit_btn'),'class="btn btn-primary btn-block"');?></p>

					<?php echo form_close();?>
				</div>
            </div>
            <div class="simple-footer">
              Copyright &copy; CPAYNET 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php $this->load->view('dist/_partials/js'); ?>