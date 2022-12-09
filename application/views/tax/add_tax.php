<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Add Tax</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>expense_categories">Add Tax</a></div>

              <div class="breadcrumb-item">Add Tax</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Add Tax</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open_multipart('Tax/add_tax'); ?>

                    <div class="card-header">

                      <h4>Tax Group</h4>

                    </div>

                    <div class="card-body">

                       <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tax Group</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="tax_group" id="tax_group" class="form-control">

                        </div>

                      </div> 

                       <!-- <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tax Value</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="tax_value" id="tax_value" class="form-control">

                        </div>

                      </div> -->

                        <!-- <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is GST Applicable</label>

                        <div class="col-sm-12 col-md-7">

                          <input class="form-check-input" name="is_gst" type="checkbox" value="1" id="defaultCheck2">

                        </div>

                      </div> -->

          <div class="form-group row mb-4" data-whatever="1" id="pricing_row_1">
          <label for="area" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
          <span class="text-danger">*</span>Tax Name</label>
          

          <div class="form-row col-sm-12 col-md-7">
                      <div class="form-group col-md-4">
                        
                          <input type="text" name="plan[1][tax_name]" class="form-control">
                      </div>
                      <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="plan[1][tax_price]" placeholder="Tax Price">
                      </div>
                      <div class="form-group col-md-2">
                        <label class="custom-switch mt-2">
                          <input type="checkbox" name="plan[1][is_active]" class="custom-switch-input" value="1">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Is Percent</span>
                    </label>
                      </div>
                      <div class="form-group col-md-2">
                        <button class="btn btn-icon btn-primary float-right add_button" id="addbutton"><i class="fas fa-plus"></i></button>
                      </div>
                    </div>
        </div>
                    <div class="input_fields_wrap"></div> 

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                        <div class="col-sm-12 col-md-7">

<button type="submit" class="btn btn-primary">Save</button>
                          <a class="btn btn-danger" href="<?php echo base_url(); ?>services-categories">Cancel Changes</a>

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
     

        var max_fields      = 3; //maximum input boxes allowed
var wrapper       = $(".input_fields_wrap"); //Fields wrapper
  
  var x = 1; //initlal text box count
  $("#addbutton").click(function(e){ //on add input button click
      var parent = $(this).parents('div').find('#pricing_row_1');
      var row_count = parent.data('whatever');

      console.log(row_count);
      $('#plan_name').change($(this).find('option:selected').remove());
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="form-group row mb-4"><label for="area" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><span class="text-danger">*</span>Tax Name</label><div class="form-row col-sm-12 col-md-7"><div class="form-group col-md-4"><input type="text" name="plan['+x+'][tax_name]" id="tax_name" class="form-control"></div><div class="form-group col-md-4"><input type="text" class="form-control" name="plan[1][tax_price]"  id="tax_price" placeholder="Tax Price"></div><div class="form-group col-md-2"><label class="custom-switch mt-2"><input type="checkbox" name="plan['+x+'][is_active]" class="custom-switch-input" value="1"><span class="custom-switch-indicator"></span><span class="custom-switch-description">Is Percent</span></label></div><div class="form-group col-md-2"></div></div><a href="#" class="remove_field">Remove</a></div>');
    }
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })


     

      </script>