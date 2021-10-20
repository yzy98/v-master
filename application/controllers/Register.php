<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

  public function index()
  {
    $data['msg'] = "";
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('template/pure_header');
    $this->load->view('register', $data);
    $this->load->view('template/footer');
  }

  public function check_register()
  {
    $this->load->model('user_model');
		$this->load->helper('form');
    $this->load->helper('url');
    $username = $this->input->post('username'); //getting username from register form
    $email = $this->input->post('email'); //getting email from register form
    $password = $this->input->post('password'); //getting password from register form
    $question = $this->input->post('question');
    $answer = $this->input->post('answer');
    $e_v_code = $this->generateRandomCode(10);
    if ($this->user_model->validate_user($username))
    {
      $data['msg']= "<div class=\"alert alert-danger\" role=\"alert\"> The username $username already exists!! </div> ";
      $this->load->view('template/pure_header');
      $this->load->view('register', $data);
    } elseif ($this->user_model->validate_email($email))
    {
      $data['msg']= "<div class=\"alert alert-danger\" role=\"alert\"> The email address $email already exists!! </div> ";
      $this->load->view('template/pure_header');
      $this->load->view('register', $data);
    } elseif (!$this->check_pwd_strength())
    {
      $data['msg']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password only allows lowercase letter, uppercase letter, number and exactly 6 digits! </div> ";
      $this->load->view('template/pure_header');
      $this->load->view('register', $data);
    }
    else {
      $new_user = array(
        'username' => $username,
        'email' => $email,
        'e_v_code' => $e_v_code,
        'password' => $password,
        'question' => $question,
        'answer' => $answer
      );
      $this->user_model->insert_user($new_user);
      $user_data = array( //create session
        'username' => $username,
        'logged_in' => true 
      );
      $this->session->set_userdata($user_data);
      $data['user'] = $username;
      $data['email_verified'] = false;
      $this->load->view('template/header');
      $this->load->view('welcome_message', $data);
    }

    $this->load->view('template/footer');
  }

  // Check password strength
  public function check_pwd_strength()
  {
    $password = $this->input->post('password'); //getting password from register form
    $regex_lowercase = '/[a-z]/';
    $regex_uppercase = '/[A-Z]/';
    $regex_number = '/[0-9]/';
    if(preg_match_all($regex_lowercase, $password) < 1 || preg_match_all($regex_uppercase, $password) < 1 || 
    preg_match_all($regex_number, $password) < 1 || strlen($password) !== 6)
    {
      return false;
    }
    return true;
  }

  // Generate random email verification code
  public function generateRandomCode($length = 10)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomCode = '';
    for ($i = 0; $i < $length; $i++) {
      $randomCode .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomCode;
  }
}