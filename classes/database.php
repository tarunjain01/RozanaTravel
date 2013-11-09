<?php
class DBConnection
{
	private $dbType = "mysql";
	private $hostname = "localhost";
	private $dbname = "thack2013";
	private $user = "root";
	private $pass = "";
	
	public function getConnection()
	{
		$con = new PDO("{$this->dbType}:host={$this->hostname};dbname={$this->dbname}","{$this->user}","{$this->pass}");
		return $con;
	}
}
?>