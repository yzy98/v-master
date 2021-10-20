<!-- content -->
<div class="container-fluid">
  <div class="row">

    <!-- video -->
    <div class="col-sm-8 ml-lg-5">
      <div class="card border-white">
        <div class="card-body">
          <h3 class="card-title text-center m-4"><?php echo $title; ?></h3>
          <p class="card-title text-center video-id text-white"><?php echo $v_id; ?></p>
          <p class="card-title text-center user-id text-white"><?php echo $u_id; ?></p>
          <div class="embed-responsive embed-responsive-21by9">
            <iframe class="embed-responsive-item" src="<?php echo $path; ?>" allowfullscreen></iframe>
          </div>
          <div class="down-btns mt-4">
            <i class="video-like fab fa-gratipay fa-2x mr-md-4" style="color:gray; cursor: pointer;"></i>

            <i class="video-tip fas fa-coins fa-2x mr-md-4" style="color:gray; cursor: pointer;"></i>

            <i class="video-comment fas fa-comment-dots fa-2x mr-md-4" style="color: gray; cursor: pointer;" data-toggle="modal" data-target="#commentModal"></i>
            <!-- Modal -->
            <div class="modal fade" id="commentModal" tabindex="-1"  aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add your comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row author">
                      <input type="text" name="commenter" class="input-name mt-3 ml-3" placeholder="Your name...">
                    </div>
                    <div class="row title">
                      <input type="text" name="c_title" class="input-title mt-3 ml-3" placeholder="Your comment title...">
                    </div>
                    <div class="row text">
                      <textarea name="c_text" class="input-comment mt-3 ml-3" cols="50" rows="4" placeholder="Your comment text..."></textarea>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="confirm-modal-btn btn btn-primary">Confirm</button>
                  </div>
                </div>
              </div>
            </div>
            
            <i class="good-share video-share fas fa-share fa-2x mr-md-4" style="color: gray; cursor: pointer;"></i>

            <i class="video-add-collection fas fa-plus fa-2x mr-md-4" style="color: gray; cursor: pointer;"></i>
          </div>
        </div>
      </div>


      <!-- comment -->
      <div class="comments" id="comments">

      </div>

    </div>

    <!-- other videos -->
    <div class="col-sm-3 text-center ml-auto mt-4">
      <p>
        Watch more videos made by <a href="#"><?php echo $username; ?></a>
        <a href="#" style="color: grey">
          <i class="fas fa-user-plus fa-lg"></i>
        </a>
      </p>
      <div class="other-videos container" style="border: 1px solid black;">
        <div class="other-video card mb-4 border-white shadow">
          <div class="row no-gutters">
            <div class="col-md-8">
              <a href="#">
                <img src="<?php echo base_url(); ?>assets/img/video1.jpeg" alt="video1" style="width: 100%;">
              </a>
            </div>
            <div class="col-md-4 my-auto">
              <div class="card-body">
                <a href="#" class="text-dark" style="text-decoration: none;">Video 1</a>
              </div>
            </div>
          </div>
        </div>

  
    </div>
  </div>
</div>  