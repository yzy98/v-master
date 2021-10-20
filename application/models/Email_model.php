<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Email_model extends CI_Model{

    public function sendVerificationEmail($email,$verificationText)
    {
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'mailhub.eait.uq.edu.au',
        'smtp_port' => 25,
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );
        
  
    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
    $this->email->from('s4553126@student.uq.edu.au', "V-Instructor Team");
    $this->email->to($email);  
    $this->email->subject("Email Verification");
    $this->email->message("Dear User,\nPlease click on below URL or paste into your browser to verify your Email Address\r\n https://infs3202-a58a7547.uqcloud.net/myprj/email_verification/verify/".$verificationText."\n");
    $this->email->send();
    }

    function verifyEmailAddress($verificationcode)
    {  
    $sql = "update users set email_verified='Y' WHERE e_v_code=?";
    $this->db->query($sql, array($verificationcode));
    return $this->db->affected_rows(); 
    }
 }