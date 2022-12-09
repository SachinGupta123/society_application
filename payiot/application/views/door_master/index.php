<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Door Master Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('door_master/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Door Name</th>
						<th>Premises Id</th>
						<th>Qr String</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($door_master as $d){ ?>
                    <tr>
						<td><?php echo $d['id']; ?></td>
						<td><?php echo $d['door_name']; ?></td>
						<td><?php echo $d['premises_id']; ?></td>
						<td><?php echo $d['qr_string']; ?></td>
						<td>
                            <a href="<?php echo site_url('door_master/edit/'.$d['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('door_master/remove/'.$d['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
