	<?php

	defined('BASEPATH') or exit('No direct script access allowed');
	$society_id = $this->uri->segment(3);
	$mem = count($members);
	
	$this->load->view('common/header_msoc');
	//sachhidanand -25-11-2021
	
		if (!empty($this->session->flashdata('message')))
			$message = $this->session->flashdata('message');
		else {
			$message['status'] = '';
			$message['text'] = '';
		}
		$error_count = '';
		if ($message['status'] == "Fail") {
			$error_count = $this->session->flashdata('error_count');
		}
	?>

	<!-- Main Content -->

	<div class="main-content">

	  <section class="section">

	    <div class="section-header">

	      <h1><?php echo society_name($this->uri->segment(3)) ?></h1>

	      <div class="section-header-breadcrumb">
		  <?php if ($this->ion_auth->is_admin()) :?> 
            <div class="breadcrumb-item"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></div>
            <?php endif;?>
            <div class="breadcrumb-item active"><a href="<?php echo base_url("societies"); ?>">Society List</a></div>            
	        <div class="breadcrumb-item"><a href="<?php echo base_url(); ?>societies/details/<?= $society_id ?>">Society
	            Dashboard</a></div>

	        <div class="breadcrumb-item">View Track Flats</div>

	      </div>

	    </div>

	    <div class="section-body">

	      <h2 class="section-title">View Track Flats</h2>

	      <div class="row">

	        <div class="col-12">

	          <div class="card shadow-sm p-2">
				<!-- <form id="flat_type" > -->
				<form id="flat_type" method="post">
	            <?php // echo form_open_multipart('member/track_flat'); ?>
	            <input type="hidden" name="society_id" value="<?= $society_id ?>">
	            <div class="card-header">

	              <h4>Track Flats</h4>

	            </div>

	            <div class="card-body p-3 border">

	              <div class="table-responsive">

	                <table class="col-md-12 zi-table table-hover table-condensed cf table-sm" id="table-1">
	                  <thead>
	                    <tr>

	                      <th class="text-left">Wing</th>

	                      <th class="text-left">Flat No.</th>

	                      <th class="text-left">Flat Category</th>

	                    </tr>
	                  </thead>
	                 
	                  <tbody>
					  <?php $i = 0 ?>
	                  <?php foreach ($members as $member) { ?>
	                    <tr>

	                      <td class="text-left"><?= $member['wing'] ?></td>

	                      <td class="text-left"><?= $member['flat_no'] ?></td>

	                      <td class="text-left">
	                         <!-- previous member code issue -sachhidanand 24-01-2021 -->
							 <!-- <?php // foreach ($flat_types as $flat_type) { ?>
							<?php // if ($member['flat_type_id'] == $flat_type['id']) { ?>
							<option value="<?php //echo $flat_type['id'] ?>" selected style="display: none">
							<?php // echo $flat_type['name'] ?></option>
							<?php // } else { ?>
							<option value="" selected disabled hidden>Select Flat Type</option>
							<?php //} ?>
							<option value="<?//= $flat_type['id'] ?>"><?//= $flat_type['name'] ?></option>
							<?php // } ?> -->
	                        <!-- <input type="hidden" name="post_data[<?= $i ?>][member_id]" value="<?//= $member['id'] ?>">
	                        <select class="form-select custom-select form-control"
	                          name="post_data[<?//= $i ?>][flat_category]" id="flat_category">
							  <option value="">Select Flat Type</option>	
	                          <?php //foreach ($flat_types as $flat_type) { ?>
									<option value="<?//= $flat_type['id'] ?>" <?php //if ($member['flat_type_id'] == $flat_type['id']) echo "selected" ?> ><?//= $flat_type['name'] ?></option>                         	
	                         
	                          <?php // } ?>

							  
	                        </select> -->

							<!-- <input type="hidden" name="[<?//= "member_id".$i ?>]" value="<?//= $member['id'] ?>"> -->
	                        <select class="form-select custom-select form-control"
	                          name="flat_category[<?=$i ?>]" data-member_id="<?=$member['id']?>" id="flat_category">
							  <option value="">Select Flat Type</option>	
	                          <?php foreach ($flat_types as $flat_type) { ?>
									<option value="<?= $member['id']."-".$flat_type['id'] ?>" <?php if ($member['flat_type_id'] == $flat_type['id']) echo "selected" ?> ><?= $flat_type['name'] ?></option>                         	
	                         
	                          <?php  } ?>

							  
	                        </select>
	                       
	                      </td>

	                    </tr>
						<?php ++$i;
										} ?>
	                  </tbody>
	                 

	                </table>

	              </div>

	            </div>

	            <?php if (!empty($members)) : ?>
	            <div class="form-group row mt-4">

	              <div class="col-sm-12 col-md-7">
	                <button class="btn btn-primary" type="submit">Save</button>
	                <!-- <a class="btn btn-danger" href="<?php echo base_url(); ?>member/assign_flat/<?= $society_id ?>">Cancel
	                  Changes</a> -->
	                <button type="reset" class="btn btn-secondary ms-3">Reset</button>
	              </div>
	            </div>
	            <?php endif; ?>
	            <?php //echo form_close(); ?>
				</form>
	          </div>

	        </div>

	      </div>

	    </div>

	  </section>

	  <div class="form-group row mb-3 download_div" style="display:none;">
        <label class="col-12 col-md-3 col-lg-3"></label>
        <div class="col-sm-12 col-md-7">
            <div class=""> 
                <div class="me-3">Download sample format file by clicking link below.</div>
                <a href="<?php echo base_url("assets/uploads/")."bill.csv"?>" class="btn btn-primary text-white downloadCSV">Download CSV</a>
            </div>
        </div>
    </div>

	</div>

	<?php $this->load->view('common/footer'); ?>

	<script type="text/javascript">
		$(document).ready(function(){

			// data table
			var table =$('#table-1').DataTable({
				// dom: 'lrtip',    
								
				// stateSave: true,
  
			});

			$('#flat_type').on('submit', function(e){
				// Prevent actual form submission
				e.preventDefault();				
				var result = {};
				$.each( table.$('select').serializeArray(), function() {
					result[this.name] = this.value;
				});	
				
				// document.getElementById('popup1').style.display ='block';
      			// document.getElementById('loaderdiv').classList.add("divSHow"); 
			
				// Submit form data via Ajax
				$.ajax({
					url: '<?php echo base_url("member/track_flat")?>',				
					type: 'POST',
					data:{	flat_type:JSON.stringify(result),
							society_id:<?php echo $society_id ?>
					},					
					success: function (data) {
						location.reload();
					}
				});				
				
			});

			var message = '<?php echo $message['status'] ?>';
			if (message == 'Success') {
				iziToast.success({
				title: message,
				message: '<?php echo $message['text'] ?>',
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
	</script>