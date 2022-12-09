<?php
defined('BASEPATH') or exit('No direct script access allowed');


$this->load->view('common/_partials/header');

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/izitoast/css/iziToast.min.css">
<style>
  .fs14{
    font-size:14px !important;
  }
  @media (max-width: 767.98px) {
    .wrap_Register{
      width: 100% !important;
      padding:15px !important;
    }
  }
  </style>
<body>

  <div id="loginCon">
    <div class="conteiner">
      <div class="row">
        <div class="login_box">
          <div class="login_container">
            <div class="brand_company">
              <a class="brand-link fs-3 text-center m-auto an">
                <span class="brand-text font-weight-bold ">
                  <span class="brandCaptialW">
                    Enrollment </span> Form</span>
              </a>
            </div>
            
            <div class="wrap_Register card p-5 shadow rounded ">

              <div class="card-body p-0 ">
                <div class="brand_company">
                    <?php if(isset($message) && !empty($message)) echo $message ;?>
                </div>
                <?php echo form_open("auth/enroll"); ?>
               
                <div class="row ">

                 
                  <div class="form-group col-sm-6">
                    <label for="society_name"> Name <span class="text-danger">*</span></label>

                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required onkeypress="return /^[a-zA-Z ]*$/i.test(event.key)">

                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_name">Email <span class="text-danger">*</span></label>

                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required >
                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_name">Phone <span class="text-danger">*</span></label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone" required id="phone" onKeyPress="if(this.value.length==10) return false;"  oninvalid="this.setCustomValidity('Phone Number allowed 10 digit')" onchange="try{setCustomValidity('')}catch(e){}"
                      oninput="setCustomValidity(' ')">

                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_name">Your Role? <span class="text-danger">*</span></label>
                    <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Your Role?</label> -->
                    <?php if($account==1){?>
                      <select class="form-select form-select fs14" name="role" id="role" required>
                    
                      <option value="Accountant" selected >Accountant</option>
                    </select>
                    <?php }else{?>
                      <select class="form-select form-select fs14" name="role" id="role" required>
                      <option value="" >Select Role</option>
                      <option value="Member">Member</option>
                      <option value="Committee Member">Committee Member</option>
                      <option value="Accountant" >Accountant</option>
                    </select>
                    <?php }?>    

                    
                    <input type="hidden" name="account" class="form-control" value="<?php echo $account ?>">
                  </div>

                  <div class="form-group col-sm-6" id="society_div">
                    <label for="society_name">Society Name<span class="text-danger">*</span></label>
                  
                    <input type="text" name="society_name" id="society" class="form-control" placeholder="Enter Society Name" onkeypress="return /^[a-zA-Z ]*$/i.test(event.key)"  required>

                  </div>

                  <div class="form-group col-sm-6" id="address_div">
                    <label for="society_address">Society Address <span class="text-danger">*</span></label>
                   
                    <input type="text" name="society_address" id="address" class="form-control" placeholder="Enter Society Address"
                      required>

                  </div>

                  <div class="form-group col-sm-6" id="firm_div">
                    <label for="society_name">CA Firm Name<span class="text-danger">*</span></label>                  
                    <input type="text" name="ca_firm_name" id="firm" class="form-control" placeholder="Enter Firm Name" required>
                  </div>

                  <div class="form-group col-sm-6" id="registration_div">
                    <label for="society_address">CA membership Number</label>
                   
                    <input type="text" name="ca_member_number" id="registration" class="form-control" placeholder="Enter Membership Number"
                      pattern="[0-9]{6}" minlength="6" maxlength="6"  oninvalid="this.setCustomValidity('Membership Number allowed 6 digit')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')">

                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_address">City <span class="text-danger">*</span></label>
                   
                    <!-- <input type="text" name="city" class="form-control" placeholder="Enter City" required> -->
                    <select class="form-control select fs14" name="city" id="city" required="">
                    <option value=''>Select City</option>
                    <?php foreach ($cities as $city) { ?>
                    <option value="<?= $city['city_name'] ?>"><?= $city['city_name'] ?></option>
                    <?php } ?>
                  </select>

                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_address">State <span class="text-danger">*</span></label>
                    <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State<span
                        class="text-danger">*</span></label> -->

                    <!-- <input type="text" name="state" class="form-control" placeholder="Enter State" required> -->
                    <select class="form-control select fs14" name="state" id="state" required="">
                        <option value=''>Select State</option>
                        <?php foreach ($states as $state) { ?>
                        <option value="<?= $state['name'] ?>"><?= $state['name'] ?></option>
                        <?php } ?>
                      </select>

                  </div>



                  <div class="form-group col-sm-6">
                    <label for="society_address">Country <span class="text-danger">*</span></label>
                    <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Country<span
                        class="text-danger">*</span></label> -->

                    <input type="text" name="country" class="form-control" placeholder="Enter Country" required>

                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_address">Pincode <span class="text-danger">*</span></label>
                    <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pincode<span
                        class="text-danger">*</span></label> -->

                    <input type="number" name="pincode" class="form-control" placeholder="Pincode"  pattern="\d{6}" required>

                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_address">No Of Units<span class="text-danger">*</span></label>
                    <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Of Units</label> -->

                    <input type="number" name="units" class="form-control" required>

                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_address">When Can You Connect?</label>
                    <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">When Can You Connect?</label> -->

                    <select class="form-select form-select fs14" name="connect_time" id="connect_time">
                      <option value="">Select Interval</option>
                      <option value="Immediately">Immediately</option>
                      <option value="0-3 Months">0-3 Months</option>
                      <option value="3-6 Months">3-6 Months</option>
                      <option value="6-9 Months">6-9 Months</option>
                      <option value="More than 9 Months">More than 9 Months</option>
                    </select>

                  </div>

                  <div class="form-group col-sm-6">
                    <label for="society_address">Where Did You Hear?</label>
                    <select class="form-select form-select fs14" name="source" id="source">
                      
                      <option value="" >Select Source</option>
                      <option value="Google Play Store">Google Play Store</option>
                      <option value="Advertisement">Advertisement</option>
                      <option value="Online Ads">Online Ads</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Reference">Reference</option>
                    </select>

                  </div>
                 

                  <div class="form-group col-sm-12">
                    <label for="society_address">Subscription</label>
                    <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label> -->

                    <a href="<?php echo base_url(); ?>auth/tnc" class="text-small"><u>
                        By Clicking Save You Agree to our Terms and Conditions.</u>
                    </a>

                  </div>

                  <div class="form-group col-sm-12">


                    <button class="btn btn-primary" type="submit">Save</button>

                  </div>

                </div>
                <?= form_close() ?>
              </div>
              <!-- {{loginForm.value| json}} -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('common/_partials/js'); ?>
  <script src="<?php echo base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>
  <script type="text/javascript">

  $(document).ready(function() {

    $("#phone").ForceNumericOnly();

    <?php if($account=="1"){?>
          $("#firm_div").removeClass('d-none');
          $("#registration_div").removeClass('d-none');
          $('#firm').removeAttr('disabled'); 
          $('#registration').removeAttr('disabled');  

          $("#society_div").addClass('d-none');
          $("#address_div").addClass('d-none');
          $("#society").attr('disabled','disabled'); 
          $("#address").attr('disabled','disabled');
    <?php }else{?>
          $("#firm_div").addClass('d-none');
          $("#registration_div").addClass('d-none');
          $("#firm").attr('disabled','disabled'); 
          $("#registration").attr('disabled','disabled');

          $("#society_div").removeClass('d-none');
          $("#address_div").removeClass('d-none');
          $('#society').removeAttr('disabled'); 
          $('#address').removeAttr('disabled'); 
    <?php }?>
    // $("#firm_div").addClass('d-none');
    // $("#registration_div").addClass('d-none');
    // $("#firm").attr('disabled','disabled'); 
    // $("#registration").attr('disabled','disabled');

    $("#role").change(function() {
        let role=$(this).val();
        if(role=="Accountant"){
          $("#firm_div").removeClass('d-none');
          $("#registration_div").removeClass('d-none');
          $('#firm').removeAttr('disabled'); 
          $('#registration').removeAttr('disabled');  

          $("#society_div").addClass('d-none');
          $("#address_div").addClass('d-none');
          $("#society").attr('disabled','disabled'); 
          $("#address").attr('disabled','disabled');


        }else{
          $("#firm_div").addClass('d-none');
          $("#registration_div").addClass('d-none');
          $("#firm").attr('disabled','disabled'); 
          $("#registration").attr('disabled','disabled');

          $("#society_div").removeClass('d-none');
          $("#address_div").removeClass('d-none');
          $('#society').removeAttr('disabled'); 
          $('#address').removeAttr('disabled'); 


        }
    });

    $('#phone').on('keypress', function (event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
          event.preventDefault();
          return false;
        }
    });

    $('#registration').on('keypress', function (event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
          event.preventDefault();
          return false;
        }
    });

  });

</script>

<script type="text/javascript">
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

