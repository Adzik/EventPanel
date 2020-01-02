<?php
	include('config.php');
		if(isset($_POST['wyslano'])) {
			require_once 'config.php';
			connect();
			require_once 'Authorization.php';

			$user = $_POST['login'];
			$password = $_POST['haslo'];

			$log = new Authorization();
			$log->setUser($user);
			$log->setPassword($password);

			if (!$log->validateUser()) {
				echo '<p class="error">Wprowadź login i hasło!</p>';
			} else if (!$log->Login()) {
				echo '<p class="error">Nieprawidłowy login i/lub hasło!</p>';
			} else {
				session_start();
				header('Location: panel.php');
			}
		}
