<?php
include('../config.php');
$stmt = $pdo -> prepare('SELECT * FROM users WHERE ID = :id');
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
    $pass = sha1($_POST['pass']);
    $group = $_POST['group'];
    try {
        $stmt2 = $pdo->prepare('UPDATE users SET Nick = :Nick, Password = :Password, Aktywny = :Aktywny WHERE ID = :id');
        $stmt2->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt2->bindValue(":Nick", $nick, PDO::PARAM_STR);
        $stmt2->bindValue(":Password", $pass, PDO::PARAM_STR);
        $stmt2->bindValue(":Aktywny", $group, PDO::PARAM_STR);

        $stmt2->execute();
        $stmt2->closeCursor();
    }
    catch (PDOException $e)
    {
        echo 'Wystąpił błąd' . $e ->getMessage();
    }
    if($stmt2 -> rowCount() != 0)
    {
        echo '<div id="div3" class="alert alert-success" role="alert">Edytowano!</div> ';
    }
    else
    {
        echo ' <div id="div3" class="alert alert-danger" role="alert">Wystąpił błąd przy edycji!</div>';
    }
}