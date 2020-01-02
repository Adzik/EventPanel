<?php
    require_once('config.php');
    global $pdo;
    session_start();
        if(isset($_SESSION['logged'])){
            $typ = $_POST["typ"];
            $datap = $_POST["datap"];
            $datak = $_POST["datak"];
            $wartosc = $_POST["tekst"];
            $nick = $_SESSION['user_id'];
            try {
                $pdo->exec('INSERT INTO `events`(`Typ`, `Data_start`, `Data_koniec`, `Tekst`, `User`) VALUES (
            \'' . $typ . '\',
            \'' . $datap . '\',
            \'' . $datak . '\',
            \'' . $wartosc . '\',
            \'' . $nick . '\')');
            }
            catch (PDOException $e)
            {
                echo 'Wystąpił błąd' . $e ->getMessage();
            }
            include 'sync.php';
            $_SESSION['success'] = 0;
            header('Location: addevent.php');
            }
            else
            {
            header('Location: index.php');
        }

