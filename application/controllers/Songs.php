<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Songs extends CI_Controller {

  var $TPL;
 

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code

   $this->TPL['loggedin'] = $this->userauth->validSessionExists('songs');
  }

  public function index()
  {
	$this->load->model('users_model');
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	$this->TPL['allSongs'] = $this->users_model->user_allsongs($user_id);
    $this->profiletemp->profshow('songs', $this->TPL);
  }
  
  public function addSong(){
	  
	$this->load->model('users_model');
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	$name = $this->input->post('song');
	$artist = $this->input->post('artist');
	$band = $this->input->post('band');
	$this->TPL['check_song'] = $this->users_model->check_songlist($user_id,$name, $artist,$band);
	if(!empty($this->TPL['check_song'])){
		$this->TPL['sameSong'] = true;
	}else{
		$tempfav = $this->input->post('favorite');
		if($tempfav == 'on'){
			$favorite = 1;
		}else{
			$favorite = 0;
		}
		$genere = $this->input->post('genere');
		$this->TPL['add_song'] = true;
		$this->TPL['status'] = $this->users_model->add_song($user_id,$name,$artist,$band,$favorite,$genere);
	}
	$this->TPL['allSongs'] = $this->users_model->user_allsongs($user_id);
	$this->profiletemp->profshow('songs', $this->TPL);

  }
  
  public function deleteSong($id){
	$this->load->model('users_model');
	$song = $this->users_model->delete_song($id);
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	$this->TPL['allSongs'] = $this->users_model->user_allsongs($user_id);
	$this->profiletemp->profshow('songs', $this->TPL);
  }
  
  public function addFavorite($id){
	$this->load->model('users_model');
	$song = $this->users_model->add_favorite($id);
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	$this->TPL['allSongs'] = $this->users_model->user_allsongs($user_id);
	$this->profiletemp->profshow('songs', $this->TPL);
	  
  }
  
  public function groupBy(){
	$this->load->model('users_model');
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	$groupby = $this->input->post('groupbyselect');
	if($groupby == "art_singer"){
		$this->TPL['allSongs'] = $this->users_model->filterby($user_id,'artist_singer');
		$this->TPL['art_select']= true;
	}else if($groupby == "md_band"){
		$this->TPL['allSongs'] = $this->users_model->filterby($user_id,'director_band');
		$this->TPL['md_select']= true;
	}else if($groupby == "genere"){
		$this->TPL['allSongs'] = $this->users_model->filterby($user_id,'genere');
		$this->TPL['genere_select']= true;
	}else{
		$this->TPL['allSongs'] = $this->users_model->user_allsongs($user_id);
	}
    $this->profiletemp->profshow('songs', $this->TPL);
	  
  }
  
  public function searchIt(){
	  $this->load->model('users_model');
	  $search = strtolower($this->input->post('search'));
	  $user = $this->users_model->profile_data($_SESSION['useremail']);
	  $user_id = $user[0]['user_id'];
	  $this->TPL['allSongs'] = $this->users_model->searchIt($search, $user_id);
	  $this->profiletemp->profshow('songs', $this->TPL);
  }
  
  public function editSong($id){
	  $this->load->model('users_model');
	  $user = $this->users_model->profile_data($_SESSION['useremail']);
	  $user_id = $user[0]['user_id'];
	  $this->TPL['allSongs'] = $this->users_model->user_allsongs($user_id);
	  $this->TPL['editSong'] = $this->users_model->get_song_info($id);
	  $this->profiletemp->profshow('editsong', $this->TPL);
  }
  public function updateSong(){
	  $this->load->model('users_model');
	  $user = $this->users_model->profile_data($_SESSION['useremail']);
	  $user_id = $user[0]['user_id'];
	  $name = $this->input->post('song');
	  $artist = $this->input->post('artist');
	  $band = $this->input->post('band');
	  $song_id = $this->input->post('song_id');
	  $this->TPL['check_song'] = $this->users_model->check_editsonglist($user_id,$name, $artist,$band,$song_id);
	if(!empty($this->TPL['check_song'])){
		$this->TPL['sameSong'] = true;
	}else{
		$tempfav = $this->input->post('favorite');
		if($tempfav == 'on'){
			$favorite = 1;
		}else{
			$favorite = 0;
		}
		$genere = $this->input->post('genere');
		$this->TPL['status'] = $this->users_model->update_song($user_id,$name,$artist,$band,$favorite,$genere, $song_id);
		$this->TPL['update_success'] = true;
	}
	  $this->TPL['allSongs'] = $this->users_model->user_allsongs($user_id);
	  $this->profiletemp->profshow('songs', $this->TPL);
  }
}