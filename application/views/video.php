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

  </div>
</div>  