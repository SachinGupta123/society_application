<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">MSociety</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">MS</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main Navigation</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
              <a href="<?php echo base_url(); ?>dist/dashboard_msoc" class="nav-link "><i class="ion-home"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Masters</li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>dist/view_society"><i class="fa fa-columns"></i> <span>Societies</span></a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>dist/view_users"><i class="fa fa-users"></i> <span>Users</span></a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>dist/view_expense_categories"><i class="ion-arrow-graph-up-right"></i> <span>Expences Categories</span></a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/view_utility_provider"><i class="ion-stats-bars"></i> <span>Utility Service Providers</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>dist/view_roles"><i class="fa fa-users"></i> <span>Roles</span></a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>dist/view_activity_logs"><i class="ion-social-foursquare"></i> <span>Activity Logs</span></a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>dist/view_enrolment_requests"><i class="far fa-square"></i> <span>Enrollment Requests</span></a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>dist/login"><i class="ion-log-out"></i> <span>Logout</span></a>
            </li>
          </ul>

          <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div> -->
        </aside>
      </div>
