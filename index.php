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
		
			<h1>Witaj w rejestrze kontuzji <?= $ORG_NAME ?></h1>
			<p>
				<i>Lecz pamiętaj, naprawdę nie dzieje się nic i nie stanie się nic aż do końca</i><br>
				~Grzegorz Turnau 1991
			</p>
		
			<h3>Nowości w PSZK Retinol (aktualizacja 17.03.2024)</h3>
			<p>
				<ul>
					<li>Retinol został zaktualizowany do użytku publicznego, z wykorzystaniem własnej bazy danych. <a href="https://github.com/tadeuszlorkowski/pszk-retinol">Pobierz Retinol już dziś!</a></li>
				</ul>
			</p>
		
		</div>
		
		<?php include("retinol_ui_end.php"); ?>
	</body>
</html>