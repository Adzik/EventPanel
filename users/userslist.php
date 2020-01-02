<?php
require_once('../config.php');
require_once ('../Authorization.php');
connect();
if (isset($_SESSION['logged']) && $_SESSION['active'] == 1)
{
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM users');
    echo '<table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nick</th>
                            <th>Aktywny</th>
                            <th>Akcja</th>
                        </tr>
                        </thead>
                        <tbody>';
    $ile = 0;
    foreach ($stmt as $row) {
        echo '<tr>
                  <td>' . $row["ID"] . '</td>
                  <td>' . $row["Nick"] . '</td>
                  <td>' . $row["Aktywny"] . '</td>
                  <td><a href="manager.php?task=edit&id=' . $row['ID'] . '">Edytuj</a>|<a href="manager.php?task=usun&&id=' . $row['ID'] . '">Usuń</a></td>
                  </tr>';
    }
    echo '</tbody>
                        </table>';
}
else{
    header ('Location: ../index.php');
}

