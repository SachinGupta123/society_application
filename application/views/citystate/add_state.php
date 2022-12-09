<?php

defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1>Add State</h1>

            <div class="section-header-breadcrumb">

                <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></div>

                <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>cityState/view_state"> State</a></div>

                <div class="breadcrumb-item">Add State</div>

            </div>

        </div>

        <div class="section-body">

            <h2 class="section-title">Add State</h2>

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <?php echo form_open_multipart('cityState/add_state'); ?>

                        <div class="card-header">

                            <h4>State</h4>

                        </div>

                        <div class="card-body">

                            <div class="form-group row mb-4">

                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State Name<span class="required">*</span></label>

                                <div class="col-sm-12 col-md-7">

                                    <input type="text" name="state_name" id="state_name" class="form-control"  pattern="[a-zA-Z\s]+" required>

                                </div>

                            </div>


                        </div>

                        <div class="form-group row mb-4">

                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                            <div class="col-sm-12 col-md-7">

                                <button type="submit" class="btn btn-primary">Save</button>
                                <a class="btn btn-danger" href="<?php echo base_url(); ?>cityState/view_state">Cancel
                                    Changes</a>

                            </div>

                        </div>





                    </div>

                    <?php echo form_close(); ?>



                </div>

            </div>

        </div>

</div>

</section>

</div>


<?php $this->load->view('common/footer'); ?>