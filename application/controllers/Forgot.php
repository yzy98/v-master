<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forgot extends CI_Controller {

    var $uarr;

    public function __construct() 
    {
        parent:: __construct();
        $this->load->library('session'); //enable session
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->uarr = array(
            'user' => 'o',
            'ques' => 'k'
        );
    }

    public function index()
    {
        $data['error'] = '';
        $this->load->view('template/pure_header');
        $this->load->view('forgot', $data);
        $this->load->view('template/footer');
    }

    public function check_username()
    {
        $this->uarr['user'] = $this->input->post('username'); //getting username from login form
        $username = $this->uarr['user'];
        if ( !$this->user_model->validate_user($username) ) //Check if the uername exits in the database
        {
            $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> The username $username doesn't exist!! </div> ";
            $this->load->view('template/pure_header');
            $this->load->view('forgot', $data);
        } else {
            $data['user'] = $username;
            $u_info = $this->user_model->get_info($username);
            $this->uarr['ques'] = $u_info->question;
            $question = $this->uarr['ques'];
            $data['question'] = $question;
            $data['error'] = '';

            $this->load->view('template/pure_header');
            $this->load->view('secret_question', $data);  
        }
        $this->load->view('template/footer');
        
    }

    public function check_answer()
    {
        $this->load->model('user_model');
        $type_answer = $this->input->post('answer');
        // $alrt = 'alert("%s")';
        // $m = sprintf($alrt, $type_answer);
        // echo '<script language="javascript">';
        // echo $m;
        // echo '</script>';
        $username = $this->input->post('username');
        $u_info = $this->user_model->get_info($username);
        $answer = $u_info->answer;
        $question = $u_info->question;

        if($type_answer == $answer) {
            // Reset password
            echo '<script language="javascript">';
            echo 'alert("Answer correct!!!")';
            echo '</script>';

            $data['user'] = $username;
            $data['error'] = '';
            $this->load->view('template/pure_header');
            $this->load->view('reset_pwd', $data);
        } else {
            // Wrong!
            $data['user'] = $username;
            $data['question'] = $question;
            $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Your answer is wrong! </div> ";
            $this->load->view('template/pure_header');
            $this->load->view('secret_question', $data);
        }
        $this->load->view('template/footer');

    }

    public function check_reset()
    {
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $password = $this->input->post('password'); //getting password
        $username = $this->input->post('username');
        $u_info = $this->user_model->get_info($username);
        $this->load->view('template/pure_header');

        if (!$this->check_pwd_strength()) // Check password
        {
            $data['user'] = $username;
            $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password only allows lowercase letter, uppercase letter, number and exactly 6 digits! </div> ";
            $this->load->view('reset_pwd', $data);
        } else {
            $id = $u_info->id;
            $this->user_model->reset_pwd($id, $password); // Update database
    
            echo '<script language="javascript">';
            echo 'alert("Your password has been reset successfully!!!")';
            echo '</script>';
        
            $data['error'] = '';
            $this->load->view('login', $data);
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

}
?>