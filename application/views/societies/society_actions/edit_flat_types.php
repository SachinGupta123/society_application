<?php

defined('BASEPATH') or exit('No direct script access allowed');
$society_id = $this->uri->segment(3);
// print_r ($flat_type);die;
$this->load->view('common/header_msoc');

?>

<!-- Main Content -->

<div class="main-content">

  <section class="section">

    <div class="section-header">

      <h1>Societies</h1>

      <div class="section-header-breadcrumb">
        <?php if ($this->ion_auth->is_admin()) :?> 
        <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
        <?php endif;?>
        <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div>            

        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>societies/details/<?=$society_id  ?>">Society Dashboard</a></div>

        <div class="breadcrumb-item"><a href="<?php echo base_url();  ?>flat_types/view/<?=$society_id ?>">Flat Category</a></div>

        <div class="breadcrumb-item">Edit Flat Category</div>

      </div>

    </div>

    <div class="section-body">

      <h2 class="section-title">Edit Flat Category</h2>

      <div class="row">

        <div class="col-12">

          <div class="card">

            <?php $arr = array('flat_type_id' => $flat_type['id']); ?>
            <?php echo form_open_multipart('flat_type/edit_flat_type', '', $arr); ?>

            <div class="card-header">

              <h4>Edit Flat Category</h4>

            </div>

            <div class="card-body">

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>

                <div class="col-sm-12 col-md-7">

                  <input type="text" name="flat_type" value="<?= $flat_type['name'] ?>" class="form-control">
                  <!-- <input type="text" name="flat_type_id" value="<?= $flat_type['id'] ?>"> -->
                  <input type="hidden" name="society_id" value="<?= $flat_type['society_id'] ?>">

                </div>

              </div>

              <div class="form-group row mb-4">

                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

                <div class="col-sm-12 col-md-7">

                  <button class="btn btn-primary" type="submit">Save Changes</button>

                  <a class="btn btn-danger" href="<?php echo base_url(); ?>flat_types/view/<?= $society_id ?>">Cancel
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