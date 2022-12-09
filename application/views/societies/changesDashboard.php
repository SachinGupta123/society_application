<!-- INSERT INTO `roles` (`id`, `name`, `slug`) VALUES (NULL, 'CA', 'CA'); -->

<?php
defined('BASEPATH') or exit('No direct script access allowed');
$message = $this->session->flashdata('message');
$error_count = '';
if (isset($message['status']) && $message['status'] == "Fail") {
  $error_count = $this->session->flashdata('error_count');
}
$this->load->view('common/header_msoc');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Society</h1>
      <div class="section-header-breadcrumb">
        <?php if ($this->ion_auth->is_admin()) : ?>
        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>
        <?php endif; ?>
        <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner') : ?>
        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies">View Society</a></div>
        <?php endif; ?>
        <div class="breadcrumb-item">Society Dashboard</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Society Details</h2>
      <div class="row">
        <div class="col-12">

        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border card-statistic-1 p-2">
            <div class="card-icon bg-primary width40">
              <i class="fas fa-rupee-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header ptop8">
                <h4>Revenue</h4>
              </div>
              <div class="card-body">
                <?php echo round($total_revenue); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border card-statistic-1 p-2">
            <div class="card-icon bg-danger width40">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header ptop8">
                <h4>Outstanding</h4>
              </div>
              <div class="card-body">
                <?php echo round($outstanding); ?>
              </div>
            </div>
          </div>
        </div>
        <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border card-statistic-1 p-2">
            <div class="card-icon bg-warning width40">
              <i class="fas fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header ptop8">
                <h4>Service Providers</h4>
              </div>
              <div class="card-body">
                <?php echo $service_providers; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border card-statistic-1 p-2">
            <div class="card-icon bg-success width40">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header ptop8">
                <h4>Flats</h4>
              </div>
              <div class="card-body">
                <?php echo $member_count; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row">
       
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card border">
            <div class="card-header">
              <h4>Payment RReceived</h4>
            </div>
            <div class="card-body">
              <canvas id="abc"></canvas>
            </div>
          </div>
        </div>
        <?php //if ($society->full_mode == 1 ) : ?>
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card border">
            <div class="card-header">
              <h4>Income/Expense</h4>
            </div>
            <div class="card-body">
              <canvas id="abcd"></canvas>
            </div>
          </div>
        </div>
        <?php //endif; ?>
     
      </div> -->

      <div class="row">       
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card border">
                <div class="card-header border">
                  <h4 style="font-size: 20px !important;">Payment Received</h4>
                  <!-- <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>                 -->
                </div>               
                <div class="card-body p-0">
                  <div class="container">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link btopradiuso active show p-0" id="Transaction-tab3" data-toggle="tab" href="#Transaction3" role="tab" aria-controls="Transaction" aria-selected="false">Online</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link p-0 btopradiuso" id="Cheque-tab3" data-toggle="tab" href="#Cheque3" role="tab" aria-controls="Cheque" aria-selected="false">Cheque</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link p-0 btopradiuso" id="Cash-tab3" data-toggle="tab" href="#Cash3" role="tab" aria-controls="Cash" aria-selected="true">Cash</a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content" id="myTabContent2" style="height: 275px;overflow: hidden;">
                    <div class="tab-pane fade active show" id="Transaction3" role="tabpanel" aria-labelledby="Transaction-tab3">
                        <div class="table-responsive table-invoice scrollTable02" >
                          <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                            <thead>
                              <tr>
                                <!-- <th>ID</th>
                                <th>Date</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Balance</th>
                                <th>Narration</th> -->
                                <th>Wing</th>
                                <th>Flat No.</th>
                                <th>Date</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(!empty($online_transaction)){ 
                                foreach($online_transaction as $value){
                                ?>
                              <tr>
                                <td><?php echo $value['wing']; ?></td>
                                <td><?php echo $value['flat_no']; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($value['payment_date'])); ?></td>
                                <td class="font-weight-600 text-right"><?php if(!empty($value['credit']))echo round($value['credit']) ?></td>
                                
                            
                              </tr>
                              <?php }}
                              else{ ?>
                              <tr>
                                <td colspan="4" class="text-center">No data found</td>
                              </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Cheque3" role="tabpanel" aria-labelledby="Cheque-tab3">
                        
                      <div class="table-responsive table-invoice scrollTable02" >
                        <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                          <thead>
                            <tr>
                              <!-- <th>ID</th>
                              <th>Date</th>
                              <th>Credit</th>
                              <th>Debit</th>
                              <th>Balance</th>
                              <th>Narration</th> -->

                              <th>Wing</th>
                              <th>Flat No.</th>
                              <th>Date</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($cheque_transaction)){ 
                              foreach($cheque_transaction as $value){
                                
                              ?>
                              <tr>
                                <!-- <td><a href="#"><?php //echo $value['id']; ?></a></td>
                                <td><?php //echo date("d-m-Y",strtotime($value['date'])); ?></td>
                                <td><?php //if(!empty($value['credit']))echo round($value['credit']) ?></td>
                                <td><?php //if(!empty($value['debit']))echo round($value['debit']) ?></td>
                                <td class="font-weight-600 text-right"><?php //echo round($value['balance']) ?></td>
                                <td><?php //echo $value['narration'] ?></td> -->

                                <td><?php echo $value['wing']; ?></td>
                                <td><?php echo $value['flat_no']; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($value['payment_date'])); ?></td>
                                <td class="font-weight-600 text-right"><?php if(!empty($value['credit']))echo round($value['credit']) ?></td>
                            
                              </tr>
                            <?php }}
                              else{ ?>
                              <tr >
                                  <td colspan="4" class="text-center">No data found</td>
                              </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>

                    </div>
                    <div class="tab-pane fade " id="Cash3" role="tabpanel" aria-labelledby="Cash-tab3">
                      
                      <div class="table-responsive table-invoice scrollTable02" >
                        <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                          <thead><tr>
                            <!-- <th>ID</th>
                            <th>Date</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Balance</th>
                            <th>Narration</th> -->
                            <th>Wing</th>
                              <th>Flat No.</th>
                              <th>Date</th>
                              <th>Amount</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($cash_transaction)){ 
                              foreach($cash_transaction as $value){
                              ?>
                            <tr>
                              <!-- <td><a href="#"><?php //echo $value['id']; ?></a></td>
                              <td><?php //echo date("d-m-Y",strtotime($value['date'])); ?></td>
                              <td><?php //if(!empty($value['credit']))echo round($value['credit']) ?></td>
                              <td><?php //if(!empty($value['debit']))echo round($value['debit']) ?></td>
                              <td class="font-weight-600 text-right"><?php //echo round($value['balance']) ?></td>
                              <td><?php //echo $value['narration'] ?></td> -->
                              <td><?php echo $value['wing']; ?></td>
                                <td><?php echo $value['flat_no']; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($value['payment_date'])); ?></td>
                                <td class="font-weight-600 text-right"><?php if(!empty($value['credit']))echo round($value['credit']) ?></td>

                          
                            </tr>
                            <?php }}
                            else{ ?>
                            <tr>
                              <td colspan="4" class="text-center">No data found</td>
                            </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>                  
                </div>
          </div>
        </div>
        <?php if ($society->full_mode == 1 ) : ?>
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card border">
              <div class="card-header border">
                    <h4 style="font-size: 20px !important;">Outstanding</h4>
                    <!-- <div class="card-header-action">
                      <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                    </div> -->
              </div>
              <div class="card-body p-0">
                  <div class="table-responsive table-invoice scrollTable02" >
                    <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                      <thead>
                          <tr>
                            <th>WING</th>
                            <th>FLAT</th>
                            <th>Name</th>                           
                            <th>Amount</th>
                            <th>Status</th>
                          </tr>
                          </thead>
                       
                         
                              <tbody>
                              <?php if(!empty($flat_outstanding)){
                            foreach($flat_outstanding as $value){  
                          ?>
                          <tr>
                          <td class="text-left"><?= $value['wing'] ?></td>
                              <td class="text-left"><?= $value['flat_no'] ?></td>
                              <td class="text-left"><?= $value['name'] ?></td>
                              
                              <td class="text-right font-weight-bold"><?= round($value['total_due']) ?></td>
                              <td class="text-left <?php if($value['bill_status'] == 'Unpaid') {echo 'badge badge-warning text-dark';} else{ echo 'badge  badge-success text-dark';}  ?> "><?= $value['bill_status'] ?></td>
                              <!-- print_r($value['bill_status']); exit(); -->
                          </tr>  
                          <?php } }else{?>
                            <tr>
                            <td colspan="6" class="text-center">No data found</td>
                            
                          </tr>
                          <?php }?>
                        </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card border">
              <div class="card-header border">
                <h4 style="font-size: 20px !important;">Expense</h4>
                <!-- <div class="card-header-action">
                  <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                </div> -->
              </div>
              <div class="card-body p-0">
              <div class="table-responsive table-invoice scrollTable02" >
                    <table class="col-md-12 zi-table table-hover table-condensed cf table-sm">
                      <thead>
                        <tr>
                          <th style="width: 100px;">Date</th>
                          <th>Service Provider</th>
                          <th>Expense Category</th>
                          <th>Description</th>
                          <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($expenses)){
                          foreach ($expenses as $expense) { ?>
                            <tr>

                            
                              <td ><?= date("d-m-Y",strtotime($expense['date'])) ?></td>

                              <td ><?= $expense['payee'] ?></td>

                              <td ><?= $expense['expense_category_id'] ?></td>

                              <td ><?= $expense['description'] ?></td>

                              <td ><?= round($expense['amount']) ?></td>

                            </tr>
                            <?php } }else{?>
                              <tr>
                                <td colspan="5" class="text-center">Not data found</td>

                              </tr>
                            <?php }?>
                      
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card border minheightcarddemo">
              <div class="card-header border">
                    <h4 style="font-size: 20px !important;">Bill</h4>
                  
              </div>
              <div class="card-body text-left">
                <button class="btn btn-lg btn-primary mb-3 trigger--fire-modal-1" id="generate_bill"><i class="fas fa-file-invoice"></i> Generate Bills</button>            

                <a href="<?php echo base_url(); ?>societies/monthly_bill/<?php echo $society->id; ?>"
                  class="btn btn-lg btn-primary mb-3"><i class="fas fa-download"></i> Download Bills</a>
            

                <button class="btn btn-lg btn-primary mb-3 trigger--fire-modal-2" id="bill_register"><i class="fas fa-address-book"></i> Bill Register</button>


                <button class="btn btn-lg btn-primary mb-3 trigger--fire-modal-3" id="collection_register" ><i class="fas fa-address-book"></i>Collection Register</button>
              </div>
            </div>
          </div>
        <?php endif; ?>

        
     
      </div>
    
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card border shadow-sm minheightcarddemo">
             <h4 class="txtfm">Add Flats</h4>
            <div class="card-header">
              <!-- <h4>Card Header</h4> -->
              <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner'  || $this->session->userdata('role') == 'committee_member' || $this->session->userdata('role') == 'CA') : ?>
              <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
              <a href="<?php echo base_url(); ?>member/add/<?= $society->id; ?>" class="btn btn-icon btn-info br0 mr-3 mb-3">
                <i class="far fa-user"></i> Add Flat
              </a>
              <?php endif; ?>
              <?php endif; ?>
              <a href="<?php echo base_url(); ?>member/manage/<?= $society->id; ?>" class="btn btn-icon btn-info br0 mr-3 mb-3">
                <i class="fas fa-users"></i> Manage Flats
              </a>
              <a href="<?php echo base_url(); ?>users/view_members/<?= $society->id; ?>" class="btn btn-icon btn-info br0 mr-3 mb-3">
                <i class="fas fa-users"></i> Manage Users
              </a>
              <div class="card-header-action">
              </div>
            </div>
            <?php //if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
            <?php echo form_open_multipart('societies/import_members' . '/' . $society->id); ?>
            <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
            <div class="card-body">
              <div class="custom-file">
                <p class="bNp"><label>Import Flats</label>
                  <input type="file" name="member_file" id="member_file" required accept=".xls, .xlsx" />
                  <button class="btn btn-primary float-right" type="submit">Import Flats</button>
                </p>
                <p>Only CSV format is allowed! <a
                    href="https://support.office.com/en-us/article/save-a-workbook-to-text-format-txt-or-csv-3e9a9d6c-70da-4255-aa28-fcacf1f081e6"
                    class="ml-2" target="_blank">Help ?</a></p>
              </div>
            </div>
            <!-- <div class="card-footer">
            
            </div> -->
            <?php endif; ?>
            <?php echo form_close(); ?>
            <?php //endif; ?>
            <!-- <div class="card-footer">
                  </div> -->
            <?php //if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
            <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
            <div class="p-3 ml-2">
              <p>Download sample format file by clicking link below.  <a href="<?php echo base_url(); ?>member/exportCSV" class="btn btn-info">Download CSV</a></p>
              <button class="btn btn-info" style="display: none;">Download XLS</button>
             
              <?php if ($this->ion_auth->is_admin()) : ?>
              <button class="btn btn-lg btn-danger delete float-right" id="<?php echo $society->id; ?>">Delete All Flats</button>
              <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php //endif; ?>
          </div>
        </div>


        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="card border shadow-sm minheightcarddemo">
          <h4 class="txtfm">Reports</h4>
            <!-- <div class="card-header">
              <h4>Reports</h4>
            </div> -->
            <div class="card-body text-left">
              <a href="<?php echo base_url(); ?>societies/reports/<?php echo $society->id; ?>"
                class="btn btn-lg btn-light"><i class="fas fa-chart-bar"></i> Reports & Compliance</a>
              <button class="btn btn-lg btn-light" id="send_note"><i class="fas fa-envelope"></i> Send
                Notification</button>
            </div>
            <div class="card-body text-left">
            </div>
          </div>
        </div>

       
        <div class="col-sm-12 col-md-12 col-lg-6">
          <?php //if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
          <div class="card border shadow-sm minheightcarddemo">
          <h4 class="txtfm">Society Actions</h4>
            <div class="card-header">
           
             
              <!-- <div class="card-header"> -->
              <!-- <a href="#" class="btn btn-primary">View All</a>
                        <a href="#" class="btn btn-danger">Delete All</a> -->
                        <div class="d-block mb-w100">
              <a href="<?php echo base_url(); ?>societies/edit/<?php echo $society->id; ?>"
                class="btn btn-icon btn-info br0 mr-3 mb-3">Edit Society</a>
              <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
              <a href="<?php echo base_url(); ?>flat_types/view/<?php echo $society->id; ?>"
                class="btn btn-icon btn-info br0 mr-3 mb-3">Flat Categories</a>
              <a href="<?php echo base_url(); ?>member/assign_flat/<?php echo $society->id; ?>"
                class="btn btn-icon btn-info br0 mr-3 mb-3">Assign Flat Types</a>
                </div>
              <?php endif; ?>
              <!-- </div> -->
            </div>
            <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
            <div class="card-body">
              <a href="<?php echo base_url(); ?>parking_charges/view/<?php echo $society->id; ?>"
                class="btn btn-lg btn-primary"><i class="fas fa-car"></i> Parking Charges</a>
              <a href="<?php echo base_url(); ?>service_providers/view/<?php echo $society->id; ?>"
                class="btn btn-lg btn-primary"><i class="fas fa-wrench"></i> Service Providers</a>
                <a href="<?php echo base_url(); ?>societies/view_security_guard/<?php echo $society->id; ?>"
                class="btn btn-lg btn-primary"><i class="fas fa-shield-alt"></i> Security Guard</a>
            </div>
            <div class="">
             
              <!-- <a href="<?php echo base_url(); ?>societies/view_visitors/<?php echo $society->id; ?>" class="btn btn-lg btn-success"><i class="fas fa-users"></i> Visitors</a> -->
              <!-- <a href="<?php echo base_url(); ?>societies/get_society_qr/<?php echo $society->id; ?>" class="btn btn-lg btn-primary">Get QR Code</a> -->
            </div>
            <?php if ($this->ion_auth->is_admin()) : ?>
            <div class="card-body text-right">
              <button class="btn btn-lg btn-danger remove" id="<?php echo $society->id; ?>"><i
                  class="fas fa-trash-alt"></i> Delete Society</button>
            </div>
            <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>      

        <div class="col-sm-12 col-md-12 col-lg-6 ">
          <?php //endif; ?>
          <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
          <div class="card border shadow-sm minheightcarddemo">
          <h4 class="txtfm">Commercials</h4>
            <!-- <div class="card-header">
              <h4>Commercials</h4>
            </div> -->
            <div class="card-body text-left">
              <a href="<?php echo base_url(); ?>bank/view/<?php echo $society->id; ?>" class="btn btn-lg btn-primary"><i
                  class="fas fa-landmark"></i> Bank</a>
              <a href="<?php echo base_url(); ?>expense/view/<?php echo $society->id; ?>"
                class="btn btn-lg btn-primary"><i class="fas fa-coins"></i> Expenses</a>
              <a href="<?php echo base_url(); ?>societies/cash_in_hand/<?php echo $society->id; ?>"
                class="btn btn-lg btn-primary"><i class="fas fa-money-bill"></i> Cash In Hand</a>
            </div>
          </div>

        </div>


          <?php endif; ?>
          <?php //if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin() || $this->session->userdata('role') == 'channel_partner' || $this->session->userdata('role') == 'CA') : ?>
          <?php if ($society->full_mode == 1 /*|| $this->ion_auth->is_admin()*/) : ?>
            <div class="col-sm-12 col-md-12 col-lg-6 ">
          <div class="card border shadow-sm">
          <h4 class="txtfm">Receipts/Flat Collection</h4>
            <div class="card-header">
              
              <button class="btn btn-icon btn-info br0 mr-3" id="add_single_payment">Add Single Payment</button>
            </div>
            <?php echo form_open_multipart('payment/import_payments' . '/' . $society->id); ?>
            <div class="card-body">
          
              <div class="custom-file">
                <p class="bNp"><label>Import Receipts</label>
                  <input type="file" name="payment_file" id="payment_file" required accept=".csv" />
                  <button class="btn btn-primary float-right" type="submit">Add Receipts</button>
                </p>
                <p>Only CSV format is allowed! <a
                    href="https://support.office.com/en-us/article/save-a-workbook-to-text-format-txt-or-csv-3e9a9d6c-70da-4255-aa28-fcacf1f081e6"
                    class="ml-2" target="_blank">Help ?</a></p>
              </div>
            </div>
            <!-- <div class="card-footer">
             
            </div> -->
            <?php echo form_close(); ?>
            <div class="card-footer ">
            
              <p>Download sample payment format file by clicking link below  <a href="<?php echo base_url(); ?>payment/exportCSV/<?php echo $society->id; ?>"
                class="btn btn-info">Download CSV</a></p>
             
            </div>
          </div>
            </div>
      </div>
          <?php endif; ?>
          <?php //endif; ?>
        </div>
      </div>


    </div>
  </section>
