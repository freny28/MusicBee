<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passreset extends CI_Controller {

  var $TPL;
  
  public function __construct()
  {
    parent::__construct();
	
	$this->TPL['loggedin'] = $this->userauth->validSessionExists();
    // Your own constructor code
  }

  public function index()
  {
    $this->template->show('passreset', $this->TPL);
  }
  public function changePassword(){
	  
	$this->TPL['showStats'] = true;
	$user_id = $this->input->post('user_id');
	$secureAns =  $this->input->post('secureAns');
	$updatePass = $this->input->post('updatePass');
	$this->load->model('users_model');
	$this->TPL['status']= $this->users_model->update_password($user_id,$secureAns,$updatePass);
	$this->template->show('passreset', $this->TPL);
  }
}