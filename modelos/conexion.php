<?php

class Conexion{

	static public function conectar(){

		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			PDO::MYSQL_ATTR_SSL_CA => '/path/to/cacert.pem',
			PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
		);

		$link = new PDO("mysql:host=localhost;dbname=cenforp",
			            "root",
			            "root", $options);

		$link->exec("set names utf8");

		return $link;

	}

}