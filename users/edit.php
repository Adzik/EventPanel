<?php
    require_once ('../Authorization.php');
    include('../config.php');
    connect();
    global $pdo;
    if(isset($_SESSION['logged']))
    {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE ID = :id');
        $stmt -> bindValue(":id", $id, PDO::PARAM_STR);
        $stmt -> execute();
        foreach($stmt as $row)
        {
            echo '<form action="" method="POST">
                              ID: '.$row["ID"].'<br />
                              <input type="text" name="nick" value="'.$row["Nick"].'"/><br />
                              <input type="password" name="pass" value=""/><br />
                              <input type="text" value="'.$row['Aktywny'].'" name="group" /><br /><br />
                              <input type="submit" name="update" value="Aktualizuj" /></form><br />';

        }
        $stmt->closeCursor();
        if(isset($_POST['update']))
        {
            $nick = $_POST['nick'];
            $pass = $_POST['pass'];
            $group = $_POST['group'];

            $edit = new Authorization();
            $edit -> setID($id);
            $edit -> setUser($nick);
            $edit -> setPassword($pass);
            $edit -> setGroup($group);

            if (!$edit->EditUser())
            {
                echo ' <div id="div3" class="alert alert-danger" role="alert">Wystąpił błąd przy edycji!</div>';
            }
            else {
                echo '<div id="div3" class="alert alert-success" role="alert">Edytowano!</div> ';
            }
        }
    }
    else
    {
        header('Location: ../index.php');
    }
