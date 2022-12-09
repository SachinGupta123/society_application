<?php
defined('BASEPATH') or exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
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

      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>
      
            <div class="section-header-breadcrumb">

              <?php if ($this->ion_auth->is_admin()) :?> 
              <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
              <?php endif;?>
              <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div> 
              
              <?php  if($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner'): 
              ?>
                <div class="breadcrumb-item active"><a href="<?php echo base_url();  ?>societies">Societies</a></div>
              <?php  endif; 
              ?>

              <div class="breadcrumb-item"><a href="<?php  echo base_url();  ?>societies/details/<?=$society_id  ?>">Society Dashboard</a></div>

              <div class="breadcrumb-item">View Cash In Hand</div>

            </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Cash In Hand</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Cash In Hand List</h4>

            </div>

            <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'committee_member'|| $this->session->userdata('role') == 'CA') : ?>
            <div class="form-group">
              <div class="col-sm-12">
                <!-- <button class="btn btn-primary" id="expense">Expense</button> -->
                <button class="btn btn-primary" id="cash_transfer">Transfer</button>
              </div>
            </div>
            <?php endif; ?>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">

                  <thead>

                    <tr>

                      <!-- <th class="text-left">Id</th> -->

                      <th class="text-left">Date</th>
                      <th class="text-left">Narration</th>
                      <th class="text-left">Debit</th>
                      <th class="text-left">Credit</th>
                      <th class="text-left mtWid">Balance</th>

                    </tr>

                  </thead>

                  <tbody>
                  
                  <?php if(isset($cash_transaction) && !empty($cash_transaction)){ 
                          $balance=0;
                          foreach($cash_transaction as $ob){

                            if($ob->dc=="D")
                              $balance=$balance+$ob->amount;

                            if($ob->dc=="C") 
                              $balance=$balance-$ob->amount;
                            
                  ?>
                    <tr>                     
                      <td class="text-left"><?php if(isset($ob->date) && !empty($ob->date)){echo date("d-m-Y",strtotime($ob->date));}?></td>
                      <td class="text-left"><?php if(isset($ob->dc) && !empty($ob->narration)){echo $ob->narration;}else{echo "Opening Balance";} ?></td>
                     
                      <td class="text-left"><?php if($ob->dc=="D"){echo $ob->amount;} ?></td>
                     
                      <td class="text-left"><?php if($ob->dc=="C"){echo $ob->amount;} ?></td>
                      <td class="text-left"><?php echo  $balance;?></td>

                    </tr>
                    <?php   }  ?>

                   
                  <?php }
                    else{
                  ?>


                    <?php foreach ($cash_in_hands as $cash) { ?>
                    <tr>

                      <!-- <td class="text-left"><?//= $cash['id'] ?></td> -->

                      <td class="text-left"><?= date("d-m-Y",strtotime($cash['date']))   ?></td>

                      <td class="text-left"><?= $cash['narration'] ?></td>

                      <td class="text-left"><?php  if(!empty($cash['credit'])) echo round($cash['credit']) ?></td>

                      <td class="text-left"><?php  if(!empty($cash['debit'])) echo round($cash['debit']) ?></td>

                      <td class="text-right font-weight-bold"><?= round($cash['balance']) ?></td>

                    </tr>
                    <?php } }?>
                  </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

</div>

<?php $this->load->view('common/footer'); ?>
<script>
  $(document).ready(function(){
    $('#table-1').DataTable({
      "ordering": false,
      "aaSorting": [],
    // order: [[0, 'desc']],
    // dom: 'Bfrtip',
    dom: 'lBfrtip',
    scrollY:false,
    scrollX:true,
    "autoWidth": false,
    buttons: [        
        {
            extend:  'csv', 
            title:'<?php echo $title ?>',
        },
        {
            extend: 'excel', 
            title:'<?php echo $title ?>',
        },       
        
      ]
  });
  })
</script>
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

});


let modal_3_body ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="payment_date" id="payment_date" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society['id']; ?>"></div></div>';
modal_3_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="amount" id="amount" class="form-control amoun" required=""></div></div>';
modal_3_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="description" id="description" class="form-control" required=""></div></div>';
modal_3_body +=`<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bank <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bank" id="bank"><option value="" selected>Select Bank</option><?php foreach ($banks as $bank) { ?> <option value = "<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']; ?></option><?php } ?></select> </div></div >`;
$("#cash_transfer").fireModal({
  title: 'Cash Transfer',
  body: modal_3_body,
  buttons: [{
    text: 'Transfer',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_date = $('#payment_date').val();
      var amount = $('#amount').val();
      var description = $('#description').val();
      var bank = $('#bank').val();
      var society_id = $('#society_id').val();
      $.ajax({
        url: '../../societies/new_cash_transfer',
        type: 'POST',
        data: {
          'society_id': society_id,
          'payment_date': payment_date,
          'amount': amount,
          'description': description,
          'bank': bank
        },
        //dataType: 'text',
        success: function(data) {
          // data = $.parseJSON(data);
          // alert('SUCCESS: ', data);
          location.reload();
        },
        error: function(data) { 
          // data = $.parseJSON(data);         
          // alert('ERROR: ', data);
          location.reload();
        },
      });
     
    }
  }]
});





let modal_body ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="payment_dat" id="payment_dat" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society['id']; ?>"></div></div>';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="amoun" id="amoun" class="form-control amoun" required=""></div></div>';
modal_body +='<div class="form-roup row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="descriptio" id="descriptio" class="form-control" required=""></div></div>';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Service Provider</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="service_provider" id="service_provider"><option value="" selected>Select Service Provider</option><?php //foreach ($service_providers as $service_provider) { ?> <option value = "<?php //echo $service_provider['id']; ?>" > <?php //echo $service_provider['name']; ?> </option><?php //} ?></select > </div></div > ';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Expense Category</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="expense_categorie" id="expense_categorie"><option value="" selected>Select Expense Category</option><?php //foreach ($expense_categories as $expense_categorie) { ?> <option value = "<?php //echo $expense_categorie['name']; ?>"> <?php //echo $expense_categorie['name']; ?> </option><?php //} ?></select></div></div > ';
$("#expense").fireModal({
  title: 'Cash Expense',
  body: modal_body,
  buttons: [{
    text: 'Pay',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_dat = $('#payment_dat').val();
      var amoun = $('#amoun').val();
      var descriptio = $('#descriptio').val();
      var service_provider = $('#service_provider').val();
      var expense_categorie = $('#expense_categorie').val();
      var society_id = $('#society_id').val();

      $.ajax({
        url: '<?php echo site_url('societies/new_cash_expense') ?>',
        type: 'POST',
        data: {
          'society_id': society_id,
          'payment_dat': payment_dat,
          'amoun': amoun,
          'descriptio': descriptio,
          'service_provider': service_provider,
          'expense_categorie': expense_categorie
        },
        success: function(data) {
         
         location.reload();
         
        },
        error: function(data) {
         location.reload();
         
        },
      });
    }
  }]
});














$(document).ready(function() {
  //checking pattern  -12-10-2021
  $(".amoun").on("keypress keyup blur", function(event) {
    //this.value = this.value.replace(/[^0-9\.]/g,'');
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
      event.preventDefault();
    }
  });



});


</script>