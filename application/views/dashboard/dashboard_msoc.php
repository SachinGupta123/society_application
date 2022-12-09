<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('common/header_msoc');

?>

      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-header">

            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">

            <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

            </div>

          </div>

          <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">

              <div class="card border card-statistic-1 p-2">

                <div class="card-icon bg-primary width40">

                  <i class="far fa-newspaper"></i>

                </div>

                <div class="card-wrap">

                  <div class="card-header ptop8">

                    <h4>Societies</h4>

                  </div>

                  <div class="card-body">

                    <?php echo $societies ?>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">

              <div class="card border card-statistic-1 p-2">

                <div class="card-icon bg-danger width40">

                  <i class="far fa-user"></i>

                </div>

                <div class="card-wrap">

                  <div class="card-header ptop8">

                    <h4>Flats</h4>

                  </div>

                  <div class="card-body">

                    <?php echo $members ?>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">

              <div class="card border card-statistic-1 p-2">

                <div class="card-icon bg-warning width40">

                  <i class="far fa-user"></i>

                </div>

                <div class="card-wrap">

                  <div class="card-header ptop8">

                    <h4>Users</h4>

                  </div>

                  <div class="card-body">

                    <?php echo $users ?>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">

              <div class="card border card-statistic-1 p-2">

                <div class="card-icon bg-success width40">

                  <i class="fas fa-circle"></i>

                </div>

                <div class="card-wrap">

                  <div class="card-header ptop8">

                    <h4>Service Providers</h4>

                  </div>

                  <div class="card-body">

                    <?php echo $service_providers ?>

                  </div>

                </div>

              </div>

            </div>                  

          </div>

          <div class="row">

            <div class="col-lg-8 col-md-12 col-12 col-sm-12">

              <!-- <div class="card">

                <div class="card-header">

                  <h4>Some Figures</h4>

                  <div class="card-header-action">

                    <div class="btn-group">

                      <a href="#" class="btn btn-primary">Week</a>

                      <a href="#" class="btn">Month</a>

                    </div>

                  </div>

                </div>

                <div class="card-body">

                  <canvas id="myChart" height="182"></canvas>

                  <div class="statistic-details mt-sm-4">

                    <div class="statistic-details-item">

                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>

                      <div class="detail-value">$243</div>

                      <div class="detail-name">Today's Sales</div>

                    </div>

                    <div class="statistic-details-item">

                      <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>

                      <div class="detail-value">$2,902</div>

                      <div class="detail-name">This Week's Sales</div>

                    </div>

                    <div class="statistic-details-item">

                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>

                      <div class="detail-value">$12,821</div>

                      <div class="detail-name">This Month's Sales</div>

                    </div>

                    <div class="statistic-details-item">

                      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>

                      <div class="detail-value">$92,142</div>

                      <div class="detail-name">This Year's Sales</div>

                    </div>

                  </div>

                </div>

              </div>

            </div> -->

            <!-- <div class="col-lg-4 col-md-12 col-12 col-sm-12">

              <div class="card">

                <div class="card-header">

                  <h4>Members</h4>

                </div>

                <div class="card-body">

                  <div id="visitorMap"></div>

                </div>

              </div>

            </div> -->

          </div>

          <!-- <div class="row">

            <div class="col-lg-8 col-md-12 col-12 col-sm-12">

                <div class="card">

                  <div class="card-header">

                    <h4>Sales Graph</h4>

                  </div>

                  <div class="card-body">

                    <canvas id="myChart2"></canvas>

                  </div>

                </div>

              </div>            

          </div> -->
          
        </section>

      </div>

<?php $this->load->view('common/footer'); ?>