</div>
<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
$(document).ready(function() {
  var message = '<?php if (isset($message['status']) && !empty($message['status'])) echo $message['status'] ?>';
  var error_count = '<?php echo $error_count ?>';
  if (message == 'Success') {
    iziToast.success({
      title: message,
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text'] ?>',
      position: 'topRight'
    });
  } else if (message == 'Fail') {
    iziToast.error({
      title: message,
      message: '<?php if (isset($message['text']) && !empty($message['text'])) echo $message['text'] . ' Total Errors: ' . $error_count ?>',
      position: 'topRight'
    });
  }
});



$(".remove").click(function() {
  var id = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this society!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../societies/delete/' + id,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
            console.log();
          },
          success: function() {
            swal("Poof! Your User has been deleted!", {
              icon: "success",
            });
            window.location.replace("../../societies");
          }
        });
      } else {
        swal("Your Society is safe!");
      }
    });
});

$(".delete").click(function() {
  var id = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover these members!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../societies/delete_members_by_society/' + id,
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
            window.location.replace("../../societies/details/" + id);
          }
        });
      } else {
        swal("Your Members are safe!");
      }
    });
});

$(".last_bill").click(function() {
  var id = $(this).attr("id");
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover these bills!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '../../societies/delete_last_bill/' + id,
          type: 'DELETE',
          error: function() {
            swal("Oh Snap!", "Something went Wrong", {
              icon: "error",
            });
          },
          success: function() {
            swal("Poof! Bills have been deleted!", {
              icon: "success",
            });
            // window.location.replace("../../societies/details/" +id);
          }
        });
      } else {
        swal("Your Bills are safe!");
      }
    });
});

