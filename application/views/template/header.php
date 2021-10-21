<html>
  <head>
    <title>V-Instructor</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/good-share.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dropzone.css">
  </head>

  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <!-- Brand -->
      <a class="navbar-brand" href="<?php echo base_url(); ?>login">V-Instructor</a>
  
      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(); ?>login">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>category">Category</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>login/logout" class="nav-link">
            <button class="btn btn-outline-success" type="submit">logout</button>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>upload" class="nav-link">
            <i class="fas fa-plus-circle fa-2x"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>user_file" class="nav-link">
            <i class="fas fa-user-circle fa-2x"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- end of navbar -->


  