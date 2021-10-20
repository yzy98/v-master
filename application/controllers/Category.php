<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

  public function index()
  {
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('template/header');
    $this->load->view('category');
    $this->load->view('template/footer');
  }
}