let modal_3_body =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Date</label><div class="col-sm-12 col-md-7"><input type="text" name="bill_date" id="bill_date" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';
modal_3_body +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Due Date</label><div class="col-sm-12 col-md-7"><input type="text" name="due_date" id="due_date" class="form-control datepicker" required=""></div></div>';
modal_3_body +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bill Summary</label><div class="col-sm-12 col-md-7"><textarea type="textarea" name="bill_summary" id="bill_summary" class="form-control summernote-lite" required=""></textarea></div></div>';
$("#generate_bill").fireModal({
  title: 'New Bill',
  body: modal_3_body,
  buttons: [{
    text: 'Generate Bill',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var bill_date = $('#bill_date').val();
      var due_date = $('#due_date').val();
      var bill_summary = $('#bill_summary').val();
      var society_id = $('#society_id').val(); /*alert(society_id);*/
      $.ajax({
        url: '../../bill_detail/generate_bill/' + society_id,
        type: 'POST',
        data: {
          'society_id': society_id,
          'bill_date': bill_date,
          'due_date': due_date,
          'bill_summary': bill_summary
        },
       
        success: function(data) {
          window.location.reload();
          // data = $.parseJSON(data);
          // console.log('SUCCESS: ', data);
        },
        error: function(data) {
          window.location.reload();
          // data = $.parseJSON(data);
          // console.log('ERROR: ', data);
        },
      });
    }
  }]
});

