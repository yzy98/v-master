<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Captcha extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
        // Load session library
        $this->load->library('session');
        
        // Load the captcha helper
        $this->load->helper('captcha');
    }
    
    public function index(){

        $this->load->view('template/header');

        // If captcha form is submitted
        if($this->input->post('submit')){
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){
                echo 'Captcha code matched.';
            }else{
                echo 'Captcha code does not match, please try again.';
            }
            echo "<script>alert($sessCaptcha);</script>";
        }
        
        // Captcha configuration
        $config = array(
            'word'          => 'Random word',
            'img_path'      => './captchas/',
            'img_url'       => base_url().'captchas/',
            'font_path'     => '.path/to/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 18,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        
        // Pass captcha image to view
        $data['captchaImg'] = $captcha['image'];

        // Load the view
       
        $this->load->view('captcha', $data);
        $this->load->view('template/footer');
    }
    
    public function refresh(){
        // Captcha configuration
        $config = array(
            'word'          => 'Random word',
            'img_path'      => './captchas/',
            'img_url'       => base_url().'captchas/',
            'font_path'     => '.path/to/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 18,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];
    }
}