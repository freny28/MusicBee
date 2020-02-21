<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favorites extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code

   $this->TPL['loggedin'] = $this->userauth->validSessionExists('favorites');
  }

  public function index()
  {
	$this->load->model('users_model');
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	$this->TPL['favSongs'] = $this->users_model->get_fav_songs($user_id);
    $this->profiletemp->profshow('favorites', $this->TPL);
  }
  public function removeSong($id){
	$this->load->model('users_model');
	$remove = $this->users_model->remove_from_favorite($id);
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	$this->TPL['favSongs'] = $this->users_model->get_fav_songs($user_id);
    $this->profiletemp->profshow('favorites', $this->TPL);
  }
    public function groupBy(){
	$this->load->model('users_model');
	$user = $this->users_model->profile_data($_SESSION['useremail']);
	$user_id = $user[0]['user_id'];
	$groupby = $this->input->post('groupbyselect');
	if($groupby == "art_singer"){
		$this->TPL['favSongs'] = $this->users_model->filterby_fav($user_id,'artist_singer');
		$this->TPL['art_select']= true;
	}else if($groupby == "md_band"){
		$this->TPL['favSongs'] = $this->users_model->filterby_fav($user_id,'director_band');
		$this->TPL['md_select']= true;
	}else if($groupby == "genere"){
		$this->TPL['favSongs'] = $this->users_model->filterby_fav($user_id,'genere');
		$this->TPL['genere_select']= true;
	}else{
		$this->TPL['favSongs'] = $this->users_model->get_fav_songs($user_id);
	}
    $this->profiletemp->profshow('favorites', $this->TPL);
	  
  }
    public function searchIt(){
	  $this->load->model('users_model');
	  $search = strtolower($this->input->post('search'));
	  $user = $this->users_model->profile_data($_SESSION['useremail']);
	  $user_id = $user[0]['user_id'];
	  $this->TPL['favSongs'] = $this->users_model->searchIt_fav($search, $user_id);
	  $this->profiletemp->profshow('favorites', $this->TPL);
  }
}