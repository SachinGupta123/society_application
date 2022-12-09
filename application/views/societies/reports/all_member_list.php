<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
           
            <div class="breadcrumb-item active"><a href="<?php echo base_url("societies/details/").$society_id; ?>">Society Dashboard</a></div>
           
            <div class="breadcrumb-item"><a href="<?php echo base_url("societies_report/reports/").$society_id; ?>">View Reports</a></div>  
            <div class="breadcrumb-item">Manage Flats</div>
        </div>
    </div>



    <div class="section-body">
      <h2 class="section-title">Manage Flats</h2>
      <div class="row">
        <div class="col-12">          
          <div class="card shadow-sm p-2">
            <div class="card-header">
              <h4>Flats List</h4>
            </div>
            <div class="card-body p-3 border">           
              <div class="table-responsive">
                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm order-column stripe" id="mFlats" style="width:100%">                
                  <thead>
                    <tr>                      
                      <th class="text-left">Wing</th>
                      <th class="text-left">Flat No.</th>
                      <th class="text-left">Name</th>                      
                      <th class="text-left">Action</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                 
                  <?php foreach ($members as $member) { 
                     $owner = $this->Member_model->get_flat_owner($member['id']);
                   ?>
                    <tr>                     
                      <td class="text-left"><?= $member['wing'] ?></td>
                      <td class="align-middle"><?= $member['flat_no'] ?></td>
                      <td class="text-left"><?= $member['name'] ?></td>                     
                      <td class="text-left">                      
                        <div class="btn-group">                             
                            
                          <a href="<?php echo base_url("societies_report/member_ledger_report/").$society_id."/".$member['id']; ?>" class="btn btn-outline-info" data-toggle="tooltip"  data-placement="top" title=" Transactions">
                          <i class="fas fa-landmark fa-fw"></i> </a>

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
   
    $('#mFlats').DataTable({
      
        // scrollY:        '100%',
        // scrollX:        true,
        // scrollCollapse: true,
        // // paging:         true,
        // "aaSorting": [],  
        // fixedColumns:   {
        //     leftColumns: 4
        // }
       
      
        
    }); 


});
</script>

 
