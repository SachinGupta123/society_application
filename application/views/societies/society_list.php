<?php
defined('BASEPATH') or exit('No direct script access allowed');
$message = $this->session->flashdata('message');
$this->load->view('common/header_msoc');
 
?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1 class="brandCaptialW">Societies</h1>

      <div class="section-header-breadcrumb">
      <div class="breadcrumb-item "><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>users">Users</a></div>
            
        <div class="breadcrumb-item">View Societies</div>

      </div>

    </div>

    <div class="section-body">
      <h2 class="section-title">View Societies</h2>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6"> </div>
      </div>
      <div class="row"> 
        <div class="col-12">
          <div class="card p-2 shadow-sm">
            <div class="card-header justify-content-between">
              <h4 class="textColor">Societies List</h4>             
            </div>

            <div class="card-body p-3 border">
              <div class="table-responsive">
                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm society_list_table" id="table-1">
                  <thead>
                    <tr>                    

                      <th class="text-left">Societies</th>

                      <th class="text-left">Registration No.</th>

                      <th class="text-left">No. of Flats</th>

                      <th class="text-left">Opening Balance</th>
                   
                    </tr>
                  </thead>

                  <tbody>
                      <?php if(isset($total_societies)&& !empty($total_societies)):
                            foreach($total_societies as $society_list):
                      ?>
                      <tr role="row" class="odd">

                          <td class="text-left sorting_1"><?php echo $society_list["name"]?></td>
                          <td class="text-left"><?php echo $society_list["registration_no"]?></td>
                          <td><?php echo $society_list["flat"]?></td>
                          <td class="text-left">
                          <?php echo $society_list["opening_balance"]?>                                                  
                          </td> 
                      </tr>
                      <?php endforeach;endif;?>
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


    $('.society_list_table').dataTable();
});
</script>