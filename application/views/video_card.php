<div class="container sorted-videos mt-md-4">
  <div class="sorted-video card mb-3 shadow">
    <div class="row no-gutters">
      <div class="col-md-4">
        <a href="<?php echo base_url(); ?>video/show_video/<?php echo $v_id; ?>">
          <video width="350">
            <source src="<?php echo str_replace("/var/www/htdocs", "", $path); ?>" type="video/mp4">
          </video>
        </a>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <a href="<?php echo base_url(); ?>video/show_video/<?php echo $v_id; ?>" class="video-title text-dark" style="text-decoration: none;">
            <h5 class="card-title"><?php echo $title; ?></h5>
          </a>
          <p class="card-text"><?php echo $description; ?></p>
          <p class="card-text"><small class="text-muted">Uploaded by <a href="#"><?php echo $user; ?></a></small></p>
          <div class="stars">
          <!-- Display the rating stars -->
          <?php
          $s = '<i class="fas fa-star fa-lg" style="color:orange"></i>';
          for ($d=1; $d<=$stars; $d+=1) {        
	          echo $s;
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>