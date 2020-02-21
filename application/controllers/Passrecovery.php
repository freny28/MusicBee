<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passrecovery extends CI_Controller {

  var $TPL;
  
  public function __construct()
  {
    parent::__construct();
	
	$this->TPL['loggedin'] = $this->userauth->validSessionExists();
    // Your own constructor code
  }

  public function index()
  {
    $this->template->show('passrecovery', $this->TPL);
  }
  public function validateEntry(){
	$this->load->model('users_model');
	$fname = strtolower($this->input->post("prfirstname"));
	$lname = strtolower($this->input->post("prlastname"));
	$email = $this->input->post("premail");
	$this->TPL['result'] = $this->users_model->check_entries($fname,$lname,$email);
	if(empty($this->TPL['result'])){
		$this->TPL['nodata'] = true;
		$this->template->show('passrecovery', $this->TPL);
	}else{
		$this->template->show('passreset', $this->TPL);
	}
  }
}