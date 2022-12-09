<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<body>

  <div id="app">

    <div class="main-wrapper main-wrapper-1">

      <div class="navbar-bg"></div>

      <nav class="navbar navbar-expand-lg main-navbar justify-content-between">
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg mt-4"><i class="fas fa-bars text-dark"></i></a>
        <ul class="navbar-nav navbar-right  ">




          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">

              <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/user.png" class="rounded-circle mr-1">

              <div class="d-sm-none d-lg-inline-block text-dark">Hi,
                <?= $this->session->userdata('name') != NULL ? $this->session->userdata('name') : 'Admin' ?></div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

              <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->

            

              <div class="dropdown-divider"></div>

              <a href="<?php echo base_url(); ?>auth/logout" class="dropdown-item has-icon text-danger">

                <i class="fas fa-sign-out-alt"></i> Logout

              </a>

            </div>

          </li>

        </ul>

      </nav>