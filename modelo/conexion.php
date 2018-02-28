<?php
	require_once("mysqli/MysqliDb.php");

	
      $db = new MysqliDb (Array (
            'host' => 'localhost',
            'username' => 'root', 
            'password' => '',
            'db'=> 'dbtasks',
            'port' => 3306,
            'prefix' => '',
            'charset' => 'latin1'));
?>