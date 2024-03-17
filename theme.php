<?php
session_start();

$theme = $_GET["nt"];

switch($theme) {
	case 1: $_SESSION['SHEET_NAME'] = "retinol-classic.css"; break;
	default: $_SESSION['SHEET_NAME'] = "retinol.css"; break;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>