<?php
	include("retinol1.php");
	$model = new Model();
	
	$found = true;
	
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
		$found = false;
?>

<html>
	<head>
		<?php
			if($USERCOND && $found)
				echo "<title>$injury_id. $victim, $injury, $treatment</title>";
			else
				echo "<title>Informacje o kontuzji niedostępne</title>";
		?>
		<title></title>
		<link rel="stylesheet" href="<?= $_SESSION['SHEET_NAME'] ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php include("retinol_ui_start.php"); ?>
		
		<div class="tokoferol">
			
			<?php
				if($USERCOND) {
					if($found) {
					echo<<<END
				<h1>$victim, $injury</h1>
				<p>
					<ul>
						<li>Poszkodowany: $victim</li>
						<li>Kontuzja: $injury</li>
						<li>Metoda leczenia: $treatment</li>
						<li>Data kontuzji: $injury_date</li>
						<li>Data końcowa: $end_date</li>
					</ul>
				</p>
				<p>
					<a href="injury_pdf.php?id=$injury_id" target="_blank">Pobierz dokument tej kontuzji (PDF)</a>
				</p>
				
END;

$model->get("SELECT * FROM $TABLENAME WHERE victim='$victim' AND injury_id != $injury_id");
	if ($result->num_rows > 0) {
		echo "<h3>Inne kontuzje tego poszkodowanego</h3>";
		echo "<ul>";
		while($row = $result->fetch_assoc()) {
			$injury_id = $row["injury_id"];
			$victim = $row["victim"];
			$injury_date = $row["injury_date"];
			$end_date = $row["end_date"];
			$injury = $row["injury"];
			$treatment = $row["treatment"];
			echo "<li><a href='injury.php?id=$injury_id'>$injury, $treatment ($injury_date ~ $end_date)</a></li>";
		}
		echo "</ul>";
	}
			}
			else {
				echo "<h1 class='gabim'>Kontuzja nie znaleziona.</h1>";
			}
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