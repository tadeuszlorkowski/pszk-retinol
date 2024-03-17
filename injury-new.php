<?php
	include("retinol1.php");
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
<h1>Wstaw kontuzję</h1>
		
			<form action="injury-add.php" method="post">
				<p>
					<label for="victim">Ofiara</label><br>
					<input id="victim" name="victim" maxlength="60" required><br>
					<label for="injury">Kontuzja</label><br>
					<input id="injury" name="injury" maxlength="100" required><br>
					<label for="treatment">Metoda leczenia</label><br>
					<input id="treatment" name="treatment" maxlength="100" required><br>
					<label for="injury_date">Data kontuzji</label><br>
					<input id="injury_date" name="injury_date" type="date" required><br>
					<label for="end_date">Data końcowa (lub przewidywana)</label><br>
					<input id="end_date" name="end_date" type="date" required><br>
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