let modal =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Month</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bill_month" id="bill_month"><option value="" selected>Select Month</option><?php foreach ($bill_months as $months) { ?><option value="<?php echo $months['bill_month']; ?>"><?php echo $months['bill_month']; ?></option><?php } ?></select></div></div>';
$("#bill_register").fireModal({
  title: 'Bill Register',
  body: modal,
  buttons: [{
    text: 'Go',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var bill_month = $('#bill_month').val();
      // var due_date = $('#due_date').val();
      // var bill_summary = $('#bill_summary').val();
      var society_id = $('#society_id').val();
      location.replace('<?= site_url() ?>societies/register/' + society_id + '/' + bill_month);
    }
  }]
});

let mod =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bill Month</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bill_month1" id="bill_month1"><option value="" selected>Select Month</option><?php foreach ($bill_months as $months) { ?><option value="<?php echo $months['bill_month']; ?>"><?php echo $months['bill_month']; ?></option><?php } ?></select></div></div>';
$("#collection_register").fireModal({
  title: 'Collection Register',
  body: mod,
  buttons: [{
    text: 'Go',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var bill_month1 = $('#bill_month1').val();
      var society_id = $('#society_id').val();
      location.replace('<?= site_url() ?>societies/collection/' + society_id + '/' + bill_month1);
    }
  }]
});

