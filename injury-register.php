<?php
	include("retinol1.php");
	$model = new Model();
	
	if(isset($_GET["tl"])) {
		switch($_GET["tl"]) {
			case 1: $_SESSION['SHEET_NAME'] = "retinol-classic.css"; break;
			case 2: $_SESSION['SHEET_NAME'] = "retinol.css"; break;
		}
	}
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
				if($USERCOND) {
		
					echo "<h1>Najnowsze kontuzje w $ORG_NAME</h1>";
					
					if(isset($_GET["tl"])) {
						switch($_GET["tl"]) {
							case 1: $model->get("SELECT * FROM $TABLENAME WHERE injury_date<'2023-06-13' ORDER BY injury_date DESC LIMIT 3"); break;
							default: $model->get("SELECT * FROM $TABLENAME ORDER BY injury_date DESC LIMIT 3"); break;
						}
					}
					else
						$model->get("SELECT * FROM $TABLENAME ORDER BY injury_date DESC LIMIT 3");
					
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$injury_id = $row["injury_id"];
							$victim = $row["victim"];
							$injury_date = $row["injury_date"];
							$end_date = $row["end_date"];
							$injury = $row["injury"];
							$treatment = $row["treatment"];
							echo "<h3><a href='injury.php?id=$injury_id'>$victim ($injury)</a></h3>";
							echo "<p>Leczony/a $treatment, $injury_date ~ $end_date</p>";
						}
					}
					
					echo<<<END
					
<h1>Rejestr kontuzji</h1>
			<p>
				<i>Lecz pamiętaj, naprawdę nie dzieje się nic i nie stanie się nic aż do końca</i><br>
				~Grzegorz Turnau 1991
			</p>

<table class="center">
  <tr>
    <th>Lp.</th>
    <th>Poszkodowany</th>
    <th>Data kontuzji</th>
    <th>Kontuzja</th>
    <th>Metoda leczenia</th>
    <th>
		<span onclick="alert('Data końcowa - dzień w którym ostatni widoczny objaw/metoda leczenia się skończyła (nie liczy się np. rehabilitacja)');">
			<abbr title='Data końcowa - dzień w którym ostatni widoczny objaw/metoda leczenia się skończyła (nie liczy się np. rehabilitacja)'>Data końcowa albo przewidywana<sup>†</sup></abbr>
		</span>
	</th>
END;
				if($USERCOND)
					echo "<th>Opcje</th>";
				echo "</tr>";
					
					if(isset($_GET["tl"])) {
						switch($_GET["tl"]) {
							case 1: $model->get("SELECT * FROM $TABLENAME WHERE injury_date<'2023-06-13' ORDER BY injury_date ASC"); break;
							default: $model->get("SELECT * FROM $TABLENAME ORDER BY injury_date ASC"); break;
						}
					}
					else
						$model->get("SELECT * FROM $TABLENAME ORDER BY injury_date ASC");
				
				$i = 1;
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$injury_id = $row["injury_id"];
						$victim = $row["victim"];
						$injury_date = $row["injury_date"];
						$end_date = $row["end_date"];
						$injury = $row["injury"];
						$treatment = $row["treatment"];
						echo "<tr><td><a href='injury.php?id=$injury_id'>$i.</a></td><td>$victim</td><td>$injury_date</td><td>$injury</td><td>$treatment</td><td>$end_date</td>";
						$i++;
						if($ADMINCOND)
							echo "<td><a href='injury-edit.php?id=$injury_id'>Edytuj</a></td>";
						echo "</tr>";
					}
				}
					echo<<<END
</table>
<p>
	<sup>†</sup>Data końcowa - dzień w którym ostatni widoczny objaw/metoda leczenia się skończyła (nie liczy się np. rehabilitacja)
</p>
END;
				}
				else {
		
					echo "<h1>Rejestr kontuzji</h1>";
					echo "<h3 class=\"gabim\">Rejestr kontuzji jest dostępny tylko dla członków organizacji $ORG_NAME.</h3>";
				}
			?>
		
		</div>
		
		<?php include("retinol_ui_end.php"); ?>
	</body>
</html>
