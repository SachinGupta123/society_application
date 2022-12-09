<?php
defined('BASEPATH') or exit('No direct script access allowed');
//sachhidanand -25-11-2021
if (!empty($this->session->flashdata('message')))
  $message = $this->session->flashdata('message');
else {
  $message['status'] = '';
  $message['text'] = '';
}
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
        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id ?>">Society Dashboard</a></div>

        <div class="breadcrumb-item">View Bank</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Bank</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Bank List</h4>

            </div>

            <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'committee_member' || $this->session->userdata('role') == 'CA')  : ?>
            <div class="col-sm-12">
              <a href="<?php echo base_url(); ?>bank/add/<?php echo $society_id; ?>" class="btn btn-icon btn-primary float-right"><i
                  class="far fa-edit"></i>Add Bank</a>
            </div>
            <?php endif; ?>

            <div class="form-group text-left">
              <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'committee_member' || $this->session->userdata('role') == 'CA') : ?>
              <div class="col-sm-12">
                <button class="btn btn-primary" id="transfer_to_cash">Transafer to Cash In Hand</button>
                <button class="btn btn-primary" id="to_bank">Transfer</button>
              </div>
              <?php endif; ?>
            </div>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 table table-hover table-sm bankTbl " id="bankList">
                  <thead>
                    <tr>
                     

                      <th >Sr No.</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Branch</th>
                      <th>IFSC Code</th>
                      <th>MICR</th>
                      <th>ACC No.</th>
                      <th class="text-right">Balance</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php $i=0;foreach ($banks as $bank) { 
                    ?>
                    <tr id="<?= $bank['id'] ?>">

                      <td class="text-left"><?= ++$i ?></td>

                      <td class="text-left"><?= $bank['bank_name'] ?></td>

                      <td class="text-left"><?= $bank['address'] ?></td>

                      <td class="text-left"><?= $bank['branch'] ?></td>

                      <td class="text-left"><?= $bank['ifsc'] ?></td>

                      <td class="text-left"><?= $bank['micr'] ?></td>

                      <td class="text-left"><?= $bank['ac_no'] ?></td>

                      <td class="text-right font-weight-bold"> <?= $bank['current_balance'] ?></td>

                      <td class="text-left"><?php if(!empty($bank['phone'])) echo $bank['phone']; ?></td>

                      <td class="text-left"><?= $bank['email'] ?></td>

                      <td class="text-left">
                      <div class="btn-group">
                        <?php if (/*$this->session->userdata('role') == 'operator' || */$this->ion_auth->is_admin()) : ?>
                        <a href="<?php echo base_url(); ?>bank/edit/<?php echo $society_id; ?>/<?php echo $bank['id']; ?>"
                          class="btn btn-outline-primary "   title=" Edit">
                          <i class="fas fa-pen fa-fw"></i>  
                          <!-- Edit -->
                        </a>
                        <a class="btn btn-outline-danger remove" id="<?php echo $society_id; ?>" title=" Delete">
                        <i class="fas fa-trash fa-fw"></i>
                        <!-- Delete -->
                      </a>
                        <?php endif; ?>
                        <a href="<?php echo base_url("societies_bank/transactions/").$society_id."/".$bank['id']; ?>"
                          class="btn btn-outline-info"  title=" Transactions">
                          <i class="fas fa-landmark fa-fw"></i>
                          <!-- Transactions -->
                        </a>
                        <?php if ($bank['is_default'] != '1') : ?>
                        <a class="btn bg-primary makeDefault text-white" id="makeDefault"  title=" Make Default">Make Default</a>
                        <?php endif; ?>
                      </td>
                        </div>
                    </tr>
                    <?php } ?>
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
<script type="text/javascript">
$(".makeDefault").click(function() {
  var bankId = $(this).parents("tr").attr("id");
  var societyId = '<?php echo $society_id  ?>';
  $.ajax({
    url: '../../bank/make_default/' + bankId + '/' + societyId,
    type: 'GET',
    dataType: 'text',
    success: function(data) {
      location.reload(true);
      // data = $.parseJSON(data);
      // alert('SUCCESS: ', data);
    },
    error: function(data) { 
      location.reload(true);
      // data = $.parseJSON(data);
      // alert('ERROR: ', data);
    },
  });
  
});

$(document).ready(function() {
  //dataTable
  $('#bankList').DataTable({ 
    scrollY:false,
    scrollX:true,
    "autoWidth": false,
  });


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

  $(".amoun").on("keypress keyup blur", function(event) {
    //this.value = this.value.replace(/[^0-9\.]/g,'');
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
      event.preventDefault();
    }
  });


});

$(".remove").click(function() {
  var id1 = $(this).parents("tr").attr("id");
  var id2 = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../bank/remove/' + id1 + '/' + id2,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
          },
          success: function() {
            swal("Poof! Your User has been deleted!", {
              icon: "success",
            });
            location.reload();
          }
        });
      } else {
        swal("Your User is safe!");
      }
    });
});
let modal_3_body ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="payment_date" id="payment_date" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society_id; ?>"></div></div>';
modal_3_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="amount" id="amount" class="form-control amoun" required=""></div></div>';
modal_3_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="description" id="description" class="form-control" required=""></div></div>';
modal_3_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Sender Bank <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bank" id="bank"><option value="" selected>Select Bank</option><?php foreach ($banks as $bank) { ?><option value="<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']; ?></option><?php } ?></select></div></div>';
$("#transfer_to_cash").fireModal({
  title: 'Transfer to Cash in Hand',
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
        url: '../../bank/cash_transfer',
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
          location.reload();
         
        },
        error: function(data) {
          location.reload();
         
        },
      });
     
    }
  }]
});

let modal_body ='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date <span class="required"> *</span> </label><div class="col-sm-12 col-md-7"><input type="text" name="payment_date" id="payment_date" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society_id; ?>"></div></div>';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="amoun" id="amoun" class="form-control amoun" required=""></div></div>';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><input type="text" name="descriptio" id="descriptio" class="form-control" required=""></div></div>';
modal_body +='<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Sender Bank <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="sender_bank" id="sender_bank"><option value="" selected>Select Sender Bank</option><?php foreach ($banks as $bank) { ?><option value="<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']; ?></option><?php } ?></select></div></div>';
modal_body +=`<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Reciever Bank <span class="required"> *</span></label><div class="col-sm-12 col-md-7"><select class="form-control select" name="reciever_bank" id="reciever_bank"><option value="" selected>Select Reciever Bank</option><?php foreach ($banks as $bank) { ?> <option value = "<?php echo $bank['id']; ?>" > <?php echo $bank['bank_name']; ?></option><?php } ?></select > </div></div >`;
$("#to_bank").fireModal({
  title: 'Transfer to Bank',
  body: modal_body,
  buttons: [{
    text: 'Pay',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_date = $('#payment_date').val();
      var amoun = $('#amoun').val();
      var descriptio = $('#descriptio').val();
      var sender_bank = $('#sender_bank').val();
      var reciever_bank = $('#reciever_bank').val();
      var society_id = $('#society_id').val();
      $.ajax({
        url: '../../bank/bank_to_transfer',
        type: 'POST',
        data: {
          'society_id': society_id,
          'payment_date': payment_date,
          'amoun': amoun,
          'descriptio': descriptio,
          'sender_bank': sender_bank,
          'reciever_bank': reciever_bank
        },
        success: function(data) {
          location.reload(); //add this line sachhidanand 09-10-2021
         
        },
        error: function(data) {
          location.reload();
         
        },
      });
    }
  }]
});
</script>