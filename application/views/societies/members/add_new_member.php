<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//sachhidanand -25-11-2021
if (!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else {
  $message['status'] = '';
  $message['text'] = '';
}
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

            <div class="section-header-breadcrumb">

            
              <?php if ($this->ion_auth->is_admin()) :?> 
              <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
              <?php endif;?>
              <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div>            

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id?>">Society Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>/member/manage/<?=$society_id?>">Manage Flats</a></div>

              <div class="breadcrumb-item">Add New Member</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add New Member</h2>

            <div class="row">

              <div class="col-12">

                <div class="card border shadow-sm">

                  <?php echo form_open_multipart('member/add_new_member'); ?>

                    <div class="card-header">

                      <h4>Add New Member</h4>

                    </div>
  
                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wing </label>

                        <div class="col-sm-12 col-md-7">

                          <input type="hidden" name="society_id" value="<?= $society_id?>">
                          <input type="text" name="member_wing" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat No.<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="member_flat_no" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="member_name" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">
                     

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tenant</label>

                        <div class="col-sm-12 col-md-7">
                        <label class="custom-switch mt-2">
                        <input type="checkbox" name="tenant" value="1" class="custom-switch-input" id="defaultCheck2">
                        <span class="custom-switch-indicator"></span>
                        
                      </label>

                          <!-- <input class="form-check-input" name="tenant" value="1" type="checkbox" value="" id="defaultCheck2"> -->

                        </div>

                      </div>

                     
                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat Area  (sq. ft.)<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="number" name="member_flat_area" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Principal Arrears <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="number" name="principal_arrears" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest Arrears <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="number" name="interest_arrears" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Of Two Wheelers<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="number" name="member_two_wheeler" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Of Four Wheelers<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="number" name="member_four_wheeler" class="form-control" required>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flat Type</label>

                        <div class="col-sm-12 col-md-7">

                          <select class="form-control select" name="member_flat_type">
                            <option value=''>Select Flat Type</option>
                            <?php foreach ($all_flat_types as $flat) { ?>
                              
                              <option value="<?= $flat['id']?>"><?= $flat['name']?></option>
                            <?php  } ?>

                        </select>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary">Save Member</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>member/manage/<?=$society_id?>">Cancel</a>

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
<script type="text/javascript">
  $(document).ready(function() {
var message = '<?php echo $message['status'] ?>';
if(message == 'Success')
{
  iziToast.success({
    title: message,
    message: '<?php echo $message['text'] ?>',
    position: 'topRight'
  });
} else if(message == 'Fail') {
  iziToast.error({
    title: message,
    message: '<?php echo $message['text'] ?>',
    position: 'topRight'
  });
}
});
</script>