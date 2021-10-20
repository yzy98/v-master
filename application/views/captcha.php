<h4>Submit Captcha Code</h4>
<p id="captImg"><?php echo $captchaImg; ?></p>
<p>Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p>
<?php echo form_open(base_url().'captcha'); ?>
    Enter the code : 
    <input type="text" name="captcha" value=""/>
    <input type="submit" name="submit" value="SUBMIT"/>
<?php echo form_close(); ?>