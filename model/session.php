<?php

class Session{
	
	protected $sessionID;

	public function __construct(){
		if( !isset($_SESSION) ){
			$this->init_session();
		}
	}
	public function init_session(){
		session_start();
	}


	public function set_session_id(){
		$this->sessionID = session_id();
	}

	public function get_session_id(){
		return session_id();
	}

	public function session_exist( $session_name ){
		return isset($_SESSION[$session_name]);
	}

	public function insert( $data ){
		foreach ($data as $key => $value) {
			$this->set_session_data($key,$value);
		}
	}

	public function display_session(){
		var_dump($_SESSION);
	}

	public function remove_session( $session_name = '' ){
		if( !empty($session_name) ){
			unset( $_SESSION[$session_name] );
		}
		else{
			unset($_SESSION);
		}
	}

	public function get_session_data( $session_name ){
		return $_SESSION[$session_name];
	}

	public function set_session_data( $session_name , $data ){
		$_SESSION[$session_name] = $data;
	}

	public function destroy()
	{
		session_unset(); 
		session_destroy(); 
	}


}


?>