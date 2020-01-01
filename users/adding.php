<?php
include('../config.php');
session_start();
if(isset($_SESSION['logged'])){
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];
        $password2 = $_POST['confirmpassword'];
        $group = $_POST['group'];

        if ($password == $password2)
        {
            $password = sha1($password);
            try {
                $pdo->exec('INSERT INTO `users`(`Nick`, `Password`, `Aktywny`) VALUES (
            \'' . $nickname . '\',
            \'' . $password . '\',
            \'' . $group . '\')');
            }
            catch (PDOException $e)
            {
                echo 'Wystąpił błąd' . $e ->getMessage();
            }
            $_SESSION['success'] = 0;
            header('Location: adduser.php');
        }
        else{
            $_SESSION['success'] = 3;
            header('Location: adduser.php');
        }


}
else
{
    $_SESSION['success'] = 1;
    header('Location: adduser.php');
}

