<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code

	$this->TPL['loggedin'] = $this->userauth->validSessionExists('edit');
  }

  public function index()
  {
	$this->load->model('users_model');
	$this->TPL['userdata'] = $this->users_model->profile_data($_SESSION['useremail']);
    $this->profiletemp->profshow('edit', $this->TPL);
  }
  
  public function updateGeneral(){
	  $this->load->model('users_model');
	  $firstname = $this->input->post('efirstname');
	  $lastname = $this->input->post('elastname');
	  $birthdate = $this->input->post('ebirthdate');
	  $gender = $this->input->post('gender');
	  $privatev = $this->input->post('private');
	  $fav_art = $this->input->post('fav_art');
	  $fav_band = $this->input->post('fav_band');
	  $about_me = $this->input->post('aboutme');
	  	  
	  if($privatev == "on"){
		  $private = 1;
	  }else{
		  $private = 2;
	  }
	  
	  if($gender == "male"){
		  $gender_id = 1;
	  }else if($gender == "female"){
		  $gender_id = 2;
	  }else{
		  $gender_id = 3;
	  }
	  $this->TPL['status'] = $this->users_model->update_profile_general($firstname,$lastname,$birthdate,$gender_id,$private,$fav_art,$fav_band,$about_me,$_SESSION['useremail']);
	  
	  $this->TPL['userdata'] = $this->users_model->profile_data($_SESSION['useremail']);
      $this->profiletemp->profshow('profile', $this->TPL);
	 // echo $firstname ." " .$lastname ." ".$birthdate ." ".$gender." ". $gender_id. " ". $privatev. " ". $private." ".$fav_art ." ". $fav_band." ".$about_me;
  }
  public function updateSecurity(){
	  $this->load->model('users_model');
	  $this->TPL['showit'] = true;
	  $secureQue = $this->input->post('securityQue');
	  $secureAns = $this->input->post('securityAns');
	  $password = $this->input->post('currentSPass');
	  $this->TPL['securityStatus'] = $this->users_model->update_security($secureQue,$secureAns,$password,$_SESSION['useremail']);
	 if(!$this->TPL['securityStatus']){
		 $this->TPL['userdata'] = $this->users_model->profile_data($_SESSION['useremail']);
		  $this->profiletemp->profshow('edit', $this->TPL);
	 }else{
	  $this->TPL['userdata'] = $this->users_model->profile_data($_SESSION['useremail']);
      $this->profiletemp->profshow('profile', $this->TPL);
	 }
  }
  public function updatePassword(){
	  $this->load->model('users_model');
	  $this->TPL['show_passStat'] = true;
	  $updatePass = $this->input->post('updatePass');
	  $currentPass = $this->input->post('currentPass');
	  $this->TPL['passStatus'] = $this->users_model->update_prof_password($updatePass,$currentPass,$_SESSION['useremail']);
	  $this->TPL['userdata'] = $this->users_model->profile_data($_SESSION['useremail']);
	 if(!$this->TPL['passStatus']){
		  $this->profiletemp->profshow('edit', $this->TPL);
	 }else{
      $this->profiletemp->profshow('profile', $this->TPL);
	 }
  }
}