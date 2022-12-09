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

              <div class="breadcrumb-item">Add Bank</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add Bank</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">
                  
                    <div class="card-header">

                      <h4>Add Bank</h4>

                    </div>
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('bank/add_bank'); ?>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bank Name <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_name" class="form-control" required="" onkeypress="return /^[a-zA-Z ]*$/i.test(event.key)">
                          <input type="hidden" name="society_id" value="<?= $society_id?>">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_address" class="form-control" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Branch <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_branch" class="form-control" required="" >

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">IFSC Code <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" pattern="^[A-Za-z]{4}\d{7}$" name="bank_ifsc" class="form-control" required="" placeholder="ABCD0123456"  oninvalid="this.setCustomValidity('Please enter correct format Eg.ABCD0123456')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">MICR </label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_micr" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Acc No. <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_acc_no" class="form-control" pattern=".{9,18}"  required oninput="process(this)" oninvalid="this.setCustomValidity('Account number shoud be between 9 to 18 digits')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" >

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opening Balance <span class="required">*</span></label>

                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="bank_opening_bal" class="form-control" required=""  id="bank_opening_bal"  onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" >                        

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="number" name="bank_phone" pattern="[1-9]{1}[0-9]{9}" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bank_email" class="form-control">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

                          <button class="btn btn-primary" type="submit">Save</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>bank/view/<?=$society_id?>">Cancel</a>

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
       function process(input){
          let value = input.value;
          let numbers = value.replace(/[^0-9]/g, "");
          input.value = numbers;
        }
        

        function fun_AllowOnlyAmountAndDot(txt)
        {
            if(event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46)
            {
               var txtbx=document.getElementById(txt);
               var amount = document.getElementById(txt).value;
               var present=0;
               var count=0;

               if(amount.indexOf(".",present)||amount.indexOf(".",present+1));
               {
              // alert('0');
               }

              /*if(amount.length==2)
              {
                if(event.keyCode != 46)
                return false;
              }*/
               do
               {
               present=amount.indexOf(".",present);
               if(present!=-1)
                {
                 count++;
                 present++;
                 }
               }
               while(present!=-1);
               if(present==-1 && amount.length==0 && event.keyCode == 46)
               {
                    event.keyCode=0;
                    //alert("Wrong position of decimal point not  allowed !!");
                    return false;
               }

               if(count>=1 && event.keyCode == 46)
               {

                    event.keyCode=0;
                    //alert("Only one decimal point is allowed !!");
                    return false;
               }
               if(count==1)
               {
                var lastdigits=amount.substring(amount.indexOf(".")+1,amount.length);
                if(lastdigits.length>=2)
                            {
                              //alert("Two decimal places only allowed");
                              event.keyCode=0;
                              return false;
                              }
               }
                    return true;
            }
            else
            {
                    event.keyCode=0;
                    //alert("Only Numbers with dot allowed !!");
                    return false;
            }

        }
        
  </script>