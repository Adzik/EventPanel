<?php
    require_once('config.php');
    global $pdo;
    try {
        $stmt = $pdo->prepare('DELETE FROM events WHERE ID = :id');
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt->execute();

    }
    catch (PDOException $e)
    {
        echo 'Wystąpił błąd' . $e ->getMessage();
    }
    if($stmt -> rowCount() != 0)
    {
        echo '<div id="div3" class="alert alert-success" role="alert">Usunięto!</div> ';
    }
    else{
        echo ' <div id="div3" class="alert alert-danger" role="alert">Wystąpił błąd przy usuwaniu!</div>';
    }
    $stmt -> closeCursor();

