<div class="container mt-4">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'update_info/check_update'); ?>
				<h2 class="text-center mb-4">Update your info</h2>       
					<div class="form-group">
                        <h4 class="text-center text-info">username: <?php echo $user ?></h4>
					</div>
                    <div class="form-group">
					    <input type="email" class="form-control" value="<?php echo $email ?>" placeholder="Enter a new email address" required="required" name="email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" value="<?php echo $password ?>" placeholder="Reset your password" required="required" name="password">
					</div>
                    <div class="form-group">
					<?php echo $msg ?>
					</div>
					<div class="form-group">
                        <a class="btn btn-secondary btn-block" href="<?php echo base_url(); ?>user_file">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-block">OK</button>
					</div>
                    
			<?php echo form_close(); ?>
	</div>
</div>