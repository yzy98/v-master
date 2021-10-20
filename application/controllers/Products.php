<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Products extends CI_Controller{ 
     
    function  __construct(){ 
        parent::__construct(); 
        $this->load->library('session');
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
         
        // Load product model 
        $this->load->model('product'); 
        $this->load->model('user_model');
    } 
     
    function buy($id){ 
        // Set variables for paypal form 
        $returnURL = base_url().'paypal/success'; //payment success url 
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url 
        $notifyURL = base_url().'paypal/ipn'; //ipn url 
         
        // Get product data from the database 
        $product = $this->product->getRows($id); 
         
        // Get current user ID from the session
        $user = $this->session->userdata('username');
        $u_info = $this->user_model->get_info($user);
        $userID = $u_info->id;
         
        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', $product['name']); 
        $this->paypal_lib->add_field('custom', $userID); 
        $this->paypal_lib->add_field('item_number',  $product['id']); 
        $this->paypal_lib->add_field('amount',  $product['price']); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 

        $route['buy/(:num)'] = 'products/buy/$1'; // Routing
    } 
}