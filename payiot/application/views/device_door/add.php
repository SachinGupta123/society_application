<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Device Door Add</h3>
            </div>
            <?php echo form_open('device_door/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="device_id" class="control-label">Device Master</label>
						<div class="form-group">
							<select name="device_id" class="form-control">
								<option value="">select device_master</option>
								<?php 
								foreach($all_device_master as $device_master)
								{
									$selected = ($device_master['id'] == $this->input->post('device_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$device_master['id'].'" '.$selected.'>'.$device_master['device_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="door_id" class="control-label">Door Master</label>
						<div class="form-group">
							<select name="door_id" class="form-control">
								<option value="">select door_master</option>
								<?php 
								foreach($all_door_master as $door_master)
								{
									$selected = ($door_master['id'] == $this->input->post('door_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$door_master['id'].'" '.$selected.'>'.$door_master['door_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>