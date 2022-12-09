<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Door Master Edit</h3>
            </div>
			<?php echo form_open('door_master/edit/'.$door_master['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="door_name" class="control-label">Door Name</label>
						<div class="form-group">
							<input type="text" name="door_name" value="<?php echo ($this->input->post('door_name') ? $this->input->post('door_name') : $door_master['door_name']); ?>" class="form-control" id="door_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="premises_id" class="control-label">Premises Id</label>
						<div class="form-group">
							<input type="text" name="premises_id" value="<?php echo ($this->input->post('premises_id') ? $this->input->post('premises_id') : $door_master['premises_id']); ?>" class="form-control" id="premises_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="qr_string" class="control-label">Qr String</label>
						<div class="form-group">
							<textarea name="qr_string" class="form-control" id="qr_string"><?php echo ($this->input->post('qr_string') ? $this->input->post('qr_string') : $door_master['qr_string']); ?></textarea>
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