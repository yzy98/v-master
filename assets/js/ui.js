class UI {
  // Add comment to list
  addCommentToList(comment) {
    const commentList = document.querySelector('.comments');
    // Create div element
    const commentCard = document.createElement('div');
    // Add class names
    commentCard.className = 'card comment border-light mb-3';
    // Insert 
    commentCard.innerHTML = `
      <div class="card-header">${comment.author}</div>
      <div class="card-body">
        <h5 class="card-title">${comment.title}</h5>
        <p class="card-text">${comment.text}</p>
      </div>
    `;

    commentList.appendChild(commentCard);
  }

  // Close modal
  closeModal() {
    $('#commentModal').modal('hide');
  }

  // Clear fields
  clearFields() {
    document.querySelector(".input-name").value = '';
    document.querySelector(".input-title").value = '';
    document.querySelector(".input-comment").value = '';
  }

  // Show alert
  showAlert(msg, className) {
    const div = document.createElement('div');
    div.className = `alert ${className}`;
    // Add text
    div.appendChild(document.createTextNode(msg));
    if(className === 'success') {
      // Get parent
      const parent = document.querySelector('.comments');
      // Get author
      const el = document.querySelector('.comment');
      // Insert
      parent.insertBefore(div, el);
    } else {
      const parent = document.querySelector('.modal-body');
      const el = document.querySelector('.author');
      // Insert
      parent.insertBefore(div, el);
    }
    
    // Timeout after 2 sec
    setTimeout(() => {
      document.querySelector('.alert').remove();
    }, 2000);
  }

}