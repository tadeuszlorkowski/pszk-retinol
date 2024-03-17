<?php
	session_start();
	
	include("retinol1.php");
	
	$model = new Model();
	
	if($ADMINCOND) {
		
		$victim = $_POST["victim"];
		$injury_date = $_POST["injury_date"];
		$end_date = $_POST["end_date"];
		$injury = $_POST["injury"];
		$treatment = $_POST["treatment"];
		
		$sql = "INSERT INTO $TABLENAME(victim,injury_date,end_date,injury,treatment) VALUES ('$victim','$injury_date','$end_date','$injury','$treatment');";
		
		$model->get($sql);
		header("Location: injury-register.php");
	}
	else
		echo "<h1>Access denied</h1>";
?>