<div class="container">
      <div class="col-4 offset-4">
            <?php echo form_open(base_url().'forgot/check_username'); ?>
				<h2 class="text-center">Enter your username</h2>       
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" required="required" name="username">
					</div>
					<div class="form-group">
					<?php echo $error; ?>
					</div>
					<div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Confirm</button>
					</div>
                    <div class="form-group">
						<a href="<?php echo base_url(); ?>login" class="btn btn-secondary btn-block">Go back</a>
					</div> 
             <?php echo form_close(); ?>
	</div>
</div>