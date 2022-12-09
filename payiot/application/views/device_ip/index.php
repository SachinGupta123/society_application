<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Device Ip Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('device_ip/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Device Id</th>
						<th>Ip Address</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($device_ip as $d){ ?>
                    <tr>
						<td><?php echo $d['id']; ?></td>
						<td><?php echo $d['device_id']; ?></td>
						<td><?php echo $d['ip_address']; ?></td>
						<td>
                            <a href="<?php echo site_url('device_ip/edit/'.$d['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('device_ip/remove/'.$d['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
