<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homelogged extends CI_Controller {

  var $TPL;
  var $user ;
  
  public function __construct()
  {
    parent::__construct();
	
	$this->TPL['loggedin'] = $this->userauth->validSessionExists('homelogged');
	
    // Your own constructor code
  }

  public function index(){
	$this->load->model('users_model');
	$this->TPL['public_users'] = $this->users_model->public_users($_SESSION['useremail']);
    $this->template->show('homelogged', $this->TPL);
  }
  
  public function viewUserSongs(){
	  
	$user_id = $this->input->post('user_id');
	$this->load->model('users_model');
	$this->user = $user_id ;
	$this->TPL['selected_user_info'] = $this->users_model->profile_data_id($user_id);
	$this->TPL['user_songs'] = $this->users_model->get_selected_user_songs($user_id);
	$this->template->show('homeloggeduser',$this->TPL);
  }
  
  public function addToUserList($id){
	
	$this->load->model('users_model');
	$list_user_id = $this->input->post('list_user_id');
	$this->TPL['user_songs'] = $this->users_model->get_selected_user_songs($list_user_id);
	$this->TPL['selected_user_info'] = $this->users_model->profile_data_id($list_user_id);
	$song_info = $this->users_model->get_song_info($id);
	$song_name = $song_info[0]['name'];
	$song_art =$song_info[0]['artist_singer'];
	$song_band =$song_info[0]['director_band'];
	$song_favorite =0;
	$this->TPL['added_song'] = $song_info[0]['name'];
	$song_genere =$song_info[0]['genere'];
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	
	$this->TPL['check_song'] = $this->users_model->check_songlist($user_id,$song_name,$song_art,$song_band);
	if(!empty($this->TPL['check_song'])){
		$this->TPL['sameSong'] = true;
	}else{
		$this->TPL['status'] = $this->users_model->add_song($user_id,$song_name,$song_art,$song_band,$song_favorite,$song_genere);
		$this->TPL['added']  = true;
	}
    $this->template->show('homeloggeduser', $this->TPL);
  }

  public function filter(){
	 $this->load->model('users_model');
	 $user_id = $this->input->post('user_id');
	 $filter = $this->input->post('filter');
	 $this->TPL['selected_user_info'] = $this->users_model->profile_data_id($user_id);
	 if($filter == "favorites"){
		$this->TPL['user_songs'] = $this->users_model->get_fav_songs($user_id);
		$this->TPL['fav_check']=true;
	 }else{
		$this->TPL['user_songs'] = $this->users_model->get_selected_user_songs($user_id);
	 }
	 $this->template->show('homeloggeduser',$this->TPL); 
	}
	
	public function searchIt(){
	  $this->load->model('users_model');
	  $search = strtolower($this->input->post('search'));
	  $user_id = $this->input->post('user_id');
	  $this->TPL['selected_user_info'] = $this->users_model->profile_data_id($user_id);
	  $this->TPL['user_songs'] = $this->users_model->searchIt($search, $user_id);
	  $this->profiletemp->profshow('homeloggeduser', $this->TPL);
	}
}