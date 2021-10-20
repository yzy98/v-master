<div class="container">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'register/check_register'); ?>
				<h2 class="text-center">Register</h2>       
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter an valid username" required="required" name="username">
					</div>
                    <div class="form-group">
					    <input type="email" class="form-control" placeholder="Enter an valid email address" required="required" name="email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Set your password" required="required" name="password">
					</div>
					<div class="form-group">
						<label for="question">Select a secret question</label>
						<select class="form-control" id="question" name="question" required="required">
							<option>What's your favourite movie?</option>
							<option>What's your favourite team?</option>
							<option>Your favourite dish?</option>
							<option>What's your hometown?</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Answer" required="required" name="answer">
					</div>
                    <div class="form-group">
					<?php echo $msg ?>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Register</button>
					</div>
                    
			<?php echo form_close(); ?>
	</div>
</div>