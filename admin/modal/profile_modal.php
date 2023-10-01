<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Admin Profile</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Username</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="password" class="col-sm-3 control-label">Password</label>

                  	<div class="col-sm-9">
					  <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="name" class="col-sm-3 control-label">Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="sex" class="col-sm-3 control-label">Sex</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="sex" name="sex" value="<?php echo $user['sex']; ?>">
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="dob" class="col-sm-3 control-label">Date of Birth</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="dob" name="dob" value="<?php echo $user['dob']; ?>">
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="address" class="col-sm-3 control-label">Address</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">Email</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="phone" class="col-sm-3 control-label">phone number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>