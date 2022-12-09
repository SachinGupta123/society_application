<?php
defined('BASEPATH') or exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">
    <div class="section-header">

      <h1>Societies</h1>

      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies">Societies</a></div>
        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id ?>">Society Dashboard</a></div>
        <div class="breadcrumb-item">Edit Society</div>

      </div>

    </div>
    <div class="section-body">
      <h2 class="section-title">Edit Society</h2>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <?php $arr = array('society_id' => $society['id']); ?>
            <?php echo form_open_multipart('societies/edit_society', '', $arr); ?>
              <div class="card-header">
                <h4>Edit Society</h4>
              </div>
              <div class="card-body">

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name <span
                    class="required">*</span></label>
                  <div class="col-sm-12 col-md-7">

                    <!-- <input type="text" name="society_name" id="society_name" value="<?//= $society['name'] ?>" class="form-control" required> -->

                    <input type="text" name="society_name" id="society_name" class="form-control" value="<?= $society['name'] ?>"  pattern="^[a-zA-Z ][\sa-zA-Z ]*" oninput="setCustomValidity(' ')" onchange="try{setCustomValidity('')}catch(e){}" required oninvalid="setCustomValidity('Special character  and number not allowed')" >

                  </div>
                </div>
               
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State<span
                      class="required">*</span></label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control select" name="state" id="state" required>
                    <option value=''>Select State</option>
                      <?php foreach ($states as $state) { ?>
                     
                      <option value="<?= $state['id'] ?>" <?php if ($society['state_id'] == $state['id']) echo "Selected" ;?>><?= $state['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">City<span
                      class="required">*</span></label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control select" name="city" id="city" required>
                    <option value=''>Select City</option>
                      <?php foreach ($cities as $city) { ?>
                      
                      <option value="<?= $city['city_id'] ?>" <?php if ($society['city_id'] == $city['city_id']) echo "Selected"; ?>><?= $city['city_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Area (sq. ft.)</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="number" name="area" id="area" value="<?= $society['area'] ?>" class="form-control" >
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pincode <span
                    class="required">*</span></label>
                  <div class="col-sm-12 col-md-7">
                  

                    <input type="text" pattern="[1-9][0-9]{5}" name="pincode" id="pincode" class="form-control" value="<?= $society['pincode'] ?>"  required  oninvalid="this.setCustomValidity('Only 6 digit allowed')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')">
                  </div>
                </div>

                <div class="form-group row mb-4">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address <span
                    class="required">*</span></label>

                  <div class="col-sm-12 col-md-7">

                    <input type="text" name="society_address" id="society_address" value="<?= $society['address'] ?>"
                      class="form-control" required>

                  </div>

                </div>

                <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email <span
                  class="required">*</span></label>

                <div class="col-sm-12 col-md-7">
                <input type="email" name="society_email" id="society_email" class="form-control"  value="<?= $society['email'] ?>" required>

                </div>

                </div>

                <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone No.<span class="required">*</span></label>

                <div class="col-sm-12 col-md-7">                  
                <!-- <input type="number" maxlength="10" id="phone_number"  name="phone_number"  value="<?//= $society['phone_number'] ?>" id="phone_number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" > -->

                <input type="text" name="phone_number" maxlength="10" id="phone_number" pattern="[1-9]{1}[0-9]{9}" value="<?= $society['phone_number'] ?>"  class="form-control"  oninvalid="this.setCustomValidity('Please enter 10 digit phone no.')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required  >  
                </div>

                </div>

                <div class="form-group row mb-4">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Registration Number <span class="required">*</span></label>

                  <div class="col-sm-12 col-md-7">

                    <input type="text" name="society_reg_no" id="society_reg_no"
                      value="<?= $society['registration_no'] ?>" class="form-control" required>

                  </div>

                </div>

                <div class="form-group row mb-4">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">GSTIN </label>

                  <div class="col-sm-12 col-md-7">

                    <input type="text" name="gstin" id="gstin" value="<?= $society['gstin'] ?>" class="form-control" >

                  </div>

                </div>

                <div class="form-group row mb-4">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is GST Applicable </label>

                  <div class="col-sm-12 col-md-7">

                    <input class="form-check-input ml-1" name="is_gst" type="checkbox" id="defaultCheck2" value="1" <?php if ($society['is_gst'] == 1) {echo "checked='checked'";} ?> >

                  </div>

                </div>

                <div class="form-group row mb-4 ">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opening Cash Balance <span
                    class="required">*</span></label>

                  <div class="col-sm-12 col-md-7">

                    <input type="text"  id="society_opening_bal"
                      value="<?php if(isset($cash_opening_balance) && !empty($cash_opening_balance)) echo $cash_opening_balance->op_balance ;else echo "0.00"?>" class="form-control" disabled required>
                      <!-- name="society_opening_bal" -->
                  </div>

                </div>

                <div class="form-group row mb-4">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Number of Flats <span
                    class="required">*</span></label>

                  <div class="col-sm-12 col-md-7">

                    <input type="number" name="no_of_flats" id="no_of_flats" value="<?= $society['no_of_flats'] ?>"
                      class="form-control" required>

                  </div>

                </div>

                <div class="form-group row mb-4">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Auto Generate Bill </label>

                  <div class="col-sm-12 col-md-7">

                    <input class="form-check-input ml-1" name="auto_bill"  type="checkbox"  value="1" <?php if ($society['auto_create_bill'] == 1) {echo "checked='checked'"; }  ?>  id="auto_bill_check">

                    <!-- <input class="form-check-input ml-1" name="auto_bill" type="checkbox" value="1" id="auto_bill_check"> -->

                  </div>

                </div>
                <div class="form-group row mb-4" id="bill_day_div" >
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Day <span class="required">*</span></label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="bill_day" id="bill_day" class="form-control"  maxlength="2" onkeyup="if(this.value > 28) this.value = 28;" value="<?= $society['bill_day'] ?>">
                  </div>
                </div> 
                <div class="form-group row mb-4" id="due_day_div">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Due Day <span
                      class="required">*</span></label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="due_day" id="due_day" class="form-control" maxlength="2"  value="<?= $society['due_day'] ?>">
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest Type <span class="required">*</span></label>

                  <div class="col-sm-12 col-md-7">
                    <select class="form-control select" name="interest_type" id="interest_type" required>
                    <option value="">Select Interest Type</option>
                      <option value="Simple Interest" <?php if($society['interest_type']=="Simple Interest") echo "Selected"?>>Simple Interest</option>
                      <option value="Compound Interest" <?php if($society['interest_type']=="Compound Interest") echo "Selected"?>>Compound Interest</option>
                      <option value="Fixed Interest" <?php if($society['interest_type']=="Fixed Interest") echo "Selected"?>>Fixed Interest</option>
                    </select>
                  </div>
                </div>

                

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest on Bill Frequency </label>
                  <div class="col-sm-12 col-md-7">
                    <input class="form-check-input ml-1" name="on_freq" type="checkbox" value="1" id="on_freq" <?php if ($society['interest_on_bill_frequency'] == 1) {  echo "checked='checked'"; } ?> >
                  </div>
                </div>


                <div class="form-group row mb-4 bill_int_freq_div">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Frequency <span
                    class="required">*</span></label>
                  <div class="col-sm-12 col-md-7">
                    <input type="number" name="bill_int_freq" id="bill_int_freq" value="<?= $society['interest_bill_frequency'] ?>" class="form-control" required min="1">
                  </div>
                </div>

                <div class="form-group row mb-4 interest_span_div ">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest Span <span
                    class="required">*</span></label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control select" name="interest_span" id="interest_span" required>
                    <option value="">Select Interest Span</option>
                      <option value="Daily" <?php if($society['interest_span']=="Daily") echo "Selected" ;?> >Daily</option>
                      <option value="Monthly" <?php if($society['interest_span']=="Monthly") echo "Selected" ;?>>Monthly</option>
                      <option value="Quarterly" <?php if($society['interest_span']=="Quarterly") echo "Selected" ;?> > Quarterly</option>
                      <option value="Half Yearly" <?php if($society['interest_span']=="Half Yearly") echo "Selected" ;?>>Half Yearly</option>
                      <option value="Yearly" <?php if($society['interest_span']=="Yearly") echo "Selected" ;?>>Yearly</option>
                    </select>
                  </div>

                </div>

               

               

                <?php if($society['interest_type']=="Fixed Interest") {?>
                  <div class="form-group row mb-4" id="fixed_interest_amount_div" >
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fixed Interest Amount <span class="required">*</span></label>
                    <div class="col-sm-12 col-md-7">
                      <input type="number" name="fixed_interest_amount" id="fixed_interest_amount" class="form-control" required value="<?php echo $society['fixed_interest'] ?>">
                    </div>
                  </div>
               <?php }else{?>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest Rate <span
                      class="required">*</span></label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="interest_rate" id="interest_rate" value="<?= $society['interest_rate'] ?>"
                        class="form-control" required>
                    </div>
                  </div>
                <?php } ?>

                
                <div class="form-group row mb-4">
                  <h4 class="text-md-right col-12 col-md-3 col-lg-3">Other Charges</h4>
                  <div class="col-sm-12 col-md-7">
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Noc Charge </label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="noc_charge" id="noc_charge" value="<?= $society['noc_charge'] ?>"
                      class="form-control" >
                  </div>
                </div>
                                                                                                                                    
                  <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Noc Unit Value </label>
                  <div class="col-sm-12 col-md-7">
                    <input class="form-check-input ml-1" name="noc_unit_value" type="checkbox" value="1" id="defaultCheck2"<?php if ($society['noc_unit_value'] == 1) {echo "checked='checked'";} ?> >

                  </div>

                </div>

                <div class="form-group row mb-4">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>

                  <div class="col-sm-12 col-md-7">
                    <?php if (!empty($society['image_file_name'])) : ?>
                    <div class="col-md-3">
                      <div href="#" class="thumbnail">
                      
                         <img class="image-preview" src="<?= site_url('assets/uploads/' . $society['image_file_name']); ?>"
                          alt="">

                      </div>
                    </div>
                    <?php endif; ?>

                    <input type="file" name="image" class="file-input" id="customFile">

                  </div>

                </div>

                <div class="form-group row mb-4">
                <input class="form-check-input" name="full"  type="hidden" id="inlineCheckbox1" value="1">
                  <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Operation Mode</label>

                  <div class="form-check form-check-inline">

                    <input class="form-check-input" name="full" type="checkbox" id="inlineCheckbox1" value="1" <?php // if ($society['full_mode'] == 1) {
                                                                                                                //  echo "checked='checked'";
                                                                                                             //   } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Full Mode</label>

                  </div>

                  <div class="form-check form-check-inline">

                    <input class="form-check-input" name="bill_payment" type="checkbox" id="inlineCheckbox2" value="1"
                      <?php // if ($society['bill_payments'] == 1) {
                                                                                                                        //  echo "checked='checked'";
                                                                                                                  //      } ?>>

                    <label class="form-check-label" for="inlineCheckbox2">Bill & Payments</label>

                  </div>

                  <div class="form-check form-check-inline">

                    <input class="form-check-input" name="accounting" type="checkbox" id="inlineCheckbox3" value="1"
                      <?php //if ($society['accounting'] == 1) {
                                                                                                                      //echo "checked='checked'";
                                                                                                               //       } ?>>

                    <label class="form-check-label" for="inlineCheckbox3">Accounting</label>

                  </div>
                  <div class="form-check form-check-inline">

                    <input class="form-check-input" name="gatekeeper" type="checkbox" id="inlineCheckbox4" value="1"
                      <?php // if ($society['gatekeeper'] == 1) {
                                                                                                                        //echo "checked='checked'";
                                                                                                                     // } ?>>

                    <label class="form-check-label" for="inlineCheckbox4">Gatekeeper</label>

                  </div>
                  <div class="form-check form-check-inline">

                    <input class="form-check-input" name="vms" type="checkbox" id="inlineCheckbox5" value="1" <?php //if ($society['vms'] == 1) {
                                                                                                               // echo "checked='checked'";
                                                                                                            //  } ?>>

                    <label class="form-check-label" for="inlineCheckbox5">Visitor Management</label>

                  </div> -->

                </div>

                <div class="form-group row mb-4">

                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                  <div class="col-sm-12 col-md-7">

                    <button class="btn btn-primary" type="submit">Save Changes</button>

                    <a class="btn btn-danger" href="<?php echo base_url(); ?>societies/details/<?= $society_id ?>">Cancel
                      Changes</a>

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
      if ($('#on_freq').is(':checked', true)) {
        $('.bill_int_freq').show();
      } else {
        $('.bill_int_freq').hide();
      }
      $("#phone_number").ForceNumericOnly();
      $("#pincode").ForceNumericOnly();
      $("#bill_day").ForceNumericOnly();
      $("#due_day").ForceNumericOnly();
      $("#bill_day_div").addClass('d-none');
      $("#due_day_div").addClass('d-none');
      $("#bill_day").attr('disabled','disabled'); 
      $("#due_day").attr('disabled','disabled');
      $('#auto_bill_check').change(function() {
        if($('#auto_bill_check').prop('checked') == true){
          $("#bill_day_div").removeClass('d-none');
          $("#due_day_div").removeClass('d-none');
          $('#bill_day').removeAttr('disabled'); 
          $('#due_day').removeAttr('disabled');  
        }else{
          $("#bill_day_div").addClass('d-none');
          $("#due_day_div").addClass('d-none');     
          $("#bill_day").attr('disabled','disabled'); 
          $("#due_day").attr('disabled','disabled'); 
        }
      });

      <?php if($society['auto_create_bill'] == 1) { ?>
          $("#bill_day_div").removeClass('d-none');
          $("#due_day_div").removeClass('d-none');
          $('#bill_day').removeAttr('disabled'); 
          $('#due_day').removeAttr('disabled');  
      <?php }else{?>
          $("#bill_day_div").addClass('d-none');
          $("#due_day_div").addClass('d-none');     
          $("#bill_day").attr('disabled','disabled'); 
          $("#due_day").attr('disabled','disabled'); 

      <?php }?>

      // if($('#auto_bill_check').prop('checked') == true){
      //  
      // }else{
      
      // }

    });

    $('#inlineCheckbox1').click(function() {
      if ($(this).is(':checked', true)) {
        $('#inlineCheckbox2').prop('checked', true);
        $('#inlineCheckbox3').prop('checked', true);
        $('#inlineCheckbox4').prop('checked', true);
        $('#inlineCheckbox5').prop('checked', true);
      } else {
        $('#inlineCheckbox2').prop('checked', false);
        $('#inlineCheckbox3').prop('checked', false);
        $('#inlineCheckbox4').prop('checked', false);
        $('#inlineCheckbox5').prop('checked', false);
      }
    });

   
    if ($('#on_freq').is(':checked', true)) {
      $('.bill_int_freq_div').addClass("d-flex");
      $('#bill_int_freq').prop("disabled", false);
      $('.interest_span_div').addClass("d-none");
      $('#interest_span').prop("disabled", true);
    } else {        
      $('.bill_int_freq_div').removeClass("d-flex");
      $('.bill_int_freq_div').addClass("d-none");
      $('#bill_int_freq').prop("disabled", true);
      $('.interest_span_div').removeClass("d-none");
      $('#interest_span').prop("disabled", false);        
    }
    
    const chcekbox = document.getElementById('on_freq')
      // console.log(chcekbox)
      chcekbox.addEventListener('change', (event) => {
      if (event.currentTarget.checked) {
        $('.bill_int_freq_div').addClass("d-flex");
        $('#bill_int_freq').prop("disabled", false);
        $('.interest_span_div').addClass("d-none");
        $('#interest_span').prop("disabled", true);
        
      
      } else {
      
        $('.bill_int_freq_div').removeClass("d-flex");
        $('.bill_int_freq_div').addClass("d-none");
        $('#bill_int_freq').prop("disabled", true);
        $('.interest_span_div').removeClass("d-none");
        $('#interest_span').prop("disabled", false);
        
      }
      })
   

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