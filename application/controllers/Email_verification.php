<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class email_verification extends CI_Controller {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->library('session'); //enable session
        $this->load->model('email_model');
        $this->load->model('user_model');
    }

    public function index() 
    {

    }

    function verify($verificationText=NULL)
    {  
        $noRecords = $this->email_model->verifyEmailAddress($verificationText);  
        if ($noRecords > 0){
         $msg = 'Email Verified Successfully!'; 
        }else{
         $msg = 'Sorry! Unable to Verify Your Email!';
        }
        $user = $this->session->userdata('username');
        $data['user'] = $user;
        $u_info = $this->user_model->get_info($user);
        $data['email_verified'] = ($u_info->email_verified == 'N') ? false : true;
        $this->load->view('template/header');
        echo "<script type='text/javascript'>alert($msg);</script>";
        $this->load->view('welcome_message', $data); 
        $this->load->view('template/footer');

        $route['verify/(:any)'] = "/email_verification/verify/"; // Routing
    }

    function sendVerificationEmail()
    {  
        $user = $this->session->userdata('username');
        $data['user'] = $user;
        $u_info = $this->user_model->get_info($user);
        $email = $u_info->email;
        $e_v_code = $u_info->e_v_code;

        $this->email_model->sendVerificationEmail($email,$e_v_code);
        
        $data['email_verified'] = ($u_info->email_verified == 'N') ? false : true;
        $this->load->view('template/header');
        $this->load->view('welcome_message', $data); 
        $this->load->view('template/footer'); 
    } 
}