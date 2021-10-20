<div class="container">
      <div class="col-4 offset-4">
            <?php echo form_open(base_url().'forgot/check_reset'); ?>
                <div class="alert alert-success text-center">
                    <strong>Reset password</strong>
                </div>
					<div class="form-group">
						<span>Username: </span>
						<input type="text" class="form-control" required="required" name="username" value=<?php echo $user; ?>>
					</div>   
					<div class="form-group">
						<span>New password: </span>
						<input type="password" class="form-control" placeholder="Password" required="required" name="password">
					</div>
					<div class="form-group">
					<?php echo $error; ?>
					</div>
					<div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Confirm</button>
					</div>
             <?php echo form_close(); ?>
	</div>
</div>