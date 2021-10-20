<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

  public function __construct() 
  {
    parent:: __construct();
    $this->load->library('session'); //enable session
    $this->load->model('user_model');
  }

  public function index()
  {
    $data['error']= "";
    $this->load->helper('form');
    $this->load->helper('url');
    
    if ( !$this->session->userdata('logged_in') ) //Check if the user has logged in
    {
      if(get_cookie('remember')) //Check if user activate the remember me feature
      {
        $username = get_cookie('username');
        $password = get_cookie('password');
        if( $this->user_model->login($username, $password) )
        {
          $user_data = array( //create session
            'username' => $username,
            'logged_in' => true 
          );
          $this->session->set_userdata($user_data);
          $data['user'] = $username;
          $u_info = $this->user_model->get_info($username);
          $data['email_verified'] = ($u_info->email_verified == 'N') ? false : true;
          $this->load->view('template/header');
          $this->load->view('welcome_message', $data);
        }
      } else 
      {
        $this->load->view('template/pure_header');
        $this->load->view('login', $data);
      }   
    } else 
    {
      $user = $this->session->userdata('username');
      $data['user'] = $user;
      $u_info = $this->user_model->get_info($user);
      $data['email_verified'] = ($u_info->email_verified == 'N') ? false : true;
      $this->load->view('template/header');
      $this->load->view('welcome_message', $data);
    }
    $this->load->view('template/footer');
  }

  public function check_login()
	{
    $this->load->model('user_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$username = $this->input->post('username'); //getting username from login form
    $password = $this->input->post('password'); //getting password from login form
    $remember = $this->input->post('remember'); //getting remember checkbox
    if ( !$this->session->userdata('logged_in') ) //Check if the user has logged in
    {
      if ( !$this->user_model->validate_user($username) ) //Check if the uername exits in the database
      {
        $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> The username $username doesn't exist!! </div> ";
        $this->load->view('template/pure_header');
        $this->load->view('login', $data);
      } else
      {
        if( !$this->user_model->login($username, $password) ) //Check if the password is correct
        {
          $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Enter $username's correct password!! </div> ";
          $this->load->view('template/pure_header');
          $this->load->view('login', $data);
        } else
        {
          $user_data = array( //create session
            'username' => $username,
            'logged_in' => true 
          );
          if($remember) { //Create cookie
            set_cookie("username", $username, '300'); //set cookie username
					  set_cookie("password", $password, '300'); //set cookie password
					  set_cookie("remember", $remember, '300'); //set cookie remember
          }
          $this->session->set_userdata($user_data);

          $this->session->set_flashdata('user_loggedin', "You are now logged in!");
          redirect('login');
        }
      }
    } else {
      $this->session->set_flashdata('user_loggedin', "You are now logged in!");
			redirect('login'); //if user already logined direct user to home page
    }
		
		$this->load->view('template/footer');
  }
  
  public function logout()
  { delete_cookie("username"); //Delete cookies
    delete_cookie("password");
    delete_cookie("remember");

    $this->session->unset_userdata('logged_in'); //delete login status
    $this->session->unset_userdata('username');

    $this->session->set_flashdata('user_loggedout', "You are now logged out!"); //Set message
    redirect('login'); // redirect user back to login
  }

}