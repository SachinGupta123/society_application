<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>bank/view/<?=$society_id?>">Bank</a></div>

              <div class="breadcrumb-item">Edit Bank</div>
             

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Edit Bank</h2>

            <?php if(!empty(validation_errors())) {?>
            <div id="mydiv" class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
  
            </div>
            <?php }?>          
            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $arr = array('bank_id'=>$bank['id']); ?>
                  <?php echo form_open_multipart('bank/edit_bank', '', $arr); ?>

                    <div class="card-header">

                      <h4>Edit Bank</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bank Name <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_name" value="<?= $bank['bank_name']?>" class="form-control" required="">
                          <input type="hidden" name="society_id" value="<?= $society_id?>">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_address" value="<?= $bank['address']?>" class="form-control" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Branch <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_branch" value="<?= $bank['address']?>" class="form-control" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IFSC Code <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_ifsc" pattern="^[A-Za-z]{4}\d{7}$"  value="<?= $bank['ifsc']?>" class="form-control" required=""  oninvalid="this.setCustomValidity('Please enter correct format Eg. ABCD0123456')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">MICR</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_micr" value="<?= $bank['micr']?>" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Acc No.<span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_acc_no" value="<?= $bank['ac_no']?>" class="form-control"  pattern=".{9,18}"  required oninput="process(this)" oninvalid="this.setCustomValidity('Account number shoud be between 9 to 18 digits')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opening Balance</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text"  value="<?= $bank['opening_balance']?>" class="form-control" readonly>
                         

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_phone" value="<?= $bank['phone']?>" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_email" value="<?= $bank['email']?>" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save Changes</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>bank/view/<?=$society_id?>">Cancel Changes</a>

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
  setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 10000); // <-- time in milliseconds

</script>
<script type="text/javascript">
       function process(input){
  let value = input.value;
  let numbers = value.replace(/[^0-9]/g, "");
  input.value = numbers;
}
  </script>