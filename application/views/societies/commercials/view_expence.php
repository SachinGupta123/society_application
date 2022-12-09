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
        <div class="breadcrumb-item"><a href="<?php  echo base_url();  ?>societies/details/<?= $society_id  ?>">Society Dashboard</a></div>

        <div class="breadcrumb-item">View Expenses</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">View Expenses</h2>

      <div class="row">

        <div class="col-12">

          <div class="card p-2 shadow-sm">

            <div class="card-header">

              <h4>Expenses List</h4>

            </div>
            <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'committee_member' || $this->session->userdata('role') == 'CA') : ?>
            <div class="col-sm-12">
              <a href="<?php echo base_url("expense/add/").$society_id; ?>"
                class="btn btn-icon btn-primary mb-3 float-right"><i class="far fa-edit mr-1"></i>Add Expense</a>
            </div>
            <?php endif; ?>

            <div class="card-body p-3 border">

              <div class="table-responsive">

                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
                  <thead>
                    <tr>

                      <th class="text-left">Sr.</th>
                      <th class="text-left">Bill Date</th>
                      <th class="text-left">Service Provider</th>
                      <th class="text-left">Expense Category</th>
                      <th class="text-left">Description</th>
                      <th class="text-left">Amount</th>
                      <th class="text-left">Cheque No.</th>
                      <th class="text-left">Payment Date</th>
                      <th class="text-left">Status</th>
                      <th class="text-left mtWid">Action</th>

                    </tr>
                  </thead>

                  <tbody>
                    <?php $counter = 0 ; foreach ($expenses as $expense) { ?>
                    <tr>

                      <td class="text-left"><?php echo ++$counter ?></td>
                      
                      <td class="text-left"><?= date("d-m-Y",strtotime($expense['date'])); ?></td>

                      <td class="text-left"><?= $expense['payee'] ?></td>

                      <td class="text-left"><?= $expense['expense_category_id'] ?></td>

                      <td class="text-left"><?= $expense['description'] ?></td>

                      <td class="text-right font-weight-bold"><?= round($expense['amount']) ?></td>
                      <td class="text-left"><?php if(!empty($expense['expense_cheque_no'])) echo $expense['expense_cheque_no'] ?></td>
                      <td class="text-left"><?php if(!empty($expense['payment_date'])) echo date("d-m-Y",strtotime($expense['payment_date']))  ?></td>
                      <td class="text-left"><?= $expense['status'] ?></td>
                      
                      <td class="text-left">
                        <div class="btn-group">
                        <?php if($expense['status']=="Unpaid"){ ?>

                          <a class="bg-info p-2 text-white rounded-left" href="<?php echo base_url("expense/edit_expense/").$expense['society_id']."/".$expense['id'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Dashboard mmm">
                          <i class="fas fa-pen fa-fw"></i> </a>
                            
                          <a class=" bg-success remove  p-2 text-white rounded-right" href="<?php echo base_url("expense/expense_payment/").$expense['society_id']."/".$expense['id'] ?>">Pay Now </a>
                         <?php }?>
                        </div>

                        
                         
                    
                      </td>

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
$(document).ready(function() {
  $('#table-1').DataTable({
    // dom: 'Bfrtip',
    dom: 'lBfrtip',
    
    "ordering": false,
    // order: [[1, 'ASC']],
    // "pageLength": 100,
    // "columnDefs": [
    //   {  "bSortable": false }
    // ],
    buttons: [
        
        {
            extend:  'csv', 
            title:'<?php echo $title ?>',
        },
        {
            extend: 'excel', 
            title:'<?php echo $title ?>',
        },
       
      ],
      scrollY:false,
      scrollX:true,
      "autoWidth": false,
  });
});
</script>