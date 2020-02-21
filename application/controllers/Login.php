<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
	 $this->TPL['loggedin'] = false;
    // Your own constructor code
  }

  public function index()
  {
    $this->template->show('login', $this->TPL);
  }
  
  public function loginuser()
  {
    $this->TPL['msg'] =
      $this->userauth->login($this->input->post(urldecode("useremail")),
                             $this->input->post("password"));
	
    $this->template->show('login', $this->TPL);
  }

  public function logout()
  {
    $this->userauth->logout();
  }
}