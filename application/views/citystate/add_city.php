<?php

defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('common/header_msoc');
if (!empty($this->session->flashdata('message')))
$message = $this->session->flashdata('message');
else {
$message['status'] = '';
$message['text'] = '';
}

?>

<!-- Main Content -->

<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1>Add City</h1>

            <div class="section-header-breadcrumb">

                <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

                <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>cityState/view_city">City</a></div>

                <div class="breadcrumb-item">Add City</div>

            </div>

        </div>

        <div class="section-body">

            <h2 class="section-title">Add City</h2>

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <?php $attr=array("id"=>"city_form");echo form_open('cityState/add_city',$attr); ?>

                        <div class="card-header">

                            <h4>City</h4>

                        </div>

                        <div class="card-body">
                          <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name<span class="required">*</span></label>
                              <div class="col-sm-12 col-md-7">
                                  <input type="text" name="city_name" id="city_name" class="form-control" required>
                              </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State<span class="required">*</span></label>
                            <div class="col-sm-12 col-md-7">
                              <select class="form-control select" name="state" id="state" required>
                                <option value=''>Select State</option>
                                <?php foreach($states as $state){ ?>
                                  <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                          <div class="col-sm-12 col-md-7">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <a class="btn btn-danger" href="<?php echo base_url(); ?>cityState/view_city">Cancel
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
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text']  ?>',
      position: 'topRight'
    });
    
  }

});

$(document).on('keypress', '#city_name', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
// var max_fields = 3; //maximum input boxes allowed
// var wrapper = $(".input_fields_wrap"); //Fields wrapper

// var x = 1; //initlal text box count
// $("#addbutton").click(function(e) { //on add input button click
//     var parent = $(this).parents('div').find('#pricing_row_1');
//     var row_count = parent.data('whatever');

   
//     $('#plan_name').change($(this).find('option:selected').remove());
//     e.preventDefault();
//     if (x < max_fields) { //max input box allowed
//         x++; //text box increment
//         $(wrapper).append(
//             '<div class="form-group row mb-4"><label for="area" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="text-danger">*</span>Tax Name</label><div class="form-row col-sm-12 col-md-7"><div class="form-group col-md-4"><input type="text" name="plan[' +
//             x +
//             '][tax_name]" id="tax_name" class="form-control"></div><div class="form-group col-md-4"><input type="text" class="form-control" name="plan[1][tax_price]"  id="tax_price" placeholder="Tax Price"></div><div class="form-group col-md-2"><label class="custom-switch mt-2"><input type="checkbox" name="plan[' +
//             x +
//             '][is_active]" class="custom-switch-input" value="1"><span class="custom-switch-indicator"></span><span class="custom-switch-description">Is Percent</span></label></div><div class="form-group col-md-2"></div></div><a href="#" class="remove_field">Remove</a></div>'
//             );
//     }
// });

// $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
//     e.preventDefault();
//     $(this).parent('div').remove();
//     x--;
// })
</script>