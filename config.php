<?php
//Zmienne do bazy danych
$db["Host"] = "localhost";
$db["User"] = "wixa";
$db["Password"] = "korba";
$db["Name"] = "dsdobot";

function connect() {
	global $pdo;
	global $db;
	try {
		$pdo = new PDO('mysql:host='.$db["Host"].';dbname='.$db["Name"], $db["User"], $db["Password"]);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

