<?php
class Users_model extends CI_Model{
	
	public function __construct(){
			$this->load->database();
	}

	public function register($firstname,$lastname,$usertype,$email,$password,$securityQue,$securityAns){
		try{
		$query = $this->db->query("INSERT INTO `users`( `email`, `password`, `user_type_id`, `firstname`, `lastname`, `security_question`, `security_answer`) VALUES ('$email','$password',$usertype,'$firstname','$lastname','$securityQue','$securityAns')");
		
		$query = $this->db->query("INSERT INTO `users_profile` ( `user_id` ) VALUES ((SELECT MAX( `user_id` ) FROM users))");
		$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}

	public function update_password($user_id,$securityAns,$updatepass){
		try{
			$query = $this->db->query("UPDATE users SET password = '$updatepass' WHERE user_id = $user_id AND security_answer LIKE '$securityAns'");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $this->db->affected_rows();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function profile_data($useremail){
		try{
			$query = $this->db->query("SELECT * FROM users u JOIN users_profile up ON u.user_id = up.user_id WHERE email LIKE '$useremail' ");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
		
	}
	public function profile_data_id($user_id){
		try{
			$query = $this->db->query("SELECT * FROM users u JOIN users_profile up ON u.user_id = up.user_id WHERE u.user_id= $user_id ");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();	
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function update_profile_general($firstname,$lastname,$birthdate,$gender_id,$private,$fav_art,$fav_band,$about_me,$email){
		try{
			$query = $this->db->query("UPDATE users u JOIN users_profile up ON u.user_id = up.user_id SET u.user_type_id= $private,u.firstname='$firstname',u.lastname='$lastname',up.gender_id=$gender_id, up.favorite_artists='$fav_art',up.favorite_bands='$fav_band',up.about_me='$about_me',up.birthdate='$birthdate' WHERE u.email = '$email' ");
			$db_error = $this->db->error();
				if (!empty($db_error['code'])) {
					throw new Exception('Database error!');
					return false; // unreachable retrun statement !!!
				}
				
			return $query;
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function update_security($secureQue,$secureAns,$password,$email){
		try{
			$query = $this->db->query("UPDATE users SET security_question = '$secureQue', security_answer = '$secureAns' WHERE email = '$email' AND password = '$password'");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			$stat = $this->db->affected_rows();
			return $stat;
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function update_prof_password($updatePass,$currentPass,$email){
		try{
			$query = $this->db->query("UPDATE users SET password = '$updatePass' WHERE email = '$email' AND password = '$currentPass'");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			$stat = $this->db->affected_rows();
			return $stat;	
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}			
	}
	
	public function public_users($email){
		try{
			$query = $this->db->query("SELECT * FROM users u JOIN users_profile up ON u.user_id = up.user_id WHERE u.user_type_id =2 AND u.email != '$email'");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function get_selected_user_songs($user_id){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE user_id = $user_id");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
		
	}
	
	public function user_allsongs($user_id){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE user_id = $user_id ");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function filterby($user_id,$groupby){
		try{
		$query = $this->db->query(" SELECT * FROM songs WHERE user_id = $user_id  ORDER BY $groupby DESC");
		$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
		return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	public function filterby_fav($user_id,$groupby){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE user_id = $user_id AND favorite = 1  ORDER BY $groupby DESC");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function add_song($user_id,$name,$artist,$band,$favorite,$genere){
		try{
			$query = $this->db->query("INSERT INTO songs(user_id, name, artist_singer, director_band, genere, favorite) VALUES ('$user_id','$name','$artist','$band','$genere',$favorite)");
			$db_error = $this->db->error();
				if (!empty($db_error['code'])) {
					throw new Exception('Database error!');
					return false; // unreachable retrun statement !!!
				}
			return $query;
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function check_songlist($user_id,$name,$artist,$band){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE user_id = $user_id AND LOWER(name) LIKE LOWER('$name') AND LOWER(artist_singer) LIKE LOWER('$artist') AND LOWER(director_band) LIKE LOWER('$band')");
					$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	public function check_editsonglist($user_id,$name, $artist,$band,$song_id){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE user_id = $user_id AND song_id != $song_id AND LOWER(name) LIKE LOWER('$name') AND LOWER(artist_singer) LIKE LOWER('$artist') AND LOWER(director_band) LIKE LOWER('$band')");
					$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
		
	}
	public function delete_song($id){
		try{
			$query = $this->db->query("DELETE FROM songs WHERE song_id = $id");
				$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query;
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function add_favorite($id){
		try{
			$query = $this->db->query("UPDATE songs SET favorite = 1 WHERE song_id = $id");
					$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query;
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function get_fav_songs($id){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE user_id = $id AND favorite = 1");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function remove_from_favorite($id){
		try{
			$query = $this->db->query("UPDATE songs SET favorite = 0 WHERE song_id = $id");
				$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query;
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	
	public function get_song_info($id){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE song_id = $id");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
		
	}
	public function searchIt($search, $user_id){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE ( LOWER(name) LIKE '%$search%' OR LOWER(artist_singer) LIKE '%$search%' OR LOWER(director_band) LIKE '%$search%' OR LOWER(genere) LIKE '%$search%') AND user_id = $user_id ");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
		
	}
	public function searchIt_fav($search, $user_id){
		try{
			$query = $this->db->query(" SELECT * FROM songs WHERE ( LOWER(name) LIKE '%$search%' OR LOWER(artist_singer) LIKE '%$search%' OR LOWER(director_band) LIKE '%$search%' OR LOWER(genere) LIKE '%$search%') AND user_id = $user_id AND favorite = 1 ");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			return $query->result_array();
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
	}
	public function update_song($user_id,$name,$artist,$band,$favorite,$genere, $song_id){
		try{
			$query = $this->db->query("UPDATE songs SET name = '$name', artist_singer = '$artist',director_band = '$band', favorite = $favorite, genere = '$genere' WHERE song_id = $song_id");
			$db_error = $this->db->error();
			if (!empty($db_error['code'])) {
				throw new Exception('Database error!');
				return false; // unreachable retrun statement !!!
			}
			$stat = $this->db->affected_rows();
			return $stat;
		}catch(Exception $e){
			log_message('error: ',$e->getMessage());
			return;
		}
		
	}
		public function check_entries($fname,$lname,$email){
		try{
				$query = $this->db->query("SELECT * FROM users WHERE LOWER(firstname) = '$fname' AND LOWER(lastname) = '$lname' AND email = '$email'");
				if (!empty($db_error['code'])) {
					throw new Exception('Database error!');
					return false; // unreachable retrun statement !!!
				}
				return $query->result_array();
		}catch(Exception $e){
				log_message('error: ',$e->getMessage());
				return;
		}
			
	}
	public function check_email_exist($email){
		try{
				$query = $this->db->query("SELECT * FROM users WHERE email = '$email'");
				if (!empty($db_error['code'])) {
					throw new Exception('Database error!');
					return false; // unreachable retrun statement !!!
				}
				return $query->result_array();
		}catch(Exception $e){
				log_message('error: ',$e->getMessage());
				return;
		}
	
	}
	
}