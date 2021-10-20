<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller {
  public function __construct() 
  {
    parent:: __construct();
    $this->load->library('session'); //enable session
  }

  public function index()
  {
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('template/header');
    $this->load->view('upload', array('error' => ' ' ));
    $this->load->view('template/footer');
  }

  public function do_upload()
  {
    $this->load->model('video_model');
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'mp4';
    $config['max_size'] = 5242880;
    $this->load->view('template/header');

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('upload_video'))
    {
      $msg = $this->upload->display_errors();
      $error = array('error' => "<div class=\"alert alert-danger\" role=\"alert\"> $msg </div> ");

      $this->load->view('upload', $error);
    }
    else
    {
      //Upload successfully
      $path = $this->upload->data('full_path'); //Get video absolute path
      $title = $this->input->post('title'); //Get video title
      $category = $this->input->post('selctory'); //Get video category
      $description = $this->input->post('description'); //Get video description
      $user = $this->session->userdata('username'); //Get uersname

      // Create new video
      $new_video = array(
        // 'v_id' => uniqid(),
        'title' => $title,
        'path' => $path,
        'category' => $category,
        'username' => $user,
        'description' => $description
      );
      $this->video_model->insert_video($new_video); //Insert to the database

      $data['user'] = $user;
      $this->load->view('upload_success', $data);
    }

    $this->load->view('template/footer');
  }
}