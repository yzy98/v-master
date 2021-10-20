<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class update_info extends CI_Controller {
  // Global variables
  var $data;

  function __construct(){
    parent::__construct(); 
    $this->load->model('user_model');
    $this->load->helper('form');
    $this->load->helper('url');
    $user = $this->session->userdata('username');
    $u_info = $this->user_model->get_info($user);
    $this->data = array(
        'msg' => '',
        'id' => $u_info->id,
        'user' => $user,
        'email' => $u_info->email,
        'password' => $u_info->password
    );
    // $this->data can be accessed from anywhere in the controller.
  }

  public function index()
  {
    $this->load->model('user_model');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('template/header');
    $data = $this->data;
    $this->load->view('update_info', $data);
    $this->load->view('template/footer');
  }

  public function check_update()
  {
    $this->load->model('user_model');
    $this->load->helper('form');
    $this->load->helper('url');
    $email = $this->input->post('email'); //getting email 
    $password = $this->input->post('password'); //getting password
    $this->load->view('template/header');
    $data = $this->data;
    if ($email !== $data['email'] || $password !== $data['password']) // Email or Password changed
    {
      if ($email === $data['email']) // Only password changed
      {
        if (!$this->check_pwd_strength()) // Check password
        {
          $data['msg']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password only allows lowercase letter, uppercase letter, number and exactly 6 digits! </div> ";
          $this->load->view('update_info', $data);
        }
        $data['password'] = $password; // Update data
      }
      else if ($password === $data['password']) // Only email changed
      {
        if ($this->user_model->validate_email($email)) // Validate email
        {
          $data['msg']= "<div class=\"alert alert-danger\" role=\"alert\"> The email address $email already exists!! </div> ";
          $this->load->view('update_info', $data);
        }
        $data['email'] = $email;
      } else // Both pwd and email changed
      {
        if ($this->user_model->validate_email($email)) // Validate email
        {
          $data['msg']= "<div class=\"alert alert-danger\" role=\"alert\"> The email address $email already exists!! </div> ";
          $this->load->view('update_info', $data);
        }
        else if (!$this->check_pwd_strength()) // Check password
        {
          $data['msg']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password only allows lowercase letter, uppercase letter, number and exactly 6 digits! </div> ";
          $this->load->view('update_info', $data);
        } else{
          $data['email'] = $email;
          $data['password'] = $password;
        }
      }

      $updated_user = array(
        'id' => $data['id'],
        'username' => $data['user'],
        'email' => $data['email'],
        'password' => $data['password']
      );
  
      $this->user_model->update_user($updated_user); // Update database
    }

    echo '<script language="javascript">';
    echo 'alert("Your information has been updated successfully!!!")';
    echo '</script>';

    $this->load->view('user_file', $data);

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
}