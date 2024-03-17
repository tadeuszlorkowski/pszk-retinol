<?php
	session_start();
	
	include("retinol1.php");
	$model = new Model();
	
	if($ADMINCOND) {
		
		$injury_id = $_GET["id"];
		
		$sql = "DELETE FROM $TABLENAME WHERE injury_id=$injury_id;";
		
		$model->get($sql);
		header("Location: injury-register.php");
	}
	else
		echo "<h1>Access denied</h1>";
?>