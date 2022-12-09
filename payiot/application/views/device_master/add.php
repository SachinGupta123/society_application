<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Device Master Add</h3>
            </div>
            <?php echo form_open('device_master/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="device_id" class="control-label">Device Id</label>
						<div class="form-group">
							<input type="text" name="device_id" value="<?php echo $this->input->post('device_id'); ?>" class="form-control" id="device_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="premises_id" class="control-label">Premises Id</label>
						<div class="form-group">
							<input type="text" name="premises_id" value="<?php echo $this->input->post('premises_id'); ?>" class="form-control" id="premises_id" />
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