<?php
	session_start();
	
	include("retinol1.php");
	$model = new Model();
	
	if($ADMINCOND) {
		
		$injury_id = $_GET["id"];
		$victim = $_POST["victim"];
		$injury_date = $_POST["injury_date"];
		$end_date = $_POST["end_date"];
		$injury = $_POST["injury"];
		$treatment = $_POST["treatment"];
		
		$sql = "UPDATE $TABLENAME SET victim='$victim', injury_date='$injury_date',end_date='$end_date',injury='$injury',treatment='$treatment' WHERE injury_id=$injury_id;";
		
		$model->get($sql);
		header("Location: injury-register.php");
	}
	else
		echo "<h1>Access denied</h1>";
?>