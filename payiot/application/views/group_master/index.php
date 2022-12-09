<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Group Master Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('group_master/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Group Name</th>
						<th>Quota</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($group_master as $g){ ?>
                    <tr>
						<td><?php echo $g['id']; ?></td>
						<td><?php echo $g['group_name']; ?></td>
						<td><?php echo $g['quota']; ?></td>
						<td>
                            <a href="<?php echo site_url('group_master/edit/'.$g['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('group_master/remove/'.$g['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
