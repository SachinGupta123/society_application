<?php

defined('BASEPATH') or exit('No direct script access allowed');
//sachhidanand -25-11-2021
if (!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else {
  $message['status'] = '';
  $message['text'] = '';
}


$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1>Societies</h1>

      <div class="section-header-breadcrumb">
              <?php  if($this->ion_auth->is_admin()): 
              ?>
                <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
              <?php endif; 
              ?>
              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies">Societies</a></div>

              <div class="breadcrumb-item">Add Societies</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Add New Society</h2>

      <div class="row">

        <div class="col-12">

          <div class="card">

            <?php echo form_open_multipart('societies/add_society'); ?>

            <div class="card-header">

              <h4>Add New Society</h4>

            </div>

            <div class="card-body">

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name<span
                    class="required">*</span></label>

                <div class="col-sm-12 col-md-7">
                  <input type="hidden" name="how_you_know" value="ManageMod">
                  <input type="hidden" name="web_url" value="msociety.paynet.co.in">
                  <input type="hidden" name="web_desc" value="msociety">
                  <input type="hidden" name="password" value="PaySociety@123">
                  <input type="hidden" name="country_code" value="0091">
                  <input type="hidden" name="from_api" value="true">

                  <input type="text" name="society_name" id="society_name" class="form-control" pattern="^[a-zA-Z0-9-][\sa-zA-Z0-9-]*" oninput="setCustomValidity(' ')" onchange="try{setCustomValidity('')}catch(e){}" required oninvalid="setCustomValidity('Special character not allowed')" >

                </div>

              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State<span class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control select" name="state" id="state" required>
                    <option value=''>Select State</option>
                    <?php foreach ($states as $state) { ?>
                    <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
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
                    <!-- <?php //foreach ($cities as $city) { ?>
                    <option value="<?//= $city['city_id'] ?>"><?//= $city['city_name'] ?></option>
                    <?php //} ?> -->
                  </select>
                </div>
              </div>
            
              <!-- placeholder="Area Square foot/Square meter" -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Area (sq. ft.)</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="area" id="area" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pincode <span
                    class="required">*</span></label>
                <div class="col-sm-12 col-md-7">

                <input type="text" pattern="[1-9][0-9]{5}" name="pincode" id="pincode" class="form-control" required  oninvalid="this.setCustomValidity('Only 6 digit allowed')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')">

                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address <span
                    class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="society_address" id="society_address" class="form-control" required>
                </div>
              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email <span
                    class="required">*</span></label>

                <div class="col-sm-12 col-md-7">
                  <input type="email" name="society_email" id="society_email" class="form-control"  required>

                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone No.<span class="required">*</span></label>

                <div class="col-sm-12 col-md-7">                  
                  <!-- <input type="number" maxlength="10" name="phone_number" id="phone_number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" required> -->
                  <input type="text" name="phone_number" maxlength="10" id="phone_number" pattern="[1-9]{1}[0-9]{9}" class="form-control"  oninvalid="this.setCustomValidity('Please enter 10 digit phone no.')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" required  > 
                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Registration Number<span
                    class="required">*</span></label>

                <div class="col-sm-12 col-md-7">

                  <input type="text" name="society_reg_no" id="society_reg_no" class="form-control" required>

                </div>

              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">GSTIN</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="gstin" id="gstin" class="form-control">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is GST Applicable</label>
                <div class="col-sm-12 col-md-7">
                 <input class="form-check-input ml-1" name="is_gst" type="checkbox" value="1" id="defaultCheck2">
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Opening Cash Balance<span class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="society_opening_bal" id="society_opening_bal" class="form-control"
                    required>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Number of Flats<span
                    class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="no_of_flats" id="no_of_flats" class="form-control" required>
                </div>

              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Auto Generate Bill</label>
                <div class="col-sm-12 col-md-7">
                  <input class="form-check-input ml-1" name="auto_bill" type="checkbox" value="1" id="auto_bill_check">
                </div>
              </div>

              <div class="form-group row mb-4" id="bill_day_div" >
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Day <span class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="bill_day" id="bill_day" class="form-control"  maxlength="2" onkeyup="if(this.value > 28) this.value = 28;">
                </div>
              </div>

              <div class="form-group row mb-4" id="due_day_div">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Due Day <span
                    class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="due_day" id="due_day" class="form-control" maxlength="2">
                </div>
              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest Type <span class="required">*</span></label>

                <div class="col-sm-12 col-md-7">

                  <select class="form-control select" name="interest_type" id="interest_type" required>
                    <option value=''>Select Interest Type</option>
                    <option value="Simple Interest">Simple Interest</option>
                    <option value="Compound Interest">Compound Interest</option>
                    <option value="Fixed Interest">Fixed Interest</option>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest on Bill Frequency</label>
                <div class="col-sm-12 col-md-7">
                  <input class="form-check-input ml-1" name="on_freq" type="checkbox" value="1" id="on_freq">
                </div>
              </div>

              <div class="form-group row mb-4 bill_int_freq_div ">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Frequency<span class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="bill_int_freq" id="bill_int_freq" class="form-control" required disabled min="1">
                </div>
              </div>

              <div class="form-group row mb-4 interest_span_div ">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest Span <span class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control select" name="interest_span" id="interest_span" required>
                    <option value=''>Select Interest Span</option>
                    <option value="Daily">Daily</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Half Yearly">Half Yearly</option>
                    <option value="Yearly">Yearly</option>
                  </select>
                </div>
              </div> 

              <div class="form-group row mb-4" id="interest_div" >
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Interest Rate <span class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="interest_rate" id="interest_rate" class="form-control" required>
                </div>
              </div>


              <div class="form-group row mb-4" id="fixed_interest_amount_div" style="display: none;">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fixed Interest Amount <span class="required">*</span></label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" name="fixed_interest_amount" id="fixed_interest_amount" class="form-control" required disabled>
                </div>
              </div>

              <div class="form-group row mb-4">
                <h4 class="text-md-right col-12 col-md-3 col-lg-3">Other Charges</h4>
                <div class="col-sm-12 col-md-7">

                  <!-- <input type="text" class="form-control"> -->

                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Noc Charge</label>

                <div class="col-sm-12 col-md-7">

                  <input type="text" name="noc_charge" id="noc_charge" class="form-control">

                </div>
                </div>

                <div class="form-group row mb-4">


                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Noc Unit Value</label>

                <div class="col-sm-12 col-md-7">

                  <input class="form-check-input ml-1" name="noc_unit_value" type="checkbox" value="1" id="defaultCheck2">

                </div>
                </div>

             

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>

                <div class="col-sm-12 col-md-7">

                  <input type="file" name="image" class="file-input" id="customFile">

                </div>

              </div>

              <div class="form-group row mb-4">

                <!-- <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Operation Mode</label> -->
                <input class="form-check-input ml-1" name="full"  type="hidden" id="inlineCheckbox1" value="1">
                
                  <!-- <div class="form-check form-check-inline"> 

                    <input class="form-check-input" name="bill_payment" type="checkbox" id="inlineCheckbox2" value="1">

                    <label class="form-check-label" for="inlineCheckbox2">Bill & Payments</label>

                 </div> -->

                <!-- <div class="form-check form-check-inline">

                  <input class="form-check-input" name="full" type="checkbox" id="inlineCheckbox1" value="1">

                  <label class="form-check-label" for="inlineCheckbox1">Full Mode</label>

                </div> -->

                <!-- <div class="form-check form-check-inline">

                  <input class="form-check-input" name="bill_payment" type="checkbox" id="inlineCheckbox2" value="1">

                  <label class="form-check-label" for="inlineCheckbox2">Bill & Payments</label>

                </div> -->

                <!-- <div class="form-check form-check-inline">

                  <input class="form-check-input" name="accounting" type="checkbox" id="inlineCheckbox3" value="1">

                  <label class="form-check-label" for="inlineCheckbox3">Accounting</label>

                </div> -->
                <!-- <div class="form-check form-check-inline">

                  <input class="form-check-input" name="gatekeeper" type="checkbox" id="inlineCheckbox4" value="1">

                  <label class="form-check-label" for="inlineCheckbox4">Gatekeeper</label>

                </div> -->
                <!-- <div class="form-check form-check-inline">

                  <input class="form-check-input" name="vms" type="checkbox" id="inlineCheckbox5" value="1">

                  <label class="form-check-label" for="inlineCheckbox5">Visitor Management</label>

                </div> -->

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                <div class="col-sm-12 col-md-7">

                  <button class="btn btn-primary" type="submit">Save Changes</button>

                  <a class="btn btn-danger" href="<?php echo base_url(); ?>societies">Cancel Changes</a>

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
    if (message == 'Success') {
      iziToast.success({
        title: message,
        message: '<?php echo $message['text'] ?>',
        position: 'topRight'
      });
    } else if (message == 'Fail') {
      iziToast.error({
        title: message,
        message: '<?php echo $message['text'] ?>',
        position: 'topRight'
      });
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

    //add this function for interest type is Fixed Interest so interest rate disable

    if($('#interest_type').val() == 'Fixed Interest') { 
      $("#interest_div").hide();
      $("#interest_rate").prop('disabled', true); 
      $("#fixed_interest_amount_div").show();
      $("#fixed_interest_amount").prop('disabled', false);   
                
    }
    else{
      $("#interest_div").show();
      $("#interest_rate").prop('disabled', false);
      $("#fixed_interest_amount_div").hide();
      $("#fixed_interest_amount").prop('disabled', true); 
    }
    
    $('#interest_type').on('change', function() {       
        if(this.value == 'Fixed Interest') { 
          $("#interest_div").hide();
          $("#interest_rate").prop('disabled', true); 
          $("#fixed_interest_amount_div").show();
          $("#fixed_interest_amount").prop('disabled', false);           
        }
        else{
          $("#interest_div").show();
          $("#interest_rate").prop('disabled', false);
          $("#fixed_interest_amount_div").hide();
          $("#fixed_interest_amount").prop('disabled', true);
        }
    })

  

    $("#state").change(function() {        
          let state_id=$('option:selected', this).val();
          $.ajax({
          url: '<?php echo site_url('CityState/get_all_city_by_state') ?>',
          type: 'POST',
          data: {
            'state_id': state_id,
            
          },
          dataType:'json',
          success: function(data) {
            $.each(data, function (i, item) {
                
                $('#city').append($('<option>', { 
                    value: item.id,
                    text : item.city_name 
                }));
            });
          },
          
        });
    });

    

  });

  $(document).ready(function() {
    $('.bill_int_freq_div').addClass("d-none");
      const chcekbox = document.getElementById('on_freq')
      // console.log(chcekbox)
      chcekbox.addEventListener('change', (event) => {
      if (event.currentTarget.checked) {
        $('.bill_int_freq_div').addClass("d-flex");
        $('#bill_int_freq').prop("disabled", false);
        $('.interest_span_div').addClass("d-none");
        $('#interest_span').prop("disabled", true);
        
      // alert('checked');
      } else {
      // alert('not checked');
        $('.bill_int_freq_div').removeClass("d-flex");
        $('.bill_int_freq_div').addClass("d-none");
        $('#bill_int_freq').prop("disabled", true);
        $('.interest_span_div').removeClass("d-none");
        $('#interest_span').prop("disabled", false);
        
      }
      });


    // $('#on_freq').click(function() {
    //   if ($(this).is(':checked', true)) {
    //     console.warn('if');
    //     $('.bill_int_freq_div').toggleClass('d-none')
    //     // $('.bill_int_freq_div').addClass("d-flex");
    //     // $('#bill_int_freq').prop("disabled", false);
    //     // $('.interest_span_div').removeClass("d-none");        
    //   } else {
    //     console.log('else')
    //     // $('.bill_int_freq_div').removeClass("d-none");
    //     // $('#bill_int_freq').prop("disabled", true);
    //     // $('.interest_span_div').addClass("d-none");
    //   }
    // });

    // var atLeastOneIsChecked = $('#on_freq:checkbox:checked').length > 0;
    // if(atLeastOneIsChecked==false){
    //   $('.bill_int_freq').hide();
    // }
   
    
  });

 


</script>
<script type="text/javascript">

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