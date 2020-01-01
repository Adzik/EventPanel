<?php
include('../config.php');

try
{
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
catch (PDOException $e)
{
    echo 'Wystąpił błąd'. $e -> getMessage();
}