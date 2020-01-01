<?php
	include('config.php');
	//Logowanie
		if(isset($_POST['wyslano']))
		{
			$nick = trim($_POST['login']);
			$password = trim($_POST['haslo']);
			$password = sha1($password);
      		$aktywny = 1;
			//Logowanie bardziej
			$stmt = $pdo ->prepare("SELECT * FROM users WHERE Nick=:Nick AND Password=:Password AND Aktywny=:Aktywny");
			$stmt -> bindValue(":Nick", $nick, PDO::PARAM_STR);
			$stmt -> bindValue(":Password", $password, PDO::PARAM_STR);
            $stmt -> bindValue(":Aktywny", $aktywny, PDO::PARAM_STR);
			$stmt -> execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount()!=0)
			{
				echo "Zalogowałeś się!";
				session_start();
				$_SESSION['logged'] = true;
				$_SESSION['user_id'] = $row['Nick'];
				header("Location: panel.php");
			}
			else
			{
				echo 'Podałeś zły login lub hasło, lub konto jest dezaktywowane';
			}
		}
?>
