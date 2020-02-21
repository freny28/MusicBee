<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Userauth  { 
	  
    private $login_page = "";   
    private $logout_page = "";   
     
    private $useremail;
    private $password;
    /**
    * Turn off notices so we can have session_start run twice
    */
    function __construct() 
    {
      error_reporting(E_ALL & ~E_NOTICE);
      $this->login_page = base_url() . "index.php?/Login";
      $this->logout_page = base_url() . "index.php?/Home";
    }

    /**
    * @return string
    * @desc Login handling
    */
    public function login($useremail,$password) 
    {

      session_start();

      // User is already logged in if SESSION variables are good. 
      if ($this->validSessionExists() == true)
      {
        $this->redirect($_SESSION['basepage']);
      }

      // First time users don't get an error message.... 
      if ($_SERVER['REQUEST_METHOD'] == 'GET') return;
        
      // Check login form for well formedness.....if bad, send error message
      if ($this->formHasValidCharacters($useremail, $password) == false)
      {
         return "Useremail/password fields cannot be blank!";
      }
        
      // verify if form's data coresponds to database's data
      if ($this->userIsInDatabase() == false)
      {
        return 'Invalid username/password!';
	  }
      else
      { 
        // We're in!
        // Redirect authenticated users to the correct landing page
        // ex: admin goes to admin, members go to members
		$this->writeSession();
        $this->redirect($_SESSION['basepage']);
      }
    }
	//public function createuser($username,$password,$accesslevel) {
		//echo "userauth create user". $username . $password . $accesslevel;
		
//	}
    /**
    * @return void
    * @desc Validate if user is logged in
    */
    public function loggedin($page) 
    {

      session_start();     
   
      // Users who are not logged in are redirected out
      if ($this->validSessionExists() == false)
      {
        $this->redirect($this->login_page);
      }
       
	  		
	  //$_SESSION['a'] =  $CI->config->item('acl')[$page][$_SESSION['accesslevel']];
	  //if($CI->config->item('acl')[$page][$_SESSION['accesslevel']] != true){
		//$this->redirect($_SESSION['basepage']);
	  //}
      return true;
    }
	
    /**
    * @return void
    * @desc The user will be logged out.
    */
    public function logout() 
    {
      session_start(); 
      $_SESSION = array();
      session_destroy();
      header("Location: ".$this->logout_page);
    }
    
    /**
    * @return bool
    * @desc Verify if user has got a session and if the user's IP corresonds to the IP in the session.
    */
    public function validSessionExists() 
    {
      session_start();
      if (!isset($_SESSION['useremail']))
      {
        return false;
      }
      else
      {
        return true;
      }
    }
    
    /**
    * @return void
    * @desc Verify if login form fields were filled out correctly
    */
    public function formHasValidCharacters($useremail, $password) 
    {
      // check form values for strange characters and length (3-12 characters).
      // if both values have values at this point, then basic requirements met
      if ( (empty($useremail) == false) && (empty($password) == false) )
      {
        $this->useremail = $useremail;
        $this->password = $password;
        return true;
      }
      else
      {
        return false;
      }
    }
	
    /**
    * @return bool
    * @desc Verify useremail and password with MySQL database.
    */
    public function userIsInDatabase() 
    {
		$useremail = $this->useremail;
		$password = $this->password;
      // Remember: you can get CodeIgniter instance from within a library with:
      $CI =& get_instance();
      // And then you can access database query method with:
      $result = $CI->db->query("SELECT * FROM users WHERE email LIKE '$useremail' AND password LIKE '$password'");
      $a = $result->result_array();
	  // Access database to verify useremail and password from database table
	  if((empty($a)==FALSE)){
		  
			return true;
	  }else {
        return false; 
      }
    }
    
    
    /**
    * @return void
    * @param string $page
    * @desc Redirect the browser to the value in $page.
    */
    public function redirect($page) 
    {
        header("Location: ".$page);
        exit();
    }
    
    /**
    * @return void
    * @desc Write useremail and other data into the session.
    */
    public function writeSession() 
    {
        $_SESSION['useremail'] = $this->useremail;
		$_SESSION['something'] = 'sdbhcjas';
		$_SESSION['basepage'] = base_url() . "index.php?/Profile";
		$CI =& get_instance();
			
        
    }
	
    /**
    * @return string
    * @desc Useremail getter, not necessary 
    */
    public function getUsername() 
    {
        return $_SESSION['useremail'];
    }
		
			
}
