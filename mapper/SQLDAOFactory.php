<?php

class SQLDAOFactory{
	private static $instance;
	
	public static function getInstance(){


		include_once ("../inc/config.php.inc");


		if(!self::$instance){
			try{
				self::$instance = new \mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
				self::$instance->set_charset("utf8");
			}
			catch(Exception $e){
				echo self::$instance->connect_error;
			}
		}
		return self::$instance;
	}
}	
?> 