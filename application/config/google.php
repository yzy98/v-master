<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '630794980283-964rk6jen3pq47tkm2gt7oq9fco7u5j0.apps.googleusercontent.com';
$config['google']['client_secret']    = 'yfmS8yaf_QdD4kGvX7AU572D';
$config['google']['redirect_uri']     = 'https://infs3202-a58a7547.uqcloud.net/myprj/login';
$config['google']['application_name'] = 'Login to V-Instructor';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();