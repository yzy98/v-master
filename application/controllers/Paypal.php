<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
         
        // Load product model 
        $this->load->model('product'); 
         
        // Load payment model 
        $this->load->model('payment'); 
        $this->load->library('session'); //enable session
     } 
      
    function success(){ 
        // Get the transaction data  
        $this->load->view('template/header'); 
        $this->load->view('paypal_success'); 
        $this->load->view('template/footer');
    } 
      
     function cancel(){ 
        // Load payment failed view 
        $this->load->view('template/header'); 
        $this->load->view('paypal_cancel'); 
        $this->load->view('template/footer');
     } 
      
     function ipn(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
         
        if(!empty($paypalInfo)){ 
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo); 
 
            // Check whether the transaction is valid 
            if($ipnCheck){ 
                // Check whether the transaction data is exists 
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 
                if(!$prevPayment){ 
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"]; 
                    $data['item_id']    = $paypalInfo["item_number"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                    $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 
     
                    $this->payment->insertTransaction($data); 
                } 
            } 
        } 
    } 
}