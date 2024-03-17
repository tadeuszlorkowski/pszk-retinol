<?php
session_start();

$ORG_NAME = "Koło Naukowe Towaroznawstwa CARGO"; # Nazwa organizacji - wyświetla na górze strony
$ORG_PREFIX = "R-NoJ22-"; # Prefiks identyfikatorów kontuzji, widoczny w eksportach PDF
$TABLENAME = "retinol_injuries"; # Nazwa tabeli, w której przechowuje się kontuzje
$USERCOND = $_SESSION["logged"]==1 && ($_SESSION["tag"]==0 || $_SESSION["tag"]==2 || $_SESSION["tag"]==3); # Kiedy spełnione, można przeglądać kontuzje
$ADMINCOND = $_SESSION["logged"]==1 && ($_SESSION["tag"]==0 || $_SESSION["tag"]==3); # Kiedy spełnione, można przeglądać i edytować kontuzje

$SQLservername = "mariadb106.server754863.nazwa.pl";
$SQLusername = "server754863_slodkowlosy";
$SQLpassword = "Cewniczek1!";
$SQLdbname = "server754863_slodkowlosy";

include("model.php");
dbconfig($SQLservername, $SQLusername, $SQLpassword, $SQLdbname);

$model = new Model();
$sql = "CREATE TABLE IF NOT EXISTS $TABLENAME (injury_id int(11) NOT NULL AUTO_INCREMENT,victim varchar(60) NOT NULL,injury_date date NOT NULL,end_date date NOT NULL,injury varchar(100) NOT NULL,treatment varchar(100) NOT NULL,PRIMARY KEY (injury_id)) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;";
$model->get($sql);

if(!isset($_SESSION['SHEET_NAME']))
	$_SESSION['SHEET_NAME'] = "retinol.css";

function wielkie_polskie_litery($tekst) {
	$tekst = str_replace("ą", "Ą", $tekst);
	$tekst = str_replace("ć", "Ć", $tekst);
	$tekst = str_replace("ę", "Ę", $tekst);
	$tekst = str_replace("ł", "Ł", $tekst);
	$tekst = str_replace("ń", "Ń", $tekst);
	$tekst = str_replace("ó", "Ó", $tekst);
	$tekst = str_replace("ś", "Ś", $tekst);
	$tekst = str_replace("ź", "Ź", $tekst);
	$tekst = str_replace("ż", "Ż", $tekst);
	return strtoupper($tekst);
}
?>