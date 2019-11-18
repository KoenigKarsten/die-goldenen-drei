<?php
// namespace mapper;
// namespace inc;

class SQLDAOFactory{
	private static $instance;
	
	public static function getInstance(){
		include_once ("./inc/config.inc.php");
		if(!self::$instance){
			try{
				self::$instance = new \mysqli('192.168.101.163', 'admin', '1234', 'test');
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