let body =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Notification Content</label><div class="col-sm-12 col-md-7"><textarea type="textarea" name="content" id="content" class="form-control" required=""></textarea><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';
body += '<div class="container" style="width:500px;">';
// body += '<h3 class="text-center">Insert Checkbox values using Ajax Jquery in PHP</h3>';
// <input type="checkbox" class="get_value2" value="push" />Push <br />
body +=
  '<div class="checkbox"><input type="checkbox" class="get_value" value="email" />Email <br /><input type="checkbox" class="get_value1" value="sms" />SMS <br /></div>';
body += '</div>';
$("#send_note").fireModal({
  title: 'Send Notification',
  body: body,
  buttons: [{
    text: 'Send Notification',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var email = [];
      $('.get_value').each(function() {
        if ($(this).is(":checked")) {
          email.push($(this).val());
        }
      });
      email = email.toString();
      var sms = [];
      $('.get_value1').each(function() {
        if ($(this).is(":checked")) {
          sms.push($(this).val());
        }
      });
      sms = sms.toString();
      var push = [];
      $('.get_value2').each(function() {
        if ($(this).is(":checked")) {
          push.push($(this).val());
        }
      });
      push = push.toString();
      var content = $('#content').val();
      var society_id = $('#society_id').val();
      // var member_id = $('#member_id').val();
      // alert('Hello, you clicked me!');
      $.ajax({
        url: '../../societies/note',
        type: 'POST',
        data: {
          'society_id': society_id,
          'content': content,
          email: email,
          push: push,
          sms: sms
        },
        //dataType: 'text',
        success: function(data) {
          // data = $.parseJSON(data);
          console.log('SUCCESS: ', data);
        },
        error: function(data) {
          // data = $.parseJSON(data);
          console.log('ERROR: ', data);
        },
      });
      window.location.reload();
    }
  }]
});
//changes in line number 640 -society id  sachhidnand 25-11-2021
// add single payment
let add_single_payment =
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label><div class="col-sm-12 col-md-7"><input type="text" name="amount1" id="amount1" class="form-control" required=""></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Payment Date</label><div class="col-sm-12 col-md-7"><input type="text" name="payment_dat" id="payment_dat" class="form-control datepicker" required=""><input type="hidden" name="society_id" id="society_id" value="<?php echo $society->id; ?>"></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payment Mode</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="payment_mod" id="payment_mod"><option value="" selected>Select Payment Mode</option><option value="cash">Cash</option><option value="cheque">Cheque</option><option value="neft">NEFT</option></select></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Cheque No.</label><div class="col-sm-12 col-md-7"><input type="text" name="cheque" id="cheque" class="form-control" required=""></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Bank</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="bank" id="bank"><option value="" selected>Select Bank</option><?php foreach ($banks as $bank) { ?> <option value = "<?php echo $bank['id']; ?>" > <?php echo $bank['bank_name']; ?> </option><?php } ?></select > </div></div > ';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter Depositors Bank</label><div class="col-sm-12 col-md-7"><input type="text" name="depositor_bank" id="depositor_bank" class="form-control" required=""></div></div>';
add_single_payment +=
  '<div class="form-group row mb-4"><label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Flat</label><div class="col-sm-12 col-md-7"><select class="form-control select" name="member_id" id="member_id"><option value="" selected>Select Flat</option><?php foreach ($members as $member) { ?><option value="<?php echo $member['id']; ?>"><?php echo $member['flat_no'] . '-' . $member['wing']; ?></option><?php } ?></select></div></div>';
$("#add_single_payment").fireModal({
  title: 'Add Single Payment',
  body: add_single_payment,
  buttons: [{
    text: 'Add Single Payment',
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      var payment_dat = $('#payment_dat').val();
      var payment_mod = $('#payment_mod').val();
      var amount = $('#amount1').val();
      var cheque = $('#cheque').val();
      var bank = $('#bank').val();
      var depositor_bank = $('#depositor_bank').val();
      var society_id = $('#society_id').val();
      var member_id = $('#member_id').val();
      $.ajax({
        url: '../../payment/create',
        type: 'POST',
        data: {
          'society_id': society_id,
          'payment_dat': payment_dat,
          'payment_mod': payment_mod,
          'amount1': amount,
          'bank': bank,
          'cheque': cheque,
          'depositor_bank': depositor_bank,
          'member_id': member_id
        },
        //dataType: 'text',
        success: function(data) {
          data = $.parseJSON(data);
          console.log('SUCCESS: ', data);
        },
        error: function(data) {
          data = $.parseJSON(data);
          console.log('ERROR: ', data);
        },
      });
      window.location.reload();
    }
  }]
});
// add single payment
</script>