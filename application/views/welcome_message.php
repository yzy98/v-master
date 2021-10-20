<div class='text-center mt-md-4'>
	<h2>Welcome <?php echo $user; ?>!</h2>
	<?php
	$text = '<h3 class="text-danger text-center">Your email has not yet been verified!&nbsp&nbsp<a href="https://infs3202-a58a7547.uqcloud.net/myprj/email_verification/sendVerificationEmail" class="btn btn-danger">Verify Email>></a></h3>';
	$text_success = '<h3 class="text-success text-center">Your email has been verified successfully!</h3>';
	if(!$email_verified) {
		echo $text;
	} else {
		echo $text_success;
	}
	?>
</div>


