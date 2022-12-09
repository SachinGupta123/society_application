
<li class="<?php if ($this->uri->segment(1) == "societies" && $this->uri->segment(2) == "society_users") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("societies/society_users/").$this->uri->segment(3); ?>"><i class="ion-model-s"></i><span>User </span></a></li><?php
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
        <li class="<?php if ($this->uri->segment(1) == "societies") echo "active"; ?>">
         <a class="nav-link" href="<?php echo base_url(); ?>societies"><i class="fa fa-columns"></i>
           <span>Societies </span></a>
        </li>
        <?php  if(!empty($this->uri->segment(3))){  ?>
          <!-- <li class="<?php //if ($this->uri->segment(1) == "societies" && $this->uri->segment(2) == "society_users") echo  'active'; ?>"><a class="nav-link" href="<?php //echo base_url("societies/society_users/").$this->uri->segment(3); ?>"><i class="ion-model-s"></i><span>User </span></a></li> -->

          <li class="<?php if ($this->uri->segment(1) == "parking_charges") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("parking_charges/view/") . $this->uri->segment(3); ?>"><i class="ion-model-s"></i><span>Parking Charges</span></a></li>
 
          <li class="<?php if($this->uri->segment(1) == "bank"||$this->uri->segment(1) == "societies_bank" ) echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("bank/view/") . $this->uri->segment(3); ?>"><i  class="ion-ios-briefcase"></i>    <span>Bank</span></a></li>

          <li class="<?php if ($this->uri->segment(1) == "service_providers") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("service_providers/view/") . $this->uri->segment(3); ?>"><i class="ion-ios-briefcase"></i>  <span>Service Provider</span></a></li>

          <li class="dropdown <?php if ($this->uri->segment(1) == "member" || $this->uri->segment(1) == "flat_types" || $this->uri->segment(1) == "users" || $this->uri->segment(1) == "billing_head")  echo 'active'; ?>"> <a href="#" class="nav-link has-dropdown"><i class="far fa-building"></i><span>Flats</span></a> 
            <ul class="dropdown-menu">
              <li class="<?php if ($this->uri->segment(1) == "flat_types"||$this->uri->segment(1) == "billing_head") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("flat_types/view/") . $this->uri->segment(3); ?>">Flat Categories</a> </li>

              <li class="<?php if ($this->uri->segment(1) == "member" &&( $this->uri->segment(2) == "manage" || $this->uri->segment(2) == "add" || $this->uri->segment(2) == "edit" )) echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("member/manage/") . $this->uri->segment(3); ?>">Manage Flats</a></li>

              <li class="<?php if($this->uri->segment(1) == "member" && $this->uri->segment(2) == "assign_flat") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("member/assign_flat/") . $this->uri->segment(3); ?>">Assign Flats</a></li>

              <li class="<?php if(($this->uri->segment(1) == "users")&&( $this->uri->segment(2) == "view_members"||$this->uri->segment(2) == "edit" ))  echo  'active'; ?>">     <a class="nav-link" href="<?php echo base_url("users/view_members/") . $this->uri->segment(3); ?>"> Manage Members</a></li>
              
              
            </ul>
          </li>
          
          <li class="<?php if($this->uri->segment(2) == "society_bill_generate") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("societies/society_bill_generate/") . $this->uri->segment(3); ?>"><i class="ion-ios-list-outline"></i><span>Bills</span></a></li>
          <li class="<?php if ($this->uri->segment(1) == "expense" ) echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("expense/view/") . $this->uri->segment(3); ?>"><i class="ion-social-usd"></i><span> Expenses</span></a></li>
 
 
          <li class="<?php if($this->uri->segment(1) == "societies_cash" ) echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("societies_cash/cash_in_hand/") . $this->uri->segment(3); ?>"><i class="ion-social-usd"></i><span> Cash In Hand</span></a></li>
       
          <li class="<?php if ($this->uri->segment(1) == "societies_report") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("societies_report/reports/") . $this->uri->segment(3); ?>"><i class="ion-ios-paper"></i><span>Reports </span></a></li>
 
          <li class="<?php if ($this->uri->segment(1) == "societies_payment") echo  'active'; ?>"><a class="nav-link" href="<?php echo base_url("societies_payment/society_single_payment/") . $this->uri->segment(3); ?>"><i
             class="ion-ios-paper"></i><span>Payment </span></a></li>
   
        <?php } ?>


     
     
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>auth/logout"><i class="ion-log-out"></i>
          <span>Logout</span></a>
      </li>

     

    </ul>

   
  </aside>
</div>