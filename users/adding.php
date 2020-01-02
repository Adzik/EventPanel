<?php
    require_once('../config.php');
    require_once ('../Authorization.php');
    connect();
    session_start();
    global $pdo;
    if(isset($_SESSION['logged']) && $_SESSION['active'] == 1)
    {
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];
        $password2 = $_POST['confirmpassword'];
        $group = $_POST['group'];

        $register = new Authorization();
        $register -> setUser($nickname);
        $register -> setPassword($password);
        $register -> setSecondPassword($password2);
        $register -> setGroup($group);

        if ($register->checkPasswords() && $register->validateUser())
        {
            if($register->RegisterUser())
            {
                $_SESSION['success'] = 0;
                header('Location: adduser.php');
            }
            else
            {
                $_SESSION['success'] = 1;
                header('Location: adduser.php');
            }

        }
        else
            {
                $_SESSION['success'] = 3;
                header('Location: adduser.php');
        }





    }
    else
    {
        header('Location: ../index.php');
    }

