<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class video extends CI_Controller {

  public function index()
  {
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('template/header');
    $this->load->view('video');
    $this->load->view('template/footer');
  }

  public function show_video($v_id)
  {
    $this->load->library('session');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->model('video_model');
    $this->load->model('user_model');
    $this->load->view('template/header');

    $user = $this->session->userdata('username');
    $u_info = $this->user_model->get_info($user);
    $u_id = $u_info->id;
    $video = $this->video_model->get_video_by_id($v_id);
    $data = array(
      'v_id' => $v_id,
      'u_id' => $u_id,
      'title' => $video->title,
      'path' => str_replace("/var/www/html", "", $video->path),
      'category' => $video->category,
      'username' => $video->username,
      'description' => $video->description,
      'likes' => $video->likes
    );

    $this->load->view('video', $data);

    $this->load->view('template/footer');

    $route['show_video/(:num)'] = 'video/show_video/$1'; // Routing
  }

  // Show related comments
  public function show_comments($v_id)
  {
    $this->load->model('comment_model');
    $comments = $this->comment_model->get_all_comments($v_id);
    header('Content-Type: application/json');
    echo json_encode($comments);

    $route['show_comments/(:num)'] = 'video/show_comments/$1'; // Routing
  }

  // Post comment onto certain video
  public function post_comment($v_id)
  {
    $this->load->model('comment_model');
    $comment = array(
      'v_id' => $v_id,
      'commenter' => $this->input->post('commenter'),
      'c_title' => $this->input->post('c_title'),
      'c_text' => $this->input->post('c_text')
    );
    $this->comment_model->post_comment($comment);
    header('Content-Type: application/json');
    echo json_encode(['status' => "success"]);

    $route['post_comment/(:num)']['post'] = 'video/post_comment/$1'; // Routing
  }

  // Add like to the video
  public function addlike($v_id)
  {
    $this->load->library('session');
    $this->load->model('like_model');
    $this->load->model('user_model');

    $user = $this->session->userdata('username');
    $u_info = $this->user_model->get_info($user);
    $u_id = $u_info->id;
    $row = array(
      'u_id' => $u_id,
      'v_id' => $v_id
    );
    $this->like_model->addLike($row); // Add info into DB
    header('Content-Type: application/json');
    echo json_encode(['status' => "success"]);

    $route['addlike/(:num)']['post'] = 'video/addlike/$1'; // Routing
  }

  // Add the video to user's wishlist
  public function addwish($v_id)
  {
    $this->load->library('session');
    $this->load->model('wish_model');
    $this->load->model('user_model');

    $user = $this->session->userdata('username');
    $u_info = $this->user_model->get_info($user);
    $u_id = $u_info->id;
    $row = array(
      'u_id' => $u_id,
      'v_id' => $v_id
    );
    $this->wish_model->addWish($row); // Add info into DB
    header('Content-Type: application/json');
    echo json_encode(['status' => "success"]);

    $route['addwish/(:num)']['post'] = 'video/addwish/$1'; // Routing
  }
  
  // Autocomplete in search box
  public function searchbox_fetch()
  {
    $title = $this->input->get('search_box');
    $search_data = $this->autocomplete_model->fetch_data($title);
    echo json_encode($search_data);
  }
}