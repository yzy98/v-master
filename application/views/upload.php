<div class="container mt-md-4">
    <?php echo $error;?>
    <?php echo form_open_multipart(base_url().'upload/do_upload'); ?>
        <div class="form-group">
            <label for="upload">Upload a video</label>
            <input type="file" class="form-control-file border dropzone" id="upload" name="upload_video" required="required">
        </div>
        <div class="form-group">
            <label for="title">Add a title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" required="required">
        </div>
        <div class="form-group">
            <label for="selctory">Select a category</label>
            <select class="form-control" id="selctory" name="selctory" required="required">
                <option>Science</option>
                <option>Music</option>
                <option>Sports</option>
                <option>Language</option>
                <option>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" rows="5" maxlength="30" id="description" name="description" required="required"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary">
            <a href="<?php echo base_url(); ?>user_file" class="text-light" style="text-decoration: none;">Cancel<a/>
        </button>
    <?php echo form_close(); ?>
</div>