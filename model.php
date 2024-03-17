<?php

function dbconfig($_s, $_u, $_p, $_d) {
	global $SQLservername, $SQLusername, $SQLpassword, $SQLdbname;
	$SQLservername = $_s;
	$SQLusername = $_u;
	$SQLpassword = $_p;
	$SQLdbname = $_d;
}

class Model {
	public function __construct() {
		$result;
	}

	public function get($_query) {
		global $result, $SQLservername, $SQLusername, $SQLpassword, $SQLdbname;
		// Create connection
		$connection = new mysqli($SQLservername, $SQLusername, $SQLpassword, $SQLdbname, 3306);
		// Check connection
		if ($connection->connect_error) {
			echo $connection->connect_error;
			die($connection->connect_error);
		}

		$sql = $_query;
		$result = $connection->query($sql);

		$connection->close();
	}
}

class Controller {
	public function __construct($_model) {
		start();
		$query;
		$model = $_model;
	}

	public function start() {
		
	}

	public function runQuery($query) {
		$model->get($query);
		return $model->result;
	}
}