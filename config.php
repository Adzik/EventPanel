<?php
//Zmienne do bazy danych
	$login = '';
	$haslo = '';
	$host = 'localhost';
	$dbname = 'dsdobot';
	try
	{
		$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $login, $haslo, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e)
	{
		echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
	}
?>
