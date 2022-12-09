<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Door Acces Edit</h3>
            </div>
			<?php echo form_open('user_door_acces/edit/'.$user_door_acces['']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id" class="control-label">ID</label>
						<div class="form-group">
							<input type="text" name="id" value="<?php echo ($this->input->post('id') ? $this->input->post('id') : $user_door_acces['id']); ?>" class="form-control" id="id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="user_id" class="control-label">User Id</label>
						<div class="form-group">
							<input type="text" name="user_id" value="<?php echo ($this->input->post('user_id') ? $this->input->post('user_id') : $user_door_acces['user_id']); ?>" class="form-control" id="user_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="door_id" class="control-label">Door Id</label>
						<div class="form-group">
							<input type="text" name="door_id" value="<?php echo ($this->input->post('door_id') ? $this->input->post('door_id') : $user_door_acces['door_id']); ?>" class="form-control" id="door_id" />
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