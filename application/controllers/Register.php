<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
	$this->TPL['loggedin'] = $this->userauth->validSessionExists('register');
    // Your own constructor code
  }

  public function index()
  {
	$this->load->model('users_model');
    $this->template->show('register', $this->TPL);
  }
  public function registerUser(){
	  $this->load->model('users_model');
	  $firstname = $this->input->post("rfirstname");
	  $lastname = $this->input->post("rlastname");
	  $private = $this->input->post("private");
	  $email = $this->input->post("remail");
	  $usertype = 2;
	  if($private == "on"){
		  $usertype = 1;
	  }
	  $password = $this->input->post("rpassword");
	  $securityQue = $this->input->post("securityQue");
	  $securityAns = $this->input->post("securityAns");
	  $check_email = $this->users_model->check_email_exist($email);
	  if(!empty($check_email)){
		  $this->TPL['email_exist'] = true;
	  }else{
		  $this->users_model->register($firstname,$lastname,$usertype,$email,$password,$securityQue,$securityAns);
		  $this->TPL['registered'] = true;
	  }
	  $this->template->show('register', $this->TPL);
  }
}