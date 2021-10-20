<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cs extends CI_Controller {

  public function index()
  {
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->model('video_model');
    $this->load->view('template/header');
    $videos = $this->video_model->get_category_videos('Computer Science'); //Get all videos under CS category

    $this->load->view('cs');
    foreach ($videos->result() as $row)
    {
      $data['title'] = $row->title;
      $data['path'] = $row->path;
      $data['user'] = $row->username;
      $data['description'] = $row->description;
      $likes = $row->likes;
      $data['stars'] = 0;
      if ($likes <= 10)
      {
        $data['stars'] = 1;
      } elseif ($likes <= 20)
      {
        $data['stars'] = 2;
      } else {
        $data['stars'] = 3;
      }
      
      $this->load->view('video_card', $data);
    }
    
    $this->load->view('template/footer');
  }

  public function show_category($category)
  {
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->model('video_model');
    $this->load->view('template/header');
    $videos = $this->video_model->get_category_videos($category); //Get all videos under certain category
    $title['ctry'] = $category;
    $this->load->view('cs', $title);

    if ($videos->num_rows() <= 0)
    {
      $this->load->view('show_no_message');
    } else {
      foreach ($videos->result() as $row)
      {
        $data['v_id'] = $row->v_id;
        $data['title'] = $row->title;
        $data['path'] = $row->path;
        $data['user'] = $row->username;
        $data['description'] = $row->description;
        $likes = $row->likes;
        $data['stars'] = 0;
        if ($likes <= 10)
        {
          $data['stars'] = 1;
        } elseif ($likes <= 20)
        {
          $data['stars'] = 2;
        } else {
          $data['stars'] = 3;
        }
        
        $this->load->view('video_card', $data);
      }
    }
    
    $this->load->view('template/footer');

    $route['show_category/(:any)'] = 'cs/show_category'; // Routing
  }
}