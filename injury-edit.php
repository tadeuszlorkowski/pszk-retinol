<?php
	include("retinol1.php");
	$model = new Model();
	
	if($_GET["id"]<1)
		header("Location: injury-register.php");
	$injury_id = $_GET["id"];
	$model->get("SELECT * FROM $TABLENAME WHERE injury_id=$injury_id");
					
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$injury_id = $row["injury_id"];
			$victim = $row["victim"];
			$injury_date = $row["injury_date"];
			$end_date = $row["end_date"];
			$injury = $row["injury"];
			$treatment = $row["treatment"];
		}
	}
	else
		header("Location: injury-register.php");
?>

<html>
	<head>
		<title>Retinol - <?= $ORG_NAME ?></title>
		<link rel="stylesheet" href="<?= $_SESSION['SHEET_NAME'] ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php include("retinol_ui_start.php"); ?>
		
		<div class="tokoferol">
			
			<?php
				if($ADMINCOND) {
					echo<<<END
			<h1>Zaktualizuj kontuzję $victim ($injury)</h1>
				<p>
					<a href='injury-delete.php?id=$injury_id'>Trwale usuń tę kontuzję</a>
				</p>
		
			<form action="injury-save.php?id=$injury_id" method="post">
				<p>
					<label for="victim">Ofiara</label><br>
					<input id="victim" name="victim" maxlength="60" value="$victim" required><br>
					<label for="injury">Kontuzja</label><br>
					<input id="injury" name="injury" maxlength="100" value="$injury" required><br>
					<label for="treatment">Metoda leczenia</label><br>
					<input id="treatment" name="treatment" maxlength="100" value="$treatment" required><br>
					<label for="injury_date">Data kontuzji</label><br>
					<input id="injury_date" name="injury_date" type="date" value="$injury_date" required><br>
					<label for="end_date">Data końcowa (lub przewidywana)</label><br>
					<input id="end_date" name="end_date" type="date" value="$end_date" required><br>
					<input type="submit">
				</p>
			</form>
END;
				}
				else {
					echo "<h1 class='gabim'>Odmowa dostępu</h1>";
					echo "<h3 class='gabim'>Tylko administrator organizacji $ORG_NAME może wstawiać kontuzje.</h3>";
				}
			?>
		
		</div>
		
		<?php include("retinol_ui_end.php"); ?>
	</body>
</html>