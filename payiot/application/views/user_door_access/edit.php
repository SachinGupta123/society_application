<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Door Access Edit</h3>
            </div>
			<?php echo form_open('user_door_access/edit/'.$user_door_access['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="user_id" class="control-label">User Master</label>
						<div class="form-group">
							<select name="user_id" class="form-control">
								<option value="">select user_master</option>
								<?php 
								foreach($all_user_master as $user_master)
								{
									$selected = ($user_master['id'] == $user_door_access['user_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$user_master['id'].'" '.$selected.'>'.$user_master['username'].'</option>';
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
									$selected = ($door_master['id'] == $user_door_access['door_id']) ? ' selected="selected"' : "";

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