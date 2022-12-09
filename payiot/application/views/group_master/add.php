<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Group Master Add</h3>
            </div>
            <?php echo form_open('group_master/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="group_name" class="control-label">Group Name</label>
						<div class="form-group">
							<input type="text" name="group_name" value="<?php echo $this->input->post('group_name'); ?>" class="form-control" id="group_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="quota" class="control-label">Quota</label>
						<div class="form-group">
							<input type="text" name="quota" value="<?php echo $this->input->post('quota'); ?>" class="form-control" id="quota" />
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