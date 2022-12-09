<style>
  .error{
    color: #ff3860;
    font-size: 9px;
    height: 13px;
  }

  .input-control.success input {
    border-color: #09c372;
}

.input-control.error input {
    border-color: #ff3860;
}
/* input:invalid {
      border-color: #DD2C00;
  } */
</style>

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

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>service_providers/view/<?=$society_id?>">Service Provider</a></div>

              <div class="breadcrumb-item">Add Service Provider</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add Service Provider</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php $abc = array('id'=>'testAbc');  echo  form_open_multipart('service_provider/add_service_provider', $abc); ?>

                    <div class="card-header">

                      <h4>Add Service Provider</h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group   row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name <span class="text-danger">*</span></label>

                        <div class="col-sm-12 col-md-7 input-control">

                          <input type="text" name="service_provider_name" class="form-control" pattern="[a-zA-Z ]+" id="name" oninvalid="check(this)" required="required"
                          >
                          <input type="hidden" name="society_id" value="<?= $society_id?>">
                          <div class="error"></div>

                        </div>

                      </div>

                      <div class="form-group   row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>

                        <div class="col-sm-12 col-md-7 input-control">

                          <input type="text" name="service_provider_address" class="form-control" id="address">
                          
                        </div>

                      </div>

                      <div class="form-group   row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact No. <span class="text-danger">*</span></label>

                        <div class="col-sm-12 col-md-7 input-control">

                          <input type="text" required id="contactno" pattern="[0-9]{10}" name="service_provider_phone"  class="form-control"  maxlength="10"  oninvalid="this.setCustomValidity('Only 10 digit allowed')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')">
                          <!-- pattern="[789][0-9]{9}" -->
                        </div>

                      </div>

                      <div class="form-group   row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>

                        <div class="col-sm-12 col-md-7 input-control">

                          <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="service_provider_email" class="form-control" id="email">
                          
                        </div>

                      </div>

                      <div class="form-group   row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SP Type  <span class="text-danger">*</span></label>

                        <div class="col-sm-12 col-md-7 input-control">

                          <select class="form-control select" name="service_provider_type" required>
                            <option value="">Select Service Provider Type</option>
                            <?php foreach($expense_categories as $val){?>
                              <option value="<?php echo $val["name"]?>"><?php echo $val["name"]?></option>
                            <?php }?>
                          </select>
                          
                        </div>

                      </div>

                      <div class="form-group   row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7 input-control">

                          <button class="btn btn-primary" type="submit" >Save</button>

                          <a class="btn btn-danger" href="<?php echo base_url(); ?>service_providers/view/<?=$society_id?>">Cancel Changes</a>

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
function check(input) {
  var mnlen = 6;
var mxlen = 9;

   if (input.value == "") {
     input.setCustomValidity('Name is required');
     setError(name, 'Name is required');
   } else {
     input.setCustomValidity('');
     setSucess(name);
   }
 }



//   const form = document.querySelector('#testAbc');
//   const name = document.getElementById('name');
//   const address= document.getElementById('address');
//   const contactno = document.getElementById('contactno');
//   const email = document.getElementById('email');
// //   // const sptype = document.getElementById('sptype');


//   form.addEventListener('submit', function(e){

//     e.preventDefault();
//     validateInputs();
//   })



//   const validateInputs = () =>{
    
//       const nameValue = name.value.trim();
//       const addressValue = address.value.trim();
//       const contactnoValue = contactno.value.trim();
//       const emailValue = email.value.trim();
//       // const sptype = sptype.value.trim(); 

//       if(nameValue === ''){
//         setError(name, 'Name is required');
//       }else{
//         setSucess(name);
//       }

//       if(addressValue === ''){
//         setError(address, 'address is required');
//       }else{
//         setSucess(address);
//       }

//       if(contactnoValue === ''){
//         setError(contactno, 'contactno is required');
//       }else{
//         setSucess(contactno);
//       }

//       if(emailValue === ''){
//         setError(email, 'email is required');
//       }else{
//         setSucess(email);
//       }

   

//       // if(sptype === ''){
//       //   setError(sptype, 'sptype is required');
//       // }else{
//       //   setSucess(sptype);
//       // }
//   }

const setError = (element, message) =>{
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
} 

const setSucess = element =>{
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

</script>

<script type="text/javascript">

$(document).ready(function() {
  $("#contactno").ForceNumericOnly();
});
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