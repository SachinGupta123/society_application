<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Deactivate User  </h1>
            <div class="section-header-breadcrumb">          
            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

            <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>users">Users</a></div>

            <div class="breadcrumb-item">Deactivate User</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Deactivate User</h2>
            <div class="row">
              <div class="col-12">
                <div id="infoMessage"><?php //echo $message; // error show undefine message?></div>
                  <div class="card">

                   <?php echo form_open("auth/deactivate/".$user->id);?>
                      <div class="card-header">
                        <h4><p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p> </h4>

                      </div>
                      <div class="card-body">
                      	<div class="form-group row mb-4">
                          	<div class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                          		
                        		</div>
                          	<div class="col-sm-12 col-md-7">                          		
  						  		          <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
  						    	          <input type="radio" name="confirm" value="yes" checked="checked" />
  						    	          <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
  					    	           <input type="radio" name="confirm" value="no" />
                      		  </div>

                      	</div>
  						          <?php echo form_hidden($csrf); ?>
  						          <?php echo form_hidden(['id' => $user->id]); ?>
  					            <div class="form-group row mb-4">
                        	<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        	<div class="col-sm-12 col-md-7">
                          		<?php echo form_submit('submit', lang('deactivate_submit_btn'),"class='btn btn-primary'");?>						  
                          		<a class="btn btn-danger" href="<?php echo base_url(); ?>users">Cancel Changes</a>
                    		  </div>
                    	  </div>
                      </div>
                      <?php echo form_close();?>

                  </div>
              </div>
            </div>
          </div>
        </section>
      </div>

<?php $this->load->view('common/footer'); ?>