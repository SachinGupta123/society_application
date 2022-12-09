<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// $message = $this->session->flashdata('message');
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

            <h1>Generate Monthly Bills</h1>

            <div class="section-header-breadcrumb">

              <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

              <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies">Societies</a></div>

              <div class="breadcrumb-item">Generate Bills</div>

            </div>

          </div>

          <div class="section-body">

            <h2 class="section-title">Generate Bills</h2>

            <div class="row">

              <div class="col-12">

                <div class="card">

                  <?php echo form_open_multipart('bill_payment_mod/generate_bills/'.$society_id); ?>

                    <div class="card-header">

                      <h4>Generate New Bills</h4>
                      <h4><a class="btn btn-lg btn-success" href="<?php echo base_url(); ?>bill_payment_mod/download_sample_file"><i class="fas fa-file-invoice"></i> Download Sample CSV File</a></h4>

                    </div>

                    <div class="card-body">

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Date</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="bill_date" id="bill_date" class="form-control datepicker" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Due Date</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="text" name="due_date" id="due_date" class="form-control datepicker" required="">

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Summary</label>

                        <div class="col-sm-12 col-md-7">

                          <textarea type="textarea" name="bill_summary" id="bill_summary" class="form-control summernote-lite" required=""></textarea>

                        </div>

                      </div>

                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill File</label>

                        <div class="col-sm-12 col-md-7">

                          <input type="file" name="bill_file" id="bill_file" required accept=".xls, .xlsx, .csv" />

                        </div>

                      </div>
                      <div class="form-group row mb-4">

                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">Only CSV format is allowed! <a href="https://support.office.com/en-us/article/save-a-workbook-to-text-format-txt-or-csv-3e9a9d6c-70da-4255-aa28-fcacf1f081e6" class="ml-2" target="_blank">Help ?</a></div>

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
<script type="text/javascript">
  $('#inlineCheckbox1').click(function()
  {
    if($(this).is(':checked', true))
    {
      $('#inlineCheckbox2').prop('checked', true);
      $('#inlineCheckbox3').prop('checked', true);
      $('#inlineCheckbox4').prop('checked', true);
      $('#inlineCheckbox5').prop('checked', true);
    }
    else
    {
      $('#inlineCheckbox2').prop('checked', false);
      $('#inlineCheckbox3').prop('checked', false);
      $('#inlineCheckbox4').prop('checked', false);
      $('#inlineCheckbox5').prop('checked', false);
    }
  });
</script>
<script type="text/javascript">
// $('#start_time').data('daterangepicker').setStartDate(new Date());
 // $("#bill_date").on("change.daterangepicker", function (e) {
 //  var date = $('#bill_date').val();
 //  var end = date.format('DD-MM-YYYY');
 //    $('#due_date').data('daterangepicker').setStartDate(end)
 //  });

// $('#bill_date').on('change', function (e) {
//     $('#due_date').minDate(date);
// });
// $('#due_date').on('dp.change', function (e) {
//     $('#paid').data("DateTimePicker").minDate(e.date);
//     $('#due').data("DateTimePicker").minDate(e.date);
// });
</script>