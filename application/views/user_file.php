<div class="container-fluid m-lg-5">
  <div class="row">
    <div class="col-sm-8 px-5">
        <div class="container mb-4">
            <p>My videos</p>
            <div class="row flex-row flex-nowrap">
                <!-- List all videos -->
                <?php
                $single_video_view = '
                <a class="mx-3" href="%d">
                    <video width="300">
                        <source src=%s type="video/mp4">
                    </video>
                </a>
                ';

                foreach ($videos as $row) {
                    $path = str_replace("/var/www/htdocs", "", $row->path);
                    $v_id = base_url()."video/show_video/$row->v_id";
                    $c = sprintf($single_video_view, $v_id, $path);
                    echo $c;
                }
                ?>
                <a class="mx-3" href="<?php echo base_url(); ?>upload">
                    <i class="fas fa-plus fa-5x my-4" style="color: grey;"></i>
                </a>
            </div>
        </div>
        <div class="container mb-4">
            <p>My wishlist</p>
            <div class="wishlist row flex-row flex-nowrap">
                <!-- show wishlist -->
                <?php
                $single_video_view = '
                    <div class="card mx-3 border-white" style="width:300px">  
                        <a href="%d">
                            <video width="300">
                                <source src=%s type="video/mp4">
                            </video>
                        </a>
                        <p class="mt-1 del-wish btn btn-block btn-primary" onClick="delWish(event)" data-id="%d">Delete</p>
                    </div>
                ';

                foreach ($wishlist as $row) {
                    $path = str_replace("/var/www/htdocs", "", $row->path);
                    $v_id = base_url()."video/show_video/$row->v_id";
                    $w_id = $row->w_id;
                    $c = sprintf($single_video_view, $v_id, $path, $w_id);
                    echo $c;
                }
                ?>
            </div>
        </div>
        <div class="container mb-4">
            <p>Account balance&nbsp;&nbsp;&nbsp;&nbsp;<strong>$ <?php echo $balance; ?></strong></p>
        </div>
        <div class="container mb-4">
            
            <div class="row flex-row flex-nowrap">
                <p class="mx-3">Top up</p>
                <a class="mr-3" href="#">
                    <i class="fab fa-cc-paypal fa-3x" style="color: black;" data-toggle="modal" data-target="#paypalModal"></i>
                </a>
                <!-- Modal -->
                <div class="modal fade" id="paypalModal" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Choose top up amount</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <a href="<?php echo base_url(); ?>products/buy/1" class="btn btn-outline-primary">$10</a>
                            <a href="<?php echo base_url(); ?>products/buy/2" class="btn btn-outline-primary">$20</a>
                            <a href="<?php echo base_url(); ?>products/buy/3" class="btn btn-outline-primary">$50</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
        
    </div>

    <!-- Account info part -->
    <div class="col-sm-3">
        <div class="card shadow text-center mt-5">
            <div class="card-header">
                <h4 class="card-title">Account info</h4>
            </div>
            <div class="card-body">
                <i class="fas fa-user-circle fa-5x mb-3"></i>
                <div class="card-text mb-3">
                    <p><strong>NAME: </strong><?php echo $user; ?></P>
                    <p><strong>EMAIL: </strong><?php echo $email; ?></p>
                    <p><strong>EMAIL VERIFICATION STATUS: </strong><?php echo $email_verified; ?></p>
                    <!-- <p><strong>FOLLOWS: </strong> 20</p>
                    <p><strong>FANS: </strong> 30</p>
                    <p><strong>UPLOADS: </strong> 3</p> -->
                </div>
            </div>
            <div class="card-footer justify-content-center">
                <div class="row mb-3">
                    <a href="<?php echo base_url(); ?>update_info" class="btn btn-outline-primary btn-block">
                        Update info
                    </a>
                </div>
                <div class="row mb-3">
                    <a href="<?php echo base_url(); ?>user_file/pdf" class="btn btn-outline-success btn-block">
                        View in pdf
                    </a>
                </div>
                <div class="row">
                <a href="<?php echo base_url(); ?>login/logout" class="btn btn-outline-secondary btn-block">
                        Logout
                    </a>
                </div>
                
                
            </div>
        </div>
    </div>
    <!-- end of account info part -->
  </div>
</div>