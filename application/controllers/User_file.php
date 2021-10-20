<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_file extends CI_Controller {
  public function __construct() 
  {
    parent:: __construct();
    $this->load->library('session'); //enable session
  }

  public function index()
  {
    $this->load->model('user_model');
    $this->load->model('video_model');
    $this->load->model('wish_model');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('template/header');

    $user = $this->session->userdata('username');
    $u_info = $this->user_model->get_info($user);
    $email = $u_info->email;
    $u_id = $u_info->id;
    $email_verified = $u_info->email_verified;
    $videos = $this->video_model->get_user_videos($user)->result();

    $arr = $this->wish_model->getVideoIds($u_id);
    $v_ids = $arr[0];
    $w_ids = $arr[1];
    $wishlist = array();

    $count = count($v_ids);
    for ($i=0; $i < $count; $i++) { 
      $video = $this->video_model->get_video_by_id($v_ids[$i]);
      $video->w_id = $w_ids[$i];
      $wishlist[$i] = $video;
    }

    $data['user'] = $user;
    $data['email'] = $email;
    $data['email_verified'] = ($email_verified == 'N') ? 'NO' : 'YES';
    $data['videos'] = $videos;
    $data['wishlist'] = $wishlist;
    $data['balance'] = $this->user_model->get_balance($u_id);
    $this->load->view('user_file', $data);
    $this->load->view('template/footer');
  }

  public function delwish($w_id)
  {
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->model('wish_model');
    // $row = $this->wish_model->getWish($w_id);
    $this->wish_model->delWish($w_id);

    header('Content-Type: application/json');
    echo json_encode(['status' => "success"]);

    $route['delwish/(:num)']['delete'] = 'user_file/delwish/$1'; // Routing
  }

  // Function to genrate pdf
  public function pdf()
  {
    $this->load->helper('pdf_helper');
    $this->load->model('user_model');
    $this->load->model('video_model');
    $this->load->model('wish_model');
    $this->load->helper('form');
    $this->load->helper('url');

    $user = $this->session->userdata('username');
    $u_info = $this->user_model->get_info($user);
    $email = $u_info->email;
    $u_id = $u_info->id;
    $email_verified = $u_info->email_verified;

    $data['user'] = $user;
    $data['email'] = $email;
    $data['email_verified'] = ($email_verified == 'N') ? 'NO' : 'YES';
    $data['balance'] = $this->user_model->get_balance($u_id);
    // code...

    $this->load->view('pdf', $data);
  }
}