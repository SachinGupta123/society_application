<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2 elevation-4 ">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand brand-link border p-0">
      <a href="<?php echo base_url(); ?>dashboard">mSociety</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dashboard">mS</a>
    </div>
    <ul class="sidebar-menu">
    <?php  if ($this->ion_auth->is_admin()) : ?>      

      <li class="menu-header">Main Navigation</li>
      <li class=" <?php if ($this->uri->segment(1) == 'dashboard') echo  'active'; ?>">
        <a href="<?php echo base_url(); ?>dashboard" class="nav-link "><i
            class="ion-home"></i><span>Dashboard</span></a>
      </li>

      <li class="menu-header <?php echo $this->uri->segment(1) ?>">Masters</li> 
      
      <li class="<?php if ($this->uri->segment(1) == "societies" && empty($this->uri->segment(2))) echo "active"; ?>">
      <a class="nav-link" href="<?php echo base_url(); ?>societies"><i class="far fa-building"></i><span>Societies </span></a></li>
     
      <?php 
        if(($this->uri->segment(1) != "roles"  && $this->uri->segment(1) != "cityState"  && $this->uri->segment(1) !="expense_categories"  && $this->uri->segment(1) !="society_access" && $this->uri->segment(1) !="bill_head_master" && $this->uri->segment(1) !="auth" ) && !empty($this->uri->segment(3))){ 
      ?>

        <li class="<?php if ($this->uri->segment(1) == "society_access_user" || $this->uri->segment(2) == "society_users") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("societies/society_users/").$this->uri->segment(3); ?>"><i class="fa fa-users"></i><span>Society Users </span></a></li>

        <li class="dropdown <?php if ($this->uri->segment(1) == "member" || $this->uri->segment(1) == "flat_types" || $this->uri->segment(1) == "users" || $this->uri->segment(1) == "billing_head")  echo 'active'; ?>"> <a href="#" class="nav-link has-dropdown"><i class="far fa-building"></i><span>Flats</span></a>
          <ul class="dropdown-menu">
            <li class="<?php if ($this->uri->segment(1) == "member" &&( $this->uri->segment(2) == "manage" || $this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit" )) echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("member/manage/") . $this->uri->segment(3); ?>">Manage Flats</a> </li>
            <li class="<?php if ($this->uri->segment(1) == "flat_types"||$this->uri->segment(1) == "billing_head") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("flat_types/view/") . $this->uri->segment(3); ?>">Flat Categories</a></li>            

            <li class="<?php if ($this->uri->segment(1) == "member" && $this->uri->segment(2) == "assign_flat") echo 'active'; ?>"><a class="nav-link" href="<?php echo base_url("member/assign_flat/") . $this->uri->segment(3); ?>">Assign Flats</a></li>

            <li class="<?php if(($this->uri->segment(1) == "users")&&($this->uri->segment(2) == "view_members"||$this->uri->segment(2) == "edit" ))  echo  'active'; ?>">
            <a class="nav-link" href="<?php echo base_url("users/view_members/") . $this->uri->segment(3); ?>"> Manage Members</a></li>
          </ul>
        </li>

        <li class="<?php if ($this->uri->segment(1) == "parking_charges" ) echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("parking_charges/view/").$this->uri->segment(3); ?>"><i class="ion-model-s"></i><span>Parking Charges</span></a></li>

        <li class="<?php if ($this->uri->segment(1) == "bank"|| $this->uri->segment(1) == "societies_bank") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("bank/view/") . $this->uri->segment(3); ?>"><i class="fa-solid fa-building-columns"></i><span>Bank</span></a></li>

        <li class="<?php if ($this->uri->segment(1) == "societies_cash" ) echo  'active'; ?>">   <a class="nav-link" href="<?php echo base_url("societies_cash/cash_in_hand/") . $this->uri->segment(3); ?>"><i class="fa-solid fa-rupee-sign"></i><span> Cash In Hand</span></a></li>

        <li class="<?php if ( $this->uri->segment(2) == "society_bill_generate") echo 'active'; ?>"><a class="nav-link" href="<?php echo base_url("societies/society_bill_generate/"). $this->uri->segment(3); ?>"><i class="ion-ios-list-outline"></i><span>Bills</span></a>  </li>

        <li class="<?php if ($this->uri->segment(1) == "societies_payment" ) echo  'active'; ?>">
        <a class="nav-link" href="<?php echo base_url("societies_payment/society_single_payment/") . $this->uri->segment(3); ?>"><i class="fas fa-hand-holding-usd"></i><span>Payment</span></a></li>

        <li class="<?php if ($this->uri->segment(1) == "service_providers") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("service_providers/view/") . $this->uri->segment(3); ?>"><i class="fa fa-wrench"></i><span>Service Provider</span></a></li>

        <li class="dropdown <?php if ($this->uri->segment(1) == "expense")  echo 'active'; ?>"> <a href="#" class="nav-link has-dropdown"><i class="far fa-money-bill-alt"></i><span>Account Payable</span></a>
          <ul class="dropdown-menu">
            <li class="<?php if($this->uri->segment(1) == "expense" ) echo  'active'; ?>"> <a class="nav-link" href="<?php echo base_url("expense/view/").$this->uri->segment(3); ?>"><i class="ion-social-usd"></i><span> Expenses</span></a></li>                    

          </ul>
        </li>      

        
      
        <li class="<?php if ($this->uri->segment(1) == "societies_report") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("societies_report/reports/") . $this->uri->segment(3); ?>"><i class="ion-ios-paper"></i> <span>Reports </span></a></li>

        
           
      <?php }  else{ ?>
            
      <li class="<?php if ($this->uri->segment(1) == "users" || $this->uri->segment(1) == "auth"||$this->uri->segment(1) == "society_access" ) echo 'active'; ?>"><a class="nav-link" href="<?php echo base_url(); ?>users"><i class="fa fa-users"></i> <span>Users </span></a>
      </li>

      <li class="<?php if ($this->uri->segment(1) == "expense_categories") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>expense_categories"><i class="ion-arrow-graph-up-right"></i><span>Expense Categories </span></a></li>

     

      <li class="<?php if ($this->uri->segment(1) == "roles") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>roles"><i class="fa fa-users"></i> <span>Roles </span></a>      </li>

      <li class="<?php if ($this->uri->segment(1) == "bill_head_master"||$this->uri->segment(1) == "billing_head") echo 'active'; ?>"><a class="nav-link" href="<?php echo base_url("bill_head_master"); ?>"><i class="far fa-square"></i><span>Bill Head</span></a></li>

      
      <li class="<?php if ($this->uri->segment(2) == "view_state"||$this->uri->segment(2) == "add_state"||$this->uri->segment(2) == "edit_state") echo 'active' ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>cityState/view_state"><i class="ion-stats-bars"></i> <span>State </span></a>
      </li>

      <li class="<?php if ($this->uri->segment(2) == "view_city"||$this->uri->segment(2) == "edit_city"|| $this->uri->segment(2) == "add_city") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>cityState/view_city"><i class="ion-stats-bars"></i>
          <span>City </span></a>
      </li>
     <!-- hide of this menu bcoz of current time not -->
      <!-- <li class="<?php //echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php //echo base_url(); ?>utility_service_provider"><i
            class="ion-stats-bars"></i><span>Utility Service Providers </span></a>
      </li> 
        <li class="<?php //echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php // echo base_url(); ?>view-tax"><i class="ion-stats-bars"></i> <span>Tax </span></a></li>

      
      <li class="<?php //if ($this->uri->segment(1) == "activity_logs") echo 'active'; ?> ?>">
        <a class="nav-link" href="<?php //echo base_url(); ?>activity_logs"><i class="ion-social-foursquare"></i>
          <span>Activity Logs </span></a>
      </li>
    
         <li class="<?php //echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php //echo base_url(); ?>services-categories"><i class="ion-stats-bars"></i><span>Services </span></a>      </li>
    -->

      <li class="<?php if ($this->uri->segment(1) == "enrolment_requests") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>enrolment_requests"><i class="far fa-square"></i>
          <span>Enrollment Requests </span></a>
      </li>
      <?php }; ?>


     
      

      <?php endif; ?>

     
     
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>auth/logout"><i class="ion-log-out"></i>
          <span>Logout</span></a>
      </li>

     

    </ul>

    <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div> -->
  </aside>
</div>