<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
	 $this->TPL['loggedin'] = $this->userauth->loggedin('profile');
    // Your own constructor code
  }

  public function index()
  {
	$this->load->model('users_model');
	$this->TPL['userdata'] = $this->users_model->profile_data($_SESSION['useremail']);
    $this->profiletemp->profshow('profile', $this->TPL);
  }
}