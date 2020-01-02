<?php
    require_once 'config.php';
    global $pdo;
    connect();
    if(isset($_SESSION['logged']) && $_SESSION['active'] != 0) {
        $stmt = $pdo->prepare('SELECT * FROM events WHERE ID = :id');
        $stmt->bindValue(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        foreach ($stmt as $row) {
            echo '<form action="" method="POST">
                          ID: ' . $row["ID"] . '<br />
                          <select name="typ">
                               <option>Cykliczny</option>
                               <option>Event</option>
                                </select><br />
                          <input type="text" name="datap" value="' . $row["Data_start"] . '" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"/><br />
                          <input type="text" name="datak" value="' . $row["Data_koniec"] . '" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"/><br />
                          <input type="text" value="' . $row['Tekst'] . '" name="tekst" /><br /><br />
                          <input type="submit" name="update" value="Aktualizuj" /></form><br />';

        }
        $stmt->closeCursor();
        if (isset($_POST['update'])) {
            $typ = $_POST['typ'];
            $datap = $_POST['datap'];
            $datak = $_POST['datak'];
            $tekst = $_POST['tekst'];
            try {
                $stmt2 = $pdo->prepare('UPDATE events SET TYP = :typ, Data_start = :data_start, Data_koniec = :data_koniec, Tekst = :tekst WHERE id = :id');
                $stmt2->bindValue(":id", $id, PDO::PARAM_STR);
                $stmt2->bindValue(":typ", $typ, PDO::PARAM_STR);
                $stmt2->bindValue(":data_start", $datap, PDO::PARAM_STR);
                $stmt2->bindValue(":data_koniec", $datak, PDO::PARAM_STR);
                $stmt2->bindValue(":tekst", $tekst, PDO::PARAM_STR);

                $stmt2->execute();
                $stmt2->closeCursor();
            } catch (PDOException $e) {
                echo 'Wystąpił błąd' . $e->getMessage();
            }
            if ($stmt2->rowCount() != 0) {
                echo '<div id="div3" class="alert alert-success" role="alert">Edytowano!</div> ';
            } else {
                echo ' <div id="div3" class="alert alert-danger" role="alert">Wystąpił błąd przy edycji!</div>';
            }
        }
    }
    else
    {
        include('users/noAccess.html');
    }