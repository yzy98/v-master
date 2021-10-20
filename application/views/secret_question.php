<div class="container">
      <div class="col-4 offset-4">
            <?php echo form_open(base_url().'forgot/check_answer'); ?>
                <div class="alert alert-success text-center">
                    <strong>Hi!</strong><?php echo $user; ?>.
                </div>
                    <div class="form-group">
                        <h3>Question: <?php echo $question; ?></h3>
					</div>
					<div class="form-group">
						<span>Username: </span>
						<input type="text" class="form-control"  required="required" name="username" value=<?php echo $user; ?>>
					</div>   
					<div class="form-group">
						<span>Answer: </span>
						<input type="text" class="form-control" placeholder="answer" required="required" name="answer">
					</div>
					<div class="form-group">
					<?php echo $error; ?>
					</div>
					<div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Confirm</button>
					</div>
                    <div class="form-group">
						<a href="<?php echo base_url(); ?>forgot" class="btn btn-secondary btn-block">Go back</a>
					</div> 
             <?php echo form_close(); ?>
	</div>
</div>