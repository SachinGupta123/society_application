<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2 elevation-1 ">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand brand-link border p-0">
      <a href="<?php echo base_url(); ?>dashboard">mSociety</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dashboard">mS</a>
    </div>
    <ul class="sidebar-menu">
     <?php if ($this->ion_auth->is_admin()) : ?>
      <li class="menu-header">Main Navigation</li>
      <li class=" <?php if ($this->uri->segment(1) == 'dashboard') echo  'active'; ?>">
        <a href="<?php echo base_url(); ?>dashboard" class="nav-link "><i
            class="ion-home"></i><span>Dashboard</span></a>
      </li>
      <?php endif; ?>


      <li class="menu-header">Masters</li>
      <?php if ($this->session->userdata('role') == 'operator' || $this->ion_auth->is_admin()) : ?>
      <li class="<?php if ($this->uri->segment(1) == "societies") echo "active"; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>societies"><i class="fa fa-columns"></i>
          <span>Societies</span></a>
      </li>
      <?php endif; ?>
      <?php if ($this->ion_auth->is_admin()) : ?>
      <li class="<?php if ($this->uri->segment(1) == "users") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>users"><i class="fa fa-users"></i> <span>Users</span></a>
      </li>
      <?php endif; ?>
      <?php if ($this->session->userdata('role') == 'master_channel_partner') : ?>
      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>auth/create_user"><i class="fa fa-users"></i> <span>Add
            Users</span></a>
      </li>
      <?php endif; ?>
      <?php if ($this->ion_auth->is_admin()) : ?>
      <li class="<?php if ($this->uri->segment(1) == "expense_categories") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>expense_categories"><i class="ion-arrow-graph-up-right"></i>
          <span>Expense Categories</span></a>
      </li>


      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>services-categories"><i class="ion-stats-bars"></i>
          <span>Services</span></a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == "roles") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>roles"><i class="fa fa-users"></i> <span>Roles</span></a>
      </li>

      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>view-tax"><i class="ion-stats-bars"></i> <span>Tax</span></a>
      </li>

      <li class="<?php if ($this->uri->segment(2) == "view_state") echo 'active' ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>cityState/view_state"><i class="ion-stats-bars"></i>
          <span>State</span></a>
      </li>

      <li class="<?php if ($this->uri->segment(2) == "view_city") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>cityState/view_city"><i class="ion-stats-bars"></i>
          <span>City</span></a>
      </li>

      <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>utility_service_provider"><i
            class="ion-stats-bars"></i><span>Utility Service Providers</span></a>
      </li>

      <li class="<?php if ($this->uri->segment(1) == "activity_logs") echo 'active'; ?> ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>activity_logs"><i class="ion-social-foursquare"></i>
          <span>Activity Logs</span></a>
      </li>

      <li class="<?php if ($this->uri->segment(1) == "enrolment_requests") echo 'active'; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>enrolment_requests"><i class="far fa-square"></i>
          <span>Enrollment Requests</span></a>
      </li>
      <?php endif; ?>


      <?php if (!$this->ion_auth->is_admin() && $this->session->userdata('role') != 'channel_partner') : ?>

      <li
        class="<?php if ($this->uri->segment(1) == "societies" && $this->uri->segment(2) == "details") echo  'active'; ?>">
        <a class="nav-link  <?php echo  $this->session->userdata('role') ?>"
          href="<?php echo base_url("societies/details/") . $this->uri->segment(3); ?>"><i class="ion-cube"></i>
          <span>Dasboard</span></a>
      </li>


      <li class="dropdown <?php if ($this->uri->segment(1) == "member" || $this->uri->segment(1) == "flat_types" || $this->uri->segment(1) == "users")  echo 'active'; ?>">
        <a href="#" class="nav-link has-dropdown">
          <i class="far fa-building"></i><span>Flats</span></a>
        <ul class="dropdown-menu">
          <li class="<?php if ($this->uri->segment(1) == "member" && $this->uri->segment(2) == "manage") echo  'active'; ?>">
            <a class="nav-link" href="<?php echo base_url("member/manage/") . $this->uri->segment(3); ?>">Manage
              Flats</a>
          </li>
          <li class="<?php if($this->uri->segment(2) == "view_members")  echo  'active'; ?>">
            <a class="nav-link" href="<?php echo base_url("users/view_members/") . $this->uri->segment(3); ?>"> Manage Users</a>
          </li>
          <li class="<?php if ($this->uri->segment(1) == "flat_types" && $this->uri->segment(2) == "view") echo  'active'; ?>">
            <a class="nav-link" href="<?php echo base_url("flat_types/view/") . $this->uri->segment(3); ?>">Flat
              Categories</a>
          </li>
          <li class="<?php if ($this->uri->segment(1) == "member" && $this->uri->segment(2) == "assign_flat") echo  'active'; ?>">
            <a class="nav-link" href="<?php echo base_url("member/assign_flat/") . $this->uri->segment(3); ?>">Assign
              Flats</a>
          </li>

        </ul>
      </li>

      
      <li class="<?php if ($this->uri->segment(1) == "societies" && $this->uri->segment(2) == "monthly_bill") echo  'active'; ?>">
        <a class="nav-link" href="<?php echo base_url("societies/monthly_bill/") . $this->uri->segment(3); ?>"><i
            class="ion-ios-list-outline"></i>
          <span>Bills</span></a>
      </li>



      <li class="<?php if ($this->uri->segment(1) == "parking_charges" && $this->uri->segment(2) == "view") echo  'active'; ?>">
        <a class="nav-link" href="<?php echo base_url("parking_charges/view/") . $this->uri->segment(3); ?>"><i
            class="ion-model-s"></i>
          <span>Parking Charges</span></a>
      </li>



      <li class="<?php if ($this->uri->segment(1) == "bank" && $this->uri->segment(2) == "view") echo  'active'; ?>">
        <a class="nav-link" href="<?php echo base_url("bank/view/") . $this->uri->segment(3); ?>"><i
            class="ion-ios-briefcase"></i>
          <span>Bank</span></a>
      </li>



      <li class="<?php if ($this->uri->segment(1) == "expense" && $this->uri->segment(2) == "view") echo  'active'; ?>">
        <a class="nav-link" href="<?php echo base_url("expense/view/") . $this->uri->segment(3); ?>"><i
            class="ion-social-usd"></i>
          <span> Expenses</span></a>
      </li>


      <li class="<?php if ($this->uri->segment(1) == "societies" && $this->uri->segment(2) == "cash_in_hand") echo  'active'; ?>">
        <a class="nav-link" href="<?php echo base_url("societies/cash_in_hand/") . $this->uri->segment(3); ?>"><i
            class="ion-social-usd"></i>
          <span> Cash In Hand</span></a>
      </li>



      <li class="">
        <a class="nav-link" href="<?php echo base_url("societies/cash_in_hand/") . $this->uri->segment(3); ?>"><i
            class="ion-ios-list"></i>
          <span>Receipts </span></a>
      </li>


      <li class="<?php if ($this->uri->segment(1) == "societies" &&($this->uri->segment(2) == "reports"|| $this->uri->segment(2) == "bank_reconciliation" || $this->uri->segment(2) == "all_member_ledger" || $this->uri->segment(2) == "expenses" || $this->uri->segment(2) == "cash" || $this->uri->segment(2) == "outstanding_report" || $this->uri->segment(2) == "payment_report" || $this->uri->segment(2) == "member_balance_report" || $this->uri->segment(2) == "i_register" || $this->uri->segment(2) == "j_register" || $this->uri->segment(2) == "share_register" || $this->uri->segment(2) == "investment_register"   )) echo  'active'; ?>">
        <a class="nav-link" href="<?php echo base_url("societies/reports/") . $this->uri->segment(3); ?>"><i
            class="ion-ios-paper"></i>
          <span>Reports </span></a>
      </li>
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