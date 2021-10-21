const videoId = parseInt(document.querySelector(".video-id").innerHTML);

showComments(videoId);

document.querySelector(".confirm-modal-btn").addEventListener('click', putComment);

document.querySelector(".video-like").addEventListener('click', addLike);

document.querySelector(".video-add-collection").addEventListener('click', addWish);


// Dropzone restrictions
Dropzone.options.fileupload = {
  acceptedFiles: 'video/*',
  maxFilesize: 5
};

//Captcha refresh
// $(document).ready(function(){
//   $('.refreshCaptcha').on('click', function(){
//       $.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
//           $('#captImg').html(data);
//       });
//   });
// });


// Show all comments
function showComments(v_id) {
  let url = `http://34.136.144.131/demo/video/show_comments/${v_id}`;
  // AJAX
  $.ajax({
    url: url,
    type: 'GET',
    success: function(response) {
      $("#comments").html("");
      $("#comments").append(`<h5 class="mb-3 ctitle">Comments:</h5>`);
      let comments = response;
      if (comments.length < 1) {
        $("#comments").append(`<h3 class="text-center text-danger">There is no comment under this video!</h3>`);
      } else {
        comments.forEach((item) => {
          const comment = `
          <div class="comment card border-light mb-3">
            <div class="card-header">${item.commenter}</div>
            <div class="card-body">
              <h5 class="card-title">${item.c_title}</h5>
              <p class="card-text">${item.c_text}</p>
            </div>
          </div>
          `;
          $("#comments").append(comment);
        });
      }

    },
    error: (response) => {
      console.log(response);
    }
  });
}

// Put new comment in the list
function putComment() {
  const videoId = parseInt(document.querySelector(".video-id").innerHTML);
  const inputName = document.querySelector(".input-name").value;
  const inputTitle = document.querySelector(".input-title").value;
  const inputText = document.querySelector(".input-comment").value;
  
  // Instantiate comment
  const comment = new Comment(videoId, inputName, inputTitle, inputText);
  // Instantiate UI
  const ui = new UI();

  if(inputName === '' || inputTitle === '' || inputText === '') {
    ui.showAlert('Please fill in all fields!', 'error');
  } else {
    let url = 'http://34.136.144.131/demo/video/post_comment/' + videoId;
    let data = {
      v_id: videoId,
      commenter: inputName,
      c_title: inputTitle,
      c_text: inputText,
    };
    
    // AJAX
    $.ajax({
      url: url,
      type: "POST",
      data: data,
      success: (response) => {
        showComments(videoId);
        ui.closeModal();   
        ui.clearFields();
        ui.showAlert('Comment added!', 'success');
      },
      error: (response) => {
        console.log(response);
      }
    });

  }
}

// target user likes the video
function addLike() {
  const videoId = parseInt(document.querySelector(".video-id").innerHTML);
  const userId = parseInt(document.querySelector(".user-id").innerHTML);
  let url = 'http://34.136.144.131/demo/video/addlike/' + videoId;
  let data = {
    u_id: userId,
    v_id: videoId,
  };

  // AJAX
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    success: (response) => {
      alert('Like successfully!');
    },
    error: (response) => {
      console.log(response);
    }
  });
}

// target user adds the video into wishlist
function addWish() {
  const videoId = parseInt(document.querySelector(".video-id").innerHTML);
  const userId = parseInt(document.querySelector(".user-id").innerHTML);
  let url = 'http://34.136.144.131/demo/video/addwish/' + videoId;
  let data = {
    u_id: userId,
    v_id: videoId,
  };

  // AJAX
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    success: (response) => {
      alert('Add to wishlist successfully!');
    },
    error: (response) => {
      console.log(response);
    }
  });
}

// Delete wishlist video
function delWish(e) {
  
  const w_id = e.target.dataset.id;
  let url = 'http://34.136.144.131/demo/user_file/delwish/' + w_id;

  // AJAX
  $.ajax({
    url: url,
    type: "DELETE",
    success: (response) => {
      alert('Delete successfully!');
    },
    error: (response) => {
      console.log(response);
    }
  });
  e.preventDefault();
}